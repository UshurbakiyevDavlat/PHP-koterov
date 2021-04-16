<?php

        class user{
            public $name;
            public $password;
            public $referrer;
            public $time;

            public function __construct($name,$password){
                $this -> name = $name;
                $this -> password = $password;
                $this -> referrer = $_SERVER["PHP_SELF"];
                $this -> time =  time();
            }

            public function __sleep(){
                return ['name','referrer','time'];
            }

            public function __wakeup(){ // with __wakeup() method we can renew old data , for example time
                $this-> time = time();
            }
        }

        

?>