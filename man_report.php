<?php include 'connect.php';
session_start(); 
error_reporting();

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
$page = "report";
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
$user_count = mysqli_num_rows($queryuser1);

$room1 = "SELECT * From tb_detail where de_name like '%$search%'";
$queryroom1 = mysqli_query($connect,$room1)or die(mysqli_error($connect));
$room_count = mysqli_num_rows($queryroom1);

$catg1 = "SELECT * From category where catg_name like '%$search%'";
$querycatg1 = mysqli_query($connect,$catg1)or die(mysqli_error($connect));
$catg_count = mysqli_num_rows($querycatg1);

$review1 = "SELECT * From review ";
$queryreview1 = mysqli_query($connect,$review1)or die(mysqli_error($connect));
$re_count = mysqli_num_rows($queryreview1);



$admin = "SELECT level From tb_user where level = 'admin'";
$queryadmin = mysqli_query($connect,$admin)or die(mysqli_error($connect));
$admin_count = mysqli_num_rows($queryadmin);

$reserve = "SELECT de_show From tb_detail where de_show = 'pending'";
$queryreserve = mysqli_query($connect,$reserve)or die(mysqli_error($connect));
$reserve_count = mysqli_num_rows($queryreserve);

$enable = "SELECT de_show From tb_detail where de_show = 'enable'";
$queryenable = mysqli_query($connect,$enable)or die(mysqli_error($connect));
$enable_count = mysqli_num_rows($queryenable);

$national = "SELECT level From tb_user where national = 'ไทย'";
$querynational = mysqli_query($connect,$national)or die(mysqli_error($connect));
$national_count = mysqli_num_rows($querynational);

$national2 = "SELECT level From tb_user where national != 'ไทย'";
$querynational2 = mysqli_query($connect,$national2)or die(mysqli_error($connect));
$national2_count = mysqli_num_rows($querynational2);

$web = "SELECT * From tb_hotel";
$queryweb = mysqli_query($connect,$web)or die(mysqli_error($connect));
$h_count = mysqli_fetch_assoc($queryweb);

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
    <link rel="stylesheet" href="css/sb-admin-2.css">
    <link rel="stylesheet" href="css/sb-admin-2.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/ed752c8035.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://kit.fontawesome.com/ed752c8035.css" crossorigin="anonymous">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body style = "font-family: 'Kanit', sans-serif;">
<main>
<div class="main-container d-flex">
        <?php include 'sidebar.php'; ?>
        <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadown-sm">
            <button class="btn d-md-none d-block open-btn"><img src="img/list.svg" alt=""></button>
        </nav>
        <div class="row bg-white shadow-sm rec-main">
            <div class="block bg-white">
                               <swiper-container pagination="true" pagination-dynamic-bullets="true">
                <swiper-slide>
            <center>
            <div class="ms-2 mt-2 h2 text-secoration text-dark">ระบบรายงานผลข้อมูล</div>
            </center>
                <div class="row mt-4">
                    <div class="ms-2 row col-md-12 bg-light mt-2">
                    <div class=" h3 text-secoration text-dark">รายงานสรุปข้อมูลผู้ใช้</div>
                    <div class="col-md-3">
                            <div class="container board__hover px-2 py-2 bg-warning">
                            <span class="h4 text-secoration d-flex text-white">จำนวนสมาชิกทั้งสิ้น</span>
                            <h4 class="fw-bold text-center text-white" style="<?php echo $pink_t;?>"><?php echo $user_count;?> คน</h4>
                            </div>
                    </div>
                    <div class="col-md-3">
                            <div class="container board__hover px-2 py-2 bg-warning">
                            <span class="h4 text-secoration d-flex text-white">จำนวนเเอดมินทั้งสิ้น</span>
                            <h4 class="fw-bold text-center text-white" style="<?php echo $pink_t;?>"><?php echo $admin_count;?> คน</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <div class="container board__hover px-2 py-2 bg-warning">
                        <span class="h4 text-secoration  text-white">จำนวนห้องพักทั้งสิ้น</span>
                        <h4 class="fw-bold text-center text-white" style="<?php echo $pink_t;?>"><?php echo $room_count;?> ห้อง</h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="container board__hover px-2 py-2 bg-warning">
                        <span class="h4 text-secoration  text-white">จำนวนประเภทห้องพักทั้งสิ้น</span>
                        <h4 class="fw-bold text-center text-white" style="<?php echo $pink_t;?>"><?php echo $catg_count;?> ประเภท</h4>
                        </div>
                        <br>
                    </div>
                    </div>
                    
                    
                    <center>
                    <div class="ms-2 col-md-9">
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-warning">กราฟ</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                     <!-- Card Body -->
                     <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </center>
                </div>
            </div>

        </div>
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
<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>
</html>