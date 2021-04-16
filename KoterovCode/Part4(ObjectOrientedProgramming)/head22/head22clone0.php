<?php
require_once("head22MathComplex2.php");


$a = new MathComplex2(302,101);
$b = new MathComplex2(0,0);

$c = clone $b;
$c -> add($a);

echo "b = $b and c = $c";


?>