<?php
    //Преобразуем джейсон файлы в массив
    $arr = json_decode($_POST['json'],true);

    //Объединяем содержимое в строку
    $name  = trim(implode(" ", $arr));

    $result = "Hello";
    if(!empty($name)){
        $result .= " , $name";
    }
    $result .= "!";
    
    //Отдаем результат
    echo htmlspecialchars($result);

?>