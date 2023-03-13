<?php 
       if(isset($_POST['btn_submit'])){
 
       
                $bill_id = $_POST['bill_id'];

                $bill = "UPDATE tb_bill SET bill_status = 'ชำระเงินแล้ว' where bill_id = '$bill_id'";
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
 
       
            $bill_id = $_POST['bill_id'];

            $bill = "UPDATE tb_bill SET bill_status = 'รอการยืนยัน' where bill_id = '$bill_id'";
            $bill_query = mysqli_query($connect,$bill);
         
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