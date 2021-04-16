<?php
    function simple ($from = 0,$end = 100){
        for ($i = $from ; $i < $end ; $i++){
            yield $i;
        }
    }

    $obj = simple(1,5);
    //var_dump($obj); // object(Generator) #1 (0) {}

    //do loop till the end.
    while ($obj -> valid()){
        echo ($obj -> current() * $obj->current())." ";
        //to the next element
        $obj -> next();
    }

?>