<?php

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'coursesProject';

    try{
        $con = new PDO("mysql:host=$host;dbname=$db;user=$user;pass=$pass" , $user , $pass);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $error){
        echo $error->getCode();
    }

?>
