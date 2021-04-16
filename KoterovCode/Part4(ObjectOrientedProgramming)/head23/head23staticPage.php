<?php
    require_once("head23cached.php");
class StaticPage extends Cached{ 
    public function __construct($id){
        if($this->isCached($this->id($id))){
            parent::__construct($this->title(),$this->content());
        }
        else {
            //if data is not cache know 
            //get data from data base 
         //   $query = "SELECT * FROM static_pages WHERE id = :id LIMIT 1";
          //  $sth = $dbh -> prepare($query);
          //  $sth = $dbh -> execute($query,[$id]);
           // $page = $sth -> fetch(PDO::FETCH_ASSOC);

            //parent::__construct($page['title'],$page['content']);
        parent::__construct("Contacts","Contacts inner data");

        }
    }
    //Unique key for cache
    public function id ($name) {
        return "static_page_($name)";
    }

}


?>