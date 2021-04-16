<?php
    require_once "PHP/Exceptionizer.php";

    suffer();

    //see that catch turned-off 
    echo "<b>Next should be common message from PHP.<br />";
    fopen("fork","r");

    function suffer(){
        //create new object transformator. From this moment
        //and till  destroying $w2e variable
        //all catched mistakes became exceptions
        
        $w2e = new PHP_Exceptionizer(E_ALL);
        
        try{
            fopen("spoon","r");
        }catch(E_WARNING $e){
            echo "<pre><b>Catched an error!</b>\n",$e,"</pre>";
        }
    }

?>