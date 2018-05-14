<?php

/*
 * Adaclare IntISP System
 * Copyright Adaclare Technologies 2007-2018
 * https://www.adaclare.com
 * https://github.com/INTisp
 *
 */

class elFinderPluginSanitizer
{
    private $opts     = [];
    private $replaced = [];
    private $keyMap   = [
        'ls'     => 'intersect',
        'upload' => 'renames',
    ];

    public function __construct($opts)
    {
        $defaults = [
            'enable'   => TRUE,  // For control by volume driver
            'targets'  => ['\\', '/', ':', '*', '?', '"', '<', '>', '|'], // target chars
            'replace'  => '_',    // replace to this
        ];

        $this->opts = array_merge($defaults, $opts);
    }

    public function cmdPreprocess($cmd, &$args, $elfinder, $volume)
    {
        $opts = $this->getOpts($volume);
        if (!$opts['enable']) {
            return FALSE;
        }
        $this->replaced[$cmd] = [];
        $key                  = (isset($this->keyMap[$cmd])) ? $this->keyMap[$cmd] : 'name';

        if (isset($args[$key])) {
            if (is_array($args[$key])) {
                foreach ($args[$key] as $i => $name) {
                    $args[$key][$i] = $this->sanitizeFileName($name, $opts);
                }
            } else {
                $args[$key] = $this->sanitizeFileName($args[$key], $opts);
            }
        }

        return TRUE;
    }

    public function cmdPostprocess($cmd, &$result, $args, $elfinder)
    {
        if ($cmd === 'ls') {
            if (!empty($result['list']) && !empty($this->replaced['ls'])) {
                foreach ($result['list'] as $hash => $name) {
                    if ($keys = array_keys($this->replaced['ls'], $name)) {
                        if (count($keys) === 1) {
                            $result['list'][$hash] = $keys[0];
                        } else {
                            $result['list'][$hash] = $keys;
                        }
                    }
                }
            }
        }
    }

    public function onUpLoadPreSave(&$path, &$name, $src, $elfinder, $volume)
    {
        $opts = $this->getOpts($volume);
        if (!$opts['enable']) {
            return FALSE;
        }

        if ($path) {
            $path = $this->sanitizeFileName($path, $opts, ['/']);
        }
        $name = $this->sanitizeFileName($name, $opts);

        return TRUE;
    }

    private function getOpts($volume)
    {
        $opts = $this->opts;
        if (is_object($volume)) {
            $volOpts = $volume->getOptionsPlugin('Sanitizer');
            if (is_array($volOpts)) {
                $opts = array_merge($this->opts, $volOpts);
            }
        }

        return $opts;
    }

    private function sanitizeFileName($filename, $opts, $allows = [])
    {
        $targets = $allows ? array_diff($opts['targets'], $allows) : $opts['targets'];

        return str_replace($targets, $opts['replace'], $filename);
    }
}
