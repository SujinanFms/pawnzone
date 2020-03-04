<?php 
    session_start();
    include_once('config.php');

    //เช็คว่ามีการรับค่ามาจากปุ่ม login แล้วหรือยัง
    if (isset($_POST['login'])) { 
        $username = $_POST['username']; //รับค่าusername มาจาก name=username
        $password = $conn->real_escape_string($_POST['password']); //real_escape_string เป็นฟังก์ชันสำหรับเลี่ยงการใช้ตัวอักขระพิเศษในคำสั่ง sql

        //เลือกทั้งหมดจากตาราง member โดยมีเงื่อนไขว่า Username จะต้องเท่า $username ที่ส่งมา และ Password จะต้องเท่ากับ $password ที่ส่งมา
        $sql = "SELECT * FROM `members` WHERE `MBusername` = '".$username."' AND `MBpassword` = '".$password."' ";
        $result = $conn->query($sql); //ทำการ query หรือประมวลผล $sql

        //เช็คการ login
        if($result->num_rows > 0){
            print_r($result);
            $row = $result->fetch_assoc(); //fetch_assoc() คืนค่าข้อมูลในฐานข้อมูลที่อยู่ในลักษณะเป็นแถวหรือว่าเป็น record ที่อยู่ในรูปแบบของอาร์เรย์
            
            $_SESSION['fname'] = $row['MBfname']; //ประกาศ session เอา Name มาใช้งาน หรือประกาศตัวแปร name ไว้เพื่อส่งค่า
            $_SESSION['position'] = $row['MBstatus']; //ประกาศ session เอา Status มาใช้งาน หรือประกาศตัวแปร status ไว้เพื่อส่งค่า
            
            if($_SESSION["position"]=="เจ้าของร้าน"){ //ถ้าเป็น admin ให้กระโดดไปหน้า index.php
                header('location:index.php');
            }

            if($_SESSION["position"]=="พนักงาน"){ //ถ้าเป็น member ให้กระโดดไปหน้า index_user.php
                header('location:index_user.php');
                }
            
        } else {
            //echo 'Invalid username or password, please try again';
            echo "<script>";
                echo "alert(\" username หรือ  password ไม่ถูกต้อง\");"; 
                echo "window.history.back()"; //คำสั่งสำหรับการย้อนกลับไปยังหน้าที่ผ่านมา
            echo "</script>";

        }

        
    }

    
?>