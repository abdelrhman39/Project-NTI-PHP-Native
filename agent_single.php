<?php
if(!isset($_GET['id'])){
  header('location: agents_grid.php');
}
require './includes.php';
require './layouts/navbar.php';

if(isset($_GET['id'])){
  $id_owner = sanitize($_GET['id'],1);
  $sql = "SELECT users.*, user_details.phone,user_details.gender ,user_details.personal_info,user_details.facebook,user_details.twitter,
   address.country,address.gov,address.city,address.extra_data
  FROM users JOIN user_details on users.id = user_details.user_id
   JOIN address ON user_details.address_id = address.id WHERE users.id =$id_owner";
   
  $result = mysqli_query($con,$sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $full_name     = $row['full_name'];
    $email         = $row['email'];
    $img           = $row['img'];
    $phone         = $row['phone'];
    $gender        = $row['gender'];
    $personal_info = $row['personal_info'];
    $facebook      = $row['facebook'];
    $twitter       = $row['twitter'];
    $country       = $row['country'];
    $gov           = $row['gov'];
    $city          = $row['city'];
    $extra_data    = $row['extra_data'];
  }

  $query = "SELECT `property_estate`.*,property_imgs.img_url FROM `property_estate` JOIN property_imgs on property_estate.id = property_imgs.id_property WHERE owner_id =$id_owner";
    
    $result = mysqli_query($con,$query);
    $count_project = mysqli_num_rows($result);

}else{
  echo 'Id GIT Erorr';
}
?>
  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single"><?php echo $full_name;?></h1>
              <span class="color-text-a">Real Estate Agents</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="agents_grid.php">Agents</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  <?php echo $full_name;?>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single -->

    <!-- ======= Agent Single ======= -->
    <section class="agent-single">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-md-6">
                <div class="agent-avatar-box">
                  <img src="<?php echo $img;?>" alt="" class="agent-avatar img-fluid" style="height: 450px;">
                </div>
              </div>
              <div class="col-md-5 section-md-t3">
                <div class="agent-info-box">
                  <div class="agent-title">
                    <div class="title-box-d">
                      <h3 class="title-d">
                        <?php echo $full_name;?>
                      </h3>
                    </div>
                  </div>
                  <div class="agent-content mb-3">
                    <p class="content-d color-text-a">
                    <?php echo $personal_info;?>
                    </p>
                    <div class="info-agents color-a">
                      <p>
                        <strong>Phone: </strong>
                        <span class="color-text-a"> <?php echo $phone;?></span>
                      </p>
                      <p>
                        <strong>Gender: </strong>
                        <span class="color-text-a"> <?php echo $gender;?></span>
                      </p>
                      <p>
                        <strong>Email: </strong>
                        <span class="color-text-a"> <?php echo $email;?>/span>
                      </p>
                      <p>
                        <strong>Country: </strong>
                        <span class="color-text-a"> <?php echo $country;?></span>
                      </p>
                      <p>
                        <strong>Governorate: </strong>
                        <span class="color-text-a"> <?php echo $gov;?></span>
                      </p>
                      <p>
                        <strong>City: </strong>
                        <span class="color-text-a"> <?php echo $city;?></span>
                      </p>
                      <?php
                      if(strlen($extra_data) > 0){
                        ?>

                      <p>
                        <strong>Extra Data: </strong>
                        <span class="color-text-a"> <?php echo $extra_data;?></span>
                      </p>
                        <?php
                      }
                      ?>

                    </div>
                  </div>
                  <div class="socials-footer">
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <a href="<?php echo $facebook;?>" class="link-one">
                          <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="<?php echo $twitter;?>" class="link-one">
                          <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-dribbble" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 section-t8">
            <div class="title-box-d">
              <h3 class="title-d">My Properties ( <?php echo $count_project ?> )</h3>
            </div>
          </div>
          <div class="row property-grid grid">
            <div class="col-sm-12">
              <div class="grid-option">
                <form>
                  <select class="custom-select">
                    <option selected>All</option>
                    <option value="1">New to Old</option>
                    <option value="2">For Rent</option>
                    <option value="3">For Sale</option>
                  </select>
                </form>
              </div>
            </div>

            <?php

              
              while ($row = mysqli_fetch_assoc($result)) {
              
            ?>
           
            <div class="col-md-4">
              <div class="card-box-a card-shadow">
                <div class="img-box-a">
                  <img src="profile_sett/<?php echo $row['img_url']; ?>" alt="" class="img-fluid" >
                </div>
                <div class="card-overlay">
                  <div class="card-overlay-a-content">
                    <div class="card-header-a">
                      <h2 class="card-title-a">
                        <a href="property_single.php?id=<?php echo $row['id']; ?>">
                            <?php echo $row['property_name']; ?>
                        </a>
                      </h2>
                    </div>
                    <div class="card-body-a">
                      <div class="price-box d-flex">
                        <span class="price-a">rent | $ <?php echo $row['price']; ?></span>
                      </div>
                      <a href="property_single.php?id=<?php echo $row['id']; ?>" class="link-a">Click here to view
                        <span class="ion-ios-arrow-forward"></span>
                      </a>
                    </div>
                    <div class="card-footer-a">
                      <ul class="card-info d-flex justify-content-around">
                        <li class="text-center">
                          <h4 class="card-info-title">Area</h4>
                          <span>
                            <sup><?php echo $row['space']; ?></sup>
                          </span>
                        </li>
                        <li  class="text-center">
                          <h4 class="card-info-title ">Room Count</h4>
                          <span><?php echo $row['rooms_count']; ?></span>
                        </li>
                        
                        <li class="text-center">
                          <h4 class="card-info-title">Garages</h4>
                          <span><?php echo $row['grage']; ?></span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php
              }
            ?>


          </div>
        </div>
      </div>
    </section><!-- End Agent Single -->

  </main><!-- End #main -->


<?php
require './layouts/footer.php';
?>