<?php
    session_start();
    include_once('config.php');

    //สร้างตัวแปร
    $fname = @$_POST['firstname'];
    $lname = @$_POST['lastname'];
    $dpawn = @$_POST['pawnday'];
    $address = @$_POST['address'];
    $tel = @$_POST['tel'];

    $goldt = @$_POST['goldtype'];
    $weight = @$_POST['input_weight'];
    $price = @$_POST['input_price'];
    $rate = @$_POST['input_rate'];
    //$payrate = @$_POST['payrate'];
    $payrate = @$_POST['pay_rate'];
    $duepayment = @$_POST['input_duepayment'];
    $status = 'อยู่ในระบบ';
    $golddetail = @$_POST['gold_detail'];


   


    if (isset($_POST['submit'])) {

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
        $queryy = "select * FROM customer " or die ("Error in query: $queryy " . mysqli_error($queryy));
        $resultt = mysqli_query($conn, $queryy);
        while($row1 = mysqli_fetch_array($resultt)){
            if($row1["CusFname"] == $fname && $row1["CusLname"] == $lname){
                 $id = $row1["CusID"];
                 $check = "มี";
            break;
            }
            else if($row1["CusFname"] != $fname || $row1["CusLname"] != $lname){
                $check = "ไม่มี";
                $id = $row1["CusID"];
            }
        }
        if($check == "มี"){
            $sql2 = " INSERT INTO golds (CusID,Goldpawnday,TypeGold,WeightGold,Price,rate,Pay,DuePayment,Goldstatus,GoldImg,Golddetail,Goldbalance)
                    VALUES ('$id','$dpawn','$goldt','$weight','$price','$rate','$payrate','$duepayment','$status','$newname2','$golddetail','$price')";
            $result2 = mysqli_query($conn, $sql2) or die ("Error in query: $sql2 " . mysqli_error($sql2));
        }
        else{
            $sql = " INSERT INTO customer (CusFname,CusLname,CusAddress,Tel,CusImg)
                     VALUES ('$fname','$lname','$address','$tel','$newname1')";
            $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($sql));
            $last_id = $conn->insert_id;
            $sql2 = " INSERT INTO golds (CusID,TypeGold,Goldpawnday,WeightGold,Price,rate,Pay,DuePayment,Goldstatus,GoldImg,Golddetail,Goldbalance)
                        VALUES ('$last_id','$goldt','$dpawn','$weight','$price','$rate','$payrate','$duepayment','$status','$newname2','$golddetail','$price')";
            $result2 = mysqli_query($conn, $sql2) or die ("Error in query: $sql2 " . mysqli_error($sql2));
        }

        //ปิดการเชื่อมต่อ database
        mysqli_close($conn);
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
    <link rel="stylesheet" href="css/pawncss.css">
    
    <script type="text/javascript" src="js/date_time.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://kit.fontawesome.com/83fa38a1a9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style type="text/css">
        

        @media print {
            #btnprint , #sidebar , #navcontent {
                display: none;
            }
            .printpawn{
                width: 60%;
                font-size: 10px;
            }
            
        }
    </style>
</head>
<body>
    <div class="wrapper">
        
         <!-- Sidebar  -->
         <nav id="sidebar">
            <div class="sidebar-header">
                <?php isset($_SESSION['MbID']); ?>
                    <h2>คุณ <?php echo $_SESSION['fname']; ?></h2>
                    <h2>เป็น :  <?php echo $_SESSION['position']; ?></h2>
                    <strong><?php echo $_SESSION['fname']; ?></strong>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="index_user.php">
                        <i class="fas fa-home"></i>
                        หน้าหลัก
                    </a>
                </li>

                <li>
                    <a href="pawngold_user.php">
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
                            <a href="gold_user.php">
                                <i class="far fa-file-alt"></i>
                                ประวัติทองคำ
                            </a>
                        </li>
                        <li>
                            <a href="customer_user.php">
                                <i class="far fa-file-alt"></i>
                                ประวัติลูกค้า
                            </a>
                        </li>
                        <li>
                            <a href="Hispawngold_user.php">
                                <i class="far fa-file-alt"></i>
                                ประวัติจำนำทอง
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="payment_user.php">
                        <i class="fas fa-file-invoice-dollar"></i>
                        ชำระเงิน
                    </a>
                </li>
                

                <li>
                    <a href="profile_user.php">
                        <i class="fas fa-user-edit"></i>
                        ประวัติพนักงาน
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
            <nav class="navbar navbar-expand-lg " id="navcontent">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn">
                        <i class="fas fa-align-left"></i>
                    </button>
                
                    

                </div>
            </nav>
            
            <div class="printpawn" id="printpawn">
            
            <div class="content_pawn">

            <div class="pawnhead">
                <div class="row">
                <div class="col"><div class="form-inline">
                
                        <label for="id" align="left" >รหัสลูกค้า : </label>
                        <?php echo "&nbsp;".$id ?>
                    </div> 
                    </div>
                </div> 

                <div class="row">
                <div class="col">
                    <div class="form-inline">
                        <label for="firstname" align="left" >ชื่อ-นามสกุล : </label>
                        <?php echo "&nbsp;".$fname."&nbsp; $lname" ?>
                       
                    </div> 
                </div>   
                </div>

                    
                <div class="row">
                <div class="col">
                    <div class="form-inline">
                        <label for="firstname" align="left" >เบอร์โทรศัพท์ : </label>
                        <?php echo  "&nbsp;".$tel ?>
                    </div> 
                </div>
                </div>  
            </div>


            <div class="namelocation">
            
            <img src="img/logogold.png" class="rounded"  width="40" height="40"> 
            
            <div class="infolocation">
                 ร้านทอง International 
                ที่อยู่ 104 ซ.1 ถ.ทุ่งรี โคกวัด ต.คอหงส์ <br>
                อ.เมือง จ.สงขลา 90110 <br>
                โทร 074-333422
            </div>
               

            
            </div>
            </div> <!-- content_pawn -->

              <!-- Table -->
            
             <div class="tablepay">
             ประเภท : <?php echo "&nbsp;".$goldt ?> 
             <p>
                 วันรับเข้า :<?php echo "&nbsp;".$dpawn ?> , น้ำหนัก :<?php echo "&nbsp;".$weight ?> กรัม , ราคา :<?php echo "&nbsp;".$price ?> บาท , ดอกเบี้ย :<?php echo "&nbsp;".$payrate ?> บาท , กำหนด :<?php echo "&nbsp;".$duepayment ?> 
                <div class="table1">
                    <table width='100%' class='table table-warning table-bordered table-striped table-hover'>
                    <tr>
                        <th>งวด 1</th>
                        <th>งวด 2</th>
                        <th>งวด 3</th>
                        <th>งวด 4</th>
                        <th>งวด 5</th>
                        <th>งวด 6</th>
                        <th>งวด 7</th>
                        <th>งวด 8</th>
                        <th>งวด 9</th>
                        <th>งวด 10</th>
                        
                    </tr>
                    <tr>
                        <td><br></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </table>
                </div color="red">
              
              <div class="table2">
                    <table width='100%' class='table table-bordered table-striped table-hover'>
                    <tr>
                        <th>งวด 11</th>
                        <th>งวด 12</th>
                        <th>งวด 13</th>
                        <th>งวด 14</th>
                        <th>งวด 15</th>
                        <th>งวด 16</th>
                        <th>งวด 17</th>
                        <th>งวด 18</th>
                        <th>งวด 19</th>
                        <th>งวด 20</th>
                    </tr>
                    <tr>
                        <td><br></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </table>
                </div>

             </div>
                            
         </div>       
                
        <div class="printpawncard">
            <button  onClick="window.print()" class="btn btn-primary" type="submit" name="submit" id="btnprint">พิมพ์บัตรจำนำ</button>
            
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

