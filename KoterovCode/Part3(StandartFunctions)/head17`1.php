<?php
    //Acces rights
        //UID = User ID 
        //GID = Grop ID
        // Rights: rwx
            /*
            '-' forbidden
            d means catalog
                example: drwxrwxr-x
                in numeric eqivalent :
                    --- - 0 
                    r-- - 4 (= 4*1 + 2*0 + 1*0)
                    r-x - 5
                    rwx - 7 
                    r - 4
                    x - 1
                    w - 2
                    
                    rwxr-xr-x 0755  because we considered exactly octodecimal system we write 0 before number
                    x - access to see atributes of inner data in catalog

                Catalog it is file where list of file and subcatalogs included
                 so we can say that catalog it is list of elements which each of them name=>refrence pares
                 every catalog has elements:
                  "." - physical address of its own address, 
                    so it is the reason that 
                    why:a/b and a/./././b equals
                
                  ".." - reference on parent catalog

                 w - give permission to create, rename  files in catalog.
                    you can rename catalogs but not to delete

                 r - allow to get list of names of files and subcatalogs,but does not give physical address of them

                 x - allow to know physical address of an element catalog by its name

                 to get access to any file , on it should be at least x - attribute
                  
                 example of how attributes get to files and catalogs, when UID = 10 GID = 20:
                    drwx------ 10 20 /home/username/ (=0700)
                    Home catalog it is catalog that becoming current after registration of user in system

                    Protected from changing the file:
                    -r--r--r-- 10 20 /home/username/somefile (=0444)

                    CGI-script:
                    -rwxr-xr-x 10 20 /home/cgi-bin/script.pl (=0755)
                    common script on Perl language 
                    for working(found by interpretator) in code first string should be #!/usr/bin/perl
                
                    System utility:
                        -rwxr-xr-x 0 0 /bin/mkdir (=0755)
                        mkdir - it is program to create catalogs. It is allowed to all users, and this is why it is in /bin directory
                        Owner of this program is Super user but for all users allowed read and execute file, so all users can create directory

                    Closed system files:
                        -r------- 0 0 /etc/shadow (=400)
                        this file has all the password from entire system(hash codes) so it it the reason for maximum defence
                        No one ,except administrator,can see inner data

                Function PHP for it:
                    fileowner() - return numeric identificator of user owned this file 
                    chown() - try to change owner of the file on pointed. But can be used by administrator only
                    filegroup() - return GID of the file
                    chgrp() - change group for file, owner can change group but not for any,just for which member is.
                    fileperms() - return numeric equivalent of access to file type of file first 7 bits and access rights next 9 bits
                        recomended translate to octo and binary system of numbers
                        example below:

            */  $perms = fileperms("head17`1.php");
                echo decoct($perms);
                echo "<br>";echo decbin($perms)."<br>";
                /*
                 Mask           Description
                 1000000        Usual file
                 1100000        Socket
                 1010000        Symbolic refrence
                 0110000        Special block file
                 0100000        Catalog
                 0010000        Special symbol file
                 0001000        FIFO-chanel
                 */

                //Defining type of file:
                $perms = fileperms("head17`1.php");

                if  (($perms & 0xC000) == 0xC000)echo "Socket";
                elseif (($perms & 0x8000) == 0x8000)echo "Usual file";
                elseif (($perms & 0x6000) == 0x6000)echo "Special block file";
                elseif (($perms & 0x4000) == 0x4000)echo "Catolog";
                elseif (($perms & 0x2000) == 0x2000)echo "Special symbolic file";
                elseif (($perms & 0x1000) == 0x1000)echo "FIFO-file";
                else
                    echo "Unknown file";
                echo "<br>";

            //stat() - getting information about file from operation system about attributes of pointed files and returning in array
                    /*
                    0 - machine
                    1 - number of Knot inode
                    2 - attribute of file protection
                    3 - number of synonyms(strong reference) of file
                    4 - UID of owner
                    5 - GID 
                    6 - type of machine
                    7 - size of file in bytes
                    8 - time of last access in sec from 1 january 1970
                    9 - time of last modification of inner data
                    10 - time of last changing of an attributes of file
                    11 - size of block
                    12 - number of blocks which are not free
                    */
            //lstat() - about link
            //filesize() - returns file size.
            //filemtime() - returns modification time
            $mtime  = filemtime(__FILE__);
            echo "Last modification of page:". date("Y-m-d H:i:s");
            
            //fileatime()
                //return time of last access to file
            //filectime() - return time of last changing of an attribute of file
            
            //touch() - set time of modification from putted file equals to $timestamp. if second argument unset,then set current time;
            // if file does not exist , then created with no data in

            //Defining type of file
                //filetype() - return string that describe type of file with $filename name.If does not exist return false
                    /*
                    file - usual file
                    dir - catalog
                    link - symbolic link
                    fifo - FIFO - file 
                    block - block oriented 
                    char - symbolic oriented
                    unknown  - unknown type of file 

                    */
                    // is_file() - true  if usual file
                    // is_dir() - true if catalog
                    // is_link() - true if symbolic link

                    //is_readable() - true if file can be readed
                    //is_writeable() - true if file can writed
                    //is_executable() - true if file can be executed
                    //file_exists()  - true if file exists
                        /**
                         Do not use code below:
                            $fname = "/etc/passwd;
                            if(!file_exists($fname)){
                                $f = fopen($fname,"w");
                            } else {
                                $f = fopen($fname,"r");
                            }
                        Because in the moment between file_exists() and fopen in "w" mode exists time when another process can be messed in
                         */
                
            //Links:
            /*
             *Aliases for file  is links
                Types of links:
                    Symbolic - it is just binary file which has link on main file.  You can easily delete it,do not care because main file will not suffer
                        readlink() - return name of the main file which connected with its synonim 
                        symlink() - create symbolic link on object putted in argument
                        lstat() - gives info about symbolic link
                    Strong links - it is kind of link that does not depend on main link
                            even if you delete main link it will not change other links of this type
                            faster than symbolic
                        link() - create this hard link
                        
             */

            


?>