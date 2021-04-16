<?php

spl_autoload_register(function ($classname){
    require_once(__DIR__. "/$classname.php");
});

$page = new PHP7\Page("About us","Inner data of the Page");
$page -> tags();

?>