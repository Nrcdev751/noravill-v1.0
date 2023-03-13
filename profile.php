<?php include 'connect.php';
session_start();


error_reporting(0);



$user = "SELECT * From tb_user where u_id = '".$_SESSION['u_id']."'";
$user_query = mysqli_query($connect,$user) or die(mysqli_error($connect));
$row_u = mysqli_fetch_assoc($user_query);
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
<body class="" style ="font-family: 'Kanit', sans-serif;">
 <?php include 'navbar.php';?>
     <section class="home bg-dark">
        <div class="container " >
          <div class="row">
          <div class="col-md-2"></div>
           <div class="col-md-8">
                <div class="container  bg-white" style="margin-top:7rem;">
                    <div class="row">
                        <div class="col-md-6 bg-dark p-5">
                            <img onerror="this.style.display = 'none'" src="img/<?php echo $row_u['u_pic'];?>" class="float-center mb-4 rounded-3" width="180" height="180" alt="">
         
                            <p class="text-light"><?php echo $row_u['title'];?> <?php echo $row_u['name'];?> <?php echo $row_u['l_name'];?></p>
                            <p class="text-light">Line id : <?php echo $row_u['line_id'];?></p>
                            <p class="text-light">อีเมลล์ : <?php echo $row_u['email'];?></p>
                            <p class="text-light">เบอร์โทรศัพท์ : <?php echo $row_u['tel'];?></p>
                            <p class="text-light">สัญชาติ : <?php echo $row_u['national'];?></p>
                            <p class="text-light">ประเทศ : <?php echo $row_u['country'];?></p>

                            <hr class="text-warning">
                           <img src="img/logo.svg" width="100%"  alt="">
                        </div>
                        <div class="col-md-6 p-5 shadow-lg">
                            <h1 class="fw-bold">ข้อมูลส่วนตัว</h1>
                            <small>รายละเอียดส่วนตัว</small>
                                <hr class="col-md-6">
                          
                            <form  method="POST" class="form-contact" enctype="multipart/form-data">
                            <div>
                                    <label for="">อัพโหลดรูปของท่าน</label>
                                    <input type="file" name="file_img"   placeholder="ไทย" class="form-control">
                                </div>
                                <br>
                            <small class="text-secondary">เลือกคำนำหน้าของท่าน</small>
                            <br>
                                <div class="form-check-inline" >
                                    <input type="radio" name="title" required style="<?php echo $radi_yellow;?>" value="นาย" class="form-check-input">
                                    <label for="" class="form-check-label">นาย</label>
                                    <input type="radio" name="title"style="<?php echo $radi_yellow;?>" value="นาง" class="form-check-input">
                                    <label for="" class="form-check-label">นาง</label>
                                    <input type="radio" name="title"style="<?php echo $radi_yellow;?>" value="นางสาว" class="form-check-input">
                                    <label for="" class="form-check-label">นางสาว</label>
                                </div>
                        
                                <div class="row">
                                        <div class="col-md-6">
                                            <div class=" mt-3">
                                            <label for=""><small>ชื่อ</small></label>
                                            <input type="text" name="name" placeholder="สมปอง" value="<?php echo $row_u['name'];?>"   class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class=" mt-3">
                                            <label for=""><small>นามสกุล</small></label>
                                            <input type="text" name="l_name" placeholder="หล่อดี" value="<?php echo $row_u['l_name'];?>"   class="form-control">
                                            </div>
                                        </div>
                                </div>
                               <div>
                                    <label for=""><small>ชื่อผู้ใช้</small></label>
                                    <input type="text" name="username" placeholder="example" value="<?php echo $row_u['username'];?>"   class="form-control">
                               </div>
                               <div>
                                    <label for=""><small>ไอดีไลน์</small></label>
                                    <input type="text" name="line_id" placeholder="example123123" value="<?php echo $row_u['line_id'];?>"   class="form-control">
                               </div>
                              <div>
                                    <label for="">กรุณากรอกอีเมลล์ของท่าน</label>
                                    <input type="email" name="email"  placeholder="example@gmail.com" value="<?php echo $row_u['email'];?>" class="form-control">
                                  
                              </div>
                                <div>
                                    <label for="">กรุณากรอกเบอร์โทรศัพท์ของท่าน</label>
                                    <input type="number" name="tel"   placeholder="0849713544" value="<?php echo $row_u['tel'];?>" class="form-control mb-2">
                                    
                                </div>
                                <small>รายละเอียดอื่น ๆ</small>
                                <hr class="col-md-6">
                                <div>
                                    <label for="">กรุณากรอกสัญชาติของท่าน</label>
                                    <input type="text" name="national"   placeholder="ไทย" value="<?php echo $row_u['national'];?>" class="form-control">
                                </div>
                                <div>
                                    <label for="">กรุณากรอกประเทศของท่าน</label>
                                    <input type="text" name="country" placeholder="ไทย" value="<?php echo $row_u['country'];?>" class="form-control">
                                </div>
                               <button name="btn_submit" type="submit" class="btn btn-warning col-md-12 mt-3 shadow-sm text-white fw-bold">แก้ไขข้อมูลส่วนตัว</button>
                            </form>
                        </div>
                    </div>
                </div>
           </div>
           <div class="col-md-2"></div>
          </div>
        </div>
    </section>






    <?php include 'script.php'; ?>
    <?php
    if(!$_SESSION['u_id']){
        echo 
        "<script type ='text/javascript'>;
        swal('ผิดพลาด', 'กรุณาเข้าสู่ระบบก่อนครับ', 'error');;
        setTimeout(function(){
        window.location='login.php';
        },1500);
        </script>;
    ";
    }
    ?>
    
    <?php include 'edit_user.php';?>
</body>

</html>