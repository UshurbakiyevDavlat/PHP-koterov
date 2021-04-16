<?php
    //Handmade inheritance

        //firstly we need to create base class

        class FileLogger{
            public $f;
            public $name;
            public $lines = [];


            public function __construct($name,$f){
                $this->name = $name;
                $this->f = fopen($f,"a+");
            }

            public function __destruct(){
                fputs($this->f,join("",$this->lines));
                fclose($this->f);
            }

            public function log($str){
               $pref = "[".date("Y-d-m_h:i:s")." {$this->name}]";
                $str = preg_replace("/^/m",$pref,trim($str));
                $this->lines[] = $str."\n";
            }   
        }


        class FileLogger0{
            private $logger;

            public function __construct($name,$fname){
               $this->logger = new FileLogger($name,$fname);
            }
            public function debug($s,$level = 0){
                $stack = debug_backtrace();
                $file = basename($stack[$level]['file']);
                $line = $stack[$level]['line'];
                $this->logger->log("[at the file $file line $line] $s");
            }
            public function log($s){
                    return $this->logger->log($s);
            }
        }
            $logger = new FileLogger0("test","head23testlog.log");
            $logger-> log("Common message.");
            $logger->debug("Debug message");

            /*
                Well in this method we have a couple of disadvantages:
                    for each FileLogger methods we need create in FileLogger0 intermediary-method that is crossadressing 
                    query to the object $this->logger. So minus is that in the work we would need change derived class also.

                    And we will need special methods to inherit properties because of non-exist them in derived class.
                    Also we can not say that everywhere where requiered FileLogger we can put FileLogger0 object
                    
            */

?>

 