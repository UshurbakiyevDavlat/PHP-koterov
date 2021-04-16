<?php
    require_once("head22user.php");

    $obj = new user("Davlat","dada200");

    //dump of an object
    echo "<pre>";
    print_r($obj);
    echo "</pre>";

    //serializing of an object

    $object = serialize($obj);

    //show serialized info

    echo $object; // as you can see now our password is not cripted without using __sleep() method
    


?>