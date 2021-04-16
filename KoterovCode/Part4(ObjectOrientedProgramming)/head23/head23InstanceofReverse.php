<?php
    require_once "head23staticPage.php";

    function echoInst($obj){
        if ($obj instanceof Category){
            echo "Work with category";
            // can call specific for Category methods
            // is not included in Page and Cache
        }
        else if ($obj instanceof News) echo "Work with News";
        else if ($obj instanceof StaticPage) echo "Work with static Pages ";
        else echo "Unknown type of page.";

    }

?>