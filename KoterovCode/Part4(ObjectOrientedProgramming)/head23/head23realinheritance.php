<?php

    class FileLogger{
        public $name;
        public $f;
        public $lines = [];

        public function __construct($name,$fname){
                $this->name = $name;
                $this->f = fopen($fname,"a+");
        }

        public function __destruct(){
            fputs($this->f,join("",$this->lines));
            fclose($this->f);
        }

        public function log($str){
            $pref = "[".date("Y-d-m_h:i:s")."{$this->name}]";
            $str = preg_replace("/^/m",$pref,trim($str));
            $this->lines[] = $str."\n";
        }
    }

    class FileLoggerDebug extends FileLogger{
         public function __construct($fname){
             parent::__construct(basename($fname),$fname);
         }
         public function debug($s,$level = 0){
                $stack = debug_backtrace();
                $file = basename($stack[$level]['file']);
                $line = $stack[$level]['line'];
                $this->log("[at the $file line $line] $s");
         }
    }

    $logger = new FileLoggerDebug("head23testlog2.log");
    $logger->log("Common message");
    $logger->debug("Debug message");


?>