<?php
    //Interfaces and traits
        

        //Interfaces - abstract class ,but can not include properties and body of methods 
            //can contain accessors name of method and arguments, consts properties.
            //make class that implement this interface have to  implement all methods that this interface define

            /*
                Example of interfaces:

                interface Seo {
                    public function keywords();
                    public function description();
                    public function ogs();
                }

                interface Tag{
                    public function tags();
                }

                class StaticPage extends Cached implements Seo,Tag{
                    public function keywords(){...}
                    public function description(){...}
                    public function ogs(){...}


                }

                You can check if current class implement some interface with instanceof of an object of this class

                    function someFunc($obj){ 
                        $interface = "Seo";
                        if ($obj instanceof $interface){...};
                    }
                    
            */

            //Inheritance of Interfaces
                    //Interfaces also as classes can extends by other interfaces
                    //example in head24InterfacesInheritance.php

            /*
            Interfaces and Abstract classes

                    if class which implements some interface, but implements not all methods from it
                    it it Abstract class
                    
                    you must put keyword abstract before this kind of class.

                    for example :
                        interface I{
                            public function F();
                        }
                        abstract class C implements I{

                        }
            
            */


        //Traits
        //  weapon for second using of code in classes.
        //  example in head24Traits.php
        // and head24Traits1.php , head24ConflictTrait.php

        



?>