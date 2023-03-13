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

$user = "SELECT * From tb_user where name like '%$search%' or email like '%$search%'";
$queryuser = mysqli_query($connect,$user)or die(mysqli_error($connect));
$row_u = mysqli_fetch_assoc($queryuser);

$user1 = "SELECT * From tb_detail where de_name like '%$search%'";
$queryuser1 = mysqli_query($connect,$user1)or die(mysqli_error($connect));
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
            
                <section class="room_count p-3 mt-5">
                    <div class="row">
                    <!-- คอลัมน์ห้องพัก -->
                        <div class="col-md-6">
                            <div>
                                <h3 class="fw-bold"><i class="fa-sharp fa-solid fa-hotel"></i> รายการข้อมูลห้องพัก</h3>
                            </div>
                            <!-- คอลัมน์จำนวนห้องพัก -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="container bg-white shadow p-5 rounded-3 text-center mt-2">
                                        <h1><i class="fa-sharp fa-solid fa-door-closed"></i> <span class="fw-bold h3"><br> <span class="text-warning h2 fw-bold ">1 ห้อง</span><br> <span class="h4 fw-bold">( ห้องเตียงเดี่ยว )</span></span></h1>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="container bg-white shadow p-5 rounded-3 text-center mt-2">
                                        <h1><i class="fa-sharp fa-solid fa-door-closed"></i> <span class="fw-bold h3"><br> <span class="text-warning h2 fw-bold ">1 ห้อง</span><br> <span class="h4 fw-bold">( ห้องเตียงคู่ )</span></span></h1>
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
                                                <span> <i class="fa-sharp fa-solid fa-ticket h2 mt-2"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <p>จำนวนผู้เข้าจอง <br>ทั้งสิ้น <span class="fw-bold text-warning">1</span> คน</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="container satis-item shadow ">
                                                <span> <i class="fa-sharp fa-solid fa-ticket h2 mt-2"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <p>จำนวนผู้เข้าจอง <br>ทั้งสิ้น <span class="fw-bold text-warning">1</span> คน</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="container satis-item shadow ">
                                                <span> <i class="fa-sharp fa-solid fa-ticket h2 mt-2"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <p>จำนวนผู้เข้าจอง <br>ทั้งสิ้น <span class="fw-bold text-warning">1</span> คน</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="container satis-item shadow ">
                                                <span> <i class="fa-sharp fa-solid fa-ticket h2 mt-2"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <p>จำนวนผู้เข้าจอง <br>ทั้งสิ้น <span class="fw-bold text-warning">1</span> คน</p>
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
                            <div class="col-md-6 ">
                                <div class="container p-3">
                                    <form action="" >
                                        <div class="form-inline  bg-white shadow p-3 rounded-3 h4">
                                           
                                            <label for="" class="form-label fw-bold">1. ห้องเตียงเดี่ยว :</label>
                                            <input type="number"  min="0" value="1" class="form-input col-md-2 text-warning fw-bold border-0 text-center"><span class="fw-bold">ห้อง</span>
                                        </div>
                                        <div class="form-inline  bg-white shadow p-3 rounded-3 h4">
                                           
                                            <label for="" class="form-label fw-bold">2. ห้องเตียงคู่ :</label>
                                            <input type="number"  min="0" value="1" class="form-input col-md-2 text-warning fw-bold border-0 text-center"><span class="fw-bold">ห้อง</span>
                                        </div>
                                        <button class="btn btn-warning col-md-12 mt-3 shadow fw-bold  p-3"><h5 class="fw-bold"><i class="fa-sharp fa-solid fa-wrench"></i> ปรับจำนวนห้องพัก</h5></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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
</body>
</html>