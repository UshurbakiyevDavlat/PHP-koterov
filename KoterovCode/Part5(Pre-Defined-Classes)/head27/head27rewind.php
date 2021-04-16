<?php
$dirname = "./";
$cat = dir($dirname);

$file_ctr = 0;
$dir_ctr = 0;

while(($file = $cat->read())!== false){
    if(is_file($dirname.$file))$file_ctr++;
    else $dir_ctr++;
}

$dir_ctr-=2;

echo "Catalog $dirname include $file_ctr files and $dir_ctr subcatalogs<br />";

$cat ->rewind();

while(($file = $cat->read())!== false){
    if($file != "." && $file !="..")
        echo $file."<br />";
}

$cat->close();

?>