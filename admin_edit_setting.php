<?php include 'connect.php';
session_start(); 
error_reporting(0);

if(!$_SESSION['u_id']){
    echo "<script type = 'text/javascript'>";
    echo "alert('กรุณาเข้าสู่ระบบก่อนครับ');";
    echo "window.location='login.php';";
    echo "</script>";
}

if($_SESSION['level']!="admin"){
    echo "<script type = 'text/javascript'>";
    echo "alert('admin เท่านั้นนะครับ');";
    echo "window.location='login.php';";
    echo "</script>";
}
$page = "setting";
$number =1;
$search = isset($_GET['search']) ? $_GET['search']:'';

$user = "SELECT * From tb_user where name like '%$search%'or email like '%$search%'";
$queryuser = mysqli_query($connect,$user)or die(mysqli_error($connect));
$row_u = mysqli_fetch_assoc($queryuser);

$weblogo = "SELECT * from tb_hotel where h_name like'%$search%'";
$queryweblogo = mysqli_query($connect,$weblogo)or die(mysqli_error($connect));
$row_w = mysqli_fetch_assoc($queryweblogo);

$user1 = "SELECT * From tb_hotel";
$queryuser1 = mysqli_query($connect,$user1)or die(mysqli_error($connect));
$row_us = mysqli_fetch_assoc($queryuser1);

if(isset($_POST['btn_upload'])) {
    $filetmp = $_FILES['file_img']['tmp_name'];
    $filename = $_FILES['file_img']['name'];
    $filetype = $_FILES['file_img']['type'];
    $filepath = "img/".$filename;
    move_uploaded_file($filetmp,$filepath);

    $sql = "UPDATE tb_hotel set h_name = '".$_POST['h_name']."',
                        h_email = '".$_POST['h_email']."',
                        h_tel = '".$_POST['h_tel']."',
                        h_des = '".$_POST['h_des']."',
                        h_address = '".$_POST['h_address']."',
                        h_logo = '".$filename."'
                        where h_id = '".$_POST['h_id']."'";
    $update = mysqli_query($connect,$sql) or die(mysqli_error($connect));
    echo "<script type = 'text/javascript'>;";
    echo "alert('แก้ไขข้อมูลเสร็จสิ้น');";
    echo "window.location='admin_edit_setting.php';";
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
                <li><a href="user.php" class="text-dark text-decoration-none">หน้าเเรก</a><a href="admin_edit_setting.php" class="text-secondary fw-blod text-decoration-none"> / ตั้งค่าระบบ</a></li>
            </ul>
        <div class="card-body ">
            <center>
            <div class="mt-3 col-md-8 p-5 shadow-lg">
                            <h3 class="text-center">แก้ไขข้อมูลเว็บไซต์</h3>
                            <hr>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="ms-3 form-floating mt-2">
                                        <input type="text" name="h_name" value="<?php echo $row_us['h_name'];?>" placeholder="name" required class="form-control" style="<?php echo $rad30;?>">
                                        <input type="hidden" name="h_id" value="<?php echo $row_us['h_id'];?>" placeholder="name" required class="form-control" style="<?php echo $rad30;?>">
                                        <label for="">กรุณากรอกชื่อเว็บของท่าน</label>
                                    </div>
                                    <div class="ms-3 form-floating mt-2">
                                        <input type="text" name="h_des"  value="<?php echo $row_us['h_des'];?>" placeholder="email" required class="form-control" style="<?php echo $rad30;?>">
                                        <label for="">กรุณากรอกข้อมูลเกี่ยวกับโรงแรม</label>
                                    </div>
                         
                                    <div class="ms-3 form-floating mt-2">
                                        <input type="email" name="h_email"  value="<?php echo $row_us['h_email'];?>" placeholder="email" required class="form-control" style="<?php echo $rad30;?>">
                                        <label for="">กรุณากรอกอีเมลล์ของท่าน</label>
                                    </div>
                                    <div class="ms-3 form-floating mt-2">
                                        <input type="text" name="h_address"  value="<?php echo $row_us['h_address'];?>" placeholder="email" required class="form-control" style="<?php echo $rad30;?>">
                                        <label for="">กรุณากรอกรายละเอียด</label>
                                    </div>
                                    <div class="ms-3 form-floating mt-2">
                                        <input type="text" max="10" name="h_tel"  value="<?php echo $row_us['h_tel'];?>" placeholder="email" required class="form-control" style="<?php echo $rad30;?>">
                                        <label for="">กรุณากรอกเบอร์โทร</label>
                                    </div>
                                    <input type="file" name="file_img" class="ms-3 form-control mt-2"  style="<?php echo $rad30;?>">
                                    <label for="" class="ms-4"><small>กรุณาใส่รูปภาพของท่าน</small></label>
                                    <br>
                                    <div class="row p-3">
                                    <button name="btn_upload" class="btn btn-white board__hover col-md-12 text-white" style="<?php echo $yellow_bg;?>">แก้ไขข้อมูลเว็บไซต์</button>
                                    </div>
                                </form>
                        </div>
    </div>
            </center>
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