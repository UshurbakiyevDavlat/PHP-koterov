<?php

    class FileLogger0{
        public $f; //opened file
        public $name; // name of keylog list
        public $lines = []; // strings 

        //create new file or pop data to the existed.$name - logic name of the keylog.

        public function __construct($name,$fname){
            $this ->name = $name;
            $this ->f = fopen($fname,"a+");
        }

        // append into keylog one string ,but not immediately ,it stack in the buffer till the end (close()).

        public function log($str){
                //each string concate with date and prefix of the log
                $prefix = "[".date("Y-m-d_h:i:s ")."{$this->name}).]";
                $str = preg_replace('/^/m',$prefix,rtrim($str));
                $this->lines[] = $str."\n";
        }
        
        /// Need to CALL in REQUIRED WAY!
        public function close(){
            fputs($this->f,join("",$this->lines));
            fclose($this->f);
        }
    }
    

?>