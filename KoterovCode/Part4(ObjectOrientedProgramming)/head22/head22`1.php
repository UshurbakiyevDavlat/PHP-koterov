<?php
    require_once("head22MathComplex1.php");
    require_once("head22MathComplex2.php");
    require_once("head22FileLogger0.php");
    require_once("head22FileLogger1.php");
    require_once("head22LoopedLinks.php");
    require_once("head22static.php");
    require_once("head22cache.php");
    require_once("head22cls.php");
    require_once("head22Hooker.php");


    //Object and Classes
        //Class - it is similar to data type , has its own methods and objects
            //Object of class - it is pattern of this Class with its own properties
                //Incapsulation - it is approach to create the class, when data and propeties of this class is limited and allowed
                    //only with special methods.

        //Example of creating MathComplex class
            class MathComplex{ //name of the class
                public $re,$im; //access modificator and name of the variable in the class
                
                function add($re,$im){ //method of the class
                    $this->re += $re; //this - operator to get access to the variables within the class
                    $this->im += $im; //  also here we adding arguments from the object data to the inner variables
                    //and after each  calling of this function data in $re and $im will increased because of adding operation in the function
                }
            }
        //Work with Class
            //Creating of and object of the Class
                $obj = new MathComplex;

            //Access to object properties 
                $obj->re = 6; //set some value,in our example it is 6, to the $re variable in the class
                $obj->im = 101;//set some value,in our example it is 6, to the $re variable in the class
                echo $obj->re;
                
            //Access to methods
                $obj->add(100,200);
                echo "({$obj->re},{$obj->im})"."<br />\n"; 

                //In the Object Oriented Programming true rule is that one file one class i.e we need divide class files
                //and main script, to work with class we need include file with class to our script like:
                    //require_once("fileWithClass.php");
                    // and then within  the script do what we need, firstly always intialize object of the class before.

            // Appendix: We can not reintialize default ariphmetic operations in PHP

            //Creating several objects
                //see head22MathComplex1.php for the class data
                //require_once we have done in the beginning of the script

                //Calling the methods of the MathComplex1 class

                    //first object 
                        $a = new MathComplex1;
                        $a->re = 314;
                        $a->im = 200;
                    //Second object
                        $b = new MathComplex1;
                        $b->re = 303;
                        $b->im = 6;

                    $a->add($b);
                    echo $a->__toString();

                //Well unfortunately in PHP we can not overloading the methods in the class( 

            //Why we should write __toString()?
                    //because it is overloading of interpolation 
                        // so PHP automaticaly calling it when see implicit converting link to string
                        //if you will not add this, it catch an error
                        
            //Okay, now you can meet __construct() - constructor method in head22MathComplex2.php
                    //and creating an object for it
                    $a = new MathComplex2(300,400);
                    $a->add(new MathComplex2(300,700));
                    echo $a;
                    //unfortunately in PHP we can have no more than 1 constructor

            
                    //Also we can put values to the constructor by default, you need initalize variables in the arguments of constructor function
                    // like this function __construct($a = 0,$b = 0){...}

                //Destructors
                    //you need always destruct an objects when you do not need them anymore
                    // because if you do not it will cause a problem with limit of descriptors in some operations with files for example.
                //example of closing function without destructor in head22FileLogger0.php
                //example with destructor in head22FileLogger1.php
                    //script for head22FileLogger0.php:

                       /* for ($n = 0 ; $n < 10; $n++){
                            $logger =  new FileLogger0("test$n","head22`test.log");
                            $logger -> log("Hello!$n");
                            $logger -> close();
                        }*/

                    //script for head22FileLogger1.php: 
                       /* for ($n = 0; $n < 10; $n++){
                            $logger = new FileLogger1("test$n","head22`test1.log");
                            $logger -> log("Hello!$n");

                        }*/

                //Trash catching Algorithm:
                    //Well firtstly need to delete all the links on the object, and set them to zero before;
                    //Then Calling destructor
                    //And get memory free
                    //At the moment when all links on the object will be deleted, PHP delete an object

                //Looped links:
                        //example in head22LoppedLinks.php
                    //script for it:
                        $father = new Father; //creatin of father
                        $child = new Child($father); //creating child of this father
                        $father -> children[] = $child; // writing it in the father`s children 
                        echo "All people live....Let`s kill them all.<br />\n"; 
                        $father  = $child = null; //killing them all 
                        echo "All people died, end of the programm<br />";
                        //but programm said that there are zombies...
                        // so program is working incorrectly because of this line of code $father -> children[] = $child;
                        //looped links is  ,for example links of father in child memory and child in father memory .
                        //so because of it counter of links never be zero, so we will never get correct result with it.

                //Access rights to the class members:
                        //public - give access to everywhere
                        //private - give access only to class methods
                        //protected - give access just to derrivatives classes 

                //We can initialize properites implicitly 
                        //$this->property = 101;
                        //$obj ->property = 303;
                        //correct even if property was not initialized in the class
                          //it just create new one.


                //Common reccomendations about OOP in any language:
                        //Hide as many class methods and properties as possible with modificator private
                            //set public only thoose which will be useful for calling programm
                        //Do not create open methods to the future using, you always can open it if it will be required
                            //It will be much easier to open(from private to public) it than close (from public to private) 
                        //Group open methods together apart from private methods
                        //Try to not create public properties
                
                //Class-self, Object-this
                        //Feature of Static members and methods is fact that they defined on class level
                        // access to static property - (NameOfClass::$property) or (self::$property)
                        // Static method can work only with static properties and  static methods 
                        //example of classes in : head22static.php and head22cache.php
                            //script for head22static.php

                            for ($obj = [], $i=0; $i < 6; $i++){ //creating 6 objects
                                $obj[]  = new Counter(); 
                            }
                            echo "Now {$obj[0]->getCounter() } objects are  existing.<br />\n"; // show how many objects do we have
                            $obj[5] = null; // delete object number 5
                            echo "Now - {$obj[0]->getCounter() } objects left<br />\n"; //show again 
                            $obj = []; // deleting all objects
                            echo "At the end - ". Counter::getCounter() . "objects left.<br />\n"; // show how much in the end 
                            // with another way of calling static method with name of class


                            //script for head22cache.php
                                $logger1 =  FileLogger3::create("head22_file3.log"); //creating first object and file
                                sleep(1); // kinda program executed for some time
                                $logger2 = FileLogger3::create("head22_file3.log"); // creating second object and file
                                echo "{$logger1->getTime()}, {$logger2->getTime()}<br />\n"; // getting time of both creating objects

                            
                            //Consts of class
                                //class in head22cls.php
                                //script for this class:
                                    if (defined("cls::NAME"))echo "Const is identified.<br />\n";
                                    else echo "Const is not defined<br />\n";
                                    if (defined("cls::POSITION"))echo "Const is identified. <br />\n";
                                    else echo "Const is not defined<br />\n";


                            //Interception of the non-existent calls of class
                                    //getting non-existent property __get()
                                    //setting non-existent property __set()
                                    //executing non-existent method __call()
                                //example in head22Hooker.php
                                    $obj = new Hooker();
                                    echo "<b>Getting value from common property.</b><br />";
                                    echo "Value: {$obj->opened}<br />\n";

                                    echo "<b>Calling common method</b><br />\n";
                                    $obj->method();

                                    echo "Setting value to the non-exist property:<br />\n";
                                    $obj -> nonexist = 101;

                                    echo "Getting value from nonexist property:";
                                    echo "{$obj->nonexist}<br />\n";

                                    echo "Calling non-exist method:";
                                        $obj->nonexist(5);
                                    echo "<br />\n";


                            //Clonning objects head22clone0.php and head22clone.php
                                    // if you do not want to allow to use clone method for some class you can do it private


                            //Serialize and Unserialize objects
                                    //example in head22serialize.php
                                    

                                    //Using __sleep() and __wakeup()
                                        //example in head22user.php,head22userSerialize.php,head22userUnSerialize.php
                                        




                    
?>