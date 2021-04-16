<?php
    $dir = new DirectoryIterator('.');
    foreach ($dir as $file) {
        echo $file."<br />";
    }
        /*
            $file object here is implementing methods which part is in the table. 
                getFilename() - return name of the file or subcatalog
                getPath() - return name of the catalog
                getPathname() - return path to the file,included name of catalog , and also name of file or subcatalog
                getSize() - return name of catalog(without name and subcatalog)
                getType() - return type of current element catalog dir for catalog and file
                isDir() - return TRUE, if current element is catalog and false in other case
                isFile() - return TRUE, if current elemetn is file  and false in other case

        
        */

?>