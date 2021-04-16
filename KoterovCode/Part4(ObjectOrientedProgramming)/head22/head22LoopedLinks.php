<?php
    class Father{
        public $children = [];

        function __destruct(){
            echo "Father died<br />\n";
        }
    }

        class Child {
            public $father;
            function __construct(Father $father){
                $this -> father = $father;
            }
            function __destruct(){
                echo "Child died<br />\n";
            }
        }
    

?>