<?php

    class FileLogger3{
        static public $loggers = [];
        private $time;

        private function __construct($fname){
            $this -> time = microtime(true);
        }
        
        public static function create($fname){
            if (isset(self::$loggers[$fname]))
                return self::$loggers[$fname];

            return self::$loggers[$fname] = new self($fname);

        }

        public function getTime(){
            return $this->time;
        }
        
    }

?>