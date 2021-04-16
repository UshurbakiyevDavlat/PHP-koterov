<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show the ip address and browser version</title>

</head>
<body>
    Your ip-addres:<?= $_SERVER['REMOTE_ADDR']?> <br/>
    Your browser: <?=$_SERVER['HTTP_USER_AGENT']?> <br/>

</body>
</html>


<?php // Demonstration working process with cookies!
    $count = 0;

    if(isset($_COOKIE['count'])) $count = $_COOKIE['count'];
    $count++;
    setcookie("count",$count,0x7FFFFFFF,"/");
    echo $count;
?>

