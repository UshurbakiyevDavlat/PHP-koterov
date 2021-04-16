
<?php
    function toomanyargs($fst,$nd,$rd,$th){
        echo "First parameter $fst <br>";
        echo "Second parameter $nd <br>";
        echo "Third parameter $rd  <br>";
        echo "Fourth parameter $th <br>";
    }
    $planets = ["Mercury","Venus","Earth","Mars"];
    toomanyargs(...$planets);
?>

<?php //strict typization
    //declare(strict_types = 1); Type error fix it later with try/catch
    function sum(int $fst,int $snd):int{
        return $fst + $snd;
    }

    echo sum(4,78);

    ?>

    <?php
    $monthes = [
        1=>"January",
        2=>"February",
        3=>"March",
        4=>"April",
        5=>"May",
        6=>"June",
        7=>"July",
        8=>"August",
        9=>"September",
        10=>"October",
        11=>"November",
        12=>"December"
    ];

    function dateMont($n){
        global $monthes;
        return $monthes[$n];
    }

    echo dateMont(3);

    ?>
<!--
    <?php

    function deleter(){unset($GLOBALS['a']);}

         $a = 10;

        deleter();

        echo $a;
    ?>
    Delete element from the GLOBALS array
    -->

    <?php

        function selfCount(){
            static $ctr = 0; // static make compilator know that it is not allowed to defining again i.e more than 1 time.
            $ctr++;
            echo $ctr;
        }
            for($i = 0 ;$i < 5; $i++){
                selfCount();
            }
    ?>

    <?php
        //factorial in recursion, p.s it is not the best idea, for faster solution you need find other variants

            function recurs($n){
                    if($n <= 1) return 1;
                    return $n * recurs($n-1);
             }

             echo recurs(6);
    ?>


    <?php
        require_once "dumper.php";
        dumper($GLOBALS);

    ?>

    <?php
        if(!function_exists("virtual")){ // Emulation virtual() in CGI-version PHP
            echo "virtual";
            function virtual ($uri){
                $url = "http://".$_SERVER["HTTP_HOST"].$uri;
                echo file_get_contents($url);
            }
        }
        virtual("/");

    ?>
