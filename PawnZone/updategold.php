<meta charset="UTF-8">
<?php
// เชื่อมต่อ database: 
include('config.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้านี้

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
    $gid = @$_POST['update_GoldID'];
    $g_typegold = @$_POST['update_goldtype'];
    $g_goldpawnday = @$_POST['update_pawnday'];
    $g_goldstatus = @$_POST['update_goldStatus'];
    $g_weightGold = @$_POST['update_weight'];
    $g_price = @$_POST['update_price'];
    $g_rate = @$_POST['update_rate'];
    $g_pay = @$_POST['update_payrate'];
	$g_duePayment = @$_POST['update_duepayment'];
	$g_Golddetail = @$_POST['gold_detail'];
	
	
	//ฟังก์ชั่นวันที่
	date_default_timezone_set('Asia/Bangkok');
	$dated = date("Ymd");	
	//ฟังก์ชั่นสุ่มตัวเลข
	$numrand = (mt_rand());
	 //  ตัวแปรรับค่าจากฟอร์ม
	 $goldimg = (isset($_POST['goldimg']) ? $_POST['goldimg'] : '');
	 //เพิ่มไฟล์
	 $upload2=$_FILES['goldimg'];
 
	 if($upload2 <> '') {   //not select file
	 //โฟลเดอร์ที่จะ upload file เข้าไป
		 $path="goldimg/";  
	 //เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล
		 $type2 = strrchr($_FILES['goldimg']['name'],".");
		 
	 //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
		 $newname2 = $dated.$numrand.$type2;
		 $path_copy2=$path.$newname2;
		 $path_link2="goldimg/".$newname2;
 
	 //คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
		 move_uploaded_file($_FILES['goldimg']['tmp_name'],$path_copy2);  	
	 }
	

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
	
	$sql = "UPDATE golds  SET  
			TypeGold='$g_typegold' ,
			Goldpawnday='$g_goldpawnday' , 
			GoldStatus='$g_goldstatus' ,
			WeightGold='$g_weightGold' ,
			Price='$g_price' ,
            Rate='$g_rate' ,
            Pay='$g_pay' ,
            DuePayment='$g_duePayment' ,
			GoldImg = '$newname2' ,
			Golddetail = '$g_Golddetail'
			WHERE GoldID ='$gid' ";

$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($result));

mysqli_close($conn); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('Update Succesfuly');";
	echo "window.location = 'gold.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to Update again');";
        echo "window.location = 'updategold.php'; ";
	echo "</script>";
}
?>