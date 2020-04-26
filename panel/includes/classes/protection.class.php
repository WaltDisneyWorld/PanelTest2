<?php

class protection
{
    public $salt = "EX7Rzz";
    public $garbage = "2918";
   
    private function UniqueMachineID()
    {
        global $salt;
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $temp = sys_get_temp_dir() . DIRECTORY_SEPARATOR . "diskpartscript.txt";
            if (!file_exists($temp) && !is_file($temp)) {
                file_put_contents($temp, "select disk 0\ndetail disk");
            }
            $output = shell_exec("diskpart /s " . $temp);
            $lines = explode("\n", $output);
            $result = array_filter($lines, function ($line) {
                return stripos($line, "ID:") !== false;
            });
            if (count($result) > 0) {
                $result = array_shift(array_values($result));
                $result = explode(":", $result);
                $result = trim(end($result));
            } else {
                $result = $output;
            }
        } else {
            $result = shell_exec("blkid -o value -s UUID");
            if (stripos($result, "blkid") !== false) {
                $result = $_SERVER['HTTP_HOST'];
            }
        }
        return sha1($salt . sha1($result));
    }
    private function notexpired($date2)
    {
        date_default_timezone_set('America/Los_Angeles');
        $date_now = new DateTime();
        $date2 = new DateTime(date('m/d/Y', $date2));

        if ($date_now < $date2) {
            return true;
        }
        return false;
    }
    private function sernum()
    {
        $template = '9X9XX-9XXX9-XX9XX-X9XX9-9X9XX-X9X99';
        $k = strlen($template);
        $sernum = '';
        for ($i = 0;$i < $k;$i++) {
            switch ($template[$i]) {
                case 'X':
                    $sernum .= chr(rand(65, 90));
                break;
                case '9':
                    $sernum .= rand(0, 9);
                break;
                case '-':
                    $sernum .= '-';
                break;
            }
        }
        return $sernum;
    }
    private function getMachineIP()
    {
        $source1 = file_get_contents("https://icanhazip.com");
        $source2 = file_get_contents("http://checkip.amazonaws.com/");
        $source3 = file_get_contents("http://wtfismyip.com/text");
        $source1 = str_replace(array(
            "\r",
            "\n"
        ), "", $source1);
        $source2 = str_replace(array(
            "\r",
            "\n"
        ), "", $source2);
        $source3 = str_replace(array(
            "\r",
            "\n"
        ), "", $source3);
        if ($source1 == $source2) {
            return $source1;
        } else {
            return $source3;
        }
    }
    private function encryptString($string)
    {
        global $salt, $garbage;

        $red = openssl_encrypt($string, "AES-128-ECB", $salt);

        $saltlength = strlen($salt);

        $garbage_a = $this->randomPassword($saltlength);
        $garbage_b = $this->randomPassword($saltlength * $garbage);
        $f = $saltlength . $garbage_a . $red . $garbage_b;
        $z = urlencode($f . md5($f));
        return strtolower($z) ^ strtoupper($z) ^ $z;
    }
    private function decryptString($string)
    {
        global $salt, $garbage;
        $string = urldecode($string);
        $string = strtolower($string) ^ strtoupper($string) ^ $string;
        $saltlength = $string[0];

        if (!is_numeric($saltlength)) {
            return false;
        }

        $md5sum = substr($string, -32);
        $string = substr($string, 0, -32);
        $oldsum = md5($string);
        $string = substr($string, 1 + $saltlength);
        $string = substr($string, 0, -1 * $saltlength * $garbage);

        if ($oldsum != $md5sum) {
            return "";
        }

        $string = openssl_decrypt($string, "AES-128-ECB", $salt);

        return $string;
    }
    private function randomPassword($lgth)
    {
        $alphabet = '+-/=abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0;$i < $lgth;$i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    private function addEndTags($text, $whatami)
    {
        $text = chunk_split($text, rand(45, 60), "\n");
        $top = "---------------- START $whatami ----------------";
        $bottom= "---------------- END $whatami   ----------------";
        $text = substr($text, 0, strrpos($text, "\n"));
        return "$top\n" . $text . "\n$bottom";
    }
    private function removeEndTags($string)
    {
        $string = preg_replace('/^.+\n/', '', $string);
        $string = substr($string, 0, strrpos($string, "\n"));
        $string = str_replace(array(
            "\r",
            "\n"
        ), "", $string);
        return $string;
    }
    public function generateMachineCertificate()
    {
        $aboutMachine = array(
            "MachineID" => $this->UniqueMachineID() ,
            "IP" => $this->getMachineIP()
        );
        $aboutMachine = json_encode($aboutMachine);
        return $this->addEndTags($this->encryptString($aboutMachine), "MACHINE ID");
    }
    public function generateLicenseKey($machine_id, $days, $extras = "")
    {
        global $salt, $garbage;
        $old_salt = $salt;
        $old_garbage = $garbage;
        $mid = $this->decryptString($this->removeEndTags($machine_id));
        if ($mid == "") {
            return array(
            "License" => "Invalid"
        );
        }
        $mid = json_decode($mid, 1);
        $timestamp = time();
        $timestamp = strtotime("+$days days", $timestamp);
        $serialnum = $this->sernum();
        $licenseSetup = array(
            "MachineID" => $mid["MachineID"],
            "IP" => $mid["IP"],
            "Expires" => $timestamp,
            "Serial" => $serialnum,
            "Extras" => $extras
        );
        $licenseSetup = json_encode($licenseSetup);
        $this->setVars(md5($salt), $garbage * 2);
        $licenseSetup = $this->addEndTags($this->encryptString($licenseSetup), "LICENSE KEY");
        $this->setVars($old_salt, $garbage);
        return array(
            "License" => $licenseSetup,
            "Serial" => $serialnum
        );
    }
    public function verifyLicenseKey($license)
    {
        global $salt, $garbage;
        $old_salt = $salt;
        $old_garbage = $garbage;
        $this->setVars(md5($salt), $garbage * 2);

        $lic = $this->decryptString($this->removeEndTags($license));

        if ($lic == "") {
            return array(
            "status" => "Invalid"
        );
        }

        $lic = json_decode($lic, 1);
        $this->setVars($old_salt, $garbage);
        if ($lic["MachineID"] != $this->UniqueMachineID() || $lic["IP"] != $this->getMachineIP()) {
            return array(
            "status" => "Invalid"
        );
        }
        $timestamp = date();
        $days = date('m/d/Y', $lic["Expires"]);
        if (!$this->notexpired($lic["Expires"])) {
            return array(
            "status" => "Invalid"
        );
        }
        return array(
            "status" => "Active",
            "expires" => $days,
            "MachineID" => $lic["MachineID"],
            "Serial" => $lic["Serial"],
            "extra" => $lic["Extras"]
        );
    }
    public function setVars($salt_a, $garbage_a)
    {
        global $salt, $garbage;
        $salt_a = substr($salt_a, 0, 9);
        $salt = $salt_a;
        $garbage = $garbage_a;
    }
    public function Init()
    {
        $this->setVars("f4[P~8QJsG", "197");
    }
}
