<?php

        function inner($a){
                echo "<pre>"; print_r(debug_backtrace());echo "</pre>";
        }

        function outer($x){
            inner($x * $x);
        }

        outer(3);

?>