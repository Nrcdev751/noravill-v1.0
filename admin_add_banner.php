<?php include 'connect.php';
session_start(); 
error_reporting(0);

if(!$_SESSION['u_id']){
    echo "<script type = 'text/javascript'>";
    echo "alert('กรุณาเข้าสู่ระบบก่อนครับ');";
    echo "window.location='login.php';";
    echo "</script>";
}


$page = "banner";
$number =1;
$search = isset($_GET['search']) ? $_GET['search']:'';

$user = "SELECT * From tb_user where name like '%$search%'or email like '%$search%'";
$queryuser = mysqli_query($connect,$user)or die(mysqli_error($connect));
$row_u = mysqli_fetch_assoc($queryuser);

$weblogo = "SELECT * from tb_hotel where h_name like'%$search%'";
$queryweblogo = mysqli_query($connect,$weblogo)or die(mysqli_error($connect));
$row_w = mysqli_fetch_assoc($queryweblogo);

$user1 = "SELECT * From tb_user where name like '%$search%'or email like '%$search%'";
$queryuser1 = mysqli_query($connect,$user1)or die(mysqli_error($connect));


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
        <div class="card-body ">
            <ul class="mx-4 list-unstyled">
                <li><a href="user.php" class="text-dark text-decoration-none">หน้าเเรก</a><a href="man_banner.php" class="text-dark text-decoration-none"> / ระบบจัดการข้อมูลพันธมิตร</a><a href="admin_add_banner.php" class="text-secondary fw-blod text-decoration-none"> / เพิ่มพันธมิตร</a></li>
            </ul>
            <center>
            <div class="mt-3 col-md-8 p-5 shadow-lg">
                            <h3 class="text-center">เพิ่มพันธมิตร</h3>
                            <hr>
                                <form action="check_banner.php" method="POST" enctype="multipart/form-data">
              
                                <div class="ms-3 form-floating mt-2">
                                        <input type="text" name="b_name" placeholder="name" required class="form-control" style="<?php echo $rad30;?>">
                                        <label for="">กรุณากรอกชื่อพันธมิตร</label>
                                    </div>
                                    <textarea name="b_des" cols="30" rows="4" placeholder="กรุณากรอกอธิบาย"  style="<?php echo $rad30;?>" class="ms-3 form-control mt-3"></textarea>
                                    <input type="file" name="file_img" class="ms-3 form-control mt-2"  style="<?php echo $rad30;?>">
                                    <label for="" class="ms-4"><small>กรุณาใส่รูปภาพของท่าน</small></label>
                                    <br>
                                    <div class="row p-3">
                                        <button name="btn_upload" class="btn btn-white board__hover  text-white col-md-12" style="<?php echo $yellow_bg;?>">เพิ่มพันธมิตร</button>
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