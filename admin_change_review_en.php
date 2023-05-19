<?php 
include 'connect.php';
session_start();

$del = "UPDATE review Set re_status = 'disable'  where re_id = '".$_GET['re_id']."'";
$sql = mysqli_query($connect,$del)or die(mysqli_error($connect));
echo "<script type = 'text/javascript'>";
echo "window.history.back();";
echo "</script>";
?>
