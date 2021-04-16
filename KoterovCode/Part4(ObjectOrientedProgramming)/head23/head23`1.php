<?php

        //Inheritance - it is mechanism that give us an opportunity to create some methods and properties not from scratch,
            //but as a pattern from another class
            // base class(superclass) - it is class that we`ve got our pattern
            // derived class(subclass) - it is class where we have our base class as pattern
        
        //Using for : 
            //Adding  into existed class new methods and properties or replace them.
                //At the same time old verison will not work, priority is given to the new extension
            //For single type of the behavior of the different classes.
                //Example: We  can create base class Car and derived class Toyota. It is obvious that
                    //we can use object of the Toyota class everywhere where we need Car object 
                        //but not vice versa

            //So firstly let`s consider primitive-inheritance ,extend class.
                //example in head23pseudoInheritance.php


            //Okay, now go and consider real-inheritance. 
                //example in head23realinheritance.php


            //Redifening methods
                //It is an operation which allows us define another version of the method in derived class
                // access modificators same or less strict
                    //example when you redefine private method, in derived class you should put protected or public mod
                    //if it is public , in derived method also should be public
            
            //Access to methods of the Base class:
                //you can not use this $this->nameOfMethod() it causes recursion, so you can do smth like:
                    //parent::nameOfMethod(), self::nameOfMethod() or NameOfClass::nameOfMethod()
                        // we considering situation when NameOfClass it is name of current or parent class.
            
            //Final methods:
                //With final -modificator we can forbid it`s re-defining in derived classes 
                    //example
                /*
                    class Base{
                        public final function test(){}
                    }
                    class Derived extends Base{
                        public function test(){} // can not do this, cause an error
                    }
                */

                    //where we need final methods?
                        //For security of the system,because for example:
                            //we have some class SecuredUsers and in it we have IsSuperUser method which return true if user is super user
                            //so if someone writes derived class and redefines IsSuperUser method for his own comfort it will affect entire system
                        
            //Forbid Class  Inheritance 
                            //if final mod put before class NameOfClass it means that inheritance forbidden for this concrete class
                        
                //Consts __CLASS__ and __METHOD__
                    //__CLASS__ - replace by PHP on name of the current class
                    //__METHOD__ - replace by PHP on name of the current method
                            //example of using :
                                //self::nameOfMethod() can do like that: call_user_funct(array(&$obj,__METHOD__));

                        
                //Last statical bounding 
                            //Construction self and const __CLASS__ have their own bounds they are not allowing re-define
                                // statical method in derived classes 
                                    //example in head23inherit_static.php 
                                    
                //Anonym classes
                            //examples:
                                //head23anonymCommon.php
                                //head23nestedAnonym.php
                                
                    
                //Polymorphysm
                            //it is ablility of an object to use not only it`s own class methods but also derived class too.
                                //even if derived class does not exist on that moment when base class do.

                        //or we can say that it is ability of classes to give one program interface with different realization
                            //for example some site that includes many pages:

                                //static pages (Main page,Contacts,About,Vacancies)
                                //News
                                //Catalog
                                //Personal cabinet of user (Log In, Register , Change of customization)

                            //So for all of this pages we can create their own classes right
                                //and between all of them it is something simmilar f.e properties
                                    //but at the same time they have some differences f.e methods or properties as well.

                                //Static pages can be cached, but pages with personal data can not.

                                //for saving data for a long time but in RAM there are some NoSQL-solutions like memcache or redis

                                    //example of how Polymorhysm is working in head23diagramOfClassesForPolymorphysm.jpg

                                //Well if we do not know what exactly class will do it is abstragation
                                    //and class is abstract class.
                                    //example of cache work in page:
                                        //head23page.php - page
                                        //head23cached.php - cache implementation

                                //Virtual method it is method that can be redefined in derived class
                                
                                /*
                        Example of Abstragation and Polymorphism in :
                             head23page.php,head23cached.php,head23staticPage.php,head23News.php.

                        Of course it is not great example, but good for showing how oveloading of methods works
                        Also theese examples show to us how we should work with PDO, with cache and queries to DB
                               in diagram of cache from DB to memchache in jpeg format you can see how query and cache correlate.
                        */


                    // Improve hierarchy
                        // Main advantage of polymorphism it is easy way to create new classes which behavior is very simmilar


                    //Abstract methods and classes 
                        // Abstract method can not be called if it did not re-defined in derived class.
                        // Object of Abstract class can not be created 
                        // Any class that contain even 1 abstract method is Abstract.

                        //So we use Abstract keyword to get PHP know that we need help in control in this field
                                //Example of abstract classes and methods in head23PageA.php, head23CachedA.php

                        
                    //Connect between family types 
                                //For example we have base class Page and Derived class Static-Page
                                    //Everywhere where can use Page class we can use Static-Page as well but not vice versa
                                //example in head23cast.php

                        //example of Instanceof head23Instanceof.php
                        
                        //example of reversive instanceof in head23InstanceofReverse.php

                                



            

?>