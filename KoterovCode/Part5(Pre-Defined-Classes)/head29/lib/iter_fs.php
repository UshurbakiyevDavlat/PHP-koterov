<?php
    require_once "FS.php";

    $d = new FSDirectory(".");
    foreach ($d as $path => $entry) {
        if ($entry instanceof FSFile){
            echo "<tt>$path</tt>: ".$entry->getSize()."<br />";
        }
    }

?>