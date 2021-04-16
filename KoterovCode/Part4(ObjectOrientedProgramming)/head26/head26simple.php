<?php
    echo "Start of the program.";

    try{
        echo "Everything,that has a begin...<br />";
        throw new Exception("Hello!");
        echo "... has end as well.<br />";
    }catch (Exception $e) {
        echo " Exception: {$e->getMessage()}<br />";
    }
    echo "End of the programm. <br />";
?>