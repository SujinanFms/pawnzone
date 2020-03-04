<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PawnZone</title>
    <link rel="stylesheet" href="css/style.css">
    
    <script type="text/javascript" src="date_time.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://kit.fontawesome.com/83fa38a1a9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
</head>
<body>
    <div class="wrapper ">
        <div class="top_navbar">
            <div class="hamburger">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="top_menu">
                <div class="logo">PAWNZONE</div>
                <ul>
                    <li><a href="#"><i class="fas fa-search"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="sidebar">
            <ul  class="sidebar-ul">
                <li><a href="index.php">
                    <span class="icon"><i class="fas fa-home" aria-hidden="true"></i></span>
                    <span class="title">หน้าหลัก</span>
                    </a></li>
                <li><a href="pawngold.php">
                    <span class="icon"><i class="fas fa-edit" aria-hidden="true"></i></span>
                    <span class="title">จำนำทอง</span>
                    </a></li>
                <li><a href="#">
                    <span class="icon"><i class="fas fa-chalkboard-teacher" aria-hidden="true"></i></span>
                    <span class="title">ประวัติจำนำทอง</span>
                    <span class="sub-arrow"></span>
                    </a><ul>
                        <li><a href="gold.php"><span class="icon"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                            <span class="title">ประวัติทองคำ</span>
                        </a></li>
                        <li><a href="customer.php"><span class="icon"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                            <span class="title">ประวัติลูกค้า</span>
                        </a></li>
                    </ul>
                </li>
                <li><a herf="#">
                    <span class="icon"><i class="fas fa-file-invoice-dollar" aria-hidden="true"></i></span>
                    <span class="title">ชำระเงิน</span>
                    </a></li>
                <li><a href="#">
                    <span class="icon"><i class="fas fa-user-cog" aria-hidden="true"></i></span>
                    <span class="title">จัดการบุคคล</span>
                    <span class="sub-arrow"></span>
                    </a><ul>
                        <li><a href="owner.php"><span class="icon"><i class="fas fa-user-edit" aria-hidden="true"></i></span>
                            <span class="title">เจ้าของร้าน</span>
                        </a></li>
                        <li><a href="#"><span class="icon"><i class="fas fa-user-edit" aria-hidden="true"></i></span>
                            <span class="title">พนักงาน</span>
                        </a></li>
                    </ul>
                </li>
                <li><a href="#">
                    <span class="icon"><i class="fas fa-file-import" aria-hidden="true"></i></span>
                    <span class="title">ออกรายงาน</span>
                    </a></li>
            </ul>

            <div class="logout">
                <a href="logout.php"><i class="fas fa-sign-out-alt">logout</i></a>
            </div>
        </div>

        <!-- Register form -->
        <div class="main_container">
            <div class="item">
                
            <div class="Regist-container">
            <form class="register-form needs-validation" action="owner.php" method="post" enctype="multipart/form-data" novalidate>
                <h2>Register</h2>
                <form class="form-horizontal" action="#">
                <div class="form-group">
                <label class="control-label col-sm-2" for="fname">First name:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="fname" placeholder="ชื่อ" name="fname" required>
                </div>
                <div class="valid-feedback">
                        คุณกรอกข้อมูลเรียบร้อยแล้ว!
                    </div>
                    <div class="invalid-feedback">
                        กรุณากรอกระยะเวลากำหนดชำระดอกเบี้ย!
                    </div>
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2" for="lname">Last name:</label>
                <div class="col-sm-4">          
                    <input type="text" class="form-control" id="lname" placeholder="นามสกุล" name="lname" required>
                </div>
                <div class="valid-feedback">
                        คุณกรอกข้อมูลเรียบร้อยแล้ว!
                    </div>
                    <div class="invalid-feedback">
                        กรุณากรอกระยะเวลากำหนดชำระดอกเบี้ย!
                    </div>
                </div>
                <div class="form-group">
            <label class="control-label col-sm-2" for="bday">Date of Birth:</label>
            <div class="col-sm-4">          
                <input type="date" class="form-control" id="bday"  name="bday" required>
            </div>
            <div class="valid-feedback">
                    คุณกรอกข้อมูลเรียบร้อยแล้ว!
                </div>
                <div class="invalid-feedback">
                    กรุณากรอกระยะเวลากำหนดชำระดอกเบี้ย!
                </div>
            </div>
            <div class="form-group">
            <label class="control-label col-sm-2" for="Add">Address:</label>
            <div class="col-sm-4">          
                <input type="textarea" class="form-control" id="Add" placeholder="ที่อยู่" name="Add" required>
            </div>
            <div class="valid-feedback">
                    คุณกรอกข้อมูลเรียบร้อยแล้ว!
                </div>
                <div class="invalid-feedback">
                    กรุณากรอกระยะเวลากำหนดชำระดอกเบี้ย!
                </div>
            </div>
            <div class="form-group">
            <label class="control-label col-sm-2" for="phone">Phone number:</label>
            <div class="col-sm-4">          
                <input type="tel" class="form-control" placeholder="เบอร์โรศัพท์"  id="phone"  name="phone" pattern="^0([8|9|6])([0-9]{8}$)" required>
            </div>
            <div class="valid-feedback">
                    คุณกรอกข้อมูลเรียบร้อยแล้ว!
                </div>
                <div class="invalid-feedback">
                    กรุณากรอกระยะเวลากำหนดชำระดอกเบี้ย!
                </div>
            </div>
            <div class="form-group">
            <label class="control-label col-sm-2" for="email">E-mail:</label>
            <div class="col-sm-4">          
                <input type="email" class="form-control" placeholder="อีเมล์"  id="email"  name="email" required>
            </div>
            <div class="valid-feedback">
                    คุณกรอกข้อมูลเรียบร้อยแล้ว!
                </div>
                <div class="invalid-feedback">
                    กรุณากรอกระยะเวลากำหนดชำระดอกเบี้ย!
                </div>
            </div>
            <div class="form-group">
            <label class="control-label col-sm-2" for="idcard">ID card:</label>
            <div class="col-sm-4">          
                <input type="number" class="form-control" id="idcard" placeholder="รหัสบัตรประชาชน" name="idcard" required>
            </div>
            <div class="valid-feedback">
                    คุณกรอกข้อมูลเรียบร้อยแล้ว!
                </div>
                <div class="invalid-feedback">
                    กรุณากรอกระยะเวลากำหนดชำระดอกเบี้ย!
                </div>
            </div>
            <div class=" col-md-4">
                <label for="position">Position:</label>
                    <select class="custom-select" id="position" name="position" required>
                        <option value="1เดือน">เจ้าของร้าน</option>
                        <option value="3เดือน">พนักงาน</option>
                    </select>
                <div class="valid-feedback">
                    คุณกรอกข้อมูลเรียบร้อยแล้ว!
                </div>
                <div class="invalid-feedback">
                    กรุณากรอกระยะเวลากำหนดชำระดอกเบี้ย!
                </div>
            </div>
            <div class="form-group">        
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" class="btn btn-outline-dark" name="Regist">Register</button>
                </div>
            </div>
                </form>
            </form>

            <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('Regist', function(event) {
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

            </div>   <!-- Regist-container -->
            </div>  <!-- item -->
         </div> <!-- main_container -->

     </div> <!-- wrapper -->
      

      <!-- JavaScript bootstrap -->
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
      <script>
		$(document).ready(function(){
			$(".hamburger").click(function(){
			   $(".wrapper").toggleClass("collapse");
			});
		});
	</script>
</body>
</html>