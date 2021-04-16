<?php

    require_once "head25few.php";

    use PHP7\classes\Page as Page;
    use PHP7\functions as functions;

    $page = new Page('Contacts','Inner data of the page');
    functions\debug($page);
?>