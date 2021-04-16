<?php
    function __autoload($classname){
        require_once (__DIR__. "/$classname.php");
    }

    $page = new PHP7\Page("About us","Inner data of Page");
    $page ->tags();

    //Calling __autoload() is not required because it will be called automaticly when interpretator meet name of not  loaded class.

?>