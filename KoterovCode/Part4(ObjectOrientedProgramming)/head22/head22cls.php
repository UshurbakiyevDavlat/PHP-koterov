 <?php

    class cls{
        const NAME = "cls"; //for clean code should use HIGH register of the letters
        public function method(){
            echo self::NAME;
            echo "<br />";
            echo cls::NAME;
            echo "<br />";

        }
    }

    echo cls::NAME;


?>