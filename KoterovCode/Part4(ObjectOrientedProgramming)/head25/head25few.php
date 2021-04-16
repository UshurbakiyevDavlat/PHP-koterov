<?php

    namespace PHP7\functions 
    {
        function debug($obj){
            echo "<pre>";
                print_r($obj);
            echo "</pre>";

        }
    }
    
    namespace PHP7\classes
    {
        class Page {
            protected $title;
            protected $content;

            public function __construct($title ='',$content = ''){
                $this -> title = $title;
                $this -> content = $content;
            }
        }
    }


?>