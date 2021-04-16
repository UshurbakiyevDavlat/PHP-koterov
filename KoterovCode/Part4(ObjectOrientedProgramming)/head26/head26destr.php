<?php
    class Orator{
        private $name;

         function __construct($name){
            $this -> name = $name;
            echo "Object {$this->name} created.<br />";
        }

        function __destruct(){
            echo "Object {$this->name} is deleted.<br />";
        }
    }

        function outer(){
            $obj = new Orator(__METHOD__);
            inner();
        }
        function inner(){
            $obj = new Orator(__METHOD__);
            echo "Attention, outlier!<br />";
            throw new Exception("Hello!");
        }

    

    echo "Start of the program<br />";
    try{
        echo "Start of the try-block<br />";
        outer();
        echo "End of the try-block<br />";
    }catch(Exception $e){
        echo "got exception: {$e->getMessage()}<br />";
    }
    echo "End of the program<br />";
?>