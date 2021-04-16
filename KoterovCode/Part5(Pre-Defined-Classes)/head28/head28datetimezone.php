<?php
    $date = new DateTime("2016-01-01 00:00:00",new DateTimeZone("Asia/Almaty"));
    echo $date -> format(DateTime::ATOM);



?>
