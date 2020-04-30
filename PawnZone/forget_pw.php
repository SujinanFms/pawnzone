<?php 
    include_once('config.php');
    if ($_POST) {
        $email = $_POST['email'];

        //ประมวลผลคำสั่ง sql ไปยังฐานข้อมูลที่ได้เลือกไว้
        $sql = mysqli_query($conn,"SELECT * FROM `members` WHERE  `email` = '".$email."' ") or die(mysqli_error($conn)); //returns the last error description
        $count = mysqli_num_rows($sql); //นับจำนวนแถวทั้งหมดของ $sql  ส่งคืนจำนวนแถวที่มีอยู่ในชุดผลลัพธ์หรือฐานข้อมูล(ที่queryมา) เพื่อตรวจสอบว่ามีข้อมูลไหม
        $row = mysqli_fetch_array($sql); //คืนค่าข้อมูลกลับไปยัง $sql โดยเก็บไว้เป็นarray

        if ($count>0) {
            echo "<script>";
            echo "alert(\" Your password send successful. Send to your mail\");"; 
                echo "window.history.back()";
            echo "</script>";


            $strTo = $row["Email"];
            $strSubject = "Your Account information username and password.";
            $strHeader = "Content-type: text/html; charset=windows-874\n"; // or UTF-8 //
            $strHeader .= "From: sakulalnwza@gmail.com";
    		$strMessage = " ";
			$strMessage .= "Welcome : ".$row["MBfname"]."<br>";
			$strMessage .= "Username : ".$row["MBusername"]."<br>";
			$strMessage .= "Password : ".$row["MBpassword"]."<br>";
			$strMessage .= "=================================<br>";
			$strMessage .= "ห้างทองอินเตอร์เนชั่นแนล<br>";
			mail($strTo,$strSubject,$strMessage,$strHeader); 
        }else {
            echo "<script>";
                echo "alert(\" Not Found Your Email!\");"; 
                echo "window.history.back()";
            echo "</script>";

        }
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Forget Password</title>
</head>
<body>
    <div class="logo">
        <a href="login.php"><img src="img/logo.png" alt="logo"></a>
    </div>
    <div class="container col-md-4">
        <h1>Forget Password</h1>
        <br>
        <form action="forget_pw.php" method="POST" >
            <div class="form-group ">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Your Email" name="email">
            </div>
            <div class="submit">
            <button type="submit" class="btn btn-primary" name="submit" text-align="center">Get code with email</button>
            </div> 
            <br>   
             <div class="back-login" text-align="center">
                <a href="login.php" >กลับสู่หน้า Login</a>
             </div>
            </div>
        </form>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html> 