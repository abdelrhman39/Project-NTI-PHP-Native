
<!-- ======= Property Search Section ======= -->
<div class="click-closed"></div>
<!--/ Form Search Star /-->
<div class="box-collapse">
    <div class="title-box-d">
        <h3 class="title-d">Search Property</h3>
    </div>
    <span class="close-box-collapse right-boxed ion-ios-close"></span>
    <div class="box-collapse-wrap form">
        <form action="search.php" method="POST" class="form-a" >
            <div class="row">
                
        
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="city">City</label>
                        <select name="city" class="form-control form-control-lg form-control-a" id="Type">
                            <option selected disabled value=" "></option>
                            <?php 
                            $q="SELECT DISTINCT city FROM `location_property` ";
                            $result = mysqli_query($con , $q);
                            if($result){
                                while($data= mysqli_fetch_assoc($result)){
                                echo '<option value="'.$data['city'].'">'.$data['city'].'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                
               
                <div class="col-md-12">
                    <button type="submit" class="btn btn-b">Search Property</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Property Search Section -->

<!-- ======= Header/Navbar ======= -->
<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
        <a class="navbar-brand text-brand" href="index.html">Estate<span class="color-b">Agency</span></a>
        <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse nav-link  d-md-none" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
            <span class="fa fa-search" aria-hidden="true"></span>
        </button>

        

        <?php
        if(isset($_SESSION['User'])){
            
            ?>
            <button type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" class="btn btn-link nav-link  nav-search  d-md-none">
                <span class="fa fa-lg fa-cart-arrow-down" aria-hidden="true"></span>
            </button>



        <div class="w-25 collapse navbar-collapse d-md-none" id="navbarSupportedContent" dir="rtl">
                    
                    <ul class="navbar-nav align-items-center d-md-none">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0 w-50" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle" >
                                        <img alt="Image placeholder" class="rounded-circle " src="<?php echo url($_SESSION['User']['img']); ?>" style="width:50%;float: right;">
                                    </span>
                                   
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
                               
                                <div class="dropdown-divider"></div>
                                <a href="../logout.php" class="dropdown-item">
                                    <i class="ni ni-user-run"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
        <?php
        }
        ?>

        <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="property_grid.php">Property</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="agents_grid.php">Agents</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <?php
        if (!isset($_SESSION['User'])) {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            <?php
        }
            ?>

            </ul>
        </div>
        <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
            <span class="fa fa-search" aria-hidden="true"></span>
        </button>

        
        <?php
        if(isset($_SESSION['User'])){

            ?>
            
            <button type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" class="btn btn-b-n ml-2 d-none d-md-block">
            <span class="fa fa-lg fa-cart-arrow-down" aria-hidden="true"></span>
        </button>
        
        <div class="w-25 collapse navbar-collapse d-md-block" id="navbarSupportedContent" dir="rtl">
                    
        <ul class="navbar-nav align-items-center d-md-block">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle" >
                            <img alt="<?php echo $_SESSION['User']['full_name']; ?>" class=" rounded-circle"  src="<?php echo url($_SESSION['User']['img'],''); ?>" style="width:50%;float: right;">
                        </span>
                        
                    </div>
                </a>
                <div class="dropdown-menu  dropdown-menu-right ">
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome!</h6>
                    </div>
                    <a href="profile_sett/profile.php" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>My profile</span>
                    </a>
                    <a href="profile_sett/tables.php" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>Products</span>
                    </a>
                   
                    <div class="dropdown-divider"></div>
                    <a href="logout.php" class="dropdown-item">
                        <i class="ni ni-user-run"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
<?php
}
?>
    </div>
</nav>
<!-- End Header/Navbar -->