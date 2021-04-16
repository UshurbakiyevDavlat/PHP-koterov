<?php
    require_once("head23staticPage.php");

         function echoPage(Page $obj){ //we can use also use every type that requires Page methods,every derived class type.
            $obj -> render();
        }

?>