<?php
    require_once("head22user.php");

    $object = 'O:4:"user":3:{s:4:"name";s:6:"Davlat";s:8:"referrer";s:69:"/KoterovCode/Part4(ObjectOrientedProgramming)/head22userSerialize.php";s:4:"time";i:1615612165;}';

    $obj = unserialize($object);


    echo "<pre>";
    print_r($obj);
    echo "</pre>";

?>