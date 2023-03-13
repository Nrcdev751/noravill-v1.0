<?php 
include 'connect.php';
session_start();

$del = "DELETE From tb_detail where de_id = '".$_GET['de_id']."'";
$sql = mysqli_query($connect,$del)or die(mysqli_error($connect));
echo "<script type = 'text/javascript'>";
echo "window.history.back();";
echo "</script>";
?>
