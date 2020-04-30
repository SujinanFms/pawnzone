<?php
    session_start();
    include_once('config.php');

    
        
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PawnZone</title>
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="js/testcal.js">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://kit.fontawesome.com/83fa38a1a9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<script type="text/javascript">
function nStr(){
    var inputprice = document.getElementById('input_price').value;
    var inputrate = document.getElementById('input_rate').value;
    var price = parseFloat(inputprice); //แปลงข้อความจาก input_price เป็นตัวเลขแบบ float
    var rate = parseFloat(inputrate);
    var show = document.getElementById('pay_rate');
    var payrate;
   if(isNaN(price)||isNaN(rate)){
     document.getElementById("pay_rate").setAttribute("color","red");
     show.innerHTML="ERROR"
   }
   else{
     if(inputprice.length>0){
       if(isNaN(rate)){
         document.getElementById("pay_rate").setAttribute("color","red");
         show.innerHTML="ERROR"
         document.getElementById("pay_rate").value = "Error";
       }
       else if(inputrate.length>0){
         document.getElementById("pay_rate").setAttribute("color","Blue");
         payrate = (price*rate)/100
         show.innerHTML = payrate;
         document.getElementById("pay_rate").value = payrate;
       }
     }
   }

 }
</script>

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


        <!-- สร้างฟอร์มข้อมูลลูกค้า -->
        <div class="container">
        <form name="form1" class="main-form needs-validation" action="pawn.php" method="post" enctype="multipart/form-data" novalidate>
            <div class="customform">
            <div class="form-row">
                    <div class="col ">
                            <div class="form-group col-md-12 ">
                                <label for="firstname">ชื่อ </label>
                                <input type="text" name="firstname" id="firstname" class="form-control" required   >
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
                                <input type="text" name="lastname" id="lastname" class="form-control" required>
                                <div class="valid-feedback">
                                    คุณกรอกข้อมูลเรียบร้อยแล้ว!
                                </div>
                                <div class="invalid-feedback">
                                        กรุณากรอกนามสกุลลูกค้า!
                                </div>
                            </div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="pawnday">วัน/เดือน/ปี ที่จำนำ </label>
                    <input type="date" name="pawnday" id="pawnday" class="form-control" required>
                    <div class="valid-feedback">
                        คุณกรอกข้อมูลเรียบร้อยแล้ว!
                    </div>
                    <div class="invalid-feedback">
                            กรุณากรอกวัน/เดือน/ปีนำทองมาจำนำ!
                    </div>
                </div>
                <div class="form-group col-md-12">
                        <label for="address">ที่อยู่ </label>
                        <input type="text" name="address" id="address" class="form-control" required>
                        <div class="valid-feedback">
                            คุณกรอกข้อมูลเรียบร้อยแล้ว!
                        </div>
                        <div class="invalid-feedback">
                                กรุณากรอกที่อยู่!
                        </div>
                </div>
                <div class="form-group col-md-6">
                        <label for="tel">เบอร์โทรศัพท์ </label>
                        <input type="tel" name="tel" id="tel" class="form-control" pattern="^0([8|9|6])([0-9]{8}$)" required>
                        <div class="valid-feedback">
                            คุณกรอกข้อมูลเรียบร้อยแล้ว!
                        </div>
                        <div class="invalid-feedback">
                                กรุณากรอกเบอร์โทรศัพท์!
                        </div>
                </div>

                <div class="form-group col-sm-6 ">
                    <label for="CusPicture">รูปประจำตัวลูกค้า:</label>
                    <div class="col-md-12">          
                        <input type="file" class="custom-file-input" id="cusimg"  name="cusimg" accept="image/*" required>
                        <label class="custom-file-label" for="CusPicture">รูปประจำตัวลูกค้า</label>
                    </div>
                    <div class="valid-feedback">
                        คุณกรอกข้อมูลเรียบร้อยแล้ว!
                    </div>
                    <div class="invalid-feedback">
                        กรุณาเลือกไฟล์!
                    </div>
                </div>

            </div>

        <!-- ฟอร์มทองที่นำมาจำนำ -->
        
            <div class="customform2">
            <div class="form-check col-md-12">
                    <label for="goldtype">ทองคำประเภท</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="goldtype" id="inlineRadio1" value="ทองคำแท่ง" required>
                        <label class="form-check-label" for="inlineRadio1">ทองคำแท่ง</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="goldtype" id="inlineRadio2" value="ทองคำรูปพรรณ" required>
                        <label class="form-check-label" for="inlineRadio2">ทองคำรูปพรรณ</label>
                    </div>
                    <div class="invalid-feedback">Example invalid feedback text</div>
                </div>
                    <div class="form-row">
                            <div class="col ">
                                    <div class="form-group col-md-8">
                                            <label for="weight">น้ำหนัก (กรัม) </label>
                                            <input type="text" name="input_weight" id="input_weight" class="form-control" placeholder="กรัม" maxlength="2" required >
                                            <div class="valid-feedback">
                                                    คุณกรอกข้อมูลเรียบร้อยแล้ว!
                                                </div>
                                                <div class="invalid-feedback">
                                                    กรุณากรอกน้ำหนักทองคำ!
                                            </div>
                                    </div>
                            </div>
                            <div class="col ">
                                    <div class="form-group col-md-8">
                                        <label for="price">ราคาจำนำ </label>
                                        <input type="text" name="input_price" id="input_price" class="form-control" placeholder="บาท" maxlength="5" required onkeyup='nStr()'>
                                        <div class="valid-feedback">
                                                คุณกรอกข้อมูลเรียบร้อยแล้ว!
                                            </div>
                                            <div class="invalid-feedback">
                                                กรุณากรอกราคาทองคำ!
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                                <div class="col ">
                                    <div class="form-group col-md-8">
                                        <label for="rate">อัตราดอกเบี้ย </label>
                                        <input type="text" name="input_rate" id="input_rate" class="form-control" placeholder="%"  maxlength="3" required onkeyup='nStr()'>
                                        <div class="valid-feedback">
                                                คุณกรอกข้อมูลเรียบร้อยแล้ว!
                                            </div>
                                            <div class="invalid-feedback">
                                                กรุณากรอกอัตราดอกเบี้ย!
                                        </div>
                                    </div>
                                </div>
                                <div class="col ">
                                    <div class="form-group col-md-8">
                                        <label for="payrate">ดอกเบี้ยที่ต้องจ่าย </label>
                                        <!-- <input type="text" name="payrate" id="show" class="form-control" value=""  required > -->
                                        <!--<div class="show-cal">
                                             <div>
                                                <input type="text" name="payrate" id="show" class="form-control" value=""  required >
                                                <button class="btn btn-primary" id="btn-cal" type="submit" name="cal">คำนวณดอกเบี้ย</button>
                                                <php
                                                    $price = 0;
                                                    $rate = 0;
                                                    if (isset($_POST['cal'])) {
                                                        $price = @$_POST['input_price'];
                                                        $rate = @$_POST['input_rate'];
                                                        $result = $price*$rate/100;
                                                        echo $result;
                                                    }
                                                ?>
                                            </div> -->
                                             <!-- <input type="text" name="payrate" id="show" class="form-control" value=""  required >
                                            <button class="btn_cal btn-primary" id="btn-cal" type="submit" name="calculate">คำนวณดอกเบี้ย</button> -->
                                            <!-- <font  id="show" color="" name="payrate"></font>  -->
                                            <input type="text" name="pay_rate" id="pay_rate" class="form-control" placeholder="" readonly>
                                        

                                        <div class="valid-feedback">
                                                คุณกรอกข้อมูลเรียบร้อยแล้ว!
                                        </div>
                                        <div class="invalid-feedback">
                                                กรุณากรอกดอกเบี้ยที่ลูกค้าต้องจ่าย!
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class=" col-md-4">
                                <label for="duepayment">กำหนดชำระดอกเบี้ย</label>
                                    <select class="custom-select" id="input_duepayment" name="input_duepayment" required>
                                        <option value="1เดือน">1 เดือน</option>
                                        <option value="3เดือน">3 เดือน</option>
                                    </select>
                                    <div class="valid-feedback">
                                            คุณกรอกข้อมูลเรียบร้อยแล้ว!
                                    </div>
                                    <div class="invalid-feedback">
                                            กรุณากรอกระยะเวลากำหนดชำระดอกเบี้ย!
                                    </div>
                            </div>
                            
                            <div class=" col-md-6">
                                <div class="form-group">
                                    <label for="detail">รายละเอียด </label>
                                    <textarea class="form-control" id="gold_detail" name="gold_detail" rows="3" required></textarea>
                                    <div class="valid-feedback">
                                        คุณกรอกข้อมูลเรียบร้อยแล้ว!
                                    </div>
                                    <div class="invalid-feedback">
                                        กรุณากรอกรายละเอียดทองคำ!
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-6 ">
                                <label for="GoldPicture">รูปทองคำ:</label>
                                <div class="col-md-12">          
                                    <input type="file" class="custom-file-input" id="goldimg"  name="goldimg" accept="image/*" required>
                                    <label class="custom-file-label" for="GoldPicture">รูปทองคำ</label>
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
                        <button class="btn btn-primary" id="btn" type="submit" name="submit">ออกบัตรจำนำ</button> 
                    </div>

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

            <script type="text/javascript">
            $(function(){
            
                $("#goldimg").on("change",function(){
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
