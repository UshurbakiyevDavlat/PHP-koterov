<?php
$n = false;
$a = false;
$d = true;
$x = !($n||$a) && $d;
echo var_dump($x);
?>

<?php

$name = "Davlat";
$text = 
<<< 'MARKER'
//now document allow us take into $text more special characters
Shla sasha 
po shose 
i sosala sushku ' ' da dad da \\ 
MARKER;

echo $text;
?>


<?php 
//Shape
define('Line',0);
define('Curve',1);
define('Rectangle',2);
define('Elipse',3);

// Color
define('Black',0);
define('Blue',4);
define('Green',8);
define('Yellow',12);
define('Orange',16);
define('Red',20);
define('White',24);

echo "Green Rectangle in decimal format:". Rectangle | Green; 
echo "<br>";

echo "Green Rectangle in binary format:". decbin(Rectangle|Green);
echo "<br>";
echo "<hr>";
?>


<?php 

define('Rectangle',2);
define('Green',8);
$angle = 45<<5;
$height = 15<<14;
$width = 15<<23;

echo Rectangle|Green|$angle|$height|$width;
echo "<hr>";
echo "Primitive:" . (Rectangle|Green|$angle|$height|$width & 3). "<br>";
echo "Color:" . ((Rectangle|Green|$angle|$height|$width &28) >>2 ) . "<br>";
echo "Angle:" . ((Rectangle|Green|$angle|$height|$width & 16352)>>5). "<br>";
echo "Height: ". ((Rectangle|Green|$angle|$height|$width & 8372224)>>14) . "<br>";
echo "Width:" . ((Rectangle|Green|$angle|$height|$width & 4286578688)>>23)."<br>";
echo "<hr>";

?>


<?php 

$arr = array(6,432,31,23,56,7);

usort($arr,function($a,$b){return $a<=>$b;});

print_r($arr);

?>

<form action = "Head7.php">

<input type="submit" name = "doGO" value = "Click!">

</form>
<?php 

if(@$_REQUEST['doGO'])echo "You pressed the button!";
$x = null;
$y = null;
$z = 3;

$val = ($x ?? $y ?? $z);
var_dump($val);

if(isset($_REQUEST['doGO'])?:false )echo "Button pressed!";

?>

<?php
$val = $_REQUEST["doGO"]?? false;
?>