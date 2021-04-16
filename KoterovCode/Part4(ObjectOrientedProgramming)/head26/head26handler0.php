<?php
        function myErrorHandler($errno,$msg,$file,$line){
            echo '<div style = "border-style:inset;border-width:2">';
            echo "Error with code happened <b>$errno</b>!<br />";
            echo "File: <tt>$file</tt>, line $line.<br />";
            echo "Text of an error: <i>$msg</i>";
            echo "</div>";
        }

        set_error_handler("myErrorHandler",E_ALL);
        filemtime("spoon");

?>