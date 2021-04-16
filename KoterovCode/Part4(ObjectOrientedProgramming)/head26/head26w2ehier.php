<?php
require_once "PHP/Exceptionizer.php";

suffer();

function suffer(){
    $w2e = new PHP_Exceptionizer(E_ALL);
    try{
        trigger_error("Damn it",E_USER_ERROR);
    }catch(AboveE_USER_WARNING $e){
        echo "<pre><b>Catched error!</b>\n",$e,"</pre>";
    }
}

?>