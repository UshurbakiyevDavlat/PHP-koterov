<?php

class Human{

    private static $i = 25550690;
    public $dna;
    public $text;

    public function __construct(){
        $this -> dna = self::$i++;
        $this -> text = "There is no spoon?";
    }
    public function __clone(){
        $this -> dna = $this -> dna."(cloned)";

    }

}

    $neo = new Human();
    $virtual = clone $neo;

    echo "Neo`s dna is : {$neo->dna}, text : '{$neo->text}'<br />\n";
    echo "Virtual twin dna is : {$virtual->dna}, text : '{$virtual->text}'<br />\n";


?>