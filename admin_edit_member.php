<?php include 'connect.php';
session_start(); 
error_reporting(0);

if(!$_SESSION['u_id']){
    echo "<script type = 'text/javascript'>";
    echo "alert('กรุณาเข้าสู่ระบบก่อนครับ');";
    echo "window.location='login.php';";
    echo "</script>";
}


$page = "member";
$number =1;
$search = isset($_GET['search']) ? $_GET['search']:'';

$user = "SELECT * From tb_user where name like '%$search%'or email like '%$search%'";
$queryuser = mysqli_query($connect,$user)or die(mysqli_error($connect));
$row_u = mysqli_fetch_assoc($queryuser);

$weblogo = "SELECT * from tb_hotel where h_name like'%$search%'";
$queryweblogo = mysqli_query($connect,$weblogo)or die(mysqli_error($connect));
$row_w = mysqli_fetch_assoc($queryweblogo);

$weblogo = "SELECT * from tb_hotel where h_name like'%$search%'";
$queryweblogo = mysqli_query($connect,$weblogo)or die(mysqli_error($connect));
$row_w = mysqli_fetch_assoc($queryweblogo);

$user1 ="SELECT * From tb_user where u_id = '".$_GET['u_id']."'";
$queryuser1 = mysqli_query($connect,$user1)or die(mysqli_error($connect));
$row_us = mysqli_fetch_assoc($queryuser1);

if(isset($_POST['btn_upload'])) {
    $filetmp = $_FILES['file_img']['tmp_name'];
    $filename = $_FILES['file_img']['name'];
    $filetype = $_FILES['file_img']['type'];
    $filepath = "img/".$filename;
    move_uploaded_file($filetmp,$filepath);

    $sql = "UPDATE tb_user set name = '".$_POST['name']."',
                        email = '".$_POST['email']."',
                        password = '".$_POST['password']."',
                        age = '".$_POST['age']."',
                        gender = '".$_POST['gender']."',
                        des = '".$_POST['des']."',
                        password = '".$_POST['password']."',
                        u_pic = '".$filename."'
                        where u_id = '".$_GET['u_id']."'";
    $update = mysqli_query($connect,$sql) or die(mysqli_error($connect));
    echo "<script type = 'text/javascript'>;";
    echo "alert('แก้ไขข้อมูลเสร็จสิ้น');";
    echo "window.location='man_member.php';";
    echo "</script>";

 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title><?php echo $row_w['h_name'];?></title>
</head>
<body style = "font-family: 'Kanit', sans-serif;">
<main>
    <div class="main-container d-flex">
        <?php include 'sidebar.php'; ?>
        <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <button class="btn d-md-none d-block open-btn"><img src="img/list.svg" alt=""></button>
        </nav>
        <div class="row">
        <ul class="mx-4 list-unstyled">
                <li><a href="user.php" class="text-dark text-decoration-none">หน้าเเรก</a><a href="man_member.php" class="text-dark text-decoration-none"> / ระบบจัดการข้อมูลสมาชิก</a><a href="admin_edit_member.php" class="text-secondary fw-blod text-decoration-none"> / เเก้ไขข้อมูลสมาชิก</a></li>
            </ul>
                        <div class="ms-5 col-md-5 bg-dark p-5">
                            <img onerror="this.style.display = 'none'" src="img/<?php echo $row_us['u_pic'];?>" class="float-center mb-4 rounded-3" width="180" height="180" alt="">
         
                            <p class="text-light"><?php echo $row_us['title'];?> <?php echo $row_us['name'];?> <?php echo $row_us['l_name'];?></p>
                            <p class="text-light">Line id : <?php echo $row_us['line_id'];?></p>
                            <p class="text-light">อีเมลล์ : <?php echo $row_us['email'];?></p>
                            <p class="text-light">เบอร์โทรศัพท์ : <?php echo $row_us['tel'];?></p>
                            <p class="text-light">สัญชาติ : <?php echo $row_us['national'];?></p>
                            <p class="text-light">ประเทศ : <?php echo $row_us['country'];?></p>
                            <p class="text-light">ตำเเหน่ง : <?php echo $row_us['level'];?></p>

                            <hr class="text-warning">
                           <img src="img/logo.svg" width="100%"  alt="">
                        </div>
                        <div class=" col-md-5 p-5 shadow-lg">
                            <h1 class="fw-bold">ข้อมูลส่วนตัว</h1>
                      
                          
                            <form  method="POST" class="form-contact" enctype="multipart/form-data">
                            <!-- <div>
                                    <label for="">อัพโหลดรูปของท่าน</label>
                                    <input type="file" name="file_img"   placeholder="ไทย" class="form-control">
                                </div> -->
                           
                            <!-- <small class="text-secondary">เลือกคำนำหน้าของท่าน</small>
                            <br>
                                <div class="form-check-inline" >
                                    <input type="radio" name="title" required style="<?php echo $radi_yellow;?>" value="นาย" class="form-check-input">
                                    <label for="" class="form-check-label">นาย</label>
                                    <input type="radio" name="title"style="<?php echo $radi_yellow;?>" value="นาง" class="form-check-input">
                                    <label for="" class="form-check-label">นาง</label>
                                    <input type="radio" name="title"style="<?php echo $radi_yellow;?>" value="นางสาว" class="form-check-input">
                                    <label for="" class="form-check-label">นางสาว</label>
                                </div> -->
                                
                                <div>
                                    <label for="">ตำเเหน่ง</label>
                                 
                                    <select name="level" class="form-control" id="">
                                        <option value="user">ผู้ใช้ทั่วไป</option>
                                        <option value="admin">แอดมิน</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="">แต้มรีวิว</label>
                                    <input type="number" name="u_review"   placeholder="0849713544" value="<?php echo $row_us['u_review'];?>" class="form-control mb-2">
                                    
                                </div>
                                <div>
                                    <label for="">รหัสผ่าน</label>
                                    <input type="text" name="password"  placeholder="example@gmail.com" value="<?php echo $row_us['password'];?>" class="form-control">
                                  
                              </div>
                                <small>รายละเอียดส่วนตัว</small>
                                <hr class="col-md-6">
                                <div class="row">
                                        <div class="col-md-6">
                                            <div class=" mt-3">
                                            <label for=""><small>ชื่อ</small></label>
                                            <input type="text" name="name" placeholder="สมปอง" value="<?php echo $row_us['name'];?>"   class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class=" mt-3">
                                            <label for=""><small>นามสกุล</small></label>
                                            <input type="text" name="l_name" placeholder="หล่อดี" value="<?php echo $row_us['l_name'];?>"   class="form-control">
                                            </div>
                                        </div>
                                </div>
                               <div>
                                    <label for=""><small>ชื่อผู้ใช้</small></label>
                                    <input type="text" name="username" placeholder="example" value="<?php echo $row_us['username'];?>"   class="form-control">
                               </div>
                               <div>
                                    <label for=""><small>ไอดีไลน์</small></label>
                                    <input type="text" name="line_id" placeholder="example123123" value="<?php echo $row_us['line_id'];?>"   class="form-control">
                               </div>
                              <div>
                                    <label for="">อีเมลล์</label>
                                    <input type="email" name="email"  placeholder="example@gmail.com" value="<?php echo $row_us['email'];?>" class="form-control">
                                  
                              </div>
                                <div>
                                    <label for="">เบอร์โทรศัพท์</label>
                                    <input type="number" name="tel"   placeholder="0849713544" value="<?php echo $row_us['tel'];?>" class="form-control mb-2">
                                    
                                </div>
                                <small>รายละเอียดอื่น ๆ</small>
                                <hr class="col-md-6">
                                <div>
                                    <label for="">สัญชาติ</label>
                                    <input type="text" name="national"   placeholder="ไทย" value="<?php echo $row_us['national'];?>" class="form-control">
                                </div>
                                <div>
                                    <label for="">ประเทศ</label>
                                    <input type="text" name="country" placeholder="ไทย" value="<?php echo $row_us['country'];?>" class="form-control">
                                </div>
                               
                               <button name="btn_submit" type="submit" class="btn btn-warning col-md-12 mt-3 shadow-sm text-white fw-bold">แก้ไขข้อมูลส่วนตัว</button>
                            </form>
                        </div>
                    </div>
                    <?php include 'edit_member.php';?>
    </div>
    </div>
</main>
<script src="js/jquery-3.6.1.min.js"></script>
<script>
    $('.open-btn').on('click',function(){
    $('.sidebar').addClass('active');
    }
    );
    $('.close-btn').on('click',function(){
    $('.sidebar').removeClass('active');
    }
    );
</script>
</body>
</html>