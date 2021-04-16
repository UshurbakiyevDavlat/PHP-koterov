<?php
    require_once ("head23page.php");
    
    class Cached extends Page{
            protected $expires; // time of cache acting
            protected $store; // storing place

            public function __construct($title, $content, $expires = 0){ 
                parent::__construct($title,$content);

                $this -> expires = $expires; //setting time of cache acting
               // $this -> store = new Memcached(); //preparing cache 
               // $this -> store = addServer('localhost',11211); 

                // storing data in a store
                $this -> set($this->id('title'),$title); 
                $this -> set($this->id('content'),$content);
            }
                // checking if $key position in cache?
                protected function isCached($key){
                   // return (bool) $this -> store -> get($key);
                }

                //setting data $value on $key position
                    //in case if $key exist:
                        //if $force === false nothing to do
                        //rewrite if $force getting true value

                protected function set ($key, $value, $force = False){
                       // if ($force){
                       //     $this -> store -> set($key,$value, $this->expires);
                       // }
                       // else {
                        //    if($this-> isCached($key)){
                         //       $this -> store -> set($key, $value , $this -> expires);
                          //  }
                        //}
                }

                //getting $key position value from storage
                protected function get ($key){
                    //return $this -> store -> get($key);
                }

                //Forming unique value of storage
                public function id($name){
                    die("What is going on?");
                }

                //getting title of the page
                //public function title(){
                   // if($this -> isCached($this->id('title'))){
                    //    return $this->get($this->id('title'));
                   // } else {
                    //    return parent::title();
                    //}
               // }

                //getting content of the page
                //public function content(){
                 //   if ($this->isCached($this->id('content'))){
                   //     return $this->get($this->id('content'));
                    //} else {
                     //   return parent::content();
                    //}
                //}
            }
    
?>