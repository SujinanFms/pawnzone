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
    <script type="text/javascript" src="js/date_time.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://kit.fontawesome.com/83fa38a1a9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

    <style>
        #myInput {
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 30%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
            margin-left: 20px;
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
            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn">
                        <i class="fas fa-align-left"></i>
                    </button>

                    

                </div>
            </nav>

             <!-- ประวัติลูกค้า -->
        <div class="datatable">

<div class="tbcontainer">


<div class="row">
                <input id="myInput" type="text" placeholder="Search.."> 
            </div>
            <br>
<?php
   $query = "select * FROM customer,golds where  golds.CusID = customer.CusID";
    
    $result = mysqli_query($conn, $query);


    //แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล
    echo"<table id='goldtable' class='table table-bordered table-striped table-hover' width='100%' font-size='10px'>";
    echo "<thead>";
        echo "<tr>";
            echo "<th>IDทองคำ</th>";
            echo "<th>IDลูกค้า</th>";
            echo "<th>ชื่อ-นามสกุล</th>";
            echo "<th>งวดชำระ</th>";
            echo "<th>ราคาทอง</th>";
            echo "<th>ประเภท</th>";
            echo "<th>สถานะ</th>";
            echo "<th>วันรับเข้า</th>";
        echo "<th>ข้อมูลทั้งหมด</th>";
        echo "</tr>";
    echo "</thead>";
    echo "<tbody id='myTable'>";

     while($row1 = mysqli_fetch_array($result)){
       echo "<tr>";
       echo "<td>" .$row1["GoldID"] .  "</td>";
       echo "<td>" .$row1["CusID"] .  "</td>";
        echo "<td>" .$row1["CusFname"]. "</td>";
       echo "<td>" .$row1["DuePayment"] .  "</td>";
       echo "<td>" .$row1["Price"] .  "</td>";
       echo "<td>" .$row1["TypeGold"] .  "</td>";
       echo "<td>" .$row1["GoldStatus"] .  "</td>";
       
       echo "<td>" .$row1["Goldpawnday"] .  "</td>";
      ?>
            <td>
                <a class='btn btn-link btn-sm' href='showdata_pawngold_user.php?pawngold_id=<?=$row1["GoldID"]  ;?>'><span class='far fa-eye'></span></a>
            </td>

    <?PHP
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
