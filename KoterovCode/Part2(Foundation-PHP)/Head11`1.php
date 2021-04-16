<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Defining function for the first time</title>
</head>
<body>
    <?php

        function selectItems($items,$selected = 0){
                $text = "";
                foreach($items as $k => $v){
                    if($k === $selected){
                        $ch = " selected";
                    } else  {
                        $ch = "";
                    }
                    $text .= "<option$ch value = '$k'> $v </option>\n";
                    
                } 
                return $text;

        }
        $names = [
            "Weaving" => "Hugo",
            "Goddard" => "Paul",
            "Taylor" => "Robert",

        ];

        if(isset($_REQUEST['surname'])){
            $name = $names[$_REQUEST['surname']];
            echo "You choosed: {$_REQUEST['surname']} {$name} ";
        }

?>

    <form action="<?= $_SERVER['SCRIPT_NAME']?>" method = "POST">
            Choose the name:
            <select name="surname">
                <?=selectItems($names,$_REQUEST['surname'])?>
            </select><br>
            <input type="submit" name="" id="" value = "Know the name!">
    </form>

</body>
</html>