<?php include 'connect.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title><?php echo $row_w['h_name'];?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ed752c8035.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://kit.fontawesome.com/ed752c8035.css" crossorigin="anonymous">
    <script src="js/bootstrap.bundle.min.js"></script>
  
</head>

<body style = "font-family: 'Kanit', sans-serif;">
 <?php include 'navbar_i.php';?>
    <section class="home">
        <div class="container  d-flex justify-content-center align-items-center h-100 ">
          <div class="row">
          <div class="col-md-2"></div>
           <div class="col-md-8">
                <div class="container bg-white">
                    <div class="row">
                        <div class="col-md-6 bg-dark p-5">
                            <img src="img/logo.svg" alt="">
         
                            <p class="text-secondary">Lorem ipsum dolor sit, amet consectetur adipisicing ntium quaerat officia doloremque voluptates, harum quam. Iste sed maxime minus, ratione porro soluta dolorem! Ipsum, rem!</p>
                            <hr class="text-warning">
                        </div>
                        <div class="col-md-6 p-5 shadow-lg">
                            <h1 class="fw-bold">สมัครสมาชิก</h1>
                            <small class="text-secondary">Lorem ipsum dolor sit amet.</small>
                            <form  method="POST" class="form-contact">
                                <div class="form-floating mt-3">
                                    <input type="text" name="username" required placeholder="need" class="form-control">
                                    <label for="">กรุณากรอกชื่อผู้ใช้ของท่าน</label>
                                </div>
                                <div class="form-floating mt-3">
                                    <input type="email" name="email" required placeholder="need" class="form-control">
                                    <label for="">กรุณากรอกอีเมลล์ของท่าน</label>
                                </div>
                                <div class="form-floating mt-3">
                                    <input type="password" name="password1" required placeholder="need" class="form-control">
                                    <label for="">กรุณากรอกรหัสผ่านของท่าน</label>
                                </div>
                                <div class="form-floating mt-3">
                                    <input type="password" name="password2" required placeholder="need" class="form-control">
                                    <label for="">กรุณายืนยันรหัสผ่านของท่านอีกครั้ง</label>
                                </div>
                               <button name="btn_submit" class="btn btn-warning col-md-12 mt-3 shadow-sm text-white fw-bold">สมัครสมาชิก</button>
                            </form>
                        </div>
                    </div>
                </div>
           </div>
           <div class="col-md-2"></div>
          </div>
        </div>
    </section>




    <?php include 'footer.php';?>
  <?php include 'script.php';?>
  <?php include 'check_register.php';?>
</body>
</html>