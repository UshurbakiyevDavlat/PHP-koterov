<?php
    require_once("head22serialize.php");

    $fd = fopen("head22text.obj","r");
    if(!$fd) exit("Can not open the file");

    $text = fread($fd,filesize("head22text.obj"));
    fclose($fd);

    $obj = unserialize($text);

    echo "<pre>"; print_r($obj) ; echo "</pre>";

?>