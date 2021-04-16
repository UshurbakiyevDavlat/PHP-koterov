<?php
    //Using external programs functions
//system() - execute external programs by command in the argument, if second argument is existing (variable) ,function return code of reverse process
    //use only if you completely sure about the command, definetely try it firstly
    //as it was said before output goes to the browser , if you do not want it use popen() or exec()
    // if you want to output to the browser directly,for example GIF-image , use passthru()
//exec() - do the same as system() but does not ouput to the browser, return last stringfrom output scanner of executed program
    // if second argument array set , then it put list of strings from the ouput of the executed program
        // \n is deleted,if array had already included some data so it pop new data to the end of the array,do not rewrite them!
//passthru() - this function execute the program from first argument and put output of it to the browser directly
    //example:

        /*   
            header("Content-type:image/jpeg");
            passthru("./convert -blur 3 input.jpg -");

        header() - tells to the browser that data will be in JPEG format ,and calling convert utility
                    of the command line convert do the blur of the JPEG file (diametr of blur 3 px)
                    Because we putted - symbol instead of name of file result putted to the output scanner
                    and then passthru put it to the browser directly.
        */

        //Backticks - do the program it it and return result of it.

            $string  = `dir`;
            echo $string."<br/>";

       //escapeshellcmd() - defend all special characters with adding slash before each of them
        //for example:
            //system("cd".escapeshellcmd($toDirectory));
            //$toDirectory from user form or coockies 
            //if you will forget about escapeshellcmd() then hacker can do a lot of bad things, by change $toDirectory 
        //escapeshellarg() - do the same but try to not add slashes to the string adding "" instead and do it only before
        //those symbols that need to do it with ($,`,\)

    //Channels
            //Temporary files:
            /*
                $tmp = tempnam(".","");
                file_put_contents($tmp,"What do you think i am ,human?");
                system("commandToExecute<$tmp");
                unlink($tmp);
            */

            //Open the channel
            // popen() - execute the program in $cmd within putted mode, "w"- for the input , "r" - for the output
                //starting process (paralel of script) in reading mode
              /*  $fp =  popen("/usr/sbin/sendmail -t -i","wb");
                //sending to the process the body of our letter in input mode
                fwrite($fp,"From:our script <script@mail.ru>\n");
                fwrite($fp,"To:someuser@mail.ru\n");
                fwrite($fp,"Subject:here is myself\n");
                fwrite($fp,"\n");
                fwrite($fp,file_get_contents(__FILE__));
                pclose($fp);
            */
    //Deadlock - it is when process and script wait each other and no one can do another thing
        //example
            //info about standart scanner
            $spec = [
                0 => ["pipe","r"],//stdin
                1 => ["pipe","w"],//stdout
                2 => ["file","/tmp/error-output.txt","a"]//strerr
            ];
            //exectuting process
            $proc = proc_open("cat",$spec,$pipes);
            //then it is possible to write to $pipes[0] and read from $pipes[1]
            for ($i = 0; $i < 100 ; $i++){
                fwrite($pipes[0],"Hello world #$i!\n");
            }
            fclose($pipes[0]);
            while (!feof($pipes[1]))echo fgets($pipes[1],1024);
            fclose($pipes[1]);

            proc_close($proc);

            //usually if you will read from pipe[0] and write to pipe[1], it will be deadlock because
                // utility put data to the buffer, but buffer has 10 kbytes only so when it will be full
                // then it waits while something read the data it got free the buffer 
                // but script at the same time waits while it will be free space to write some data,
                //so no one can move  
                //proc_nice() - change priority of the process
                //proc_terminate() - taughtly ended process of the proc_open()
?>