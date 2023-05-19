<?php
    $review = "SELECT * From review INNER JOIN tb_user on tb_user.u_id = review.u_id where review.re_status = 'enable' limit 3";
    $review_query = mysqli_query($connect,$review) or die(mysqli_error($connect));
?>
<section class="recommend p-5 bg-white">
    <div class="container mb-2">
        <div class="row">
            <div class="rec-main">
                <h2 class="rec-title text-center mb-4 fw-bold"><i class="fa-sharp fa-solid fa-check me-2"></i>รีวิวจากลูกค้า</h2>
                <hr>
            </div>
            <div class="col-md-12">
                <swiper-container pagination="true" pagination-dynamic-bullets="true">
               <?php while($row_re = mysqli_fetch_assoc($review_query)) { ?>
                 <swiper-slide>
                 <div style="<?php echo $rad25;?>" class="container p-5 shadow bg-light text-white col-md-8">
                 <div>
                 <img src="img/<?php echo $row_re['u_pic'];?>" class="rounded-circle" width="60" height="60" class="" alt="">
                     <span class="text-dark fw-bold h4 ms-2"><?php echo $row_re['name'];?></span><span>
                         <?php if($row_re['re_score']==1){ ?>
                                            <img src="img/star1.svg" class="mt-3 float-end" width="75" alt="">
                                    <?php  }elseif($row_re['re_score']==2){ ?>
                                        <img src="img/star2.svg" class="mt-3 float-end" width="75" alt="">
                                    <?php  }elseif($row_re['re_score']==3){ ?>
                                            <img src="img/star3.svg" class="mt-3 float-end" width="75" alt="">
                                    <?php  }elseif($row_re['re_score']==4){ ?>
                                                <img src="img/star4.svg" class="mt-3 float-end" width="75" alt="">
                                    <?php  }elseif($row_re['re_score']==5){ ?>
                                                    <img src="img/star5.svg" class="mt-3 float-end" width="75" alt="">
                                    <?php } ?>
                     </span>
                     <!-- <br> <small class="text-secondary ms-5 p-4">Lorem ipsum dolor sit amet.</small> -->
                     <p class="text-dark mt-4"><?php echo $row_re['re_des'];?></p>
                 </div>
                     <hr class="text-dark">
                     <span class="text-secondary float-end me-5"><?php echo $row_re['re_date'];?></span>
                 </div>
             </swiper-slide>
             <?php  } ?>
            
                
            
            </swiper-container>
            </div>
          
           
        </div>
    </div>
</section>