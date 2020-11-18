<?php

    require '../vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable('../');
	$dotenv-> load();

    function OpenCon(){
        $dbhost = getenv('DB_HOST');
        $dbuser = getenv('DB_USER');
        $dbpass = getenv('DB_PASS');
        $db = getenv('DB');
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
        return $conn;
    }
 
    function CloseCon($conn){
        $conn -> close();
    }
   
?>