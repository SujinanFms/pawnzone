<?php
    session_start();

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
                    <a href="#">
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

                    <div class="top_menu">
                        <ul>
                            <li><a href="#"><i class="fas fa-search"></i></a></li>
                        </ul>
                    </div>

                </div>
            </nav>

            <div class="contentinfo">
                <div class="datetime">
                    ประจำวัน
                    <span id="date_time"></span>
                    <script type="text/javascript">window.onload = date_time('date_time');</script>
                </div>


                <div class="contentprice">
                    <iframe src="https://xn--42cah7d0cxcvbbb9x.com/tag/%E0%B8%A3%E0%B8%B2%E0%B8%84%E0%B8%B2%E0%B8%97%E0%B8%AD%E0%B8%87%E0%B8%A5%E0%B9%88%E0%B8%B2%E0%B8%AA%E0%B8%B8%E0%B8%94%E0%B8%A7%E0%B8%B1%E0%B8%99%E0%B8%99%E0%B8%B5%E0%B9%89/" width="600px" height="300px" scrolling="no">
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
