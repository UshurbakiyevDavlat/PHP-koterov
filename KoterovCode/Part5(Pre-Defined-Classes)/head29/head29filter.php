<?php
    require_once "lib/filter.php";

    $filter = new ExtensionFilter(new DirectoryIterator('.'),'php');

    foreach ($filter as $file) {
        echo "$file"."<br />";
    }
    

?>