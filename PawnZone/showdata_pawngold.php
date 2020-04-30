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
    var show = document.getElementById('show');
    var payrate;
   if(isNaN(price)||isNaN(rate)){
     document.getElementById("show").setAttribute("color","red");
     show.innerHTML="ERROR"
   }
   else{
     if(inputprice.length>0){
       if(isNaN(rate)){
         document.getElementById("show").setAttribute("color","red");
         show.innerHTML="ERROR"
       }
       else if(inputrate.length>0){
         document.getElementById("show").setAttribute("color","Blue");
         payrate = (price*rate)/100
         show.innerHTML = payrate;
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
        <form name="form1" class="main-form needs-validation" action="showdata_pawngold.php" method="post" enctype="multipart/form-data" novalidate>
        <?php
            if($_GET["pawngold_id"]==''){ 
                echo "<script type='text/javascript'>"; 
                echo "alert('Error !!');"; 
                echo "window.location = 'Hispawngold.php'; "; 
                echo "</script>"; 
                }

                $pawngold_id = mysqli_real_escape_string($conn,$_GET['pawngold_id']);

                $query = "select * FROM customer ,golds WHERE golds.GoldID ='$pawngold_id' && golds.CusID = customer.CusID ";
                $result = mysqli_query($conn, $query) or die ("Error in query: $query " . mysqli_error($query));
                $row = mysqli_fetch_array($result);


                //สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
                $update_CusID = $row['CusID'];
                $update_CusFname = $row['CusFname'];
                $update_CusLname = $row['CusLname'] ;
                $update_CusAddress = $row['CusAddress'];
                $update_Tel = $row['Tel'];
                $update_CusImg = $row['CusImg'];


                $query2 = "select * FROM golds where  golds.GoldID = '$pawngold_id'  ";
                $result2 = mysqli_query($conn, $query2) or die ("Error in query:$query2 " . mysqli_error($query2));
                $row2 = mysqli_fetch_array($result2);

                $update_GoldID = $row2['GoldID'];
                $update_TypeGold = $row2["TypeGold"];
                $update_Goldpawnday = $row2["Goldpawnday"];
                $u_status = $row2["GoldStatus"];
                $update_WeightGold = $row2["WeightGold"];
                $update_Price = $row2["Price"];
                $update_Rate = $row2["Rate"];
                $update_Pay = $row2["Pay"];
                $update_DuePayment  = $row2["DuePayment"];
                $update_GoldImg = $row2['GoldImg'];
                $update_Golddetail = $row2['Golddetail'];
        
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
            </form>         
        

        <!-- ฟอร์มทองที่นำมาจำนำ -->
        <div class="customform2">
            <div class="form-check col-md-12">
                    <label for="goldtype">ทองคำประเภท</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="update_goldtype" id="inlineRadio1" required value="ทองคำแท่ง" <?php if( $row2["TypeGold"] == "ทองคำแท่ง") { echo "checked"; } ?>>
                        <label class="form-check-label" for="inlineRadio1">ทองคำแท่ง</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="update_goldtype" id="inlineRadio2" required value="ทองคำรูปพรรณ" <?php if($row2["TypeGold"] == "ทองคำรูปพรรณ") { echo "checked"; } ?>>
                        <label class="form-check-label" for="inlineRadio2">ทองคำรูปพรรณ</label>
                    </div>
                    <div class="invalid-feedback">กรุณาเลือกประเภททองคำ</div>
                </div>
                <p>
                    <div class="form-row">
                        <div class="col">
                        <div class="form-group col-md-8">
                            <label for="birthday">วัน/เดือน/ปี ที่จำนำ </label>
                            <input type="text" name="update_pawnday" id="update_pawnday" class="form-control" required value="<?php echo $update_Goldpawnday  ?> " >
                        <div class="valid-feedback">
                            คุณกรอกข้อมูลเรียบร้อยแล้ว!
                        </div>
                        <div class="invalid-feedback">
                                กรุณากรอกวัน/เดือน/ปีนำทองมาจำนำ!
                        </div>
                    </div>
                    </div>

                    <div class="col">
                            <div class="col-md-8">
                                <label for="goldStatus">สถานะ</label>
                                
                                    <select class="custom-select" id="update_goldStatus" name="update_goldStatus"  required>
                                        <option value="อยู่ในระบบ" <?php if( $u_status == "อยู่ในระบบ") echo  "selected"; ?> >อยู่ในระบบ</option>
                                        <option value="ไถ่ถอน" <?php if( $u_status == "ไถ่ถอน") echo  "selected"; ?> >ไถ่ถอน</option>
                                        <option value="นำไปหลอม" <?php if( $u_status == "นำไปหลอม") echo  "selected"; ?> >นำไปหลอม</option>
                                    </select>
                                    <div class="valid-feedback">
                                            คุณกรอกข้อมูลเรียบร้อยแล้ว!
                                    </div>
                                    <div class="invalid-feedback">
                                            กรุณากรอกระยะเวลากำหนดชำระดอกเบี้ย!
                                    </div>
                            </div>
                    </div>
                </div>

                    <div class="form-row">
                            <div class="col ">
                                    <div class="form-group col-md-8">
                                            <label for="weight">น้ำหนัก (กรัม) </label>
                                            <input type="text" name="update_weight" id="update_weight" class="form-control" placeholder="กรัม" maxlength="2" value="<?php echo  $update_WeightGold ?>" required >
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
                                        <input type="text" name="update_price" id="update_price" class="form-control" placeholder="บาท" maxlength="5"  value="<?php echo  $update_Price ?>" required onkeyup='nStr()'>
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
                                <div class="col">
                                    <div class="form-group col-md-8">
                                        <label for="rate">อัตราดอกเบี้ย </label>
                                        <input type="text" name="update_rate" id="update_rate" class="form-control" placeholder="%"  maxlength="3" value="<?php echo  $update_Rate  ?>" required onkeyup='nStr()'>
                                        <div class="valid-feedback">
                                                คุณกรอกข้อมูลเรียบร้อยแล้ว!
                                            </div>
                                            <div class="invalid-feedback">
                                                กรุณากรอกอัตราดอกเบี้ย!
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group col-md-8">
                                        <label for="payrate">ดอกเบี้ยที่ต้องจ่าย </label>
                                        <div class="show-cal">
                                            <input type="text" name="update_payrate" id="update_payrate" class="form-control" value="<?php echo $update_Pay ?>"  required >
                                           <!-- <font id="show" color="" name="payrate"></font>  -->
                                        </div>

                                        <div class="valid-feedback">
                                                คุณกรอกข้อมูลเรียบร้อยแล้ว!
                                        </div>
                                        <div class="invalid-feedback">
                                                กรุณากรอกดอกเบี้ยที่ลูกค้าต้องจ่าย!
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="duepayment">กำหนดชำระดอกเบี้ย</label>
                                    <select class="custom-select" id="update_duepayment" name="update_duepayment"  required>
                                        <option value="1เดือน" <?php if( $row2["DuePayment"] == "1เดือน") echo  "selected"; ?> >1 เดือน</option>
                                        <option value="3เดือน" <?php if( $row2["DuePayment"] == "3เดือน") echo  "selected"; ?> >3 เดือน</option>
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
                                    <textarea class="form-control" id="gold_detail" name="gold_detail" rows="3" required ><?php echo $update_Golddetail ?> </textarea>
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
                                <br>
                                <img src= "goldimg/<?php echo $row["GoldImg"];?>" width="20%" height="20%">
                                <div class="col-md-12">          
                                    <input type="file" class="custom-file-input" id="goldimg"  name="goldimg" accept="image/*" required>
                                    <label class="custom-file-label" for="GoldPicture"><?php echo $update_GoldImg ?></label>
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
                    <a href="Hispawngold.php" class="btn btn-primary" id="btn" type="submit" name="submit">ย้อนกลับ</a>
                    <a href="editcus.php?cus_id=<?=$row["CusID"];?>" class="btn btn-warning" id="btn" type="submit" name="submit">แก้ไขข้อมูลลูกค้า</a>
                    <a href="editgold.php?gold_id=<?=$row2["GoldID"];?>" class="btn btn-warning" id="btn" type="submit" name="submit">แก้ไขข้อมูลทอง</a>
                    
                    </div>

        </form>

        <script>
                $(document).ready(function(){
                    $('[data-toggle="tooltip"]').tooltip();
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
