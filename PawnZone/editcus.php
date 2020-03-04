<?php
    session_start();
    include_once('config.php');

        //สร้างตัวแปร
        /* $fname = @$_POST['firstname'];
        $lname = @$_POST['lastname'];
        $dpawn = @$_POST['pawnday'];
        $address = @$_POST['address'];
        $tel = @$_POST['tel'];
    
        $goldt = @$_POST['goldtype'];
        $weight = @$_POST['input_weight'];
        $price = @$_POST['input_price'];
        $rate = @$_POST['input_rate'];
        $payrate = @$_POST['input_payrate'];
        $duepayment = @$_POST['input_duepayment']; */

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
            
            
        <!-- สร้างฟอร์มข้อมูลลูกค้า -->
        <div class="container">
        
       
                
        <form class="main-form needs-validation" action='updatecus.php' method="post"  name="updatecus" id="updatecus" enctype="multipart/form-data" novalidate>
            <?php 
                if($_GET["cus_id"]==''){ 
                    echo "<script type='text/javascript'>"; 
                    echo "alert('Error !!');"; 
                    echo "window.location = 'editcus.php'; "; 
                    echo "</script>"; 
                    }

                    //รับค่าไอดีที่จะแก้ไข
                    $cus_id = mysqli_real_escape_string($conn,$_GET['cus_id']);
                    
                    // query ข้อมูลจากตาราง: 
                    $query = "select * FROM customer WHERE CusID='$cus_id' ";
                    $result = mysqli_query($conn, $query) or die ("Error in query:$query " . mysqli_error());
                    $row = mysqli_fetch_array($result);
                   

                    //สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
                    $update_CusID = $row['CusID'];
                    $update_CusFname = $row['CusFname'];
                    $update_CusLname = $row['CusLname'] ;
                    $update_Cuspawnday = $row['Cuspawnday']; 
                    $update_CusAddress = $row['CusAddress'];
                    $update_Tel = $row['Tel'];
                    $update_CusImg = $row['CusImg'];
                
            ?>
            
             <input type="hidden" name="update_CusID" size="30" value="<?php echo $update_CusID ?>">

            <div class="customform">
            <div class="form-row">
                    <div class="col ">
                            <div class="form-group col-md-12 ">
                                <label for="firstname">ชื่อ </label>
                                <input type="text" name="firstname" id="firstname" class="form-control" required value="<?=$update_CusFname;?>" >  
                                <div class="valid-feedback">
                                        คุณกรอกข้อมูลเรียบร้อยแล้ว!
                                </div>
                                <div class="invalid-feedback">
                                        กรุณากรอกชื่อลูกค้า!
                                </div>
                            </div>
                    </div>
                    <div class="col ">
                            <div class="form-group col-md-12">
                                <label for="lastname">นามสกุล </label>
                                <input type="text" name="lastname" id="lastname" class="form-control" required value="<?php echo $update_CusLname ?>">
                                <div class="valid-feedback">
                                    คุณกรอกข้อมูลเรียบร้อยแล้ว!
                                </div>
                                <div class="invalid-feedback">
                                        กรุณากรอกนามสกุลลูกค้า!
                                </div>
                            </div>
                    </div> 
                </div>        
                <!-- <div class="form-group col-md-6">
                    <label for="birthday">วัน/เดือน/ปี ที่จำนำ </label>
                    <input type="date" name="pawnday" id="pawnday" class="form-control" required value="<php echo $update_Cuspawnday ?>">
                    <div class="valid-feedback">
                        คุณกรอกข้อมูลเรียบร้อยแล้ว!
                    </div>
                    <div class="invalid-feedback">
                            กรุณากรอกวัน/เดือน/ปีนำทองมาจำนำ!
                    </div>
                </div>  -->
                <div class="form-group col-md-12">
                        <label for="address">ที่อยู่ </label>
                        <input type="text" name="address" id="address" class="form-control" required value="<?php echo  $update_CusAddress ?>">
                        <div class="valid-feedback">
                            คุณกรอกข้อมูลเรียบร้อยแล้ว!
                        </div>
                        <div class="invalid-feedback">
                                กรุณากรอกที่อยู่!
                        </div>
                </div>
                <div class="form-group col-md-6">
                        <label for="tel">เบอร์โทรศัพท์ </label>
                        <input type="tel" name="tel" id="tel" class="form-control" pattern="^0([8|9|6])([0-9]{8}$)" required value="0<?php echo $update_Tel ?>">
                        <div class="valid-feedback">
                            คุณกรอกข้อมูลเรียบร้อยแล้ว!
                        </div>
                        <div class="invalid-feedback">
                                กรุณากรอกเบอร์โทรศัพท์!
                        </div>
                </div>

                <div class="form-group col-md-4 ">
                <label for="UserPicture">รูปทองคำ:</label>
                <br>
                <img src= "cusimg/<?php echo $row["CusImg"];?>" width="20%" height="20%"> 
                <div class="col-md-12"> 
                        
                    <input type="file" class="custom-file-input" id="cusimg"  name="cusimg" accept="image/*" required >
                    <label class="custom-file-label" for="UserPicture" ><?php echo $update_CusImg?></label>

                    
                </div>
                <div class="valid-feedback">
                    คุณกรอกข้อมูลเรียบร้อยแล้ว!
                </div>
                <div class="invalid-feedback">
                    กรุณาเลือกไฟล์!
                </div>
            </div>
            </div>

       

                    <div class="pawncard">
                        <button class="btn btn-primary" type="submit" name="update_data" value="Update">ยืนยันการแก้ไข</button>
                    </div>
                    </form>         
        </form>

        <script>
                $(document).ready(function(){
                    $('[data-toggle="tooltip"]').tooltip();
                });
        </script>

            <script type="text/javascript">
            $(function(){
            
                $("#cusimg").on("change",function(){
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
        </div>


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