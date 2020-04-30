<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('config.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้านี้

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
    $uid = @$_POST['update_CusID'];
    $ufname = @$_POST['firstname'];
    $ulname = @$_POST['lastname'];
    //  $udpawn = @$_POST['pawnday'];
    $uaddress = @$_POST['address'];
	$utel = @$_POST['tel'];
	

	 //ฟังก์ชั่นวันที่
	 date_default_timezone_set('Asia/Bangkok');
	 $dated = date("Ymd");	
 //ฟังก์ชั่นสุ่มตัวเลข
	 $numrand = (mt_rand());
 //  ตัวแปรรับค่าจากฟอร์ม
	 $cusimg = (isset($_POST['cusimg']) ? $_POST['cusimg'] : '');
 //เพิ่มไฟล์
	 $upload1=$_FILES['cusimg'];

	 if($upload1 <> '') {   //not select file
 //โฟลเดอร์ที่จะ upload file เข้าไป 
	 $path="cusimg/";  
	 
 //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
	 $type = strrchr($_FILES['cusimg']['name'],".");
	 
	 
 //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
	 $newname1 = $dated.$numrand.$type;
	 $path_copy1=$path.$newname1;
	 $path_link1="cusimg/".$newname1;
 
 //คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
	 move_uploaded_file($_FILES['cusimg']['tmp_name'],$path_copy1);  	
 }

	

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
	
	$sql = "UPDATE customer  SET  
			CusFname='$ufname' ,
			CusLname='$ulname' , 
			-- Cuspawnday='$udpawn' ,
			CusAddress='$uaddress' ,
			Tel='$utel' ,
			CusImg='$newname1'
			WHERE CusID ='$uid' ";

$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($result));

mysqli_close($conn); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('Update Succesfuly');";
	echo "window.location = 'customer_user.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to Update again');";
        echo "window.location = 'updatecus_user.php'; ";
	echo "</script>";
}
?>