<?php
require '../helpers/config.php';
require '../helpers/helpers.php';




$user_id = $_SESSION['User']['id'];
if(isset($user_id)){

$sql = "SELECT users.*,user_details.phone,user_details.gender,
user_details.personal_info,user_details.facebook,user_details.twitter,
address.country,address.gov,address.city,address.extra_data FROM users 
JOIN user_details ON user_details.user_id = users.id 
JOIN address ON user_details.address_id = address.id WHERE users.id = $user_id";
$result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)){


      while ($row = mysqli_fetch_assoc($result)) {

        $user_id      = $row['id'];
        $full_name    = $row['full_name'];
        $email        = $row['email'];
        $personal_img = $row['img'];
        $phone        = $row['phone'];
        $gender       = $row['gender'];
        $personal_info= $row['personal_info'];
        $facebook     = $row['facebook'];
        $twitter      = $row['twitter'];
        $country      = $row['country'];
        $gov          = $row['gov'];
        $city         = $row['city'];
        $extra_data   = $row['extra_data'];

        
      }

    }else{
      header("Location: ../index.php");
    }

}else{

  header("Location: ../login.php");
}







?>

  <!-- Main content -->
  <div class="main-content" id="panel">
   <!-- Topnav -->
   <?php require './layouts/topnav.php' ?>
    <!-- Header -->
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(../assets/img/slide-3.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white"><?php echo $_SESSION['User']['full_name']; ?></h1>
            <p class="text-white mt-0 mb-5"> <?php echo $personal_info; ?></p>
            
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="../assets/img/slide-3.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#" class="mb-5">
                    <img  src="<?php echo url($personal_img,'../');?>" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            
            <div class="card-body pt-5">
              
              <div class="text-center mt-5">
                <h5 class="h3 mt-5">
                <?php echo $full_name;?>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?php echo $country;?>, <?php echo $gov;?>
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i><?php echo $email;?> 
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i><?php echo $personal_info;?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit profile </h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                </div>
                <?php

                if (isset($_SESSION['ErorrMassegs'])) {
                  foreach($_SESSION['ErorrMassegs'] as $err){
                      echo '<div class="w-75 mt-4 container alert alert-danger" role="alert">
                      '.$err.'
                      </div>';
                  }
                  unset($_SESSION['ErorrMassegs']);
                }
                ?>
              </div>
            </div>
            <div class="card-body">
            
            
                  <div class="container pt-5 pb-5">
                        <form action="update_profile.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Full Name</label>
                                    <input type="text" value="<?php echo $full_name;?>" name="full_name" class="form-control" id="validationCustom01" >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Email</label>
                                    <input type="email" value="<?php echo $email;?>" name="email" class="form-control" id="validationCustom02" >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                
                                <div class="col-md-6 mb-3">
                                    <label for="img">Iamge Profile</label>
                                    <input type="file" name="img" class="form-control" id="img"  >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom03">phone</label>
                                    <input type="text" value="<?php echo $phone;?>" name="phone" class="form-control" id="validationCustom03" >
                                    <div class="invalid-feedback">
                                        Please provide a valid phone.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom04">Gender</label>
                                    <select name="gender" class="custom-select" id="validationCustom04" >
                                      <option selected disabled value=""><?php echo $gender;?>...</option>
                                      <option value="male">Maile</option>
                                      <option value="female">Femail</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid Gender.
                                    </div>
                                </div>


                                <div class="col-md-6 mb-3 ">
                                    <label for="facebook">URL Facebook</label>
                                    <input type="url" value="<?php echo $facebook;?>" name="facebook" class="form-control" id="facebook" >
                                    <div class="invalid-feedback">
                                        Please provide a valid URL Facebook.
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3 ">
                                    <label for="twitter">URL Twitter</label>
                                    <input type="url" value="<?php echo $twitter;?>" name="twitter" class="form-control" id="twitter" >
                                    <div class="invalid-feedback">
                                        Please provide a valid URL Twitter.
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom05">Personal Information</label>
                                    <textarea type="text"  name="personal_info" class="form-control" id="validationCustom05" rows="3" ><?php echo $personal_info;?></textarea>
                                    <div class="invalid-feedback">
                                        Please provide a valid Personal Information.
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom04">address</label>
                                    <select name="country" class="custom-select" id="validationCustom04" >
                                      <option selected disabled value="">Country...</option>
                                      <?php
                                        $sql = "SELECT DISTINCT country FROM `address`";
                                        $result = mysqli_query($con , $sql);
                                        while($row = mysqli_fetch_assoc($result)){
                                          ?>
                                            <option value="<?php echo $row['country']; ?>" <?php if($country==$row["country"]){echo "selected";} ?>><?php echo $row['country']; ?></option>';
                                      <?php
                                        }
                                      ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid Country.
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom04">Governorate</label>
                                    <select name="gov" class="custom-select" id="validationCustom04" >
                                      <option selected disabled value="">Governorate...</option>
                                      <?php
                                        $sql = "SELECT DISTINCT gov FROM `address`";
                                        $result = mysqli_query($con , $sql);
                                        while($row = mysqli_fetch_assoc($result)){
                                          ?>
                                            <option value="<?php echo $row['gov']; ?>" <?php if($gov==$row["gov"]){echo "selected";} ?>><?php echo $row['gov']; ?></option>';
                                      <?php
                                        }
                                      ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid Governorate.
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom04">City</label>
                                    <select name="city" class="custom-select" id="validationCustom04" >
                                      <option selected disabled value="">City...</option>
                                      <?php
                                        $sql = "SELECT DISTINCT city FROM `address`";
                                        $result = mysqli_query($con , $sql);
                                        while($row = mysqli_fetch_assoc($result)){
                                          ?>
                                            <option value="<?php echo $row['city']; ?>" <?php if($city==$row["city"]){echo "selected";} ?>><?php echo $row['city']; ?></option>';
                                      <?php
                                        }
                                      ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid City.
                                    </div>
                                </div>
                      
                                <div class="col-md-4 mb-3">
                                    <label for="extra_data">Extra Data ['Street' ,  village]</label>
                                    <input type="text" value="<?php echo $extra_data; ?>" name="extra_data" class="form-control" id="extra_data">
                                    <div class="invalid-feedback">
                                        Please provide a valid Extra Data.
                                    </div>
                                </div>

                            </div>





                            <input type="hidden" name="rols" value="2">
                            <button class="btn btn-info btn-lg" type="submit">Upadate</button>
                        </form>
                    </div>





            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>

  
  <?php
  require './layouts/footer.php';
  ?>