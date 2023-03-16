<?php include 'connect.php';
session_start(); 
error_reporting(0);

if(!$_SESSION['u_id']){
    echo "<script type = 'text/javascript'>";
    echo "alert('กรุณาเข้าสู่ระบบก่อนครับ');";
    echo "window.location='login.php';";
    echo "</script>";
}


$page = "room";
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

$user1 ="SELECT * From tb_detail where de_id = '".$_GET['de_id']."'";
$queryuser1 = mysqli_query($connect,$user1)or die(mysqli_error($connect));
$row_us = mysqli_fetch_assoc($queryuser1);

$catg = "SELECT * From category";
$querycatg = mysqli_query($connect,$catg)or die(mysqli_error($connect));
if(isset($_POST['btn_upload'])) {
    $filetmp = $_FILES['file_img']['tmp_name'];
    $filename = $_FILES['file_img']['name'];
    $filetype = $_FILES['file_img']['type'];
    $filepath = "img/".$filename;
    move_uploaded_file($filetmp,$filepath);

    $sql = "UPDATE tb_detail set de_name = '".$_POST['de_name']."',
                        de_detail = '".$_POST['de_detail']."',
                        de_short_des = '".$_POST['de_short_des']."',
                        de_price = '".$_POST['de_price']."',
                        de_floor = '".$_POST['de_floor']."',
                        de_count = '".$_POST['de_count']."',
                        catg_id = '".$_POST['catg_id']."',
                        de_img = '".$filename."'
                        where de_id = '".$_GET['de_id']."'";
    $update = mysqli_query($connect,$sql) or die(mysqli_error($connect));
    echo "<script type = 'text/javascript'>;";
    echo "alert('แก้ไขข้อมูลเสร็จสิ้น');";
    echo "window.location='man_room.php';";
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
                <li><a href="user.php" class="text-dark text-decoration-none">หน้าเเรก</a><a href="man_room.php" class="text-dark text-decoration-none"> / ระบบจัดการข้อมูลห้องพัก</a><a href="admin_edit_room.php" class="text-secondary fw-blod text-decoration-none"> / เเก้ไขข้อมูลห้องพัก</a></li>
            </ul>
            <center>
            <div class="mt-3 col-md-8 p-5 shadow-lg">
        <h3 class="text-center">แก้ไขข้อมูลห้องพัก</h3>
                            <hr>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="ms-3 form-floating mt-2">
                                        <input type="text" name="de_name" value="<?php echo $row_us['de_name'];?>" placeholder="name" required class="form-control" style="<?php echo $rad30;?>">
                                        <label for="">กรุณากรอกชื่อห้องพัก</label>
                                    </div>
                                    <div class="ms-3 form-floating mt-2">
                                        <input type="text" name="de_detail"  value="<?php echo $row_us['de_detail'];?>" placeholder="email" required class="form-control" style="<?php echo $rad30;?>">
                                        <label for="">กรุณากรอกรายละเอียดห้อง</label>
                                    </div>
                                    <div class="ms-3 form-floating mt-2">
                                        <input type="text" name="de_short_des"  value="<?php echo $row_us['de_short_des'];?>" placeholder="email" required class="form-control" style="<?php echo $rad30;?>">
                                        <label for="">กรุณากรอกรายละเอียดห้องเเบบสั้น</label>
                                    </div>
                                    <div class="ms-3 form-floating mt-2">
                                        <input type="number" name="de_count"  value="<?php echo $row_us['de_count'];?>" placeholder="email" required class="form-control" style="<?php echo $rad30;?>">
                                        <label for="">กรุณาระบุจำนวนห้องที่ว่าง</label>
                                    </div>
                                    <div class="ms-3 form-floating mt-2">
                                        <input type="number" name="de_price"  value="<?php echo $row_us['de_price'];?>" placeholder="email" required class="form-control" style="<?php echo $rad30;?>">
                                        <label for="">กรุณาระบุราคา</label>
                                    </div>
                                    <input type="file" name="file_img" class="ms-3 form-control mt-2"  style="<?php echo $rad30;?>">
                                    <label for="" class="ms-4"><small>กรุณาใส่รูปภาพของท่าน</small></label>
                                    <br>
                                    <select name="catg_id" id="catg_id" class="ms-3 form-control" style="border-radius:20px">
                                    <?php while($row_c = mysqli_fetch_assoc($querycatg)){ ?>
                                    <option value="<?php echo $row_c['catg_id'];?>"><?php echo $row_c['catg_name'];?></option>
                                    <?php } ?>
                                    </select>
                                    <div class="row p-3">
                                    <button name="btn_upload" class="btn btn-white board__hover col-md-12 text-white" style="<?php echo $yellow_bg;?>">แก้ไขข้อมูลห้องพัก</button>
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