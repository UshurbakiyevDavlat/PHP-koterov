<?php

    //Access to  the global namespace 

        namespace PHP7;

        function strlen($str){
            return count(str_split($str));
        }

        //Or 
        /*
            function strlen($str){
                return \strlen($str);
            }

            
        */

        //This is PHP7 strlen()
            echo strlen("HelloWorld!")."<br/>\n";

        //This is standard function strlen()
            echo \strlen("HelloWorld!")."<br/>\n";

            //In file where we need to put PHP7 we can just put namespace
            echo \strlen("HELLO WORLD")."<br/>";
            echo namespace\strlen("HELLO WORLD")."<br/>";


?>