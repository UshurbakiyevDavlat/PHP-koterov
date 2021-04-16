<?php
    class Monolog{
        public $first = "It`s him.";
        protected $second = "The Anomaly.";
        private $third = "Do we proceed?";
        protected $fourth = "Yes.";
        private $fifth = "He is still....";
        public $sixth = "....only human.";
    }

    $monolog = new Monolog();
    
    foreach ($monolog as $key => $value) {
        echo "$key:$value";
    }

    //so as we can see from the result we got only $first and $sixth
    //Why? Because foreach goes through only public proporties.
    
?>