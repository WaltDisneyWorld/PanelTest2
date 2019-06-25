<?php

function getEdition($key)
{
    /*
        Remove License Server

        This is no longer going to be added in newer releases.
    */
require("config.php");
    return array(
    "Key" => $key,
    "Type" => "Community Release",
    "Status" => "Active",
    "ID" => 3,
);
}
