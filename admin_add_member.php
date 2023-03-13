<?php include 'connect.php';
session_start(); 
error_reporting();


$page = "member";
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
        <ul class="mx-4 list-unstyled">
                <li><a href="user.php" class="text-dark text-decoration-none">หน้าเเรก</a><a href="man_member.php" class="text-dark text-decoration-none"> / ระบบจัดการข้อมูลสมาชิก</a><a href="admin_add_member.php" class="text-secondary fw-blod text-decoration-none"> / เพิ่มข้อมูลสมาชิก</a></li>
            </ul>
        <div class="card-body ">
            <center>
            <div class="mt-3 col-md-8 p-5 shadow-lg">
                            <h1 class="fw-bold">เพิ่มสมาชิก</h1>
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
                               <button name="btn_submit" class="btn btn-warning col-md-12 mt-3 shadow-sm text-white fw-bold">เพิ่มสมาชิก</button>
                            </form>
                        </div>
                        </div>
            </center>
                        <?php include 'check_member.php';?>
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