<?php

    class FilesystemException extends Exception {
        private $name;

        public function __construct($name){
            parent::__construct($name);
            $this->name = $name;
        }

        public function getName(){return $this->name;}
    }
    
    class FileNotFoundException extends FilesystemException {}

    class FileWriteException extends FilesystemException {}


    try {
        if (!file_exists("spoon"))
            throw new FileNotFoundException("spoon");
    }catch(FileSystemException $e){
        echo "Error in the working with file: {$e -> getMessage()}";
    }catch (Exception $e) {
        echo "Some other error: {$e ->getMessage()}";
    }

?>