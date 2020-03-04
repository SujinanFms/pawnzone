<?php 
    session_start();
    include_once('config.php');

    /* if (isset($_POST['regist'])) {
        //รับค่ามาจากฟอร์ม
        $username = $_POST['username'];
        $password = $conn->real_escape_string($_POST['password']);
        $conpw = $conn->real_escape_string($_POST['ConfirmPW']);
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $bday = $_POST['bday'];
        $address = $_POST['Add'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $idcard = $_POST['idcard'];
        $position = $_POST['position'];
        $userpic = $_POST['userpic'];
        
        //เช็คการ confirm password
        if($_POST['password'] != $_POST['ConfirmPW']) {
            echo "<script type='text/javascript'>";
            echo"alert('กรุณากรอกรหัสให้ตรงกัน!');";
            echo"window.location = 'regist.php';";
            echo "</script>";
            exit();
       
        } else { 
        $sql = "INSERT INTO members (MBusername,MBpassword,MBfname,MBlname,MBbday,MBaddress,phone,email,MBidcard,MBstatus,MBpicture)
        VALUES ('$username','$password','$fname','$lname','$bday','$address','$phone','$email','$idcard','$position','$userpic') ";

         $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
        }
         
        //ปิดการเชื่อมต่อ database
        mysqli_close($conn);

        if ($result){
            echo "<script type='text/javascript'>";
            echo"alert('คุณลงทะเบียนสำเร็จ!');";
            echo"window.location = 'regist.php';";
            echo "</script>";
            }
            else {
                //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
                    echo "<script type='text/javascript'>";
                    echo "alert('error!');";
                    echo"window.location = 'regist.php'; ";
                    echo"</script>";
            }

    
} */

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
                    <a href="report.php">
                        <i class="fas fa-file-import"></i>
                        ออกรายงาน
                    </a>
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
                
                    <div class="top_menu">
                        <ul>
                            <li><a href="#"><i class="fas fa-search"></i></a></li>
                        </ul>
                    </div>

                </div>
            </nav>

            <div class="editmember">
            <form class="regist-form needs-validation" action="updatemember.php" method="post" enctype="multipart/form-data" novalidate>
            <?php 
                /* if($_GET["member_id"]==''){ 
                    echo "<script type='text/javascript'>"; 
                    echo "alert('Error !!');"; 
                    echo "window.location = 'editprofile.php'; "; 
                    echo "</script>"; 
                    } */
    
                    //รับค่าไอดีที่จะแก้ไข
                    $member_id = mysqli_real_escape_string($conn,$_GET['member_id']);

                    // query ข้อมูลจากตาราง: 
                    $query = "select * FROM members WHERE MbID ='$member_id' ";
                    $result = mysqli_query($conn, $query) or die ("Error in query:$query " . mysqli_error());
                    $row = mysqli_fetch_array($result);

                    $path = 'userpic/';

                    //สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
                    $update_MbID = $row['MbID'];
                    $update_MBusername = $row['MBusername'];
                    $update_MBpassword = $row['MBpassword'] ;
                    $update_MBfname = $row['MBfname'];
                    $update_MBlname = $row['MBlname'];
                    $update_MBbday = $row['MBbday'];
                    $update_MBaddress = $row['MBaddress'];
                    $update_phone = $row['phone'];
                    $update_email = $row['email'];
                    $u_MBidcard = $row['MB_IDcard'];
                    $update_MBstatus = $row['MBstatus'];
                    $update_MBpicture = $row['MBpicture'];

            ?>
                
            
            <h2>แก้ไขประวัติส่วนตัว</h2>
                <input type="hidden" name="update_MbID" size="30" value="<?php echo $update_MbID ?>">
                <div class="form-group col-md-4">
                    <label for="username">username : </label>
                    <input type="username" name="username" id="username" class="form-control" placeholder="username" required value="<?php echo $update_MBusername ?>">
                    <div class="valid-feedback">
                        คุณกรอกข้อมูลเรียบร้อยแล้ว!
                    </div>
                    <div class="invalid-feedback">
                        กรุณากรอก username!
                    </div>
                </div> 

                <div class="form-group col-md-4">
                    <label for="fname">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="password" name="pw" required value="<?php echo $update_MBpassword ?>">
                <div class="valid-feedback">
                        คุณกรอกข้อมูลเรียบร้อยแล้ว!
                    </div>
                    <div class="invalid-feedback">
                        กรุณากรอกรหัสยืนยันตัวตน!
                    </div>
                </div>

                <div class="form-group col-md-4">
                <label  for="fname">Confirm Password:</label>
                    <input type="password" class="form-control" id="ConfirmPW" placeholder="password again" name="ConfirmPW" required value="<?php echo $update_MBpassword ?>">
                <div class="valid-feedback">
                        คุณกรอกข้อมูลเรียบร้อยแล้ว!
                    </div>
                    <div class="invalid-feedback">
                        กรุณากรอกรหัสยืนยันตัวตนอีกครั้ง!
                    </div>
                </div>

                <div class="form-group col-md-4">
                <label for="fname">First name:</label>
                    <input type="text" class="form-control" id="fname" placeholder="ชื่อ" name="fname" required value="<?php echo $update_MBfname ?>">
                <div class="valid-feedback">
                        คุณกรอกข้อมูลเรียบร้อยแล้ว!
                    </div>
                    <div class="invalid-feedback">
                        กรุณากรอกชื่อจริง!
                    </div>
                </div>

                <div class="form-group col-md-4">
                <label for="lname">Last name:</label>
                    <input type="text" class="form-control" id="lname" placeholder="นามสกุล" name="lname" required value="<?php echo $update_MBlname ?>">
                <div class="valid-feedback">
                        คุณกรอกข้อมูลเรียบร้อยแล้ว!
                    </div>
                    <div class="invalid-feedback">
                        กรุณากรอกนามสกุล!
                    </div>
                </div>

                <div class="form-group col-md-4">
            <label for="bday">Date of Birth:</label>         
                <input type="date" class="form-control" id="bday"  name="bday" required value="<?php echo $update_MBbday ?>">
            <div class="valid-feedback">
                    คุณกรอกข้อมูลเรียบร้อยแล้ว!
                </div>
                <div class="invalid-feedback">
                    กรุณากรอก วัน/เดือน/ปี เกิด!
                </div>
            </div>

            <div class="form-group col-md-4">
            <label for="Add">Address:</label>
                <input type="textarea" class="form-control" id="Add" placeholder="ที่อยู่" name="add" required value="<?php echo $update_MBaddress ?>">
            <div class="valid-feedback">
                    คุณกรอกข้อมูลเรียบร้อยแล้ว!
                </div>
                <div class="invalid-feedback">
                    กรุณากรอกที่อยู่!
                </div>
            </div>

            <div class="form-group col-md-4">
            <label for="phone">Phone number:</label>
                <input type="tel" class="form-control" placeholder="เบอร์โทรศัพท์"  id="phone"  name="phone" pattern="^0([8|9|6])([0-9]{8}$)" required value="0<?php echo $update_phone ?>">
            <div class="valid-feedback">
                    คุณกรอกข้อมูลเรียบร้อยแล้ว!
                </div>
                <div class="invalid-feedback">
                    กรุณากรอกเบอร์โทรศัพท์!
                </div>
            </div>

            <div class="form-group col-md-4">
            <label for="email">E-mail:</label>
                <input type="email" class="form-control" placeholder="อีเมล์"  id="email"  name="email" required value="<?php echo $update_email ?>">
            <div class="valid-feedback">
                    คุณกรอกข้อมูลเรียบร้อยแล้ว!
                </div>
                <div class="invalid-feedback">
                    กรุณากรอกอีเมล์!
                </div>
            </div>

            <div class="form-group col-md-4">
            <label for="idcard">ID card:</label>
                 <input type="number" class="form-control" id="idcard" placeholder="รหัสบัตรประชาชน" name="idcard" minlength="13" maxlength="13" pattern="^([0-9]{1})+(-[0-9]{4})+(-[0-9]{5})+(-[0-9]{2})+(-[0-9]{1}$)" required value="<?php echo $u_MBidcard ?>"> 
            <div class="valid-feedback">
                    คุณกรอกข้อมูลเรียบร้อยแล้ว!
                </div>
                <div class="invalid-feedback">
                    กรุณากรอกรหัสบัตรประชาชน 13 หลัก!
                </div>
            </div>

            <div class="col-md-4">
                <label for="position">Position:</label>
                    <select class="custom-select" id="position" name="position" required value="<?php echo $update_MBstatus ?>">
                        <option value="เจ้าของร้าน" <?php if( $row["MBstatus"] == "เจ้าของร้าน") echo  "selected"; ?>>เจ้าของร้าน</option>
                        <option value="พนักงาน" <?php if( $row["MBstatus"] == "พนักงาน") echo  "selected"; ?>>พนักงาน</option>
                    </select>
                <div class="valid-feedback">
                    คุณกรอกข้อมูลเรียบร้อยแล้ว!
                </div>
                <div class="invalid-feedback">
                    กรุณากรอกสถานะผู้ใช้ระบบ!
                </div>
            </div>
            
            <p>
            <div class="form-group col-md-4 ">
                <label for="UserPicture">User Picture:</label>
                <br>
                <img src= "userpic/<?php echo $row["MBpicture"];?>" width="20%" height="20%"> 
                <div class="col-md-12"> 
                        
                    <input type="file" class="custom-file-input" id="userpic"  name="userpic" accept="image/*" required >
                    <label class="custom-file-label" for="UserPicture"><?php echo $row["MBpicture"];?></label>

                    
                </div>
                <div class="valid-feedback">
                    คุณกรอกข้อมูลเรียบร้อยแล้ว!
                </div>
                <div class="invalid-feedback">
                    กรุณาเลือกไฟล์!
                </div>
            </div>



                <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-outline-dark" name="edit">ยืนยันการแก้ไข</button>
                    </div>
                </div>
            </form>

            </div>   

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