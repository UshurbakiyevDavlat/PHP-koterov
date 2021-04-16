<?php

    class Dumper{
        public static function print($obj){
            print_r($obj);
        }
    }

    Dumper::print(
        new class {
            public $title;
            public function __construct(){
                $this->title = "Hello world!";
            }
        });


    $a = new class {
        public $cont;
        public function __construct(){
            $this -> cont = "Bye world!";
        }
    };

    Dumper::print($a);

?>