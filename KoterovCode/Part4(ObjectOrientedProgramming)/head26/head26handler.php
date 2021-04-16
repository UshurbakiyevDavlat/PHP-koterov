<?php
    function myErrorHandler($errno,$msg,$file,$line){
        if (error_reporting() == 0)return;

        echo '<div style ="border-style:inset;border-width:2">';
        echo "Error was happened within the code <b>$errno</b>!<br />";
        echo "In the File: <tt>$file</tt>, line: $line .<br />";
        echo "Text of an error: <i>$msg</i>. <br />";
        echo "</div>";

    }

    set_error_handler("myErrorHandler",E_ALL);
    @filemtime("spoon");


?>