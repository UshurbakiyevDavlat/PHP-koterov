<?php
    //Work with files and catalogs

    //fopen() returns descriptor of the file if file does not exist return false
        //1 argument is url of file
        //2 argument is mode(list of modes is below )
        //3 argument needs to know if it is not straight name and if yes need to find in path pointed in  require or include 
            /*
            List of modes for open file:
                r   read            pointer in begin   do not clean files   not create if does not exist   not error if file exists
                r+  read            pointer in begin   do not clean files   not create if does not exist   not error if file exists
                w   write           pointer in begin   clean files          create if does not exist       not error if file exists 
                w+  write           pointer in begin   clean files          create if does not exist       not error if file exists
                a   write           pointer in end     do not clean files   create if does not exist       not error if file exists
                a+  read/write      pointer in end     do not clean files   create if does not exist       not error if file exists
                x   write           pointer in begin   do not clean files   create if does not exist       error if file exists
                x+  write/read      pointer in begin   do not clean files   create if does not exist       error if file exists
                c   write           pointer in begin   do not clean files   create if does not exist       not error if file exists
                c+  write/read      pointer in begin   do not clean files   create if does not exist       not error if file exists
                
                appendix: at the end of any mode also can be b or t symbols
                    if it is b - binary reading/writing
                        t is -text reading/writing
                        Warning if you do not put some of this two , you can not say defenetely what mode will be choosed
                            but usually in  Windows it is binary.
            */

            //For example:
                //Open file to read:
               // $f = fopen("/home/user/file.txt","rt") or die("Error!"); 
                    //will be error because we do not have this file in this dir and r - mode will not create it neither
                //Open HTTP-connection to read:
                //$f = fopen("http://www.php.net/","rt") or die("Error!"); 
                    //will be an error because we do not have an access to do it

                //Open FTP-connection with pointing name of enter and password for writing:
               // $f = fopen("ftp://user:pass@example.com/a.txt","wt") or die("Error!");
                    //will be an error because we also do not have permisson!

                //difference between or and || in priority 
                    //we can not write $f = fopen("...smth..") || die();
                        //because || operator has very high priority
                        // so we should do it with analog or which has minor priority!

    //Difference text and binary mode:
                function makeHex($st){
                    for ($i = 0; $i < strlen($st); $i++){
                        $hex[] = sprintf("%02X", ord($st[$i])); //X - hexadecimal chars with Upper symbols
                    }
                    return join(" ",$hex);
                }                        

                $f = fopen(__FILE__, "rb"); //binary mode
                echo makeHex(fgets($f,100)), "<br/>\n";

                $f = fopen(__FILE__,"rt"); // text mode
                echo makeHex(fgets($f,100)), "<br/>\n";

                //result is different because in the case of text mode was translation of the end of the string
                    // in Unix it was not because there it is \n special symbol for dividing one string of file from another
                    // but in Windows it is \r\n so it can lose some symbols in the process of translation

            //Right and back slashes:
                    $path = "c:\\Windows\\system32\\drivers\\etc\\hosts";
                    $fp = fopen($path,"rt");
                    echo "Open $path!";
                    // this way very pathetic do not use it, or it will be complicated in the translational work between OS
                    //also it should be exactly double slash because of syntax of PHP
          
            //Unknown temporary files:
                //tmpfile() create tmpfile and then it will return descriptor of file 
                //name would not be able to use because it will not exist  , space that this kind of file use automaticly will be
                //free after it close its blocks and after program will be ended.
            
            //Close file
                //after end of the script it should happen automaticly ,but i prefer to give you an advice
                //do it by your own hand especially if you open dozens of hundreds files in loop
                    //fclose() if succes and file closed return true else false;
                    //FTP and HTTP connection should be always closed because of the needless pressure on the server
                fclose($fp);
            
    //Block reading/writing
                //fread() - read from file string of second argument value after it reads first block 
                // pointer goes until the end of the file and every string include block of length value(second argument)
                    // if you need read all the file in on string put to the second argument large number.

                //fwrite() - write to the variable in the first argument value of second argument and if it put 3 argument
                // it means length of string from the second argument and it writing whether until end of the second argument string
                //or until 3 argument byte.

                //fgets() - read one string ended \n if string is having more than length-1 bytes so returning length-1 symbols
                //  useful if you want go through all strings but even if it so file() faster
                
            
    // Reading CSV - file
                //
                $f  = fopen("head16`1_file.csv","rt") or die("Error!");
                for ($i = 0; $data = fgetcsv($f,1000,";"); $i++){
                    $num = count($data);
                    echo "<h3> String num $i (spaces : $num) : </h3>";
                
                for ($c = 0; $c < $num; $c++)
                    print("[$c] : $data[$c] <br/> ");
                }
                fclose($f);
                echo "<br/>";
            
            //Place of the pointer of current string 
                //feof() - returns true if reached end of the file
                $f = fopen("head16`1.txt","r");
                while(!feof($f)){
                    $st = fgets($f);
                    //know we can deal with string from the queue
                    echo $st."<br/>"; // printing every string
                }
                fclose($f); 
                // It is very slow construction if you need access to all of the strings in the file 
                //try to use file() or fread() for this goals


                //fseek() - put pointer of the file on byte with movement(from begin, from end or from current position)
                    //with HTTP OR FTP connection will not work

                    //Consts for $offset: 0 , 1 , 2
                        //Consts for $whence:
                            //SEEK_SET - begin of the file
                            //SEEK_CUR - current position
                            //SEEK_END - from the end of the file
                        //In the case of SEEK_CUR and SEEK_END $offset can be negative
                        //If succes case return 0 and in case of failure -1
                
                //ftell() - return current postion of the file
                    //for example you can save position with this function , work with file and then back to old position 
                            // that saved it the variable with function fseek()
                
                //ftruncate()
                //  clear file on length size 
                        $f = fopen("head16`1.txt","r+");
                        ftruncate($f,0);
                        fseek($f,0,SEEK_SET);
                            //Do not forget use fseek() to put descriptor to the inner of the file
                            //Cause if you will not it just put zeros to the pointer that we had been before
                            //so to avoid the pointer pointing on unexisted position use fseek()
                
                
                //Work with Path`s
                // basename() - returns name of the file from the path string
                echo "<pre>";
              
                    echo basename("/home/somebody/somefile.txt")." ";// returns somefile.txt
                    echo basename("/home/somebody/somefile.txt",".txt")." ";// do not check existence,just ouput right format file name
                    echo"<br />";
                //dirname()- return name of catalog from $path
                    echo dirname("/home/file.txt")." ";//output /home
                    echo"<br />";
                    echo dirname("../file.txt")." ";//ouput ..
                    echo"<br />";
                    echo dirname("/file.txt")." ";//output / - Unix \ - Windows
                    echo"<br />";
                    echo dirname("/")." ";//same as string above
                    echo"<br />";
                    echo dirname("file.txt")." ";//output .
                    echo"<br />";
                     // also we can put argument to know higher level path 
                            echo  dirname("/usr/opt/local/etc/hosts",2);// /usr/opt/local
                            echo"<br />";
                            echo dirname("/usr/opt/local/etc/hosts",3);// /usr/opt

                            echo "</pre>";

                    //tempnam() - generate unique name of file in $dir catalog
                          //  echo tempnam("/tmp","temp"); something like that C:\Users\dushu\AppData\Local\Temp\temA5B3.tmp
                          // if in argument dir will be empty so it gets it from temp dir of user
                          //or if putting to the argument . it will get current directory

                         // $fname = tempnam(".","temp").getmygid();
                          //$f = fopen($fname,"w");
                          
                    //realpath() - returns  root directory name
                    echo realpath(".");//C:\xampp\htdocs\KoterovCode\Part3(StandartFunctions)

            //Manipulating entire files
                            //copy() - copy file $src into the file $dst if $dst had already existed then it just rewrite it
                                //return true if copying successful and false if not
                            //rename() - rename file $oldname into $newname.If $newname had already existed , it register an error
                                // and return false. If success return true
                            //unlink() - delete file return true if success and false if failure.

            //Reading and Writing entire file
                            //file() - reading file at all,in binary mode, and return array-list each element means string in the file
                            //  it works a way faster than fopen()
                            /*
                            flags can get:
                                FILE_USE_INCLUDE_PATH - searching for in catalogs of libraries of PHP
                                    Paths to this catalogs inludes in include_path variable of php_ini file
                                    and can be catched by ini_get("include_path);
                                FILE_IGNORE_NEW_LINES - do not add \n symbols to the end of every element of an array
                                FILE_SKIP_EMPTY_LINES - pass through an empty strings
                            if need add more than one constant need use |

                            //file_get_contents() - read file at all and return all its data in one string 
                                //$offset allow us put byte shift where it starts to read, is not working for network connection
                                
                            //file_put_contents() - write data to the file 
                            // example: $data = file_get_contents("image.gif");
                            //  file_put_contents("newimage.gif",$data);

                                Consts for flags:
                                    FILE_APPEND - appending data to the end of the file
                                    FILE_USE_INCLUDE_PATH - searching file in include() and require() using libraries
                                    (Warning:do it very accurate,to avoid clearing important files)  

                                    LOCK_EX - function get a block of file until writing 


                //Reading INI-FILES
                                    //INI FILES are just text files with extension from several sections 
                                    //each section defined 0 and more key=>value pares 
                                    // example:
                                                [File Settings];File version = 0.2 (PP)
                                                    File_version = 7
                                                    Chip = LM9831
                                                [Scanner Software Settings]
                                                Crystal_Frequency = 48000000
                                                Scan_Buffer_Mbytes = 8 // Scan buffer size in Mbytes
                                                Min_Buffer_Limit = 1 // dont read scan below this point in k bytes
                                                two types of commentaries: ';' and '//;
                                    
                                    //parse_ini_file() - read INI-file and return associative array with key and value
                                    if $useSections false it ignore all the section and return just array with key and values
                                    if it is true then returns 2-dim array
                                    keys of 1-dim names of section and 2-dim names of parameters in sections
                                        for example here we organize access to the parameter $array[$sectionname][$parametername];

                                    consts for $mode argument:
                                        INI_SCANNER_NORMAL - normalization inner data of INI-File. 
                                        Strings "yes" and "true","on" will be interpretated as logically true
                                        Strings 0,empty strings,"false","off","no","none" logically false

                                        INI_SCANNER_RAW - all the types giving as it is without normalization

                                        INI_SCANNER_TYPED - all variations of true as true all for false as false,
                                            "null" to null , numbers if it is possible to integer


                                    Example of INI_FILE reading:
                            */
                                        $ini = parse_ini_file("head16`1.ini",true);
                                        echo "<pre>";print_r($ini);echo "</pre>";
                                        echo "Chip : {$ini['File Settings']['Chip']}"; 

                            //Other functions:
                                //fflush() - unnecessary to do it by your own , the function called automaticaly when file is closing
                                    // makes PHP write all the changes until this moment to the buffer
                                //set_file_buffer() - put size of buffer for file 
                                // like that set_file_buffer($f,0); - turn off bufferization so now, all the files will send to the disk or network directly
                                        //do not turn off buffer without any essential reason.

                            //Blocking file
                            //  flock() - managing function for  blocking processes
                            //  for descriptor make a block and mode of block that it wants to take
                                /*Consts for this mode:
                                LOCK_SH(1) - dividing block
                                LOCK_EX(2) - exception block
                                LOCK_UN(3) - turn off the block
                                LOCK_NB(4) - this const should be added to previous one if you do not want stopping on flock()
                                    in waiting process in stack and return management
                                    in the case of an error returns false and in other cases true.
                                    if mode without waiting called and block is failed in $wouldblock will write true;
                                
             Blocking types:
                              Exceptional block:
                        */ 
                                $file = "head16`1_text.txt"; // defining Name of the file

                                fclose(fopen($file,"a+b")); // open with mode that can create file in the process and allow us to write and close then


                                $f = fopen($file,"r+b") or die("Can not open the file!"); // then it opens this file or die
                                flock($f,LOCK_EX); // blocking other files to make this file and exception
                                    //do somthing.. 
                                fclose($f); // closing file.
                                    //Important, be careful with mode of writing in fopen() here we should not delete file
                                    //so after closing file r mode will not delete the file ,but w mode will.
                                    //if you need clear file anyway,you can use r+ mode and then ftruncate()
                                    //unfortunatele r+ require file to be existed ,if not error will happen
                                    //also even if amount of time between process is tiny you should not do as below
                                        //$f = fopen($file,file_exists($file)?"r+b":"w+b"); because it can be easily lost in file because of other process.
                                    //mode a+ can write data to file only to the end of file.So unrecommend to use it in other ways

                                    //before unblocking file you should be confident that process put into buffer
                                    //for example :
        /*
                                        $file = "head16`1_text.txt"; 

                                        fclose(fopen($file,"a+b")); 

                                        $f = fopen($file,"r+b") or die("Can not open the file!");

                                        while(true){
                                            flock($f,LOCK_EX);

                                            //do smth


                                            fflush($f);
                                            flock($f,LOCK_UN);
                                            sleep(10);

                                        }
                                        fclose($f);
        */

                                    //Well Conclusion about exception blocking:
                                    //Put it when you would like to change the file;
                                    //always use r,r+ or a+ open modes;
                                    //do not use w or w+
                                    //put fflush() before unlocking

                          
                            //Dividing block:
                            //  
                         //   $file = "file.txt"; //defining name of the file
                           // fclose(fopen($file,"a+b"));// create file with this name 
                           // $f =  fopen($file,"r+b") or die("Error"); // reading file
                            //flock($f,LOCK_SH);  // wait while writer is working
                                        //smth
                                        //here no one write
                                        //ok all things done unblocking
                            //fclose($f);
                         //Conclusion : if you want to read from file and do not want to change then it is better to use dividing block
                         //always use r or r+ mode
                         //unblock that fast as possible

                        //Block with forbiden delay:
                           // $f = fopen("file.txt","r+b");
                            //while(!flock($f,LOCK_EX+LOCK_NB)){ can exit only if block failed or successed
                            //    echo "Try to get an access to file<br>";
                            //    sleep(1);// wait 1 sec
                            //}
                            //work , file already blocked

                
                        //Example of counter:
                        //without blocking this task can be very problematic because of 
                        //large risk in the server when a lot of calls will call the same file.
                        //and counter can be crushed to zero 

                        $file = "head16`1_counter.dat"; //defining name of the file
                        fclose(fopen($file,"a+b"));// creating this file
                        $f = fopen($file,"r+t"); // open this file for read in text format
                        flock($f,LOCK_EX); // blocking it with exception block
                        $count = fread($f,100); // counter equal to value in file untill end of the file,length of string = 100 
                        $count++; // itterate counter
                        ftruncate($f,0); // clear file 
                        fseek($f,0,SEEK_SET); // set pointer to the begining
                        fwrite($f,$count); // write  to file counter
                        fclose($f); // unblocking file and close
                        echo "<br>".$count; // print counter


        //Manipulating catologs:
                    //  mkdir() - make directory with $perms permissions usually 0770
                //  mkdir("mydirect",0770);//creates subcatalog in current directory
                    //mkdir("/data");//creates catalog data in root catalog
            //mkdir("/home/davlat/.ssh/old",0700,true); argument with true value allow us create with this catalogs that does not exist
                    //if you want to create catalog in square catalog you need that permission,without it will be error
            
            //rmdir() - remove directory
            //chdir() - change current directory on pointed 
            //chdir("/tmp/data");// go through absolute path
            //chdir("./something"); // go through subcatalog of current catalog
            //chdir("something"); // same
            //chdir(".."); // go through parent catalog
            //chdir("~/data"); // go to /home/User/data  for Unix

            //getcwd() - return entire path to current catalog from (/) - root

        //Work with entry
        //  opendir() - open catalog $path, and return its identificator 
        // readdir() - read name of file or subcataolog from opened catalog with identificator $handle and return in string
            //$d = opendir("somewhere");
            //while(($e  =  readdir($d) !== false)){...}
        
        //closedir() - close catalog that was opend previosly , usualy php do it automaticly, but who knows.
        // rewinddir() - set pointer to the begin of the catalog and then you can use readdir() to read again

    //Example printing the Tree of catalog:
            function printTree($level = 1){
                $d = @opendir("."); // open directory and exit in case of error
                if (!$d) return; 
                while (($e = readdir($d)) !== false){
                    if($e == '.' || $e = '..') continue; // ignoring them
                    if (!@is_dir($e)) continue; // if it is directory also ignoring  because we need catalogs only
                    for ($i = 0; $i < $level ; $i++){ //printing whitespaces to move output
                        echo " ";
                    }
                    echo "$e\n"; // output current element
                    if(!chdir($e)) continue; //ignoring if current element is false 
                    printTree($level+1); //goes deeper through catalog
                    chdir(".."); // go back to parent directory
                    flush();  // puting data to browser, to avoid bug effect

                }
                closedir($d); // closing everything
            }

            echo "<pre>";// printing by fix font
            echo "/\n";
            chdir($_SERVER['DOCUMENT_ROOT']); //go to the root directory and printing it by our function
            printTree();
            echo "</pre>";

            //this way can not work fast when data amoun is large because of recursive way to do it

    //Getting catalogs inner data:
            //glob() return list of all the paths that indetical to $pattern
            //for example: glob("c:/windows/*exe); - return all .EXE files in Windows catalog with Paths
            //* - means any number of any symbols ,whereas  ? - one any symbol
            /*
                Consts:
                GLOB_ONLYDIR - just name of catalogs no files
                GLOB_BRACE - allow us to get an alternative 
                    glob("c:/windows/{*.exe,*ini}",GLOB_BRACE);
                GLOB-ERR - stop program if any error happens
                GLOB-MARK - add \ to that elements that are catalogs
                GLOB_NOSORT - forbid to sort elements, by default it sorts by ASC
                GLOB_NOCHECK - if no catalogs or file is idented ,return $pattern
                GLOB_NOESCAPE - return special symbols as it is withou ,\
            
            */
            echo "<pre>";  print_r(glob("c:/windows/{*.exe,*ini}",GLOB_BRACE));echo "</pre>";

?>