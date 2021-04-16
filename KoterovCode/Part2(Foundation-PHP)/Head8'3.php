<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processing the lists</title>
</head>

<body> 
    <!--
        <select name="Sel[]" multiple>
            <option name = "first">First</option>
            <option name = "second">Second</option>
            <option name = "third">Third</option>
        </select>
-->
<!--
        <input type="checkbox" name="Arr[]" value="ch1" id="">
        <input type="checkbox" name="Arr[]"  value ="ch2" id="">
        <input type="checkbox" name="Arr[]" value = "Some string" id="">
        <textarea name="Arr[]" id="" cols="30" rows="10">Some textarea</textarea>
-->
<!--
    <input type="text" name="Data['name']"><br>
    <input type="text" name="Data['address']"><br>
    City: <br>
    <input type="radio" name="Data['city']" value="Moscow">
    <input type="radio" name="Data['city']" value="Peter">
    <input type="radio" name="Data['city']" value="Kiev">
    <input type="submit" name="" id="" value="sub">
-->

<form action="<?= $_SERVER['SCRIPT_NAME']?>"method ="POST" >

    Which Programmind languages do you now? <br>
    <input type="hidden" name="known[PHP]" value ="0">
    <input type="checkbox" name="known[PHP]" value="1">PHP <br>

    <input type="hidden" name="known[JAVA]"value = "0">
    <input type="checkbox" name="known[JAVA]" id="1"> JAVA<br>

    <input type="submit" name="doGO" value = "sub">

</form>
</body>

</html>

<?php   
        ////No data at all , where the data????
        //echo $_REQUEST['Sel'][0];
      //  $A[] = 10;
        //$A[] = 20;
        //$A[] = 30;

       // echo $A[0];
       // echo $_POST['Arr'];

      // echo $_REQUEST['Data']['name'];

      //print_r($GLOBALS);
    if(isset($_REQUEST['doGO'])){
        foreach($_REQUEST['known'] as $k =>$v){
            if($v) echo "You know language $k <br>";
            else echo "You do not know $k <br>";
        }
    }


?> 

