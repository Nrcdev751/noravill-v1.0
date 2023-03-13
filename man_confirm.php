<?php
include 'connect.php';
session_start();

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

$page ="msg";
$number =1;
$search = isset($_GET['search']) ?  $_GET['search']:'';

$pay_show = "SELECT tb_bill.*,tb_detail.*,tb_reser.*,tb_user.name From tb_bill  JOIN tb_detail
            on tb_bill.de_id = tb_detail.de_id  JOIN tb_reser on tb_bill.r_id = tb_reser.r_id JOIN tb_user on tb_bill.u_id = tb_user.u_id
            where tb_reser.r_room like '%$search%' OR tb_bill.bill_date like '%$search%'  order by bill_date desc";
$pay_show_query = mysqli_query($connect,$pay_show) or die(mysqli_error($connect));

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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/ed752c8035.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://kit.fontawesome.com/ed752c8035.css" crossorigin="anonymous">

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
                    <div class="h2 text-secoration  ms-3 text-dark d-flex">ระบบยืนยันการจองห้องพัก</div>
                    <hr>
                    <form class="d-flex mt-3 ms-3">
                        <input class="form-control board__hover search rounded-pill text-dark" type="search" name="search" placeholder="ค้นหา" aria-label="Search">
                        <button class="btn board__hover ms-2 rounded-circle  text-white" type="submit"><img src="img/search.svg" width="12px" height="12px" alt=""></button>
                    </form>
                  
                    <section class="table table-hover">
                        <div class="table table-resoponsive">
                            <table class="table table-hover">
                                <tr>
                                    <td width="120" align="center">#</td>
                                    <td width="120" align="center">ชื่อผู้จอง</td>
                                    <td width="120" align="center">ห้อง</td>
                                    <td width="120" align="center">จองเมื่อ</td>
                                    <td width="120" align="center">เช็คอิน</td>
                                    <td width="120" align="center">เช็คเอาท์</td>
                                    <td width="120" align="center">ใบเสร็จการชำระเงิน</td>
                                    <td width="120" align="center">จำนวนวัน</td>
                                    <td width="120" align="center">ราคาทั้งสิ้น</td>
                                    <td width="120" align="center">สถานะ</td>
                                    <td width="120" align="center">จัดการ</td>
                                </tr>
                                <?php while($row_us = mysqli_fetch_assoc($pay_show_query)){ ?>
                                <tr>
                                    <td width="120" align="center"><?php echo $number;?></td>
                                    <td width="120" align="center"><?php echo $row_us['name'];?></td>
                                    <td width="120" align="center"><?php echo $row_us['r_room'];?></td>
                                    <td width="120" align="center"><?php echo $row_us['r_date'];?></td>
                                    <td width="120" align="center"><?php echo $row_us['r_checkin'];?></td>
                                    <td width="120" align="center"><?php echo $row_us['r_checkout'];?></td>
                                    <td width="120" align="center"><img id="receipt" src="img/<?php echo $row_us['bill_pic'];?>" width="80" data-id='<?php echo $row_us['bill_id'];?>' class="userinfo" height="80" alt=""  data-bs-toggle="modal" data-bs-target="#exampleModal"></td>
                                    <td width="120" align="center"><?php echo $row_us['r_day'];?></td>
                                    <td width="120" align="center"><?php echo $row_us['bill_price'];?></td>
                                    <td width="120" align="center"><?php echo $row_us['bill_status'];?></td>
                                    <td width="120" align="center">
                                        <?php if($row_us['bill_status']=='รอการยืนยัน') {  ?>
                                            <div class="d-flex justify-content-center">
                                                <form action="" method="POST" class="me-1">
                                                    <input type="hidden" value="<?php echo $row_us['bill_id'];?>" name="bill_id">
                                                    <button name="btn_submit" href="admin_edit_member.php?u_id=<?php echo $row_us['u_id'];?>" class="btn btn-warning  fw-bold "><i class="fa-sharp fa-solid fa-square-check"></i></button>
                                                </form>
                                                <a onclick="confirmDelete('<?php echo $row_us['bill_id'];?>')" class="btn btn-dark text-white  fw-bold">ลบ</a> 
                                            </div>
                                        <?php   } else { ?>
                                            <form action="" method="POST">
                                            <input type="hidden" value="<?php echo $row_us['bill_id'];?>" name="bill_id">
                                            <button name="btn_del" class="btn btn-warning  fw-bold "><i class="fa-sharp fa-solid fa-ban"></i></button>
                                            </form>
                                        <?php } ?>
                                       
                                    </td>
                                </tr>
                                <?php $number++; }?>
                            </table>
                        </div>
                    </section>
                  
                </div>
            </div>
            <script type='text/javascript'>
            $(document).ready(function(){
                $('.userinfo').click(function(){
                    var userid = $(this).data('id');
                    $.ajax({
                        url: 'ajaxfile.php',
                        type: 'post',
                        data: {userid: userid},
                        success: function(response){ 
                            $('.modal-body').html(response); 
                            $('#empModal').modal('show'); 
                        }
                    });
                });
            });
            </script>
                <div class="modal fade" id="empModal">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                               <h3>รูปประกอบการชำระเงิน</h3>
                            </div>
                            <div class="modal-body">
                                <img src="" width="100%" alt="">
                                <div class="test" id="test"></div>
                            </div>
                    
                        </div>
                    </div>
                </div>                         
        </div>
    </main>
    
    <script src="js/jquery-3.6.1.min.js"></script>
    <script>
        var pic = document.getElementById("receipt");

    </script>
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
                window.location.href = "admin_del_bill.php?bill_id=" +id;
            }
            });
        }
    </script>
    <?php include 'script.php';?>
    <?php include 'check_confirm.php';?>
</body>
</html>