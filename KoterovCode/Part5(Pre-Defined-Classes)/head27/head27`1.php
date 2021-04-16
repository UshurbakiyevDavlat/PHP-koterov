<?php
    /*
        In this head we will consider:
            class Directory fro allowance to the catalog data
            class Generator,bounded with generator
            class Closure that gives closures
            and class   IntlChar to work with UTF-8 chars

        Okay,now let`s start from Directory class 

            Directory class is class that get us an access to data within catalog.
            Object of this class created by dir($directory) function (second argument need to work within the network will be in hea 32)
            if file was successfully opened return true,else NULL

            Object of this class include two open parameter:
                path - path to the opened catalog
                handle - descriptor of this opened catalog

                also include three methods:
                    read() - read element and then press pointer up to one position
                    rewind() - get pointer to the start position,need when in the loop pointer got into last index and need get it to the begin.
                    close() - closing catalog

                example of using Directory class in : head27dir.php 
                example of alternative opening directory in : head27dir1.php
                example of rewind in :head27rewind.php

                
        Generator class:
            so,let`s gonna refresh our mind, generators - it is functions, that include yield keyword and allow us to create 
            our own iterators that can be comfortable to use in foreach loops.

            example of creation of generators in head27refGen.php

            and example of creation of generators for help of class Generators head27classGen.php


        Closure class:
            refresh memory, clossures - it is type of anonim functions , that allow to contain variables on the moment of its calling
            example in head27closures.php
            so as we can see, closure saves copy of catched variables within the object.Because of it,
            if value of this variables will be changed or not, values will not change.
            Also, closures is useful when we changing condition of an object, we can do it with help of bindTo() 
            --example in head27view.php



        IntlChar
        extension IntlChar need to support internationalization and except it IntlChar include large amount of predefined classes
        for managing calendar tasks,foration of numbers , text messages , convertation of code.
        For activation in Windows need to redact config file of php.ini and turn on directive extension=php_intl.dll 
        So IntlChar in PHP7, include only static methods. So it means that you should not create object of this class.
        And also this class work only with one UTF-8 symbol

        List of functions:
                        IntlChar::ord()
                        IntlChar::chr()
                        IntlChar::toupper()
                        IntlChar::tolower()
                        IntlChar::isalnum()
                        IntlChar::isalpha()
                        IntlChar::isspace()
                        IntlChar::iscntrl()
                        IntlChar::ispunct()
                        IntlChar::islower()
                        IntlChar::isupper()
                        IntlChar::isprint()





    */
?>