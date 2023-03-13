<section class="nav">
    <nav class="nav">
        <div class="container">
            <div class="logo">
                <a href="user.php"><img src="img/logo.svg" class="mb-2" width="150" height="50" alt=""></a>
            </div>
            <div id="mainListDiv" class="main_list">
                <ul class="navlinks">
                    <li><a href="user.php" <?php if($page=='index'){echo 'class="text-warning"';}?>><i class="fa-sharp fa-solid fa-house "></i> หน้าแรก</a></li>
                    <li><a href="rent_catg.php" <?php if($page=='rent'){echo 'class="text-warning"';}?>><i class="fa-sharp fa-solid fa-book"></i> ระบบการจอง</a></li>
                    <li><a href="#"><i class="fa-sharp fa-solid fa-bag-shopping"></i> สินค้าภายในโรงแรม</a></li>
                    <li><a href="contact.php" <?php if($page=='contact'){echo 'class="text-warning"';}?>><i class="fa-sharp fa-solid fa-address-card"></i> เกี่ยวกับเรา</a></li>
                    <?php if($_SESSION['level']=="admin"){ ?><li><a href="man_report.php"><i class="fa-sharp fa-solid fa-chart-line"></i> Dashboard</a></li><?php }?>
                    <div class="right-menu">
                        <li class=""><a class=" menu-button" href="#"><?php echo $row_u['username'];?></a><i class="fa-sharp fa-solid fa-caret-down text-white"></i></li>
                        <div class="dropdown-menu-test">
                        <a class="dropdown-item" href="profile.php"><i class="fa-sharp fa-solid fa-user"></i> ข้อมูลส่วนตัว</a>
                            <a class="dropdown-item bg-warning text-dark" href="logout.php"><i class="fa-sharp fa-solid fa-right-from-bracket"></i> ออกจากระบบ</a>
                         
                            
                        </div>
                    </div>
                </ul>
            </div>
            <span class="navTrigger">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </div>
    </nav>
 </section>