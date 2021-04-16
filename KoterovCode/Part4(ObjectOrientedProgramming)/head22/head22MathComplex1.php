<?php
    
    class MathComplex1{

        public $re,$im;

        function add (MathComplex1 $y){
            $this->re += $y->re;
            $this->im += $y->im;
        }

        function __toString(){
            return "({$this->re},{$this->im})<br/>";
        }
    }


?>