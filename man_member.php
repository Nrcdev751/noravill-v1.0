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

$page ="member";
$number =1;
$search = isset($_GET['search']) ?  $_GET['search']:'';

$user = "SELECT * From tb_user where name like '%$search%' or email like '%$search%'";
$queryuser = mysqli_query($connect,$user)or die(mysqli_error($connect));
$row_u = mysqli_fetch_assoc($queryuser);

$user1 = "SELECT * From tb_user where name like '%$search%' or email like '%$search%'";
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
                <div class="row">
                    <div class="h2 text-secoration  ms-3 text-dark d-flex">ระบบจัดการข้อมูลผู้ใช้</div>
                    <hr>
                    <form class="d-flex mt-3 ms-3">
                        <input class="form-control board__hover search rounded-pill text-dark" type="search" name="search" placeholder="ค้นหาชื่อ (หรือ email)" aria-label="Search">
                        <button class="btn board__hover ms-2 rounded-circle  text-white" type="submit"><img src="img/search.svg" width="12px" height="12px" alt=""></button>
                    </form>
                    <a href="admin_add_member.php" class="nav-link active"><button class="btn board__hover ms-4 mt-2 text-white bg-warning  d-flex fw-bold pb-2 py-2" style="border-radius:20px;<?php echo $yellow_bg;?>">+ เพิ่มสมาชิก</button></a>
                    <section class="table table-hover">
                        <div class="table table-resoponsive">
                            <table class="table table-hover">
                                <tr>
                                    <td width="120" align="center">#</td>
                                    <td width="120" align="center">คำขึ้นต้น</td>
                                    <td width="120" align="center">ชื่อ</td>
                                    <td width="120" align="center">นามสกุล</td>
                                    <td width="120" align="center">รุปภาพ</td>
                                    <td width="120" align="center">email</td>
                                    <td width="120" align="center">สัญชาติ</td>
                                    <td width="120" align="center">ตำเเหน่ง</td>
                                    <td width="120" align="center">จัดการ</td>
                                </tr>
                                <?php while($row_us = mysqli_fetch_assoc($queryuser1)){ ?>
                                <tr>
                                    <td width="120" align="center"><?php echo $number;?></td>
                                    <td width="120" align="center"><?php echo $row_us['title'];?></td>
                                    <td width="120" align="center"><?php echo $row_us['name'];?></td>
                                    <td width="120" align="center"><?php echo $row_us['l_name'];?></td>
                                    <td width="120" align="center"><img src="img/<?php echo $row_us['u_pic'];?>" width="50%" height="50%" alt=""></td>
                                    <td width="120" align="center"><?php echo $row_us['email'];?></td>
                                    <td width="120" align="center"><?php echo $row_us['national'];?></td>
                                    <td width="120" align="center"><?php echo $row_us['level'];?></td>
                                    <td width="120" align="center">
                                        <a href="admin_edit_member.php?u_id=<?php echo $row_us['u_id'];?>" class="btn btn-warning  fw-bold text-dark">เเก้ไข</a>
                                       <a onclick="confirmDelete('<?php echo $row_us['u_id'];?>')" class="btn btn-dark text-white  fw-bold">ลบ</a>
                                    </td>
                                </tr>
                                <?php $number++;}?>
                            </table>
                        </div>
                    </section>
                  
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
                window.location.href = "admin_del_member.php?u_id=" +id;
            }
            });
        }
    </script>
</body>
</html>