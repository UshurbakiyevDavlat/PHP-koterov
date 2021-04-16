<?php
    namespace PHP7;

    class Page{
        protected $title;
        protected $content;

        function __construct($title = '',$content = ''){
            $this->title = $title;
            $this->content = $content;

        }

        function tags(){
            echo "<pre>";
                echo "{$this->title}","\n{$this->content}";
            echo "</pre>";
        }
    }

?>