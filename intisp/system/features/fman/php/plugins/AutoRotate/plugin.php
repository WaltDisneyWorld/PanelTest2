<?php

/*
 * Adaclare IntISP System
 * Copyright Adaclare Technologies 2007-2018
 * https://www.adaclare.com
 * https://github.com/INTisp
 *
 */

class elFinderPluginAutoRotate
{
    private $opts = [];

    public function __construct($opts)
    {
        $defaults = [
            'enable'         => TRUE,       // For control by volume driver
            'quality'        => 95,         // JPEG image save quality
        ];

        $this->opts = array_merge($defaults, $opts);
    }

    public function onUpLoadPreSave(&$path, &$name, $src, $elfinder, $volume)
    {
        $opts    = $this->opts;
        $volOpts = $volume->getOptionsPlugin('AutoRotate');
        if (is_array($volOpts)) {
            $opts = array_merge($this->opts, $volOpts);
        }

        if (!$opts['enable']) {
            return FALSE;
        }

        $srcImgInfo = @getimagesize($src);
        if ($srcImgInfo === FALSE) {
            return FALSE;
        }

        // check target image type
        if ($srcImgInfo[2] !== IMAGETYPE_JPEG) {
            return FALSE;
        }

        return $this->rotate($volume, $src, $srcImgInfo, $opts['quality']);
    }

    private function rotate($volume, $src, $srcImgInfo, $quality)
    {
        if (!function_exists('exif_read_data')) {
            return FALSE;
        }
        $degree = 0;
        $exif   = @exif_read_data($src);
        if ($exif && !empty($exif['Orientation'])) {
            switch ($exif['Orientation']) {
                case 8:
                    $degree = 270;
                    break;
                case 3:
                    $degree = 180;
                    break;
                case 6:
                    $degree = 90;
                    break;
            }
        }
        $opts = [
            'degree'     => $degree,
            'jpgQuality' => $quality,
        ];

        return $volume->imageUtil('rotate', $src, $opts);
    }
}
