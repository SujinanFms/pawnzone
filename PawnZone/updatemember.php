<?php
    // เชื่อมต่อ database: 
    include('config.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้านี้

    if (isset($_POST['edit'])) {
    //สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
    $MbID = $_POST['update_MbID'];
    $MBusername = $_POST['username'];
    $MBpassword = $conn->real_escape_string($_POST['pw']);
    $conpassword = $conn->real_escape_string($_POST['ConfirmPW']);
    $MBfname = $_POST['fname'];
    $MBlname = $_POST['lname'];
    $MBbday = $_POST['bday'];
    $MBaddress = $_POST['add'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $MBidcard = $_POST['idcard'];
    $MBstatus = $_POST['position'];
    

    //ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
    if($_POST['pw'] != $_POST['ConfirmPW']) {
        echo "<script type='text/javascript'>";
        echo"alert('กรุณากรอกรหัสให้ตรงกัน!');";
        echo"window.location = 'profile.php';";
        echo "</script>";
        exit();
    }     else {

        $date = date("Ymd");	
        //ฟังก์ชั่นสุ่มตัวเลข
            $numrand = (mt_rand());
        //  ตัวแปรรับค่าจากฟอร์ม
        $userpic = (isset($_POST['userpic']) ? $_POST['userpic'] : '');
    
        //เพิ่มไฟล์
        $upload=$_FILES['userpic'];
        if($upload <> '') {   //not select file
        //โฟลเดอร์ที่จะ upload file เข้าไป 
        $path="userpic/";  
        
        //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
        $type = strrchr($_FILES['userpic']['name'],".");
            
        //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
        $newname = $date.$numrand.$type;
        $path_copy=$path.$newname;
        $path_link="userpic/".$newname;
        
        //คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
        move_uploaded_file($_FILES['userpic']['tmp_name'],$path_copy);  	
            }



        $update_member = "UPDATE members SET 
        MBusername = '$MBusername',
        MBpassword = '$MBpassword ',
        MBpassword = '$conpassword ',
        MBfname = '$MBfname ',
        MBlname = '$MBlname ',
        MBbday = '$MBbday ',
        MBaddress = '$MBaddress ',
        phone = '$phone',
        email = '$email',
        MB_IDcard = '$MBidcard',
        MBstatus = '$MBstatus',
        MBpicture = '$newname'
        WHERE MbID = '$MbID' ";
                $result = mysqli_query($conn, $update_member) or die("Error:" .mysqli_error($conn));
                if($result){
                    echo "<script> alert('---Update ข้อมูลสำเร็จ---'); location='profile.php';</script>";
                }
    }
    mysqli_close($conn); //ปิดการเชื่อมต่อ database 

    }
?>