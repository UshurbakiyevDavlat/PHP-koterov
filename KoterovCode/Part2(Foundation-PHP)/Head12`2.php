<?php

 // compare memory usage 

 //non-ergonomic usage:
/*
 function crange($size){
     $arr = [];

    for($i = 0 ; $i<$size; $i++){
        $arr[] = $i;
    }
    return $arr;
 }

 $range = crange(1024000);
 echo memory_get_usage()." byte <br>";

*/
?>

<?php
//ergonomic usage: on 2 powers less memory usage!

function crange2($size){
    for($i = 0; $i < $size ; $i++){
        yield $i;
    }
}
$range = crange2(1024000);
//foreach($range as $v){
  //  echo "$v ";
//}
echo memory_get_usage()."<br>";
?>

<br>

<?php
//usage of keys in generators

function collect($arr,$callback){
    foreach($arr as $key => $value){
        yield $key => $callback($value);
    }

}
    $arr = [ 
        "first" => 1,
        "second" => 2,
        "third" => 3,
        "fourth" => 4,
        "fifth" => 5,
        "sixth" => 6];

        $collect = collect($arr,function($e){
                    return $e * $e;
        });
        foreach($collect as $key => $val)echo "$val ($key)";

?>

<br>

<?php
//usage of reference
function &reference(){
    $val = 3;
    while($val > 0){
        yield $val;
    }
    echo "<br>".$val;
}

foreach(reference() as &$num){
        echo (--$num).' ';
}

?>

<br>

<?php
        //getting type of generator

    function simple($from =0, $to = 100){
        for($i=$from;$i < $to; $i++){
            echo "value : $i<br>";
            yield $i;
        }
    }
    $generator = simple();
    echo gettype($generator);

?>

<br>

<?php
    function block(){
        while(true){
            $string = yield;
            echo $string;
        }
    }

    $block = block();
    $block -> send("Hello there!<br>");
    $block -> send("Hello world, i am using PHP know!<br>");


?>

<?php
    //Usage of return in the generators

    function gen(){
        yield 1;
        return yield from gen_two();
        yield 5;
    }
    function gen_two(){
        yield 2;
        yield 3;
        return 4;
    }
    $gen = gen();
    foreach($gen as $i){
        echo "$i"."<br>";
    }
    echo "return = " .$gen->getReturn();

    //end of part 2 Koterov`s book.
?>
