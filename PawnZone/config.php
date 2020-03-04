<?php
    //1.create connection (สร้างไฟล์เชื่อมต่อกับฐานข้อมูล)
    $host = "localhost";
    $db_username = "root";
    $db_passwd = "";
    $db_name = "pawnzone";

    $conn;

    // Check connection
    try {
         $conn = mysqli_connect($host, $db_username, $db_passwd, $db_name); //ทำการเชื่อมต่อฐานข้อมูล mysql
    } catch (Exception $exp) {
        echo "Connection error: " . $exp.getMessage();
     }
?>