<?php
    trait Tag{
        public function tags(){
            echo "Tag::tags<br />\n";
        }

        public function authors(){
            echo "Tag::authors<br />\n";
        }
    }

    trait Author {
        public function tags(){
            echo "Author::tags<br />\n";
        }
        public function authors(){
            echo "Author::authors<br />\n";
        }
    }

    class News {
        use Author ,Tag {
            Tag::tags insteadOf Author;
            Author::authors insteadOf Tag;
            Author::tags as list;
        }
    }

    $news = new News();
    $news -> authors(); // Author::authors
    $news -> tags(); //Tag::tags
    $news ->list(); //Author::tags

?>