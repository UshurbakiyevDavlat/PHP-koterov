<?php
    class HeadShotException extends Exception {}
    
    function eatThis(){throw new Exception("bang-bang.");}

    function action(){
        echo "Everything that has begin..<br />";
        try{
            eatThis();
        } catch(Exception $e){
            echo "..has the end as well<br />";
            throw $e;
        }
    }

    try{
        action();
    }catch(Exception $e){
        echo "sorry but you self-shooted: {$e->getMessage()}";
    }

?>