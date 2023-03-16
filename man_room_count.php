<?php
include 'connect.php';
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

$page ="room_count";
$number =1;
$search = isset($_GET['search']) ?  $_GET['search']:'';
$de_id1 = "1";
$de_id2 = "3";

$user = "SELECT * From tb_user where name like '%$search%' or email like '%$search%'";
$queryuser = mysqli_query($connect,$user)or die(mysqli_error($connect));
$row_u = mysqli_fetch_assoc($queryuser);

$user1 = "SELECT * From tb_detail where de_name like '%$search%'";
$queryuser1 = mysqli_query($connect,$user1)or die(mysqli_error($connect));

$room = "SELECT * from tb_detail where de_name = 'ห้องพักเตียงเดี่ยว'";
$queryroom = mysqli_query($connect,$room)or die(mysqli_error($connect));
$room_count = mysqli_fetch_assoc($queryroom);

$room2 = "SELECT * from tb_detail where de_name = 'ห้องพักเตียงคู่'";
$queryroom2 = mysqli_query($connect,$room2)or die(mysqli_error($connect));
$room2_count = mysqli_fetch_assoc($queryroom2);

$reser = "SELECT * From tb_reser";
$queryreser = mysqli_query($connect,$reser)or die(mysqli_error($connect));
$reser_count = mysqli_num_rows($queryreser);

$conw = "SELECT * From tb_reser where r_room = 'รอการยืนยัน'";
$queryconw = mysqli_query($connect,$conw)or die(mysqli_error($connect));
$conw_count = mysqli_num_rows($queryconw);

$conf = "SELECT * From tb_reser where r_room != 'รอการยืนยัน'";
$queryconf = mysqli_query($connect,$conf)or die(mysqli_error($connect));
$conf_count = mysqli_num_rows($queryconf);

$bill = "SELECT * From tb_bill";
$querybill = mysqli_query($connect,$bill)or die(mysqli_error($connect));
$bill_count = mysqli_num_rows($querybill);


$room_de ="SELECT * From tb_detail ORDER BY de_id ASC";
$queryroom_de = mysqli_query($connect,$room_de)or die(mysqli_error($connect));


$national = "SELECT level From tb_user where national = 'ไทย'";
$querynational = mysqli_query($connect,$national)or die(mysqli_error($connect));
$national_count = mysqli_num_rows($querynational);

$national2 = "SELECT level From tb_user where national != 'ไทย'";
$querynational2 = mysqli_query($connect,$national2)or die(mysqli_error($connect));
$national2_count = mysqli_num_rows($querynational2);

$web = "SELECT * From tb_hotel";
$queryweb = mysqli_query($connect,$web)or die(mysqli_error($connect));
$web_count = mysqli_fetch_assoc($queryweb);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row_w['h_name'];?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body style = "font-family: 'Kanit', sans-serif;">
    <main>
        <div class="main-container d-flex">
            <?php include 'sidebar.php';?>
            <div class="content">
                <nav class="navbar navbar-expand-lg navbar-light bg-white">
                    <button class="btn d-md-none open-btn d-block "><img src="img/list.svg" alt=""></button>
                </nav>
                <ul class="mx-4 list-unstyled">
                <li><a href="user.php" class="text-dark text-decoration-none">หน้าเเรก</a><a href="man_room_count.php" class="text-dark text-decoration-none"> / รายงานผลข้อมูลห้องพัก</a></li>
            </ul>
                <center>

                <div class="mt-3 col-md-12 p-5 shadow-lg">
                <section class="room_count p-3 mt-5">
                    <div class="row ">
                    <!-- คอลัมน์ห้องพัก -->
                        <div class="col-md-6">
                            <div>
                                <h3 class="fw-bold"><i class="fa-sharp fa-solid fa-hotel"></i> รายการข้อมูลห้องพัก</h3>
                            </div>
                            <!-- คอลัมน์จำนวนห้องพัก -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="container bg-white shadow p-5 rounded-3 text-center mt-2">
                                        <h1><i class="fa-sharp fa-solid fa-door-closed"></i> <span class="fw-bold h3"><br> <span class="text-warning h2 fw-bold "><?php echo number_format($room_count['de_count']);?> ห้อง</span><br> <span class="h4 fw-bold">( ห้องเตียงเดี่ยว )</span></span></h1>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="container bg-white shadow p-5 rounded-3 text-center mt-2">
                                        <h1><i class="fa-sharp fa-solid fa-door-closed"></i> <span class="fw-bold h3"><br> <span class="text-warning h2 fw-bold "><?php echo number_format($room2_count['de_count']);?> ห้อง</span><br> <span class="h4 fw-bold">( ห้องเตียงคู่ )</span></span></h1>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- คอลัมน์สถิติห้องพัก -->
                            <h4 class="fw-bold mt-5 " style="margin-left: 4rem;">ข้อมูลเบื้องต้น</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="container satis-item shadow ">
                                                <span><i class="fa-solid fa-users-line h2 mt-2"></i></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <p>จำนวนผู้เข้าจอง <br>ทั้งสิ้น <span class="fw-bold text-warning"><?php echo $reser_count;?> </span> คน</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="container satis-item shadow ">
                                                <span> <i class="fa-solid fa-user-clock h2 mt-2"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <p>ลูกค้าที่รอการยืนยัน <br>ทั้งสิ้น <span class="fw-bold text-warning"><?php echo $conw_count;?></span> คน</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="container satis-item shadow ">
                                                <span> <i class="fa-solid fa-receipt h2 mt-2"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <p>จำนวนใบเสร็จ <br>ทั้งสิ้น <span class="fw-bold text-warning"><?php echo $bill_count;?></span> ใบ</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="container satis-item shadow ">
                                                <span> <i class="fa-solid fa-user-check h2 mt-2"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <p>ลูกค้าที่ยืนยันเเล้ว <br>ทั้งสิ้น <span class="fw-bold text-warning"><?php echo $conf_count;?></span> คน</p>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                           
                        </div>
                              <!-- คอลัมน์ปรับจำนวนห้องพัก -->
                        <div class="col-md-6">
                            <div>
                                <h3 class="fw-bold"><i class="fa-sharp fa-solid fa-wrench"></i> ปรับจำนวนห้องพัก</h3>
                            </div>
                            <div class="col-md-9 ">
                            <?php include 'update_room_count.php'; ?>
                            </form>
                        </div>
                        <h4 class="ms-3 fw-bold mt-5 " style="margin-left: 4rem;">ข้อมูลเเสดงการจำเเนกประเทศลูกค้า</h4>
                            <div class="row">
                                <div class="mt-2 col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="container satis-item shadow ">
                                                <span><i class="fa-solid fa-user-large h2 mt-2"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <p>จำนวนผู้ใช้งานชาวไทย <br>ทั้งสิ้น <span class="fw-bold text-warning"><?php echo $national_count;?> </span> คน</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 col-md-6">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="container satis-item shadow ">
                                            <span><i class="fa-solid fa-user-large h2 mt-2"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-7 text-center">
                                            <p>จำนวนผู้ใช้งานชาวต่างชาติ <br>ทั้งสิ้น <span class="fw-bold text-warning"><?php echo $national2_count;?></span> คน</p>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </section>
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
    <script>
        function confirmDelete(id) {

                swal({
            title: "คุณแน่ใจว่าจะลบรายการ",
            text: "หากลบรายการนี้แล้วรายการจะหายไปตลอดจะไม่สามารถกู้คืนได้อีก",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location.href = "admin_del_room.php?de_id=" +id;
            }
            });
        }
    </script>
        <?php include 'script.php';?>
</body>
</html>