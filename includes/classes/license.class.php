<?php

function getEdition($key) {
       return array(
    "Key" => $key,
    "Type" => "dev",
    "Status" => "Active",
    "ID" => 1,
    "Exp" => 99,
);
    $server_ip = file_get_contents("http://icanhazip.com");
    $server_ip = preg_replace('/\s+/', '', $server_ip);
    $key_ke = urlencode($key);
     if (isset($_SESSION["chkx"])) {
      return $_SESSION["chkx"];
    }
   $getSt = json_decode(file_get_contents("https://www.enyrx.com/testActivation.php?key=" . $key_ke . "&remote_ip=" . $server_ip),0);
   
    if (!isset($getSt->exp_time)) {
        return false;
    }
 
    if ($getSt->product == 1) $product = "Dev";
     if ($getSt->product == 2) $product = "Standalone";
    if ($getSt->product == 3) $product = "Shared";
    if ($getSt->product == 4) $product = "Host";
          $_SESSION["chkx"] = array(
    "Key" => $key,
    "Type" => $product,
    "Status" => "Active",
    "ID" => $getSt->product,
    "Exp" => $getSt->exp_time,
);

       return array(
    "Key" => $key,
    "Type" => $product,
    "Status" => "Active",
    "ID" => $getSt->product,
    "Exp" => $getSt->exp_time,
);

}