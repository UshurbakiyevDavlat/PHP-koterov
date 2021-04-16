<?php
        function print_age($age){
            $age = intval($age);
            if ($age < 0) {
                trigger_error("Function print_age:".
                                "age can not be ". 
                                "negative",E_USER_ERROR);
            }
            echo "Age is :".$age;
        }

        print_age(-10);

?>