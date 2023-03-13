<?php 
include 'connect.php';
session_start();

$del = "DELETE From tb_user where u_id = '".$_GET['u_id']."'";
$sql = mysqli_query($connect,$del)or die(mysqli_error($connect));
echo "<script type = 'text/javascript'>";
echo "window.history.back();";
echo "</script>";
?>
