<?php
    //Calendar classes

        //Class DateTime
            //example in head28datetime.php
            //example in head28set_datetime.php

                //list of popular time formats:
                    /* 
                    Const:                      Format

                    DateTime::ATOM              Y-m-d\TH:i:sP
                    DateTime::COOKIE            l, d-M-y H:i:s T
                    DateTime::ISO8601           Y-m-d\TH:i:sO
                    DateTime::RFC822            D, d M y H:i:s O
                    DateTime::RFC850            l, d-M-y H:i:s T
                    DateTime::RFC1036           D, d M y H:i:s O
                    DateTime::RFC1123           D, d M y H:i:s O
                    DateTime::RFC2822           D, d M y H:i:s O
                    DateTime::RFC3339           Y-m-d\TH:i:sP
                    DateTime::RSS               D,d M Y H:i:s O
                    DateTime::W3C               Y-m-d\TH:i:sP

                example in head28datatime_rss.php
                    
                    */
        //Class DateTimeZone
                //so, in 19 head, we considered that we need set timezone with help of default_timezone_set()
                //now we can do it with class of DateTimeZone() that allow us configure timezon for DateTime objects
                    //example in head28datetimezone.php

        //Class DateInterval
                    //We can use add() sub(), diff() to maintain difference between times (time interval)
                    //example in head28dateinterval_diff.php
                    //example of creating interval with help of constructor head28dateinterval.php


        //Class DatePeriod
                    //object of class DatePeriod allows us create iterator for detour of sequence of  dates
                    //that go through defined time-interval, detour has done for help of foreach as any other generator
                    //3 propertie:
                        //object DateTime
                        //object DateInterval
                        //amount of itterations
                    //example in head28dateperiod.php
                         



?>