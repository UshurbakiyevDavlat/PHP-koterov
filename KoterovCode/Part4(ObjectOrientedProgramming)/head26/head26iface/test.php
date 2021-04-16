<?php
    require_once "exceptions.php";

    try{
        printDocument();

    } catch (IFileException $e){
        echo "File error: {$e->getMessage()}<br />";
    } catch (Exception $e) {
        echo "Unknown error: <pre>",$e,"</pre>";
    }

    function printDocument(){
        $printer = "//./printer";
        
        if (!file_exists($printer))
            throw new NetPrinterWriteException($printer);
    }

?>