<?php
//String functions:

// ASCII encoding and decoding
/* Also reverse it ord
for($code =32;$code<128;$code++){
    echo "code in ASCII table: ($code) = ". chr($code). "<br>";
}
*/

?>

<?php //look for substring in a  string ;

$str = "php<    \t\n323";

/*
if(strpos($str,"<")!==false){
    echo "PHP string!";
}*/

// delete whitespace simbols
echo trim($str);

for($i = 0 ;$i<strlen($str);$i++){
    echo " ".$str[$i]." ";
}

?>

<br>
<?php

    $str1 = "php<    \t\n33";

    echo  " ".strcmp($str,$str1)."<br>";
    //- 1 if $str>$str1 lexicgraphical way ,0 equals, 1 if $str<$str1 lexicgraphical way
    // also strcmp function consider also High register symbols differently and you can replace it with <=> operator!

    //for example:
    echo " ".$str <=> $str1;


    //but strcasecmp do not consider any register as different symbols!
    $str = "PHP<    \t\n33"; //so now $str equals $str1 for strcasecmp
        echo "<br>".strcasecmp($str,$str1)."<br>";


   echo substr($str,3)."<br>"; // start index is 3 so it is index in $str where we start from
   echo substr($str,3,7)."<br>"; // length is 7 so it will show symbol from index 3 till index 7
   


    //additional
            function drawSquare($size){
                $n = $size;
                while($n>0){
                    if($n == $size || $n == 1){ 
                    for($i = 0; $i<$size;$i++){
                        echo "*";
                    }
    
                }
                else{ 
                    for($i=0;$i<$size;$i++){
                        if($i == $size-1 || $i==0)echo "*";
                        else echo ' ';
                    }
                }
                echo PHP_EOL;
                echo "<br>";
                    $n--;
                }
            }

        drawSquare(4);
    //end additional
?>

<br>

<?php

//Replace
$col = 3;
$str3 = str_replace ("\n","<br>",$str1,$col); //from,to,text , not required count.
$str3 = str_ireplace("\n","<BR>",$str1,$col); // the same as replace but do not consider register of elements
$sub = substr_replace($str,"11",$col); //from,to , start

echo $sub;


?>
<br>
<?php
    //multi replacing 

    $from  = ["{TITLE}","{BODY}"];
    $to = [
        "Philisophy",
        "Shows logical ,that doubt make us see the ontological mean of life.Relation to modern world is amazing."
    ];
    $template = 
    <<<MARKER
    <!DOCTYPE html>
    <html lange ='en'>
    <head>
        <title>{TITLE}</title>
        <meta charset = 'utf-8'>
    </head>
    <body>{BODY}</body>
    </html>
    MARKER;
        echo str_replace($from,$to,$template);

        //note, you can use str_replace like translater for example to translit something.
?>

<br>

<?php

        // for form right refrence
        //echo "<a href = '/script.php?param = ".urlencode($userData)."'>refrence</a>";
        // also we can use urldecode but PHP already can do it by itself.

//also we can use alternative rawurlencode and rawulendecode that work the same way as urlencode and ulrdecode but they do not consider + as whitespace!

    $example = 
    <<<EXAMPLE
    <?php
    echo "HELLO WORLD!";
    ?>

    EXAMPLE;
    echo $example;
    //so afer this it shows nothing lets improve the situation!

    $example = 
    <<<EXAMPLE
    <?php
    echo "Hello,world!";
    ?>
    EXAMPLE;

        echo htmlspecialchars($example); //need to garanty that in the string no segment will be considered as a tag!
    //you can easily refuse the effect of htmlspecialchars by doing next :
    $trans = array_flip(get_html_translation_table());
    $s = strtr($example,$trans);
    //now in s you have original chars.

    //You can add slashes before chars ',"\.
    $str1 = "\dasds";
    echo "<br>".addslashes($str1);
    
    //And vice versa strip slashes
    echo "<br>".stripslashes($str1);

    //change the register of symbols

    echo "<br>".strtolower($str3);
    echo "<br>".strtoupper($str3);
    echo "<br>".ucfirst($str3);

?>

<?php
    //Set local setup 
    //LC_TYPE - activate register local
    //LC_NUMERIC - activate local for functions formating irrational numbers
    //LC_TIME - activate local that output date and time by standart
    //LC_ALL - activate all of the locals above.
    setlocale(LC_ALL,'');
?>


<?php
// format changing
/*
% Inputer [-] Size .accuracy Type
b - argument from list outputting as binary number
c - symbol with pointed in argument code
d - integer number
f - float number
o -  octary number
s - strings
x - hexadecimal number with small chars a-f
X - hexadecimal number with large CHARS A-F
*/
    $a = 28.78;
    $b = 31.75;
    $mon = $a + $b;
    echo $mon." ";
    echo sprintf("%01.3f<br>",$mon)."<br>";

$year = 2021;
$month = 2;
$day = 22;
$isodate = sprintf("%04d - %02d - %02d",$year,$month,$day);
echo $isodate." ";

// if you want ouput straightforwardly so there is printf() function
printf("%04d - %02d - %02d",$year,$month,$day)."<br>";

echo "<br>".number_format($year,0,".",""); // number , decimal number amount , dividing point of decimal, triad point

?>


<?php
    // n12br($str); //return result that change all symbols \n on <br />\n or if 2 argument  will be false on <br>

    function cite($ourText,$maxlen = 60, $prefix = "> "){
        $st = wordwrap($ourText,$maxlen - strlen($prefix),"\n"); // text, length, break;
        $st = $prefix.str_replace("\n","\n$prefix",$st); 
        return $st;
    }
    echo "<pre>";
        echo cite("The first Matrix I designed was quite naturally
        perfect, it was a work of art - flawless, sublime. A triurrph
        equalled only by its monumental failure. The inevitability
        of its doom is apparent to me now as a consequence of the
        imperfection inherent in every human being. Thus, I
        redesigned it based on your history to more accurately reflect
        the varying grotesqueries of your nature. However, I was again
        frustrated by failure.",20);
    echo "</pre>";
    

    //Removing all the tags:
    $txt = 
    <<<HTML
    <b>Strong text</b>
    <tt>Monowide text</tt>
    <a href='http://www.dklab.ru'>Reference</a>
    a<x && y>d
    HTML;
    echo "Original text: $txt";
    echo "<hr>After removing all the tags:".strip_tags($txt,"<tt><b>");// <tt><b> is arguments to not remove.

    //binary data work

    $bindata = pack("nvc*",0x1234,0x5678,65,68);// * means that specificator also uses for other data
    //here we use n,v,c specificator 
    //n - characterless 16 bit elder powers near
    //v - charactreless 16 bit younger powers near
    //c - characterless byte
    //list of specificators huge so please google it.
    echo "<hr><br />\n".$bindata;
    
    $arrayOfBinDataUnpacked = unpack("c2chars/nint",$bindata);
    echo "<br />";
    foreach($arrayOfBinDataUnpacked as $valuesBinData){
        echo "$valuesBinData<br />";
    }

    //Hash functions

    $password = md5($str); // Hash code from value that we have in $str. Max 32 symbols can have this alghorithm even if we word can have thousands.

    echo $password."<br />";

    $password = crc32($str); //Also Hash code but less protective
    echo $password."<br />";


    $salt = random_bytes(strlen($str)); // not good for password secure but nice for salt argument for crypt
    echo $salt."<br />";

    $password = crypt($str,$salt); //Although more safe than crc32 but less comfortable that md5
    echo $password."<br />";


    //Send data to user directly without getting it in buffer
    echo $str.flush();

    //END CONSIDERING STRINGS
?>