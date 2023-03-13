<?php
include 'connect.php';
 
$userid = $_POST['userid'];
 
$sql = "SELECT tb_bill.*,tb_user.* From tb_bill INNER JOIN tb_user on tb_bill.u_id = tb_user.u_id where bill_id=".$userid;
$result = mysqli_query($connect,$sql);
while($row = mysqli_fetch_array($result) ){
?>
    <div class="mb-3">
    <span >เอกสารประกอบการชำระเงินของคุณ </span><span class="fw-bold"><?php echo $row['name'];?></span>
    </div>
    <img width="100%" src="img/<?php echo $row['bill_pic']; ?>">
<?php } ?>