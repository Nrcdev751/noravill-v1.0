<?php
$connect = mysqli_connect("localhost","root","","noravill2");
mysqli_query($connect,"SET NAMES UTF8");
date_default_timezone_set("Asia/Bangkok");
?>
<?php

$web_setting = "SELECT * From tb_hotel";
$web_query = mysqli_query($connect,$web_setting);
$row_w = mysqli_fetch_assoc($web_query);


$hero_t = "font-size: 85px;";
$hero_st = "font-size: 30px;";
$icon_t = "font-size: 25px;";
$slide_t = "font-size: 20px;";
$rad25 = "border-radius: 25px ;";
$white_t = " color: #d6d6d6;";

$yellow_bg = "    background-color: rgb(248,183,50);
    background: linear-gradient(280deg, rgba(248,183,50,1)0%";

    
$radi_yellow = "background-color: #e5ca26;";
$white_bg = "background-color: rgb(227, 227, 227);";
?>
