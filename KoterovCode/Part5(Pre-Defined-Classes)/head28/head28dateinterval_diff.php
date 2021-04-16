<?php

    $date = new DateTime('2015-01-01 0:0:0');
    $nowDate = new DateTime();
    $interval = $nowDate -> diff($date);
    
    echo $date->format("d-m-Y H:i:s")."<br />";
    echo $nowDate -> format("d-m-Y H:i:s")."<br />";


    echo $interval -> format("%Y-%m-%d %H:%S")."<br />";

    echo "<pre>";
        print_r($interval);
    echo "</pre>";

    /*
        y - years
        m - months
        d - days
        h - hours
        i - minutes
        s - seconds
        invert - 1 if interval negative, and 0 if interval positive
        days - difference btw days

    
     */

?>