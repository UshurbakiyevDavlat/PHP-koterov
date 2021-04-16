<?php
    //Work with Regular statements

        //All the problems we need do with regular statements.
            //change in string $inFile everything after last '.' (exclusively) 
            //or in the red case end of the string on string ".out" and put if $outFile variable
            
        //Problem 1:
        // We have this code to make for some file another extension:
            /*
            $p =  strpos($inFile,'.');
            if ($p) $outFile = substr($inFile,0,$p);
            else $outFile = $inFile;
            $outFile .= ".out";
        */

        //Problem 2 :Or we have to divide the catalog name and file name without basename() and dirname()
            //part of the word before has a slash  but in this word has not ,or reverse slash, or in the red case after
            // after begin of the string  put in $filename ,and begin of the string to $dirname.

        /* $slash1 = strpos($fullPath, '/');
            $slash2 = strpos($fullPath,'\\');
            $slash = max($slash1,$slash2);
            $dirname = substr($fullPath,0,$slash);
            $filename = substr($fullPath,$slash+1,10000);

        */

        //Problem 3:
        // bold text between [b] and [/b] ,by <b></b> tags 

            /* Converting special chars
            <?php
                if(@$_REQUEST['text']) 
                    echo htmlspecialchars($_REQUEST['text']). "<hr />";
            ?>

            <form action = "<?=$_SERVER['SCRIPT_NAME']?>" method = "POST";
            <textarea name = "text" cols = "60" rows = "10">
            <?=@htmlspecialchars($_REQUEST['text']) ?>
            </textarea><br />
            <input type ="submit">
            </form>

            */

        //Problem 4:
            //Find first '-' and consider all the numbers after as part`s number after next '-' all the numbers as  head`s
                //and then pass all the underlines  and pick out remaining text till '.' as identificator of head


                //What is the PCRE? Perl Compatible Regular Expression dialect of regular statements
                    //It is rules for searching  on unusual language.

                //Any regular expression in PHP it is just string which includes it , exactly 
                //because of it functions which work with them getting them in arguments in string format
                
        //Matching
            //preg_match() - searching of matches and return 1 if find out something, 
            //to the list matches writing separate segments of match

                //for example: 1 - check if number in the string ,one or more numbers
                preg_match('/(\d+)/s',"head20`1.php",$matches);
                //matched things putted to $matches[1];
                echo $matches[1];//20

                //example:2 -   find in text e-mail address. \S means not a whitespace
                //[a-z0-9.]+- any amount of numbers or chars or dots.
                // 'i' modificator makes PHP not recognize register of the chars in the searching
                // Modificator 's' means that we work in one-string mode
                preg_match('/(\S+)@([a-z0-9.]+)/is',"Hello from dushurbakiev@gmail.com",$m);
                //name of the post in $m[1] and of the host in $m[2]
                echo "<br>"."In the text found: Name of the post:$m[1] and Name of the host:$m[2]";

            //preg_replace() - allow us match and replace if true
                $text = "Hello from dushurbakiev@gmail.com, and also from dushurbakiev@mail.ru!";
                    $html = preg_replace(
                            '/(\S+)@([a-z0-9.]+)/is',
                            '<a href="mailto:$O">$O</a>',
                            $text);
                            echo $html;

                            /**
                             Important
                             Differently from match, replace works in one-string mode
                             like if /s modificator was putted.
                             Be careful with \n symbols
                             */

        //PCRE LANGUAGE:
                /*
                    each statement created from one or several manage commands.
                    some of them we can set to the group
                    manage commands can be one from 3 classes:
                     *simple symbols also manage symbols plays role of their substitute - also known as literals
                     *manage constructions(quantifiers of reiterations,operands of alternative,group braces etc)
                     *imaginary symbols (in the string we do not have them but, they mark some part of the string,for example the end)
                
                For example manage symbols are : .,*,+,?,|,(,),[,],{,},$,^.
                        All the symbols except theese, in reg statements mean itself and do not have special mean.
                */
        
                //Restraints
                        /*
                         Before any reg expression we should use slash as restraint because of modificators
                            example '/expression/m' where m is one or more modificators
                         if slash has included in expression you should ecraning it like double slash before
                         Also you should write expression better in ' ' - sign because of '$' symbol
                         */
                        
                //Alternative restraints
                        //PCRE allows us to use same symbols as restraints
                        //for example '#path/to/file#i'
                        //or '{path/to/file}i'
                        //or '(path/to/file)i'
                        //and finally can use this '[path/to/file]i'

                       // echo preg_replace('[(/file)[0-9]+]i','$l',"/file123.txt"); 

                //Cancellation of spec symbols acting
                        //for example we are searching for some name of file with one slash before
                        $re = '/\\\\filename/';
                        //1)In PHP \\ is just one slash 
                        //2)In PCRE \\ slashes also is just one slash

                        //ok goes to harder example
                            //we need find out any name of catalog which after goes any name of the file
                            $re = '/\\S+\\\\\\S+/';
                            //S any not whitespace symbol and + means repeat one or more times
                            //For see it by PCRE point of view we can do :
                                //echo "<tt>".htmlspecialchars($re)."</tt>"

                //Simple symbols(literals)
                        //any symbol in string PCRE mean itself if is not managing
                        //For example regEx at 
                        echo "<br>".preg_replace('/at/','AT',"What is the PERL COMPATIBLE REGEX");

                        // if in the string we need to add manage symbol we have to ecran it
                            $re = "/a\\*b/";

            //Symbol classes 
                // '.' - any symbol
                // '\s' - means " " or '\t' or '\n' or '\r'
                // '\S' - means any symbol except whitespace
                // '\w' - means any letter or number
                // '\W' - not a char but not a number
                // '\d' - number from 0 to 9
                // '\D' - anything but not a number
                
            //Alternative
                //If you want look for not a random but definete symbol you can do:
                    // /a[xyXY]c/ will find string with a,one of the xyXY, c letters
                    // /[a-z0-9_]/ set every alphabeticly-numerical symbol

                // in brackets also we can have special expressions example:
                    /**
                        [:aplpha:] - letter
                        [:digit:] - digit
                        [:alnum:] - letter or digit
                        [:space:] - whitespace symbol
                        [:blank:] - whitespace symbol or symbol with 0 and 255 code;
                        [:cntrtl:] - managing symbol
                        [:graph:] - symbol of pseudographics
                        [:lower:] - symbol  of lower register
                        [:upper:] - symbol of upper register
                        [:print:] - printed symbol
                        [:punct:] - symbol of punctuation
                        [:xdigit:] - digit or letter from a to F.

                    '/abc[[:aplpha:]]+/'
                    */
            //Negative classes
                    //
                   // echo preg_replace('/<[^>]+>/');// deleting all the html tags,best way to do it in the XML -files
                    //construction [^>] allow us ignore everything that after[^ and before ]

            //Quantifiers of repeating:
            /*
                    identificators are special signs used to clarify actions of previous symbols of the first class
                    
                '*' - more popular than other means that previous symbol can be repeated zero and more times
                '+' - one or more times for the previous symbol
                '?' - zero or one times
                '{}' - user setting repeat 
                    X{n,m} - point on that x symbol can be repeated from n till m times
                    X{n} - point on that x symbol should be repeated n times
                    X{n,} - point on that x symbol should be repeated n or more times
                    range from 0 to 65 535 of repeating


            */

            //Imgaginary symbols
                /*
                    Imaginary symbols are just segment of the string between nearest symbols(yes,exactly that)
                    that satisfact some requirments.So it is just position on the string
                    '^' - equals to begining of the string exactly that before of the first symbol in the string
                    '$' - equals to end of the string after last symbol
                    '\b' - equals to start of the end of the word : \w\W  or \W\w any position between them makes \b work
                    '\B' - any position except start of end of the word

                    '/^\w:/' - equals every string that starts from letter and ends by the colon.Abs path in Windows looks like the same
                    '/\.txt$/i' - equals to string that has name of the file with txt extension
                    /^$/s - equals only to empty string

                    
                */

            //Alternative operators
                /** 
                    '/1|2|3/' equals to '/[123]/' but matching is slower
                    '/\.gif$|\.jpe?g$/ - match to name of the file with GIF or Jpeg format
                    '#^\w:|^\\\\|^/# - match to absolute path

                    //Grouping braces 
                        for example we can write 3 example as:
                            '#^(\w:|\\\\|/)#'
                */

            //Pockets
            /*
              Example task we need to divide inputed date and choose from it real date without any trash
                right regeX that we should pick from input data:
                    '|^\s* [ (\d+) \s* [[:punct:]] \s* (\d+) \s* [[:punct:]]\s* (\d+) \s*$|xs ] |'

            everything that in () - is pocket 
                in 1 pocket writes date without whitespaces in the start and end
                in 2 pocket writes the day
                in 3 pocket writes month
                and finally in 4 pocket year
            */
            $str = "    15-16/2000      "; // example
            $re = '{
             ^\s*(
                 (\d+)
                 \s* [[:punct:]] \s* 
                 (\d+)
                    \s* [[:punct:]] \s* 
                (\d+)

               )\s*$ 
            }xs';

            preg_match($re,$str,$matches) or die("Not a date:$str");
            echo "Date without whitespaces:".$matches[1]."<br>";
            echo "Day: $matches[2] <br>";
            echo "Month: $matches[3] <br>";
            echo "Year: $matches[4] <br>";

            echo "<br/>";
        
            //task: all words in string starting from $ make bold
        //'/\[a-z]\w*/i - regEx for name of the variable
       // $text = htmlspecialchars(file_get_contents(__FILE__));
       // $html = preg_replace('/(\$[a-z]\w*)/is','<b>$1</b>',$text); //instead $1 used first pocket
        //echo "<pre>".$html."</pre>";
        //echo "<br/>";

        //Using pocket in match function
            // for example we need find substring in string that picked out by some html tags
            //then put it to the pocket for working with it
            //regEx for it looks like : '|<(\w+) [^>]* > (.*?) </\1|xs'
           // $re = '|<(\w+) [^>]* > (.*?) </\1|xs';
            //$str = "Hello ,this <b>word</b> is bold!";
            //preg_match($re,$str,$matches) or die("Does not have the tags!");
            //echo htmlspecialchars("'$matches[2]' picked out by tag '$matches[1]'");

            //echo "<br>";

        //Ignoring the pockets
        //$str = "2015-12-15";
       // $re = '|^(?:\d(4)) - (?:\d(2))-(\d(2))$|';
       // preg_match($re,$str,$matches) or die("Does not have a coincedence!");
       // echo htmlspecialchars("Day:".$matches[1]);
        //    echo "<br>";
           
        //Named pockets
        //$re = "|^(?<year>\d(4))-(?<month>\d(2))-(?'day'\d(2))$|";
     //   preg_match($re,$str,$matches) or die("Does not have a coincedence");
      //  echo "Day:".$matches['day'] . "<br/>";
       // echo "Month:".$matches['month']."<br/>";
       // echo "year:".$matches['year']."<br/>";

    //QUANTIFIERS GREED
            /**
             */
            $str = "hello this <b>word</b> is <b>bold</b>!";
            $re = '|(\w+) [^>]* > (.*) </\1|xs';
            preg_match($re,$str,$matches) or die("Does not have tags");
            echo htmlspecialchars("'$matches[2]'picked by tag '$matches[1]'");
            // .* statement get max possible symbols so end of the expression did not compare with right tag
            // put ? after any quantifier we put them pils against greed
            // *? +? {}? ??
            //echo preg_replace('/<.+? >/s','',$str); this code deleting all the tags from some string

            $str = '[b]bold text [b] bolder [/b] return [/b]';
            $to = '<b>$1</b>';
            $re1 = '|\[b\] (.*) \[/b\]|ixs';
            $re2 = '|\[b\] (.*?) \[/b\]|ixs';
            echo "<br>";
            $result = preg_replace($re1,$to,$str);
            echo "Greedy version:".htmlspecialchars($result)."<br/>";
            $result = preg_replace($re2,$to,$str);
            echo "Lazy version:".htmlspecialchars($result)."<br/>";
            //both of them do not do thing that we need

    //Recurrent structures
            // If you need count deep level structure you have to do it yourself , PCRE can not help there

    //Modificators
            // i - ignoring the register
            // x - ignoring comments and whitespaces
                //example:
                    $re = '(
                        \[(\w+)\] # Open tag
                        (.*?) # Minumum of any symbol
                        \[/\l\] # Closing tag pare for open tag
                    )ixs';

            // m - multistring, in the preg_match() - is defined as default
                //example 
                $str = file_get_contents(__FILE__);
                $str = preg_replace('/^/m',"\t",$str);
              //  echo "<pre>".htmlspecialchars($str)."</pre>";
                //So now '/^/m' equal with begining of each inner string variable $str
                //We change ^ on \t
                /*
                Role has changed so here is the list:
                        ^ - fit to begining of each inner string 
                        $ - fit to  position before \n and end of the line(does not consider \r symbol)
                        \A - fit to position of begining of the data i.e position before the first symbol
                        \z - fit to position after last symbol
            
            // s - One line search
            
            // e - executing PHP-program within change of the data
                        works only in preg_replace()
                        so replacing on code of PHP found segment
                    $str = preg_replace(
                        '{(</?)(\w+)(.*?>)}es',
                        "'$1'.strtoupper('$2').'$3'",
                        $str
                    );  you better should not use this modificator but use preg_replace_callback()

            // u - UTF-8
                */

        //Unqonquering search
                    //When some expression or part of it in brackets equal to some string ,it is qonquer it and subexpressions 
                    //can not see it 
        
        //Positive scrolling forward
                    // ?=subex
                    //starting compare from position of this subex
                    // |(\S+)(?=\s*</)|

        //Negative scrolling forward
                    // ?!subex
                    // (?![.,]) # will not go any . or ,
                    // ([[:punct:]]+)  # ... some other punctuation sign
                
        //Positive scrolling back
                    // ?<=subex
                    // (?<=<) from the left goes "<" -- begining of the tag
                    // (\w+) name of the tag

        //Negative scrolling back
                    // ?<!subex
                    // /(?<!foo)bar/ equal to boobar or any with end of bar but not to foobar

        

        //Functions of PCRE:
                    /*
                    preg_match($re,$st,$matches,PREG_OFFSET_CAPTURE);

                    preg_match_all()
                        consts for flags:
                            PREG_PATTERN_ORDER (default)
                                $matches[0] - list of substrings fully fitted with $pattern expression in string subject
                                $matches[1] - list of coincidences which equal to first open brace
                                $matches[B][N] - where B is number of open brace N -number of coincidence

                            PREG_SET_ORDER ()
                                $matches[N][B]
                                list matches sorted by coincidence
                            
                            PREG_OFFSET_CAPTUER()
                                return digital shifts of found elements with values
                    */
                   /* echo "<br/>";
                            header("Content-type:text/plain");
                            $flags = [
                                "PREG_PATTERN_ORDER",
                                "PREG_SET_ORDER",
                                "PREG_SET_ORDER|PREG_OFFSET_CAPTURE",
                            ];

                            $re = '|<(\w+).*?>(.*?)</\1>|s';
                            $text = "<b>text</b> and also <i>another text</i>";

                            echo "String:$text\n";
                            echo "Epxression: $re\n\n";

                            foreach($flags as $name){
                                preg_match_all($re,$text,$matches,eval("return $name;"));
                                echo "Flag $name:\n";
                                print_r($matches); 
                                echo "\n";
                            }
                    */

                    //preg_replace_callback()

                    // example of change all coincidence with string values execute callback function and put there values of pockets
                            //correct code for toupper all the html tags
                    $str = '<hTml><bOdY style ="background:white;">Hello world!</bOdY></html>';
                            
                    $str = preg_replace_callback(
                        '{(?<btag></?) (?<content>\w+) (?<etag>.*?>)}s',
                        function ($m){return $m['btag'].strtoupper($m['content']).$m['etag'];},
                        $str);
                    echo htmlspecialchars($str);
                    echo "<br>";

                    //preg_replace_callback_array()
                    $str = '<hTml><bOdY style ="background:white;">Hello world!</bOdY></html>';

                    $str = preg_replace_callback_array(
                        ['{(?<btag></?)(?<content>\w+)(?<etag>.*?>)}s' => function($m){
                            return $m['btag'].strtoupper($m['content']).$m['etag'];
                        },
                        '{(?<=>)([^<>]+?)(?=<)}s'=>function ($m) {return "<strong>$m[1]</strong>";}
                    ],
                        $str);
                    echo htmlspecialchars($str);
                    /**
                        With help of preg_replace_callback_array()
                            We can do this things :
                        -automaticly set the attributes width and height in <img> tags got from result of catching output of script
                        -implement smart replace of pseudotags with arguments,[font size = 10],
                        -input of PHP code into different patterns
                    
                    */

        //Slicing on regEx
                    //simillar with explode() but much slower ,but at the same time has a bigger opportunity
                    //preg_split() - splitting by expression 
                    //consts for flag:
                        /*
                            PREG_SPLIT_NO_EMPTY (empty string will be deleted)
                            PREG_SPLIT_DELIM_CAPTURE ( the result get coincidence as well)
                            PRET_SPLIT_OFFSET_CAPTURE (return array of lists,each of this list is pare (substr,position))
                        */

                        //Example we need to do pick out all unique words from the text
                        function getUnIQ($text,&$origWords = false){
                            $words = preg_split("/{[^[:alnum:]]|['-]+/s",$text);
                            $origWords = count($words);
                            $words = array_map("strtolower",$words);
                            $words = array_unique($words);
                            return $words;

                        }
                        $fname = "Head20`1_BookMark.txt";
                        $text = file_get_contents($fname);
                        $uniq = getUnIQ($text,$origWords);
                        echo "Was Ammount of words:".$origWords."<br/>";
                        echo "Ammount of words became:".count($uniq)."<br/>";
                        echo join(" ",$uniq);



            //Dynamicly ecraning of special symbols
                       // preg_quote()
                    //   $re = preg_quote($higlight,"/"); // ecranning symbols
                     //  $re = preg_replace('/\s+/','\\s+',$re); // change all whitespace symbols for \s+ it allow us equate them
                      // echo preg_replace("/($re)/s",'<b>$1</b>',$text); // pick out the word

            //preg_grep() - return that strings that equal to pattern of regEx
                        //const for flag only one : PREG_GREP_INVERT return unequal results
                        foreach (preg_grep('/^head\d/s',glob("*")) as $fn){
                            echo "File of example: $fn<br/>";
                        }

                        foreach(glob("*") as $fn){
                            if(substr($fn,0,strlen("head")) === "head"){ 
                                echo $fn;
                                echo "<br/>";
                            }
                        }

                        foreach (glob("*") as $fn){
                           if(preg_match('/^head\d/s',$fn,$matches)){ 
                           echo "<pre>".$fn."</pre>";
                           }
                        }


                //So ending of this head, now let`s go and show very hard examples of regEx
                        // hyphen in php 7 .3  and higher in PCSRE SHOULD BE ECRANIZED!!!!!!
                        $text = "Address:dushurbakiev-user@gmail.com, dushurbakiev.second@gmail.com";
                        $html = preg_replace(
                            '{[\w\-.]+ @ [\w\-]+(\.[\w\-]+)*}xs',
                            '<a href = "mailto:$0">$0</a>',
                            $text 
                        );
                        echo $html;
                         
                            
                        echo "<br/>";
              //Activate of links
                        $text = 'Link:(http://google.com),www.vk.com,http://instagram.com';
                        echo actvivatHref($text);

                        function actvivatHref($text){
                            return preg_replace_callback(
                                '{
                                    (?:
                                        (\w+://)
                                        |
                                        www\.
                                        )
                                        [\w\-]+(\.[\w\-]+)*
                                        (?: : \d+)?
                                        [^<>"\'()\[\]\s]*
                                        (?:
                                            (?<! [[:punct:]])
                                            |
                                            (?<= [\-/&+*])
                                            )
                                }xis',
                                function ($p){
                                    $name = htmlspecialchars($p[0]);
                                    $href = !empty($p[1])?$name : "http://$name";
                                    return "<a href = \"$href\">$name</a>";
                                }, 
                                $text
                            );
                        }
         //
    
?>