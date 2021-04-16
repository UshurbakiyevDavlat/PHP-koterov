<?php

    class Page {
        protected $content;
        protected $title;

        public function __construct($title,$content){
            $this -> content = $content;
            $this -> title = $title;
        }

        public function title(){
            return $this -> title;
        }

        public function content(){
            return $this -> content;
        }

        public function render(){
            echo "<h1>".htmlspecialchars($this->title())."</h1>";
            echo "<p>".htmlspecialchars($this->content())."</p>";
        }
    }

?>