<?php
    echo "Start of the programm.<br />";

    try {
        echo "Start of the try-block.<br />";
        outer();
        echo "End of the try-block.<br />";
    }catch(Exception $e){
        echo "Exception :{$e->getMessage()}<br />";
    }

    echo "End of the programm.<br />";

    function outer(){
        echo "Enter in the function ".__METHOD__."<br />";
        inner();
        echo "Out from the function".__METHOD__."<br />";
    }

    function inner() {
        echo "Enter in the function ".__METHOD__."<br />";
        throw new Exception("HELLO!");
        echo "Out from the function".__METHOD__."<br />";
    }
    
?>