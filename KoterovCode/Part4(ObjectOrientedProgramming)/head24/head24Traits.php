<?php

    trait Seo {
        private $keyword;
        private $description;
        private $ogs;

        public function keywords(){
            echo "Seo::keywords<br />\n";
        }
        public function description(){
            echo "Seo::descrtiption<br />\n";
        }
        public function ogs(){
            echo "Seo::ogs<br />\n";
        }

    }

    trait Tag{
        public function tags(){
            echo "Tag::tags<br />\n";
        }
    }

    class News{
        use Seo,Tag;
        private $id;
    }

    $news  = new News();
    $news -> keywords();
    $news -> tags();

?>