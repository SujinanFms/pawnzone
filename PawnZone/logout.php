<?php 
    session_start();
    session_destroy(); //ล้าง session ทุกอย่างทิ้ง
    header('location:login.php'); //คำสั่งให้กลับไปหน้า login
?>