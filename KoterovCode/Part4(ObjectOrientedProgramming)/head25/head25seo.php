<?php

    namespace PHP7;

    trait Seo{
        private $keyword;
        private $description;
        private $ogs;

        public function keywords(){
            echo "Seo::keywords<br />\n";
        }

        public function description(){
            echo "Seo::description<br />\n";
        }

        public function ogs(){
            echo "Seo::ogs<br />\n";
        }
        
    }

?>