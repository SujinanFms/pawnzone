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
    <link rel="stylesheet" href="js/calculate.js">

    <script type="text/javascript" src="js/date_time.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://kit.fontawesome.com/83fa38a1a9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <?php isset($_SESSION['MbID']); ?>
                    <h2 style="color:white">คุณ <?php echo $_SESSION['fname']; ?></h2>
                    <h2 style="color:white">สถานะ :  <?php echo $_SESSION['position']; ?></h2>
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
            <br>
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

            <div class="contentinfo">
                <div class="datetime">
                    ประจำวัน
                    <span id="date_time"></span>
                    <script type="text/javascript">window.onload = date_time('date_time');</script>
                </div>
                <div class="contentprice">
                    <center>
                    <?php
                        $homepage = file_get_contents('https://xn--42cah7d0cxcvbbb9x.com/tag/%E0%B8%A3%E0%B8%B2%E0%B8%84%E0%B8%B2%E0%B8%97%E0%B8%AD%E0%B8%87%E0%B8%A5%E0%B9%88%E0%B8%B2%E0%B8%AA%E0%B8%B8%E0%B8%94%E0%B8%A7%E0%B8%B1%E0%B8%99%E0%B8%99%E0%B8%B5%E0%B9%89/');

                        $findme1 = ">ข่าวแนวโน้มราคาทองคำ";
                        $findme2 = "<div"; //mainCol
                        $findme3 = "ข่าวราคาทองล่าสุดวันนี้";

                        $cutstr1 = strstr($homepage,$findme1);
                        $cutstr2 = strstr($cutstr1,$findme2); //leftCol
                        $cutstr3 = strstr($cutstr2,$findme3);

                        $len1 = strlen($cutstr2);
                        $len2 = strlen($cutstr3);

                        $rightlen = $len1-$len2;

                        $curstr1 = substr($cutstr2,0,$rightlen);
                        
                        //เปลี่ยนขนาดตาราง
                        $curstr4 = str_replace("display:inline-block;width:336px;height:280px","display:inline-block;width:336px;height:0px","$curstr1"); 
                        
                        //เปลี่ยนขนาดตัวอักษรในตาราง
                        $curstr5 = str_replace(".span{width:40%;line-height:26px;font-size:19px;}.em{width:30%;color:#444;font-size:21px;line-height:26px;}",".span{width:40%;line-height:26px;font-size:28px;}.em{width:30%;color:#444;font-size:28px;line-height:26px;}","$curstr4");
                        $curstr6 = str_replace(".h-h3{margin:9px;background:none;font-size:19px;",".h-h3{margin:9px;background:none;font-size:30px;","$curstr5");
                        $curstr7 = str_replace("txtd{font-size:13px;font-weight:700}","txtd{font-size:20px;font-weight:700}","$curstr6");
                            


                        if($cutstr1!==FALSE){

                            echo $curstr7;

                        }else{

                            echo "ไม่พบ $efindme ใน $cutstr";

                        }

                    ?></div>
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
