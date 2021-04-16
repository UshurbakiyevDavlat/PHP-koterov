<?php

    interface Seo{
        public function keywords();
        public function description();
        public function age();
    }

    interface Tag{
        public function tags();
    }

    interface Author extends Tag{
        public function info($id);
    }

    class News implements Seo,Author{
        private $id;

        public function keywords(){
        
            $query  = "SELECT keywords FROM seo WHERE id = :id LIMIT 1";

        }

        public function description(){
            $query = "SELECT description FROM seo WHERE id = :id LIMIT 1";
        }

        public function ogs(){
            $query = "SELECT ogs FROM seo WHERE id = :id LIMIT 1";
        }

        public function tags(){
            $query = "SELECT * FROM authors WHERE id = :id LIMIT 1";
        }

        public function info($id){
            $query = "SELECT *FROM authors WHERE id = :id";
        }

        //also need define constructor,destructor and other methods

        //also if you will try implement Tag in News instead of Author it caused an error

        
    }

?>