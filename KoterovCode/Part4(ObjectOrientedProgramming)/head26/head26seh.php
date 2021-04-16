<?php

    ## Disadvantages of setErrorHandler

    echo "Start of the program<br />";

    set_error_handler("handler");

    echo "Everything, that has the end...";
    trigger_error("Hello!");
    echo "has the end as well...";

    function handler($num,$msg){
        
        echo "<div style=border-style:inset;border-width:2></div>"."<b>";
        echo "<br />Error num:$num<br />";
        echo "Message:$msg<br /></b>"."<div style=border-style:inset;border-width:2></div>";
        exit();
    }

?>