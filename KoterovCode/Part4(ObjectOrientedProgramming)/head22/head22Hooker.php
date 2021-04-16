<?php

class Hooker{
    public $opened = 'opened';
    public function method(){
        echo "Common method!";
    }
    private $vars = array();

    public function __get($name){
        echo "intercepting non-exist property $name. <br />\n";
        return isset($this->vars[$name]) ? $this->vars[$name]:null;

    }

    public function __set($name,$val){
        echo "set non-exist property $name equal to '$val'. <br />\n";
        return ($this->vars[$name] = trim($this->vars[$name]));

    }

    public function __call($name,$args){
        echo "Intercepting : calling $name with args: ";
        var_dump($args);
        return $args[0];
    }

    
    


}


?>