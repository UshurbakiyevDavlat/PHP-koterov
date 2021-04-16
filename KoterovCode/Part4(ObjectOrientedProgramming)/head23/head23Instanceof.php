<?php
    require_once "head23staticPage.php";
    function echoPage($obj){
        $class = "Page";

        if(!($obj instanceof $class))
            die("Argument 1 should be instance of $class. <br/>\n");
        $obj -> render();
    }
    $page = new StaticPage(3);
    echoPage($page);

?>