<?php
    function A($i){echo "called A($i)\n";}

    $F = "A";
    $F(303);

    function fOmp($a,$b){
        return strcmp(strtolower($a),strtolower($b));
    }

    $riddle = ["g"=>"Not","o"=>"yes","z"=>"duno"];
     uasort($riddle,"fOmp");
    var_dump($riddle);


?>

<?php
    function b($u){echo "called function b($u)";}
    $f = "b";
    call_user_func($f,1010);


?>

<?php
    function myecho(...$str){ // function that put our strings beneath each other
        foreach($str as $v){
            echo "$v<br> \n";
        }
    }
    function tabber($spaces,...$planets){ // function that put the tab marks from the right corner 
        $new = [];
        foreach($planets as $planet){ 
            $new[] = str_repeat("&nbsp",$spaces).$planet;
        }
        call_user_func_array("myecho",$new); // putting the new array to other function.

    }
    tabber(10,"Mercury","Venus","Earth","Mars","Jupyter","Saturn"); // calling the function .

?>

<?php
    $myecho  = function(...$str){ //Anonim function easy example
        foreach($str as $v){
            echo "$v <br>\n";
        }
    };
    $myecho("Mercury","Venus","Earth","Mars");
?>

<?php
    function tabb($spaces,$echo,...$planets){
            $new = [];
            foreach($planets as $planet){
                $new[] = str_repeat("&nbsp;",$spaces).$planet;
            }
            $echo(...$new);
    }
    $planets = ["Mercury","Venus","Earth","Mars"];
    tabb(10,function(...$str){
        foreach($str as $v){
            echo "$v<br>\n";
        }
    }, ...$planets);


?>

<?php
$message = "Work can not be continued because of errors:<br>"; //message that used as banner to find the problem.
$check  = function(array $errors) use ($message){ // variable that used as anonim function container 
    if(isset($errors) && count($errors)>0){  //if errors  exists show message and then show the error; 
        echo $message;
        foreach($errors as $error){
            echo "$error<br>";
        }
    }
};
$check([]);
$errors[]="Enter the name of user"; //
$check($errors); // put the errors array to the anonim function as a parameter and calling it at the same time

$message =  "List of additional requirements"; // So because it is a locking so it is not able to change the message variable.
$errors = ["PHP","MYSQL","Cache"];
$check($errors);


?>


<?php
    function takeVal($a){ $x = $a[1234];}
    function takeRef(&$a){ $x = $a[1234];}
    function takeValAndMod($a){ $a[1234]++;}
    function takeRefAndMod(&$a){ $a[1234]++;}

    test("takeVal");
    test("takeRef");
    test("takeValAndMod");
    test("takeRefAndMod");

    function test($func){
        $a = [];
        for($i = 1; $i<= 100000;$i++){
            $a[$i]=$i;
        }
        for($t = time();$t === time(););
        for($N=0,$t = time();time() == $t ; $N++)$func($a);
        printf("<tt>$func</tt> took %d itr/sec <br>" , $N); 
    }

?>