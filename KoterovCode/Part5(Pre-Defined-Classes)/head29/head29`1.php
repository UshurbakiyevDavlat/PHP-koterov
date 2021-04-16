<?php
        //Iterators
            /*
                Iterators it is an object, allows us detour collection in the way that does not depend from
                inner construction of collection. Anyway it behave in the same way and support same methods
            */

        //foreach example in head29iter_simple.php

        //Define your own itterators
            //Iterator it is object , class that realize PHP interface Iterator
            //It is allowing to the program decide,
            // which values needed to set to the variables instructions foreach in the work and in which order
                //example in lib/FS.php and script lib/iter_fs.php
                
        //How PHP cover the iterators
            //foreach ($d as $path => $entry) ... 
            //works the same as  
                /*
                    $it = $d -> getIterator();
                    for($it->rewind();$it->valid();$it->next()){
                        $path = $it -> key();
                        $entry = $it ->current();
                    }   
                    unset($it);
                So here we use all 5 methods of Iterator interface, exactly because of it, they need to work in the PHP

                */


        //Multi-operators
            /*
                    In PHP we have opportunity use other iteration methods in foreach for example:
                        foreach($d->getIterator() as $path => $entry){...}
                        the same as foreach($d as $path =>$entry){...}
                        
                    So instead getIterator() you can use your own method , that will return iterator which you want

                    
            */

            //Virtual arrays:
                /*
                        So, we can create objects like arrays use []-operator but class should implement array.php
                        example in head29array.php
                */

            //SPL library:
                /*
                    standard PHP library 
                    include several classes (ArrayIterator,DirectoryIterator,FileIterator,SimpleXMLIterator etc),
                        also interfaces (RecursiveIterator,SeekableIterator)

                        DirectoryIterator class 
                            in STL we can see class that already has implemented Iterator interface.
                                example in head29directory.php
                                example in head29size.php

                        FilterIterator 
                            class that allow us to filet files 
                                example in lib/filter.php
                                example in head29filter.php
                                
                        LimitIterator
                            class and it`s derivative classes allow to us page output
                            example in head29limit.php


                        Recursion Iterator
                           example head29recursion_dir.php 
                            example head29recursion.php

                */
?>