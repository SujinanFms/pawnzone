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
    <!-- <link rel="stylesheet" href="css/pawncss.css"> -->

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


               <!-- ประวัติลูกค้า -->
        <div class="tbcontainer">
            <div class="dayrepot">
                <div class="row">
                    <label for="sel1">ออกรายงานประจำ</label>
                    <div class="cal cal-md-6">
                        <select class="form-control" id="sel1">
                            <option>วัน</option>
                            <option>เดือน</option>
                            <option>ปี</option>
                        </select>
                    </div>
                    <br><br><br>

                   <!--  <label for="sel1">วันที่</label>
                    <div class="cal cal-md-4">    
                        <select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                            <option>13</option>
                            <option>14</option>
                            <option>15</option>
                            <option>16</option>
                            <option>17</option>
                            <option>18</option>
                            <option>19</option>
                            <option>20</option>
                            <option>21</option>
                            <option>22</option>
                            <option>23</option>
                            <option>24</option>
                            <option>25</option>
                            <option>26</option>
                            <option>27</option>
                            <option>28</option>
                            <option>29</option>
                            <option>30</option>
                            <option>31</option>
                        </select>
                    </div>

                    <label for="sel1">เดือน</label>
                    <div class="cal cal-md-6">
                        <select class="form-control" id="sel1">
                            <option>วัน</option>
                            <option>เดือน</option>
                            <option>ปี</option>
                        </select>
                    </div>

                    <label for="sel1">ปี</label>
                    <div class="cal cal-md-6">
                        <select class="form-control" id="sel1">
                            <option>วัน</option>
                            <option>เดือน</option>
                            <option>ปี</option>
                        </select>
                    </div> -->

                    
                </div><!-- row -->
            </div><!-- day_report -->


            <div class="tbreport">

                <div class="tbreport1">
                <div class="table-responsive-sm">          
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th></th>
                            <th>ทองรูปพรรณ (บาท)</th>
                            <th>ทองคำแท่ง (บาท)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>รายรับ</td>
                            <td>100,000</td>
                            <td>200,000</td>
                        </tr>
                        <tr>
                            <td>รายจ่าย</td>
                            <td>500,000</td>
                            <td>800,000</td>
                        </tr>
                        <tr>
                            <td>ยอดสุุทธิ</td>
                            <td>-400,000</td>
                            <td>-600,000</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                </div>

                <div class="tbreport2">
                <div class="table-responsive-sm">          
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ประเภท</th>
                            <th>ชิ้น</th>
                            <th>น้ำหนัก (กรัม)</th>
                            <th>คน</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>ทองรูปพรรณ</td>
                            <td>10</td>
                            <td>25</td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <td>ทองคำแท่ง</td>
                            <td>12</td>
                            <td>42</td>
                            <td>7</td>
                        </tr>
                        <tr>
                            <td>รวม</td>
                            <td>22</td>
                            <td>67</td>
                            <td>12</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                </div>


                <div class="tbreport3">
                <div class="table-responsive-sm">          
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th></th>
                            <th>ไถ่ถอน</th>
                            <th></th>
                            <th>หลอม</th>
                            <th></th>
        
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>ประเภท</th>
                            <th>ชิ้น</th>
                            <th>น้ำหนัก (กรัม)</th>
                            <th>ชิ้น</th>
                            <th>น้ำหนัก (กรัม)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>ทองรูปพรรณ</td>
                            <td>10</td>
                            <td>25</td>
                            <td>5</td>
                            <td>6</td>
                        </tr>
                        <tr>
                            <td>ทองคำแท่ง</td>
                            <td>12</td>
                            <td>42</td>
                            <td>7</td>
                            <td>7</td>
                        </tr>
                        <tr>
                            <td>รวม</td>
                            <td>22</td>
                            <td>67</td>
                            <td>12</td>
                            <td>8</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                </div>

                <div class="tbreport4">
                <div class="table-responsive-sm">          
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ยอดปัจจุบัน</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>ประเภท</th>
                            <th>ชิ้น</th>
                            <th>น้ำหนัก (กรัม)</th>
                            <th>คน</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>ทองรูปพรรณ</td>
                            <td>10</td>
                            <td>25</td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <td>ทองคำแท่ง</td>
                            <td>12</td>
                            <td>42</td>
                            <td>7</td>
                        </tr>
                        <tr>
                            <td>รวม</td>
                            <td>22</td>
                            <td>67</td>
                            <td>12</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                </div>


            </div> <!-- tbreport -->


            </div> <!-- tbcontainer -->

        

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

