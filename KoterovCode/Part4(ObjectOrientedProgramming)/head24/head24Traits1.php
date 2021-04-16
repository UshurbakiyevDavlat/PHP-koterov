<?php
    //Trait Methods overloading methods of base class , and methods of current class oveloading trait methods
    
    class Page{
        public function tags(){
            echo "Page::tags<br/>\n";
        }
        public function authors(){
            echo "Page::authors<br />\n";
        }
    }

    trait Author{
        public function tags(){
            echo "Author::tags<br />\n";
        }
        public function authors(){
            echo "Author::authors<br />\n";
        }
    }

    class News extends Page{
        use Author;
        public function authors(){
            echo "News::authors <br/>\n";
        }
    }

    $news = new News();
    $news -> authors(); //News 
    $news -> tags(); // Author

?>