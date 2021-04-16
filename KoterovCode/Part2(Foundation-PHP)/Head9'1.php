
<?php
/*
    $ctr=0;
    for($i=0,$j=0,$k ="Points";$i<100;$j++,$i+=$j){
        $k.=".";
        $ctr++;
    }
    echo $k;
    echo $ctr;
*/
/*

// for example nested loop in the array, and how to use break operation.

for($i=0; $i < count($matrix);$i++){
    for($j=0; $j < count($matrix[$i]); $j++){
        if($matrix[$i][$j] == 0) break(2);
    }
}
if($i == 10) echo "Found the zero element of array!";

?>
*/

/*
$files = array("files","exe","img");

for($i=0;$i<count($files);$i++){
if($files[$i] ==".")continue;
if($files[$i]=="..")continue;
if(is_dir($files[$i]))continue;
echo "Found a file:{$files[$i]}<br>";
}

*/


$wasEror = 0;

do{
    if(isset($_REQUEST['doGo'])){
        if($_REQUEST['age']<20) {
            $wasEror = 1;
            break;
        }
        elseif($_REQUEST['loader'] != "source") {
            $wasEror = 1;
            break;
        }
        echo "You are very GOOD!";
        exit();
        
    }
} while(0);
if($wasEror && isset($_REQUEST['doGo'])):
    echo "Try again,incorrect input!";
    endif

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>miniForm</title>
</head>
<body>
<form action=<?=$_SERVER['REQUEST_URI']?> method = "POST">
Answer few questions:  <br>
Where do you live? <br>
How old are you?  <br>
  <input type="text" name="age"><br>
How did you know about us?<br>
  <input type="text" name="loader"><br>
  <input type="submit" name="doGo" value = "Submit">
  </form>
    
</body>
</html>