<?php
    require_once "interfaces.php";

    class FileNotFoundException extends Exception 
        implements IFileException {}

    class SocketException extends Exception 
        implements INetException {}

    class WrongPassException extends Exception 
        implements IUserException {}

    class NetPrinterWriteException extends Exception 
        implements IFileException , INetException {}

    class SqlConnectException extends Exception
        implements IInternalException , IUserException {}

?>