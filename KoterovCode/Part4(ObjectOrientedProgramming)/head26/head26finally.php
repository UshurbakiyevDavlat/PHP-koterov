<?php
    function eatThis(){throw new Exception("bang-bang!");}

    function hello(){ 
    try{
        echo "Everything that has begin..";
        eatThis();
        
    }finally{
        echo "..has the end!";
    }
    echo "this will never printed!";
}

    hello();
?>