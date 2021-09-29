<?php

echo '<link rel="stylesheet" href="assets/css/argon.min.css" type="text/css">';

if(!isset($_SESSION['User'])){
header('location: ../login.php');
}
?>

<!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-success border-bottom">  
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent" dir="rtl">
                    
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle" >
                                        <img alt="Image placeholder" src="<?php echo url($_SESSION['User']['img'],'../'); ?>">
                                    </span>
                                    <div class="media-body  ml-2  d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold"><?php echo $_SESSION['User']['full_name']; ?></span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome!</h6>
                                </div>
                                <a href="profile.php" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>My profile</span>
                                </a>
                                <a href="tables.php" class="dropdown-item">
                                    <i class="ni ni-settings-gear-65"></i>
                                    <span>Products</span>
                                </a>
                                <a href="../index.php" class="dropdown-item">
                                    <i class="ni ni-settings-gear-65"></i>
                                    <span>Home</span>
                                </a>
                               
                                <div class="dropdown-divider"></div>
                                <a href="../logout.php" class="dropdown-item">
                                    <i class="ni ni-user-run"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
      