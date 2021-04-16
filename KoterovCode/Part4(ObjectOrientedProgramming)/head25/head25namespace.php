<?php
    namespace PHP7;

    function debug($obj){
        echo "<pre>";
            print_r($obj);
        echo "</pre>";
    }

    class Page{
        protected $title;
        protected $content;

        public function __construct($title = '',$content = '')
        {
            $this -> title = $title;
            $this -> content = $content;
        }
        /**
         In the namespace can be any PHP code, 
         but it fluent only on:
            classes(including abstact and traits),
            interfaces, 
            functions, 
            consts.
                 Namespace operator should be first in the file
         */
    }

?>