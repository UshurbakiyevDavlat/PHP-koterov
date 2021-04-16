<?php

     abstract class PageA {
        protected $title;
        protected $content;

        public function __construct($title = '', $content = ''){
            $this -> title = $title;
            $this -> content = $content;
        }

        public function title(){
            return $this -> title;
        }

        public function content(){
            return $this -> content;
        }
        public function render(){
            echo "<h1>".htmlspecialchars($this->title())."</h1>";
            echo "<p>". trim($this->content())."</p>";
        }
        
    }

?>