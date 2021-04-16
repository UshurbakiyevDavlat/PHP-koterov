<?php

$name = "Davlat";
$age = 21;
$surname = "Ushurbakiyev";

$list = array('Davlat','Ushurbakiyev',21);

list($name,$surname,$age) = $list;
echo "My name is $name $surname, and i am $age year old.";

?>

<?php
 // associative arrays косвенный перебор 

 $birth = [
     "Thomas Anderson" =>"1962-03-11",
     "Keanu Reeves" =>"1962-09-02",

 ];

    for(reset($birth);($k = key($birth));next($birth))
     echo "<br> $k was born in {$birth[$k]}<br/>"


?>


<?php
//Прямой перебор 
 $birth = [
    "Thomas Anderson" =>"1962-03-11",
    "Keanu Reeves" =>"1962-09-02",

];
for(reset($birth);list($k,$v) = each($birth);){
    echo "$k was born in $v <br>";
}

?>

<?php
$birth = [
    "Thomas Anderson" =>"1962-03-11",
    "Keanu Reeves" =>"1962-09-02",

];

foreach($birth as $k => $v){
    echo "$k was born in $v<br>";
}

foreach([101,101002,100001] as $nums){
    echo "On the wall was painted set of numbers :  $nums<br>";
}

$numss = [100,1002,10003];
foreach($numss as &$v)$v++;
echo "Array elements:";
foreach($numss as $a){
    echo "<br>".$a."<br>";
}


?>

<?php

$st = "42312|Davlat|2000-19-03|Text.....(|)";
$person = explode("|",$st,4);
list($id,$name,$birth,$comment) = $person;

foreach($person as $k=>$v){
    echo "$k=$v ";
}

$textBefore = implode(" ",$person);

echo "<br>".$textBefore."<br>";

?>


<?php //serialization and unserialization

$A = ["Name"=>"Davlat", "age"=>"21","city"=>"Almaty"];
$st = serialize($A);
echo $st;

$unst =  unserialize($st);
foreach($unst as $k => $v){
    echo "$k => $v <br>";
}
?>