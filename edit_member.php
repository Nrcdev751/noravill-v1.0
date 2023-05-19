<?php

if(isset($_POST['btn_submit'])) {
    $filetmp = $_FILES['file_img']['tmp_name'];
    $filename = $_FILES['file_img']['name'];
    $filetype = $_FILES['file_img']['type'];
    $filepath = "img/".$filename;
    move_uploaded_file($filetmp,$filepath);

    $sql = "UPDATE tb_user set 
    name = '".$_POST['name']."',
    l_name = '".$_POST['l_name']."',
    email = '".$_POST['email']."',
    tel = '".$_POST['tel']."',
    national = '".$_POST['national']."',
    country = '".$_POST['country']."',
    u_review = '".$_POST['u_review']."',
    line_id = '".$_POST['line_id']."',
    level = '".$_POST['level']."'
    where u_id = '".$_GET['u_id']."'";
    $query = mysqli_query($connect,$sql) or die(mysqli_error($connect));
    echo 
    "<script type ='text/javascript'>;
        swal('สำเร็จ', 'แก้ไขข้อมูลเสร็จสิ้น', 'success');;
        setTimeout(function(){
        window.history.back();
        },1500);
        </script>;
    ";
}
?>