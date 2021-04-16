<?php //generators

function simple($from = 0 , $to = 100){
        for($i=$from;$i<$to;$i++){
            echo "Value is : $i <br>";
                yield $i;
            }
}
foreach(simple() as $val){
    echo "Square is: ".($val*$val).'<br>';
        if($val > 5)break;
}
?>


<?php
function collect($arr,$callback){
    foreach($arr as $v){
        yield $callback($v);
    }
}
$arr = [1,2,3,4,5,6,7,8];
$collect = collect($arr,function($e){return $e*$e;});
foreach($collect as $v){
    echo "$v ";
}


?>

<br>

<?php
    function select($arr2,$callback2){
            foreach($arr2 as $v){
                if($callback2($v))yield $v;
            }
    }
    $arr2 = [12,34,2,1,4,5,8,9];
    $select = select($arr2,function($e){
        return $e % 2==0 ? true : false;
    });
    foreach($select as $v){
        echo "$v ";
    }
?>

<br>

<?php
function reject($arr2,$callback3){
    foreach($arr2 as $v){
        if($callback3($v))yield $v;
    }
}
$reject = reject($arr2,function($e){
    return $e %2 != 0 ? true : false;
});
foreach($reject as $v){
    echo "$v ";
}

?>

<br>

<?php
// combinations of generators

$arrOld = [123,42,1,5,76,2,3,9];
$select = select($arrOld,function($e){
    return $e % 2 == 0 ? true : false;
});
$collect = collect($select,function($e){
    return $e*$e;
});

foreach($collect as $v){
    echo "$v ";
}

?>

<br>

<?php
        // delegation generators

    function squars($value){
        yield $value * $value;
    }

    function evSquars($arr){
        foreach($arr as $v){
            if($v % 2 == 0) yield from squars($v);
        }
    }

    foreach(evSquars($arr)as $v){
        echo "$v ";
    }
    


?>


