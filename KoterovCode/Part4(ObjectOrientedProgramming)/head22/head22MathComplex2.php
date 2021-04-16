<?php
    class MathComplex2 {
        public $re,$im;

        function __construct($re,$im){ //construction for comfortable initialization
            $this->re = $re;
            $this->im = $im;
        }

        function add(MathComplex2 $y){ //adding of one object data to another
            $this->re += $y->re;
            $this->im += $y->im;
        }

        function __toString(){ //returning string equivalent of object data
            return "({$this->re},{$this->im})<br/>";
        }

    }


?>