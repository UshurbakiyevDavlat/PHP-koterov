<?php
    class InsensitiveArray implements ArrayAccess {
        private $a = [];

        public function offsetExists($offset){
            $offset = strtolower($offset);
            $this->log("offsetExists('$offset')");
            return isset($this->a[$offset]);
        }

        public function offsetGet($offset){
            $offset = strtolower($offset);
            $this->log("offsetGet('$offset')");
            return $this->a[$offset];
        }
        
        public function offsetSet($offset,$data){
            $offset = strtolower($offset);
            $this->log("offsetSet('$offset','$data')");
            return $this->a[$offset];
        }
        
        public function offsetUnset($offset){
            $offset = strtolower($offset);
            $this->log("offsetUnset('$offset')");
            unset($this->array[$offset]);
        }

        public function log($str){
            echo "$str<br />";
        }
    }

    $a = new InsensitiveArray();
    $a -> log("##Setting values(operator =).");
    $a['php'] = 'There is more than one way to do it.';
    $a['php'] = 'It should rewrite.';
    $a->log("##Getting value of [] operator");
    $a->log("<b>value:</b> '{$a['php']}'");
    $a->log("##Checking existence of element (operato isset())");
    $a->log("<b>exists</b>".(isset($a['php'])?"true":"false"));
    $a->log("##Deleting element (operator unset()).");
    unset($a['php']);
    

?>