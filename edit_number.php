<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/ed752c8035.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://kit.fontawesome.com/ed752c8035.css" crossorigin="anonymous">

</head>
<body>
    
</body>
</html>
<?php

include 'connect.php';
 
$userid = $_POST['userid'];
 
$sql = "SELECT tb_bill.*,tb_user.*,tb_reser.* From tb_bill JOIN tb_user on tb_bill.u_id = tb_user.u_id  JOIN tb_reser on tb_bill.r_id = tb_reser.r_id where tb_bill.bill_id=".$userid;
$result = mysqli_query($connect,$sql) or die(mysqli_error($connect));
while($row = mysqli_fetch_array($result) ){
?>
    <div class="mb-3">
    <span >จัดการหมายเลขห้องของคุณ </span><span class="fw-bold"><?php echo $row['name'];?></span>
    </div>
    <div>
        <form action="check_room_num.php" class="" method="POST">
                <input type="number" placeholder="กรุณากรอกหมายเลขห้องของท่าน" required name="r_room" class="form-control" value="<?php echo $row['r_room'];?>" min="100" max="999" >
                <input type="hidden" placeholder="กรุณากรอกหมายเลขห้องของท่าน"  name="r_id" class="form-control" value="<?php echo $row['r_id'];?>">
                <button class="btn btn-warning mt-2 text-white col-md-12" name="btn_num">ยืนยันหมายเลขห้อง</button>
        </form>
    </div>
<?php } ?>

