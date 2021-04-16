<?php

//Before use it, you should set value in directive of data.timezone() or use class DateTimeZone
    $date = new DateTime();
    echo $date -> format("d-m-Y H:i:s");
?>
