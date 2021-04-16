<?php
    // Math functions

        //We have some consts for math operations like M_PI , M_E etc .. you can google it any time.

        //round functions 
            //abs() - absolute value 
            $a = -5;
            echo "<pre>";echo abs($a); echo "</pre>";

            //round() - round value to the less if value after float point less than 5
            $a = 3.1;
            echo "<pre>";echo round($a);echo "</pre>"; //3 
            $a = 3.6;
            echo "<pre>";echo round($a);echo "</pre>";
            $a = 3.64;
            echo "<pre>";echo round($a,1);echo "</pre>"; //3.6, second argument allow us to choose after how many numbers to round.
            // if argument is negative ,so consider left numbers from the point.

            /*Consts for 3 argument:
                PHP_ROUND_HALF_UP - values 0.5 rounding to the better    
                PHP_ROUND_HALF_DOWN - values 0.5 rounding to the less
                PHP_ROUND_HALF_EVEN - values 0.5 rounding to nearest even number
                PHP_HALF_ODD - values 0.5 rounding to the nearest odd number
                */

            //ceil()-round to the better number, always considere a mark of a  number
                $foo = ceil(3.1); // 4
                $foo = ceil(3); //3
                
            //floor() - round to the less number,always consider a mark of a number 
                $foo = floor(3.99999); // 3
        
        // Casual values function
                //rand() and srand() are useless so just forget about them and consider functions below:
                    //mt_rand()
                            //Getting casual string from file 
                       // $ourFile = fopen("largesttextfile.txt","r"); //open file to read
                            //Reading each string of file
                       // for($i = 0 ; $s = fgets($ourFile,10000);$i++){
                        //    if(mt_rand(0,$i) == 0 )$line = $s;
                        //}
                        /*
                        it works on base of theory of probability
                        so if $i=0 it will be 100% prob
                            if $i = 1 it will be 50% prob why? Cause at this momen mt_rand has choice 
                            between 0 and 1 and chance to choose 0 equal to 50% so etc 
                            we have equality in getting numbers
                        */
                        //echo $line;

                        //mt_getrandmax() maximal value of mt_rand()
                        echo mt_getrandmax();
                        
                            echo "<br/>";
                            echo "<br/> ";

                        mt_srand(123);
                        
                        for($i = 0; $i < 5; $i++){
                            echo mt_rand()." ";
                        }
                            echo "<br/>";
                            echo "<br/> ";
                        mt_srand(123);
                        for($i = 0;$i<5;$i++)echo mt_rand()." "; 
                            echo "<br/>";
                            echo "<br/> ";

                        // we can see that knowing the value of sequence we can account our value from mt_rand()
                        //so it is not fully casual.
                        //for more safe and casual result:

                            mt_srand(time()+(double)microtime()*100000 + getmypid());
                            for($i = 0;$i<5;$i++)echo mt_rand()." "; 
                        
                        //Also we can use random_int():
                                   echo "<br/>";
                            echo random_int(-100,0);
                               echo " ";
                            echo random_int(0,100);
                                 echo "<br/>";

?>

<?php
    //Translate between numeral system:
        //base_convert() from 2-36 , begin from 11  it is a -11 , b-12  etc
            echo base_convert("A",16,2); // translating A from 16 numeral system to 2 numeral system
            
        //bindec() - from binary to decimal
        //octdec() - from octo to decimal 
        //hexdec() - from hexadecimal to decimal
        
        //decbin() - from decimal to binary in string format
        //decoct() - from decimal to octo in string format
        //dechex() - from decimal to hexadecimal in string format
                            // max number that can be converted is :    2 147 483 647
?>


<?php
    //Maximum and Minimum
        //min() if just 1 argument it should be numerical array, else there should be several values
        //max() the same as min() just find max value. 
?>

<?php

    //Not a number (NaN)
        //is_nan() - check whether it is not a number 
        //string for NaN is -1.#IND.
        //is_numeric() for NaN returns true, for PHP NaN is number
        //every ariphmetic operation where NaN joining equal to NaN


    //Infinite
    //  is_infinite()
    //  infinite can be used in ariph operations for example 1/pow(0,-1)
    //  infinity can be whether + or -
    //  String equivalence 1.#INF and -1.#INF
    // strating from PHP7 division by zero is allowed but anyway it gives you a warning
    
    //Power functions
    //  sqrt() - allows get a square from number
    //  log() - returns natural logarithm if it is not allowed for this number returns +infinite or -infinite or NaN
    //  exp() - returns exponential number in power of its argument
    //  pow() - returns exponential power of its argument.


?>

<?php
    //Trigonometry
    //  pi() - get value of PI that equals to half of length of circle with radius = 1 (rounded(pi is 3.14))
    //  deg2rad() - convert  degrees to radians i.e returns $deg/180 * M_PI
    //  rad2deg() - vice versa converts radians to degrees
    //  acos() - returns arccosinus of an argument 
    //  asin() - returns arcsinus of an argument
    //  atan() - returns arctangens of an argument
    //  atan2() - retruns arctanges of 2 arguments
    //  sin() - returns sinus of an argument
    // cos() - retruns cosinus of an argument
    // tan() - returns tangens of an argument
    



?>