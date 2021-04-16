<?php
    require_once("head23cached.php");

    class StaticPage extends Cached{

        public function __construct($id){
            if ($this -> isCached($this -> id($id))){
                parent :: __construct($this -> title(), $this -> content());
            } else {
               // $query = "SELECT *FROM news WHERE id = :id LIMIT 1";
               // $sth =  $dbh -> prepare($query);
                //$sth = $dbh -> execute($query,[$id]);
                //$page = $sth -> fetch(PDO::FETCH_ASSOC);

                //parent :: __construct($page['title'],$page['content']);
            parent :: __construct("News","Inner data of the News");

            }
        }

        public function id($name){
            return "news_{$name}";
        }
    }


?>