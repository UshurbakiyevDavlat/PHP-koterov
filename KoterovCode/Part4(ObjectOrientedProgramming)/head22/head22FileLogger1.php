<?php

    class FileLogger1{
        public $f; //opened  file
        public $name;  // name of the log
        public $lines = []; // array which will include final result
    
            
        //Granted call in the start
        public function __construct($name,$fname){
            $this -> name = $name;
            $this -> f = fopen($fname,"a+");
            $this -> log("###__construct()called!");

        }

        //Granted call in the end
        public function __destruct(){
            $this->log("###__destruct()called!");
            fputs($this->f,join("",$this->lines));
            fclose($this->f);
        }

        public function log($str){
            $prefix = "[".date("Y-m-d_h:i:s ")."{$this->name}] ";
            $str = preg_replace("/^/m",$prefix,rtrim($str));
            $this->lines[] =$str."\n";

        }
    }


?>