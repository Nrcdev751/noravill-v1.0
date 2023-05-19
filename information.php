<?php 
    $notify = "SELECT * From notify order by n_date desc limit 3";
    $notify_query = mysqli_query($connect,$notify) or die(mysqli_error($connect));
?>
<section class="infomation">
      <div class="container p-5">
        <div class="row">
                <div class="col-md-6">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img src="img/slide_pro_1.png" style="<?php echo $rad25;?>"class="d-block shadow w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h2 class="fw-bold">บรรยากาศภายในโรงแรม 1</h2>
                                <p style="<?php echo $slide_t;?>">บรรยากาศเลานจ์ภายในโรงแรม</p>
                            </div>
                            </div>
                            <div class="carousel-item">
                            <img src="img/slide_pro_2.png" style="<?php echo $rad25;?>"class="d-block shadow w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h2 class="fw-bold">บรรยากาศภายในโรงแรม 2</h2>
                                <p style="<?php echo $slide_t;?>">คาเฟ่ภายในโรงแรม</p>
                            </div>
                            </div>
                            <div class="carousel-item">
                            <img src="img/slide_pro_3.png" style="<?php echo $rad25;?>"class="d-block shadow w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h2 class="fw-bold">บรรยากาศภายในโรงแรม 3</h2>
                                <p style="<?php echo $slide_t;?>">บรรยากาศเลานจ์ภายในโรงแรม</p>
                            </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        </div>
                </div>
                <div class="col-md-6 ">
                    <div class="container main-info">
                        <h1 class="fw-bold"><i class="fa-sharp fa-solid fa-bell me-2"></i>ประชาสัมพันธ์</h1>
                        <p class="text-secondary" style="<?php echo $slide_t;?>">ข้อมูลข่าวสารใหม่ ๆ</p>
                    </div>
                            <swiper-container class="shadow-sm" pagination="true" pagination-dynamic-bullets="true">
                            <?php while($row_noti = mysqli_fetch_assoc($notify_query)) { ?>
                                <swiper-slide>
                                <div class="container p-5  rounded-3" >
                                            <p class="fw-bold" style="<?php echo $slide_t;?>"><?php echo $row_noti['n_quest'];?></p>
                                            <p><?php echo $row_noti['n_detail'];?></p>
                                            <a target="_blank" href="<?php echo $row_noti['n_link'];?>" class="btn btn-warning text-white">ลองดู</a>
                                            <img src="img/mong.svg" class="float-end" width="50" height="50" alt="">
                                        </div>
                                </swiper-slide>
                          <?php  } ?>
                        
                         
                        
                        
                        </swiper-container>
                    
                </div>
            </div>
           
        </div>
      </div>
    </section>