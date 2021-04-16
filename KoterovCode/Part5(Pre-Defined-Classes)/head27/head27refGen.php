<?php
    function simple($from,$end){
        for($i = $from;$i < $end ; $i++){
            yield $i;
        }
    }

    foreach (simple(1,5) as $val) {
        echo ($val * $val). " "; 
    }

?>