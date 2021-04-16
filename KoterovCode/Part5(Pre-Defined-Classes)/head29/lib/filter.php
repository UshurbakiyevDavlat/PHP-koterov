<?php
    class ExtensionFilter extends FilterIterator {
        private $ext;
        private $it;

        public function __construct(DirectoryIterator $it , $ext){
            parent :: __construct($it);
            $this->it = $it;
            $this->ext = $ext;
        }

        public function accept(){
            if(!$this->it->isDir()){
                $ext = pathinfo($this->current(),PATHINFO_EXTENSION);
                return $ext != $this->ext;
            }
            return true;
        }
    }

?>