<?php 
    $confirm = "SELECT bill_status From tb_bill where bill_status = 'รอการยืนยัน'";
    $confirm_query = mysqli_query($connect,$confirm);
    $count_conf = mysqli_num_rows($confirm_query);
    
    $count_room = "SELECT tb_bill.*,tb_reser.* From tb_bill INNER JOIN tb_reser on tb_bill.r_id = tb_reser.r_id
         where bill_status = 'ชำระเงินแล้ว' AND r_room = 'รอการยืนยัน'";
    $count_room_query = mysqli_query($connect,$count_room);
    $count_room = mysqli_num_rows($count_room_query);
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/ed752c8035.js" crossorigin="anonymous"></script>
<div class="sidebar bg-dark" id="side_nav">
    <div class="header-box px-3 pt-3 pb-3 py-4 d-flex justify-container-between">
        <img src="img/mong2.png" width="50px" height="70px" alt="" class="rounded-circle">
        <h5 class="text-secoration text-white mx-2 mt-4">ระบบเเอดมิน</h5>
        <tr class="text-dark">
            <button class="btn d-md-none list d-block close-btn mt-1"><img src="img/list.svg" width="20px" height="20px" alt=""></button>
        </tr>
    </div>
    <ul class="list-unstyled mx-3">
        <li class=""><a href="man_report.php" class="text-decoration-none d-flex a_w px-2 py-2 <?php if($page=='report'){echo 'side_nav';}?>"><i class="fa-sharp fa-solid fa-database mt-1 me-2"></i> รายงานผลข้อมูลทั่วไป</a></li>
        <li class=""><a href="man_room_count.php" class="text-decoration-none d-flex a_w px-2 py-2 <?php if($page=='room_count'){echo 'side_nav';}?>"><i class="fa-sharp fa-solid fa-hotel mt-1 me-2"></i> รายงานผลข้อมูลห้องพัก</a></li>
    </ul>
    <ul class="list-unstyled mx-3">
        <li class=""><a href="man_member.php" class="text-decoration-none d-flex a_w px-2 py-2 <?php if($page=='member'){echo 'side_nav';}?>"><i class="fa-sharp fa-solid fa-person mt-1 me-2"></i> จัดการข้อมูลสมาชิก</a></li>
        <li class=""><a href="man_notify.php" class="text-decoration-none d-flex a_w px-2 py-2 <?php if($page=='notify'){echo 'side_nav';}?>"><i class="fa-sharp fa-solid fa-bell mt-1 me-2"></i> จัดการประชาสัมพันธ์</a></li>
        <li class=""><a href="man_catg.php" class="text-decoration-none d-flex a_w px-2 py-2 <?php if($page=='catg'){echo 'side_nav';}?>"><i class="fa-sharp fa-solid fa-table-columns mt-1 me-2"></i> จัดการประเภทห้องพัก</a></li>
        <li class=""><a href="man_room.php" class="text-decoration-none d-flex a_w px-2 py-2 <?php if($page=='room'){echo 'side_nav';}?>"><i class="fa-sharp fa-solid fa-bed mt-1 me-2"></i> จัดการข้อมูลห้องพัก</a></li>
      
        <li class="side_con"><a href="man_confirm.php" class="text-decoration-none d-flex a_w px-2 py-2 <?php if($page=='msg'){echo 'side_nav';}?>">
        <?php if($count_conf > 0){ ?>
            <span class="bg-danger text-white side_inner ps-2 pe-2 d-flex "><?php echo $count_conf;?></span>
       <?php } ?>
        <i class="fa-sharp fa-solid fa-check mt-1 me-2"></i> ยืนยันการจองห้องพัก </a></li>
        <li class="side_con"><a href="man_room_num.php" class="text-decoration-none d-flex a_w px-2 py-2 <?php if($page=='room_num'){echo 'side_nav';}?>">
        <?php if($count_room > 0){ ?>
            <span class="bg-danger text-white side_inner ps-2 pe-2 d-flex "><?php echo $count_room;?></span>
       <?php } ?>
       <i class="fa-sharp fa-solid fa-door-closed mt-1 me-2"></i> ยืนยันหมายเลขห้องพัก </a></li>
    </ul>
    <hr>
    <ul class="list-unstyled mx-3">
        <li class=""><a href="admin_edit_setting.php" class="text-decoration-none d-flex a_w px-2 py-2 <?php if($page=='setting'){echo 'side_nav';}?>"><i class="fa-sharp fa-solid fa-gear mt-1 me-2"></i> ตั้งค่าระบบ</a></li>
        <li class=""><a href="user.php" class="text-decoration-none d-flex a_w px-2 py-2"><i class="fa-sharp fa-solid fa-house mt-1 me-2"></i> หน้าเเรก</a></li>
    </ul>
    <hr>
    <ul class="list-unstyled mx-3">
        <li class=""><a href="logout.php" class="text-decoration-none d-flex text-dark px-2 py-2" style="<?php echo $yellow_bg;?>">ออกจากระบบ</a></li>
    </ul>
</div>
