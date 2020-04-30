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
            background-image: url('/css/searchicon.png');
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 30%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
            margin-left: 20px;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
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
        <div class="tbcontainer">


        <div class="row">
                <input id="myInput" type="text" placeholder="Search.."> 
            </div>
            <br>
        <?php
            //query ข้อมูลจากตาราง customer
            $query = "select * FROM customer";

            //เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result
            $result = mysqli_query($conn, $query);

            $path = 'cusimg/';

            //แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล
            echo"<table id='tbcustomer' class='table table-striped table-bordered' >";
            echo "<thead>";
                echo "<tr>";
                    echo "<th>รหัสลูกค้า</th>";
                    echo "<th>รูป</th>";
                    echo "<th>ชื่อ-นามสกุล</th>";
                    echo "<th>ที่อยู่</th>";
                    echo "<th>เบอร์โทรศัพท์</th>";
                    echo "<th>แก้ไข</th>";
                    echo "<th>ข้อมูลทั้งหมด</th>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody id='myTable'>";
            while($row = mysqli_fetch_array($result)){
                
                echo "<tr>";
                echo "<td>" .$row["CusID"] .  "</td>";
                ?>
                <td width="10%">   
                    <img src= "cusimg/<?php echo $row["CusImg"];?>" width="50%">
                </td>
                <?php
                echo "<td>" .$row["CusFname"]."&nbsp&nbsp".$row["CusLname"].  "</td>";
                echo "<td>" .$row["CusAddress"] .  "</td>";
                echo "<td>0" .$row["Tel"] .  "</td>";

            //แก้ไขข้อมูล?>
               <td>
                    <a class='btn btn-link btn-sm' href='editcus_user.php?cus_id=<?=$row["CusID"];?>'><span class='fas fa-pencil-alt'></span></a>
                </td>
               <td>
                <a class='btn btn-link btn-sm' href='showdata_pawngold_user.php?pawngold_id=<?=$row["CusID"];?>'><span class='far fa-eye'></span></a>
               </td>
               <?php
                echo "</tr>";
                }
            echo "<tbody>";
            echo"</table>";
            //close connection
            mysqli_close($conn);


        ?>
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
