<?php
//Array functions

//three types of sorting of elements
    //SORT_REGULAR - automaticly choosing 
    //SORT_NUMERIC - sorting by numbers
    //SORT_STRING - sorting by strings

//Sorting arrays
    //Sorting by values 
        //asort(); if values are string so in alphabetical order if numbers so by ascending order save order of key=>value
        //arsort() do the same just do it not in ascending order but by descending
    $A = [
        "a"=>"Zero",
        "b"=>"Weapon",
        "c"=>"Alpha",
        "d"=>"Processor"
    ];
    asort($A);
    print_r($A);
        echo "<br>";

    //Sorting by keys
        //ksort(); do sorting by keys in ascending order if nums or alphabetical order if strings
        //krsort; do the same but in descending order
        ksort($A);
        print_r($A);
        echo "<br>";


    //Sorting by anonim function argument
        $d = opendir("."); //put the catalog data to d
        while(false !== ($e = readdir($d))){ // check if it is not empty  readdir and puting data to $e
            if(is_dir($e))$files[$e] = 0; //check if it is dir and if it is put data of current catalog to key and size to values
            else $files[$e] = filesize($e);//
        }
        uksort($files,function($f1,$f2){

            //f1 and f2 it is names of catalogs or files

            //-1 if $f1 < f2
            //0 if $f1 == $f2
            //1 if $f1>$f2

            if(is_dir($f1) && !is_dir($f2))return -1;

            if(!is_dir($f1) && is_dir($f2))return 1;

            return $f1 <=> $f2;
        });

        print_r($files);

        //Also we can use uasort() with one difference that here we use values in function comparing to keys
        echo "<br>";

        uasort($files,function($f1,$f2){
            if(is_dir($f1) && !is_dir($f2))return -1;
            if(!is_dir($f1) && is_dir($f2))return 1;
            return $f1 <=>$f2;
        });
        print_r($files);
        echo "<br>";

    //Reversing array

        asort($A);
        $A = array_reverse($A); // we can sort it directly and just reverse if in 2 argument we put true it means that keys will stand as it is without sort
        //this pare asort() with array_reverse works slower than arsort()
        print_r($A);


    //Natural sorting
        //also we can use natcasesort() it works same as natsort but it do not consider register of symbols.
        $files = [
            "img10.gif",
            "img1.gif",
            "img2.gif",
            "img20.gif",
        ];
        natsort($files);
        echo "<pre>"; print_r($files); echo "</pre>";
    
    //Sorting of lists 
        //sort() ascending order 
        //rsort() descending order
        //Of course sorting goes by values
        $A = ["One","Two","Three","Four"];
        sort($A);
        print_r($A);
        echo "<br>";

        //associative arrays case
            $A = [
                "a" => "Zero",
                "b" => "Weapon",
                "c" => "Alpha",
                "d" => "Processor"
            ];
            sort($A);
            print_r($A);
            echo "<br>";
    
        //Sorting lists by anonim function
        $tools = ["One","Two","Three","Four"];
        usort($tools,function($a,$b){
            return strcmp($a,$b); //equals $a<=>$b;
        });
        print_r($tools);
        echo "<br>";

    //Sorting of multi-arrays
        //array_multisort()
        $arr1 = [3,4,2,3,6,1];
        $arr2 = ["world","hello","same","name","dav","Lat"];
        array_multisort($arr1,$arr2); //sorts only first array second make order as it in the first
        print_r($arr1);
        echo "<br>";
        print_r($arr2);
        echo "<br>";
        //also in argument this function can get constants
        /* 
            SORT_ASC : ascending order
            SORT_DESC : descending order
            SORT_REGULAR : compare by automatic way
            SORT_NUMERIC : compare like numbers
            SORT_STRING : compare like string
        */

        $arr1 = [3,4,2,7,1,5];
        $arr2 = ["world","hello","yes","no","apple","wet"];
        array_multisort($arr1,SORT_DESC,SORT_NUMERIC,$arr2);
        echo "<pre>";print_r($arr1);
        echo "<br>";
        print_r($arr2); echo "</pre>";
    //Shuffle lists
        $concept = ["Banana","Coffee","Ice-Cream","Throat"];
        shuffle($concept);
        print_r($concept);
        echo "<br>";
    //Keys and Values
        $names = [
            "Joel" => "Silver",
            "Grant" => "Hill",
            "Andrew" => "Mason",
        ];
        $names = array_flip($names); // swap the keys with values
        print_r($names);
        echo "<br>";

        $keysOfSmth = array_keys($names);//,"Andrew"); // return keys of some array also has second argument where you can put concrete search value

        print_r($keysOfSmth);
        echo "<br>";

        natsort($files);
        $files = array_values($files); // if we want to make natsort() ignore keys and only sort by values 
        //though we changing it to simple list
        print_r($files);
        echo "<br>";

        $list = [1,"Hi","Hi",1,1,1,"Bye"];
        $ctr = array_count_values($list);// Allow us to track how offten we can see our value in the list
        print_r($ctr);
        echo "<br>";

    //Merge of Arrays
        //array_merge()
        $l1 = [10,20,130];
        $l2 = [222,345,231];
        $L = array_merge($l1,$l2);
        print_r($L);
        echo "<br>";
        echo "<br>";

    //Work with slicing
        $input = [1,2,3,4,5,6,7,8,9,0];
        $output = array_slice($input,2);
            print_r($output);
            echo "<br>";
        $output = array_slice($input,-1,1);
            print_r($output);
            echo "<br>";
        $output = array_slice($input,2,-1);
            print_r($output);   
            echo "<br>";
        $output = array_slice($input,0,3);
            print_r($output);     
            echo "<br>";   
            echo "<br>";
            $colors = ["red","green","blue","yellow"];
            /*array_splice($colors,2);
            print_r($colors);     
            echo "<br>"; 
                red green
            */

            /*array_splice($colors,1,-1);
            print_r($colors);     
            echo "<br>"; 
                red yellow
            */
           /* array_splice($colors,-1,1,["black","maroon"]);
            print_r($colors);     
            echo "<br>"; 
            Array ( [0] => red [1] => green [2] => blue [3] => black [4] => maroon
            */

            array_splice($colors,1,count($colors),"orange");
            print_r($colors);     
            echo "<br>"; //red orange
?>

<?php
    //work with stack and queue
        //we can work with array as it would be a stack with array_pop(),array_push(),array_unshift(),array_shift()
            //array_push() adding element to the end of an array like in stack :
            $array = [];
            array_push($array,1,2,3,4);
            echo "<pre>";print_r($array);echo "</pre>";

            //array_pop() get element in the end of an array return it and then delete it from array
                echo array_pop($array);
                echo "<pre>";print_r($array);echo "</pre>";

            //array_unshift() do the same as array_push() but to the beggining of an array
                array_unshift($array,1234);
                echo "<pre>";print_r($array);echo "</pre>";
            
            //array_shift() do the same as array_pop() just from the beggining of an array
               echo array_shift($array);
               echo "<pre>";print_r($array);echo "</pre>";
?>

<?php
        //Work with variables and arrays
            //compact();
            $a = "Some string";
            $b = "Some text";
            $A = compact("a","b"); 
            // so as you see compact() compacting the pares key=>value where key it is arguments
            // and values  it is  values of an variables or list which searched by name of arguments;
            echo "<pre>";print_r($A);echo "<pre>";

            $d = "DDD";
            $c = "CCC";
            $list = ["b",["c","d"]];
            $A = compact('a',$list);
            echo "<pre>";print_r($A);echo "<pre>";

            //extract()
            //Do vice versa to compact() so consts for type if the same variable exitsts :
                /*
                EXTR_OVERWRITE-overwriting exist variable
                EXTR_SKIP -  not overwrite and just skip
                EXTR_PREFIX_SAME - if same variable exists , just adding prefix to its name (useless)
                EXTR_PREFIX_ALL -  all the time put the prefix befor name of variable
                */

                 extract($_SERVER);
                    echo $COMSPEC;        
?>

      <!--
      <table width ="100%">
      
                <?php /*
                //Work with it in patterns:
                    foreach($book as $entry) {extract($entry,EXTR_OVERWRITE);
                ?>
        <tr>
            <td>Name:<?=$name?></td>          
            <td>Addres:<?=$url?></td>
        </tr>

        <tr>
            <td colspan = "3"><?=$text?></td>
        </tr>

        <tr>
            <td colspan = "3"><hr></td>
        </tr>
                <? } ?>
      </table>
      
      */
      ?>
      -->

        <?php
    //Change register in array keys
        //array_change_key_case()
        //CASE_UPPER && CASE_LOWER
        $arr = [
            "davlat"=> 1,
            "raf" => 2,
            "ulan" => 3,
        ];
       $arr = array_change_key_case($arr,CASE_UPPER);
        echo "<pre>";print_r($arr);echo "</pre>";
      ?>

     
<!--
            //Creating numbers range
                //list range() -->
<?php
    foreach(range(1,100)as $is){
        echo $is;
    }

    //Work with variety
        //Intersecting 
        $nativeColors = ["green","red","blue"];
        $colors = ["red","yellow","green","cyan","black"];
        $inter = array_intersect($colors,$nativeColors);
        print_r($inter);

        //Substracting
        $subs = array_diff($colors,$nativeColors);
        print_r($subs);

        //Union
        $union = array_unique(array_merge($colors,$nativeColors));
        print_r($union);

?>


<?php

    $arr = [
        
            "employee"=>"Davlat Ushurbakiyev",
            "phones"=>[
                "269-68-64",
                "8-747-778-28-77"
            ]
            ];
            echo json_encode($arr);
                /*Consts
                
                JSON_HEX_TAG  - < > SYMBOLS codding to UTF-8
                JSON_HEX_AMP  -  SYMBOL OF & codding to UTF-8
                JSON_HEX_APOS -  ' codding to UTF-8
                JSON_HEX_QUOT - " codding to UTF-8
                JSON_FORCE_OBJECT - When use list array instead give object for example when list is empty or waited side wait object
                JSON_NUMERIC_CHECK - if string include numbers codding them as numbers.
                JSON_BIGINT_AS_STRING - codding big integers as strings
                JSON_PRETTY_PRINT - using whitespaces in return data for foramating them
                JSON_UNESCAPED_SLASHES - / symbol not screening
                JSON_UNESCAPED_UNICODE  - many byte symbols outputing as they are.

                
                */

                echo json_encode($arr,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
                $json = json_encode($arr);
                echo "<pre>"; echo $json; echo "</pre>";

                // to decode it back use json_decode();
                $arrack = json_decode($json,true);
                echo "<pre>"; print_r($arrack);  echo "</pre>";


?>


