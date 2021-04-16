<?php

    class Container{
        private $title = "ClassContainer";
        protected $id = 1;

        public function anonym(){
            return new class($this->title) extends Container{
                    private $name;

                    public function __construct($title){
                        $this->name = $title; 
                    }

                    public function print(){
                        echo "{$this->name} ( id->{$this->id})";
                    }
            }; 
        }
    }

    (new Container) -> anonym()->print();

?>