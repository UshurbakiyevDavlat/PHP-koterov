<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Head8-Using data from forms</title>
</head>
<body>
    
</body>
</html>

<?php if(!isset($_REQUEST['doGO'])){?>
    <form action="<?=$_SERVER['SCRIPT_NAME']?>">
    Login: <input type="text" name="login" value=""><br/>
    Password: <input type="text" name="password" value=""><br/>
    <input type="submit" name="doGO" value="Press the button!">
</form>


<?php } else { 
if($_REQUEST['login']=="root" && $_REQUEST['password']=='dada2000'){
    echo "Has an access to user {$_REQUEST['login']}";
   // system("rundll32.exe user32.dll,LockWorkStation"); // отправит вас прямо в начальный загрузочный экран ОС
} else {
    echo "Does not have an access.";
}
}
?>



