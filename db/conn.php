<?php
    //Development Connection
     /*
    $host = '127.0.0.1';
    $db = 'attendance_db';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';
    */

    
    //Remote Database Connection
    $host = ' remotemysql.com';
    $db = 'gtP3lyrFvW';
    $user = 'gtP3lyrFvW';
    $pass = 'Qohw7Genmx';
    $charset = 'utf8mb4';
    

    $dsn="mysql:host=$host;dbname=$db;charset=$charset";


    try{
        $pdo= new PDO($dsn,$user,$pass);
       // echo 'Connected to database';
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        throw new PDOException($e->getMessage());
    
    }
    
    require_once 'crud.php';
    require_once 'user.php';
    $crud= new crud($pdo);
    $user= new user($pdo);

    $user->insertUser("admin","password");

?>

