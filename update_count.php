<meta charset="utf-8" />
<?php
include('connect.php');
foreach($_POST['update_count']  as $item=>$value){
//item คือid ประเมิน pk ในตาราง
//value คือคะแนนประเมิน *ที่อัพเดท
$sql = "UPDATE tb_detail SET de_count=$value WHERE de_id=$item";
$result = mysqli_query($connect, $sql) or die ("Error in query: $sql " . mysqli_error($connect));
echo "<script type = 'text/javascript'>";
echo "window.history.back();";
echo "</script>";
}
	
?>
