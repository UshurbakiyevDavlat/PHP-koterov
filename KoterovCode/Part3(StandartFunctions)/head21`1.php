<?php
    //Last Head of Part 3 
        //Different functions
            //Information functions:
                //phpinfo();
                //echo phpversion();
                //getlastmod()
               // echo "Last modify: " . date("d.m.Y:i:s.",getlastmod());
                //exit();
                //die("Exiting from the program");
              //  $filename = '/path/to/data-file';
                // $file = @fopen($filename,'r') or die("does not exist!");

            //Finalizators
                //register_shutdown_function($funcname);

            //Generation of code within the script work
                //Executing the code
                    //eval() - evaluate string as code but need to know this things:
                        // will use the same local variables as program ,so do not locolaize them
                        // if some critical error , script also will die, we can solve it by catch it
                        // not crucial errors will just  return false do not exiting from the script as in the critical error
                        //eval('$clever = $dumb');
                         //Power of eval():
                         echo "<br/>";
                            for ($i = 1;$i<1000;$i++) {
                                eval("function printSquare$i() { echo $i*$i; }");
                            }
                                printSquare303();
                                echo "<br/>";
                               // $code = file_get_contents($filename,true);
                                //eval("? >$code<?php"); //this construction allow us immitate include in eval
                            
                            //Generate quasi anonim functions:
                                $squares = [];
                                for ($i = 0; $i <= 1000; $i++) {
                                    $id = uniqid("F");
                                    eval ("function $id() { echo $i * $i;}");
                                    $squares [] = $id ;
                                }
                                $squares[303]();
                                echo "<br />";

                             //create_function() 
                                //let`s create anonim functions , it is old way
                             //   $mul = create_function('$a,$b','return $a*$b;');
                              //  $neg = create_function('$a','return -$a;');
                               // echo $mul(10,20) . "<br />";
                               // echo $neg(2)."<br />";

                                //nowadays use this:
                                $fruits = ["orange","apple","banana"];
                                usort($fruits,function($a,$b){return $b<=>$a;});
                                foreach ($fruits as $key => $value) echo "$key:$value<br />\n";

                    //Other functions:
                                //usleep() - sleep by microsec
                                //sleep() - sleep by sec
                                //uniqid() - generate  uniq id 
?>