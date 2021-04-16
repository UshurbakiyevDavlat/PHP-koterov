<?php

$ranNum = mt_rand(1,10);
$name = "VALUE[$ranNum]";
define($name,$ranNum);

echo constant($name);

$a = array('a'=> "apple", 'b' => "box" , 'c' => array(
    'x'=> "xander",
    'y'=> "yellow",
    'z'=> "zigfrid"
    )
);

$b = array(1, array("a","b"));



echo "<pre>"; print_r($a);echo"</pre>";

echo "<pre>"; var_dump($b); echo"</pre>";

        class someClass{
            private $x = 100;
        }
                
        $a= array(l, array ("Programs hacking programs. Why?", ".n'ApTaHbRH"));
        echo "<pre>"; var_export($a); echo "</pre>";

        $obj = new someClass();
        echo "<pre>";var_export($obj); echo "</pre>";
?>