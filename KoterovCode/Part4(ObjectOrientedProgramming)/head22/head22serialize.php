<?php
    class cls1{
        public $var1;

        public function __construct($var1){
            $this->var1 = $var1;
        }
    }


    $obj = new cls1(100);
    $text = serialize($obj);

    $fd = @fopen("head22text.obj","w");
    if(!$fd)exit("Can not open the file");
    fwrite($fd,$text);
    fclose($fd);
?>