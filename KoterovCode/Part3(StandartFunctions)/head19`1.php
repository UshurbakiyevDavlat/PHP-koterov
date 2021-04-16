<?php
    //Work with data and time.
        //date_default_timezone_set()
        date_default_timezone_set("Asia/Almaty");

        //time() - return time from 1 january 1970 in sec 
        echo time()."<br>";

        //microtime() - the same as time() but in microsec
        list ($frac, $sec) = explode(" ",microtime());
        $time  = $frac + $sec;
        echo $time."<br>";
        // or we can put true in the argument like
        echo microtime(true)."<br>";

        //also we can count how much time script worked
            define("START_TIME",microtime(true)); // start 
            
            // ..script

            printf("Time of script work: %.5f sec", microtime(true) - START_TIME);// end

            //date() - return string included such data as:
                /*
                U - amount of seconds from 1 january 1970 
                z - number of day from begin of the year
                Y - year 4 integers
                y - year 2 integers
                F - name of the month 
                m - number of the month
                M - name of the month 3 symbols
                d - number of the day in month
                j - number of the day in moth without 0 in the start
                w - number of the week, 0 - sunday 1 - monday etc
                l - name of the day 
                D - day of the week 3 symbols
                a - am or pm 
                A - AM or PM
                h -  hours 12 format
                H - hours 24 format
                i - minutes 
                s -  seconds
                S - english number suffix
                */
                echo "<br>";
                echo date("l dS of F Y h:i:s A")."<br>";
                echo date("Today d.m.Y")."<br>";
                echo date("This file dated d.m.Y",filectime(__FILE__))."<br>";

                //strftime() depends on current local
                /*
                %Y - year 
                %y - short form of year
                %m - number of the month
                %d - number from 01 till 31 range
                %H - hours(from 00 till 23)
                %M - minutes(from 00 till 59)
                %S - seconds (from 00 till 59)
                %B - full name of the month depends on current locale
                %b - short name of the month
                %A - full name of the day of the week
                %d - short name of the day of the week
                %c - text form of current data (in the locale)
                */

                echo strftime("%B %Y year, %d day of the month. Was %A , clock showed %H:%M.");


                //timestamp structure
                    /*
                    mktime() - return time for unix system comfortable considering
                        Need to be very atentionable because if you put incorrect data, this function will not cause an error
                    
                    strtotime() - put the string of the data and return timestamp
                    */
                     //example
                     $check = [
                        "now",
                        "10 september 2015",
                        "+1 day",
                        "+1 week",
                        "+1 week 2 days 4 hours 2 seconds",
                        "next Thursday",
                        "last Monday",
                     ];

?>
                        <!DOCTYPE html>
                        <html lang="en">
                     <head>
                         <meta charset="UTF-8">
                         <meta http-equiv="X-UA-Compatible" content="IE=edge">
                         <meta name="viewport" content="width=device-width, initial-scale=1.0">
                         <title>Using of strtotime()</title>
                     </head>
                     <body>
                         <table>
                            <tr>
                                <th>Input string</th>
                                <th>Timestamp</th>
                                <th>Date result</th>
                                <th>Today</th>
                            </tr>
                            <?php foreach ($check as $str){?>
                                <tr>
                                <td><?=$str?></td>
                                    <td><?=$stamp = strtotime($str)?></td>
                                    <td><?=date("Y-m-d H:i:s",$stamp)?></td>
                                    <td><?=date("Y-m-d H:i:s",time())?></td>
                                </tr>
                            <?php }?>
                         </table>
                     </body>
                     </html>


                        <?php
                            //getdate() - return associative array included data about setted time
                                //to the array will be put next keys and values:
                                    /*
                                        seconds - seconds
                                        minutes - minutes
                                        hours - hours
                                        mday - month day
                                        wday - week day
                                        mon - month number
                                        year - year
                                        yday - number of the day from the start of the year
                                        weekday - full name of the day of the week
                                        month - full name of month

                                    This is alternate way to get date, main way is date()

                                    */

                            //Grigorian calendar
                            //JD - it is number of day from 4714 year BC
                                //GregorianToJD() - convert date of JD to values of grigorian calendar
                                //JDToGregorian() - conver data from JD format to grigorian

                                $jd = GregorianToJD(10,11,1970);
                                echo "$jd<br />";
                                $gregorian =  JDToGregorian($jd);
                                echo "$gregorian<br />";
                                $list = explode($gregorian,"/");
                                
                                //JDDayOfWeek() - return day of the week of JDDate
                                 //mode 0-number of day of the week, 1 - English name of the week , 2-short name of day of the week

                                //checkdate() - check if grigorian date is correct or not
                                    //year should be in range of 1900 and 32767
                                    //month should be in range of 1 to 12
                                    //number of the month should be correct(even if year is leap)


                            //Calendar
                            
                        ?>

