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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>


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

         <!-- ประวัติลูกค้า -->
        <div class="datatable">

            <div class="tbcontainer">
            <?php
                //query ข้อมูลจากตาราง customer
                // $query = "SELECT gold.*,customer.CusID , customer.Cuspawnday FROM gold LEFT JOIN customer ON customer.CusID = gold.CusID" or die("Error:" .mysqli_error());
                $query  = "SELECT * FROM golds ORDER BY GoldID asc" or die("Error:" .mysqli_error());

                //เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result
                $result = mysqli_query($conn, $query);

                $path = 'goldimg/';

                //แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล
                echo"<table id='goldtable' class='table table-bordered table-striped table-hover' width='100%' font-size='10px'>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th>รหัสทองคำ</th>";
                        echo "<th>รูป</th>";
                        echo "<th>รหัสลูกค้า</th>";
                        
                        //echo "<th>วันรับเข้า</th>";
                        //echo "<th>วันต่อดอก</th>";
                        echo "<th>งวดชำระ</th>";
                        echo "<th>ราคาทอง</th>";
                        echo "<th>อัตราดอกเบี้ย</th>";
                        echo "<th>ดอกเบี้ย</th>";
                        echo "<th>ประเภท</th>";
                        echo "<th>น้ำหนักทอง</th>";
                        echo "<th>วันรับเข้า</th>";
                        echo "<th>สถานะ</th>";
                        echo "<th>แก้ไข</th>";
                        echo "<th>ลบ</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>" ;
                    echo "<td>" .$row["GoldID"] .  "</td>";
                    ?>
                    <td>   
                        <img src= "goldimg/<?php echo $row["GoldImg"];?>" width="10%">
                    </td>
                    <?php
                    echo "<td>" .$row["CusID"] .  "</td>";
                   
                // echo "<td>" .$row["Cuspawnday"] .  "</td>";
                // echo "<td>" .$row["DateITR"] .  "</td>";
                echo "<td>" .$row["DuePayment"] .  "</td>";
                    echo "<td>" .$row["Price"] .  "</td>";
                    echo "<td>" .$row["Rate"] .  "</td>";
                    echo "<td>" .$row["Pay"] .  "</td>";
                    echo "<td>" .$row["TypeGold"] .  "</td>";
                    echo "<td>" .$row["WeightGold"] .  "</td>";
                 echo "<td>" .$row["Goldpawnday"] .  "</td>";
                 echo "<td>" .$row["GoldStatus"] .  "</td>";

                //แก้ไขข้อมูล?>

                <td>
                    <a class='btn btn-link btn-sm' href='editgold.php?gold_id=<?=$row["GoldID"];?>'><span class='fas fa-pencil-alt'></span></a>
                    <!-- <a class='btn btn-link btn-sm' href='edit2.php?edit=<  $row["CusID"];?>' ><span class='fas fa-pencil-alt'></span></a> -->
                    
                    <!-- <a herf='#UserUpdateForm.php?'" .$row["0"] . "'title=Update Record' data-toggle='tooltip'><span class='fas fa-pencil-alt'></span></a>"; -->
               </td>
               <td>
                <a class='btn btn-link btn-sm' href='delete.php?gold2_id=<?=$row["GoldID"];?>'><span class='fa fa-trash-o'></span></a>
               </td>

                <?php
                    /* echo "<td>";
                    echo "<a class='btn btn-link btn-sm' href='#editcustomer.php&edit=<?' " .$row['CusID'] . " ;?> <span class='fas fa-pencil-alt'></span></a>";
                        //echo "<a herf='#UserUpdateForm.php?'" .$row["0"] . "'title=Update Record' data-toggle='tooltip'><span class='fas fa-pencil-alt'></span></a>";
                    echo "</td>";
                //ดูข้อมูลทั้งหมด
                    echo "<td>";
                    echo " <a class='btn btn-link btn-sm' href='Hispawngold.php'><span class='far fa-eye'></span></a>";
                    //echo "<a herf='#UserUpdateForm.php?'" .$row["0"] . "'title=View Record' data-toggle='tooltip'><span class='far fa-eye'></span></a>";
                    echo "</td>"; */
                    echo "</tr>";
                    }
                echo "<tbody>";
                echo"</table>";
                //close connection
                mysqli_close($conn);
            ?>
            </div>
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
