<?php
    //Function forming multi-array,
    //Calendar on defined month and year
    //fitted to the week.Each row - array of the 7 elements,which equals to numbers or empty if string is empty
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
</head>
<body>
    <?php
    date_default_timezone_set("Asia/Almaty"); // using local timezone

        function makeCal($year,$month){
            $wday = date('N');//day of the week for first number of the  month
            $n = -($wday-8); //day shift @it is very strange@ where @ - my thoughts
            $cal = []; 

            for ($y = 0;$y < 6;$y++){ // loop through the week
                $row = []; // week
                $notEmpty = false; // if date in month

                for ($x = 0; $x < 7; $x++,$n++){
                    if (checkdate($month,$n,$year)){ // if date is existing and correct
                       
                         $row[] = $n; //then day adding to the week
                        
                        $notEmpty = true; // boolean pointer that mean that week is not empty

                    } else {
                        $row[] = "";
                    }
                }
                if (!$notEmpty)break; // if it is empty then break, all dates are incorrect
                $cal[] = $row; // adding the week to the calendar
            }
            return $cal;
        }
        $now = getdate();
        foreach ($now as $key=>$value){
            echo $key."=>".$value."<br>";
        }
        $Mont = $now['mon'];
        $cal = makeCal($now['year'],$Mont);
        echo "<h1>".$now['month']." of ".$now['year']."</h1>";
    ?>

    <table border = '1'>
        <tr>
        <td>Monday</td>
        <td>Tuesday</td>
        <td>Wednesday</td>
        <td>Thursday</td>
        <td>Friday</td>
        <td>Saturday</td>
        <td style = "color:red">Sunday</td>
        </tr>

        <?php foreach ($cal as $row){?>
            <tr>
            <?php foreach ($row as $i => $v){?>
            <td style ="<?=$i == 6 ? 'color:red':'' ?>">
            <?= $v ? $v:"&nbsp;" ?>
            </td>
            <?php } ?>
            </tr>
        <?php } ?>
    </table>
</body>
</html>