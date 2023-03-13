<?php
     if(isset($_POST['btn_num'])){
 
       
        $r_room = $_POST['r_room'];
        $r_id = $_POST['r_id'];

        $bill = "UPDATE tb_reser SET r_room = '$r_room' where r_id = '$r_id'";
        $bill_query = mysqli_query($connect,$bill);
     
        echo 
        "<script type ='text/javascript'>;
            swal('สำเร็จ', 'ยืนยันสำเร็จ', 'success');;
            setTimeout(function(){
            window.history.back();
            },1500);
            </script>;
        ";
    
 
}

 if(isset($_POST['btn_del'])){
 
       
    $r_id = $_POST['r_id'];

    $reser_number = "UPDATE tb_reser SET r_room = 'รอการยืนยัน' where r_id = '$r_id'";
    $number_query = mysqli_query($connect,$reser_number);
 
    echo 
    "<script type ='text/javascript'>;
        swal('สำเร็จ', 'ยกเลิกสำเร็จ', 'success');;
        setTimeout(function(){
        window.history.back();
        },1500);
        </script>;
    ";


}

?>