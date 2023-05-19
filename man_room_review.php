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

$page ="room_review";
$number =1;
$search = isset($_GET['search']) ?  $_GET['search']:'';

$user = "SELECT * From tb_user where name like '%$search%' or email like '%$search%'";
$queryuser = mysqli_query($connect,$user)or die(mysqli_error($connect));
$row_u = mysqli_fetch_assoc($queryuser);

$weblogo = "SELECT * from tb_hotel where h_name like'%$search%'";
$queryweblogo = mysqli_query($connect,$weblogo)or die(mysqli_error($connect));
$row_w = mysqli_fetch_assoc($queryweblogo);

$user1 = "SELECT * From review INNER JOIN tb_user on tb_user.u_id = review.u_id order by review.re_date desc";
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
                    <div class="h2 text-secoration  ms-3 text-dark d-flex">ระบบจัดการรีวิวห้องพัก</div>
                    <hr>
            
                   
                    <section class="table table-hover">
                        <div class="table table-resoponsive">
                            <table class="table table-hover">
                                <tr>
                                    <td width="120" align="center">#</td>
                                    <td width="120" align="center">ชื่อ</td>
                                    <td width="120" align="center">คำอธิบาย</td>
                                    <td width="120" align="center">คะแนนรีวิว</td>
                                    <td width="120" align="center">วันที่รีวิว</td>
                                    <td width="120" align="center">สถานะ</td>
                                </tr>
                                <?php while($row_us = mysqli_fetch_assoc($queryuser1)){ ?>
                                <tr>
                                    <td width="120" align="center"><?php echo $number;?></td>
                                    <td width="120" align="center"><?php echo $row_us['name'];?></td>
                               
                                    <td width="280" align="center"><?php echo $row_us['re_des'];?></td>
                                    <td width="280" align="center">
                                    <?php if($row_us['re_score']==1){ ?>
                                            <img src="img/star1.svg" width="120" alt="">
                                    <?php  }elseif($row_us['re_score']==2){ ?>
                                        <img src="img/star2.svg" width="120" alt="">
                                    <?php  }elseif($row_us['re_score']==3){ ?>
                                            <img src="img/star3.svg" width="120" alt="">
                                    <?php  }elseif($row_us['re_score']==4){ ?>
                                                <img src="img/star4.svg" width="120" alt="">
                                    <?php  }elseif($row_us['re_score']==5){ ?>
                                                    <img src="img/star5.svg" width="120" alt="">
                                    <?php } ?>
                                    </td>
                                    <td width="280" align="center"><?php echo $row_us['re_date'];?></td>
                                    <?php if($row_us['re_status']=='enable'){ ?>
                                     <td width="120" align="center"><a href="admin_change_review_en.php?re_id=<?php echo $row_us['re_id'];?>"><i class="fa-sharp fa-solid fa-eye text-dark"></i></a></td>
                                    <?php  }else{ ?>
                                    <td width="120" align="center"><a href="admin_change_review_ds.php?re_id=<?php echo $row_us['re_id'];?>"><i class="fa-sharp fa-solid fa-eye-slash text-dark"></i></a></td>
                                    <?php  } ?>
                                
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
                window.location.href = "admin_del_catg.php?catg_id=" +id;
            }
            });
        }
    </script>
</body>
</html>