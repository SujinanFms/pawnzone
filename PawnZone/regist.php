<?php 
    session_start();
    include_once('config.php');

    

    if (isset($_POST['regist'])) {
        //รับค่ามาจากฟอร์ม
        $username = @$_POST['username'];
        $password = $conn->real_escape_string($_POST['password']);
        $conpw = $conn->real_escape_string($_POST['ConfirmPW']);
        $fname = @$_POST['fname'];
        $lname = @$_POST['lname'];
        $bday = @$_POST['bday'];
        $address = @$_POST['Add'];
        $phone = @$_POST['phone'];
        $email = @$_POST['email'];
        $idcard = @$_POST['idcard'];
        $position = @$_POST['position'];
        // $userpic = @$_POST['userpic'];

        //ฟังก์ชั่นวันที่
        date_default_timezone_set('Asia/Bangkok');
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


        
        //เช็คการ confirm password
        if($_POST['password'] != $_POST['ConfirmPW']) {
            echo "<script type='text/javascript'>";
            echo"alert('กรุณากรอกรหัสให้ตรงกัน!');";
            echo"window.location = 'regist.php';";
            echo "</script>";
            exit();
       
        } else { 
        $sql = "INSERT INTO members (MBusername,MBpassword,MBfname,MBlname,MBbday,MBaddress,phone,email,MB_IDcard,MBstatus,MBpicture)
        VALUES ('$username','$password','$fname','$lname','$bday','$address','$phone','$email','$idcard','$position','$newname') ";

         $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($sql));
        }
         
        //ปิดการเชื่อมต่อ database
        mysqli_close($conn);

        if ($result){
            if( $position == "เจ้าของร้าน"){
                echo "<script type='text/javascript'>";
                echo"alert('คุณลงทะเบียนสำเร็จ!');";
                echo"window.location = 'profile.php';";
                echo "</script>";
            } else if ( $position == "พนักงาน"){
                echo "<script type='text/javascript'>";
                echo"alert('คุณลงทะเบียนสำเร็จ!');";
                echo"window.location = 'personal.php';";
                echo "</script>";
            } 
        }
        else {
            //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
            echo "<script type='text/javascript'>";
            echo "alert('error!');";
            echo"window.location = 'regist.php'; ";
            echo"</script>";
        }

    
}

?>

    




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PawnZone</title>
    <link rel="stylesheet" href="css/css.css">
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://kit.fontawesome.com/83fa38a1a9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <?php isset($_SESSION['MbID']); ?>
                    <h2>คุณ <?php echo $_SESSION['fname']; ?></h2>
                    <h2>สถานะ :  <?php echo $_SESSION['position']; ?></h2>
                    <strong><?php echo $_SESSION['fname']; ?></strong>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="index.php">
                        <i class="fas fa-home"></i>
                        หน้าหลัก
                    </a>
                </li>

                <li>
                    <a href="pawngold.php">
                        <i class="fas fa-edit"></i>
                        จำนำทอง
                    </a>
                </li>
                <li>
                    <a href="#infoSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-chalkboard-teacher"></i>
                        ประวัติ
                    </a>
                    <ul class="collapse list-unstyled" id="infoSubmenu">
                        <li>
                            <a href="gold.php">
                                <i class="far fa-file-alt"></i>
                                ประวัติทองคำ
                            </a>
                        </li>
                        <li>
                            <a href="customer.php">
                                <i class="far fa-file-alt"></i>
                                ประวัติลูกค้า
                            </a>
                        </li>
                        <li>
                            <a href="Hispawngold.php">
                                <i class="far fa-file-alt"></i>
                                ประวัติจำนำทอง
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="payment.php">
                        <i class="fas fa-file-invoice-dollar"></i>
                        ชำระเงิน
                    </a>
                </li>
                <li>
                    <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-user-cog"></i>
                        จัดการบุคคล
                    </a>
                    <ul class="collapse list-unstyled" id="userSubmenu">
                        <li>
                            <a href="profile.php">
                                <i class="fas fa-user-edit"></i>
                                เจ้าของร้าน
                            </a>
                        </li>
                        <li>
                            <a href="personal.php">
                                <i class="fas fa-user-edit"></i>
                                พนักงาน
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#reportSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-file-import"></i>
                        ออกรายงาน
                    </a>
                    <ul class="collapse list-unstyled" id="reportSubmenu">
                        <li>
                            <a href="report.php">
                                <i class="fas fa-hand-holding-usd"></i>
                                รายได้สุทธิ
                            </a>
                        </li>
                        <li>
                            <a href="report1.php">
                            <i class="fas fa-ring"></i>
                                จำนวนทองทั้งหมด
                            </a>
                        </li>
                        <li>
                            <a href="report2.php">
                            <i class="fas fa-ring"></i>
                                ไถ่ถอน-นำไปหลอม
                            </a>
                        </li>
                        <li>
                            <a href="report3.php">
                            <i class="fas fa-ring"></i>
                                จำนวนทองคงเหลือ
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="logout">
                <a href="logout.php"> 
                    <input type="submit" class="btn btn-warning" name="logout" value="Logout"><br>
                </a>
            </div>

        </nav>

        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn">
                        <i class="fas fa-align-left"></i>
                    </button>
                
                   

                </div>
            </nav>
            
            <form class="regist-form needs-validation" action="regist.php" method="post" enctype="multipart/form-data" novalidate>
            <h2>Register</h2>
                <div class="form-group col-sm-6">
                    <label for="username">username : </label>
                    <input type="username" name="username" id="username" class="form-control" placeholder="username" required>
                    <div class="valid-feedback">
                        คุณกรอกข้อมูลเรียบร้อยแล้ว!
                    </div>
                    <div class="invalid-feedback">
                        กรุณากรอก username!
                    </div>
                </div> 

                <div class="form-group col-sm-6">
                    <label for="fname">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="password" name="password" required>
                <div class="valid-feedback">
                        คุณกรอกข้อมูลเรียบร้อยแล้ว!
                    </div>
                    <div class="invalid-feedback">
                        กรุณากรอกรหัสยืนยันตัวตน!
                    </div>
                </div>

                <div class="form-group col-sm-6">
                <label  for="fname">Confirm Password:</label>
                    <input type="password" class="form-control" id="ConfirmPW" placeholder="password again" name="ConfirmPW" required>
                <div class="valid-feedback">
                        คุณกรอกข้อมูลเรียบร้อยแล้ว!
                    </div>
                    <div class="invalid-feedback">
                        กรุณากรอกรหัสยืนยันตัวตนอีกครั้ง!
                    </div>
                </div>

                <div class="form-group col-sm-6">
                <label for="fname">First name:</label>
                    <input type="text" class="form-control" id="fname" placeholder="ชื่อ" name="fname" required>
                <div class="valid-feedback">
                        คุณกรอกข้อมูลเรียบร้อยแล้ว!
                    </div>
                    <div class="invalid-feedback">
                        กรุณากรอกชื่อจริง!
                    </div>
                </div>

                <div class="form-group col-sm-6">
                <label for="lname">Last name:</label>
                    <input type="text" class="form-control" id="lname" placeholder="นามสกุล" name="lname" required>
                <div class="valid-feedback">
                        คุณกรอกข้อมูลเรียบร้อยแล้ว!
                    </div>
                    <div class="invalid-feedback">
                        กรุณากรอกนามสกุล!
                    </div>
                </div>

                <div class="form-group col-sm-6">
            <label for="bday">Date of Birth:</label>         
                <input type="date" class="form-control" id="bday"  name="bday" required>
            <div class="valid-feedback">
                    คุณกรอกข้อมูลเรียบร้อยแล้ว!
                </div>
                <div class="invalid-feedback">
                    กรุณากรอก วัน/เดือน/ปี เกิด!
                </div>
            </div>

            <div class="form-group col-sm-6">
            <label for="Add">Address:</label>
                <input type="textarea" class="form-control" id="Add" placeholder="ที่อยู่" name="Add" required>
            <div class="valid-feedback">
                    คุณกรอกข้อมูลเรียบร้อยแล้ว!
                </div>
                <div class="invalid-feedback">
                    กรุณากรอกที่อยู่!
                </div>
            </div>

            <div class="form-group col-sm-6">
            <label for="phone">Phone number:</label>
                <input type="tel" class="form-control" placeholder="เบอร์โทรศัพท์"  id="phone"  name="phone" pattern="^0([8|9|6])([0-9]{8}$)" required>
            <div class="valid-feedback">
                    คุณกรอกข้อมูลเรียบร้อยแล้ว!
                </div>
                <div class="invalid-feedback">
                    กรุณากรอกเบอร์โทรศัพท์!
                </div>
            </div>

            <div class="form-group col-sm-6">
            <label for="email">E-mail:</label>
                <input type="email" class="form-control" placeholder="อีเมล์"  id="email"  name="email" required>
            <div class="valid-feedback">
                    คุณกรอกข้อมูลเรียบร้อยแล้ว!
                </div>
                <div class="invalid-feedback">
                    กรุณากรอกอีเมล์!
                </div>
            </div>

            <div class="form-group col-sm-6">
            <label for="idcard">ID card:</label>
                 <input type="number" class="form-control" id="idcard" placeholder="รหัสบัตรประชาชน" name="idcard" minlength="13" maxlength="13"  required> <!-- pattern="^([0-9]{1})+(-[0-9]{4})+(-[0-9]{5})+(-[0-9]{2})+(-[0-9]{1}$)" -->
            <div class="valid-feedback">
                    คุณกรอกข้อมูลเรียบร้อยแล้ว!
                </div>
                <div class="invalid-feedback">
                    กรุณากรอกรหัสบัตรประชาชน 13 หลัก!
                </div>
            </div>

            <div class="col-md-4">
                <label for="position">Position:</label>
                    <select class="custom-select" id="position" name="position" required>
                        <option value="เจ้าของร้าน">เจ้าของร้าน</option>
                        <option value="พนักงาน">พนักงาน</option>
                    </select>
                <div class="valid-feedback">
                    คุณกรอกข้อมูลเรียบร้อยแล้ว!
                </div>
                <div class="invalid-feedback">
                    กรุณากรอกสถานะผู้ใช้ระบบ!
                </div>
            </div>
            
            <p>
            <div class="form-group col-sm-6 ">
                <label for="UserPicture">User Picture:</label>
                <div class="col-md-12">          
                    <input type="file" class="custom-file-input" id="userpic"  name="userpic" accept="image/*" required>
                    <label class="custom-file-label" for="UserPicture">รูปประจำตัว</label>
                </div>
                <div class="valid-feedback">
                    คุณกรอกข้อมูลเรียบร้อยแล้ว!
                </div>
                <div class="invalid-feedback">
                    กรุณาเลือกไฟล์!
                </div>
            </div>


            <center>
                <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-outline-dark" name="regist">Register</button>
                    </div>
                </div>
            </form>

            <script type="text/javascript">
            $(function(){
            
                $("#userpic").on("change",function(){
                    var _fileName = $(this).val();
                    $(this).next("label").text(_fileName);
                });
            
            });
            </script>
                        
            

            <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
                });
            }, false);
            })();
            </script>



        </div>  <!-- Content  -->
    </div>     <!-- wrapper  -->
 


    <!-- JavaScript bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- sidebar javascript -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>


    

</body>
</html>