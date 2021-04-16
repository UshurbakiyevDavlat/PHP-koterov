<?php
    //Testing virtual methods

        require_once("head23staticPage.php");

        $id = 3;
        $page = new StaticPage($id);
        $page -> render();
        echo $page -> id($id);
        

?>