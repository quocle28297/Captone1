<?php
    $host = "localhost";
    $username ="root";
    $password= "";
    $database="qlphongtro";
    $mysqli = new mysqli($host,$username,$password,$database);
    // thiet lap tieng viet
        $mysqli -> set_charset('utf8');
    // thong bao loi ket noi 
    if(!$mysqli){
        die("Connection failed: ". $mysqli -> error );
    }
?>