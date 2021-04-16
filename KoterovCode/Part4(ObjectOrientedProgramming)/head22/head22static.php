<?php

    class Counter{
        private static $counter = 0;

        public function __construct(){
            self::$counter++;
        }
        public function __destruct(){
            self::$counter--;
        }
        public static function getCounter(){
            return self::$counter;
        }
    }



?>