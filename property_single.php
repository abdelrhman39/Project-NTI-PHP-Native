<?php
if(!isset($_GET['id'])){
  header('location: property_grid.php');
}
require './includes.php';
require './layouts/navbar.php';



if(isset($_GET['id'])){
  $id_property = sanitize($_GET['id'] ,1);
  $sql = "SELECT property_estate.*,property_imgs.img_url,property_imgs.img_url2,
  property_imgs.img_url3,property_imgs.floor_plans_img,property_type.title, 
  location_property.country,location_property.gov,location_property.city,
  location_property.extra_data ,location_property.location_map,
  
  users.full_name,users.email,users.img ,user_details.phone,user_details.personal_info,
  user_details.facebook,user_details.twitter,address.country,address.gov,address.city,address.extra_data
  
  FROM property_estate JOIN location_property on property_estate.location_id = location_property.id JOIN property_type ON property_type.id = property_estate.type_id 
  JOIN property_imgs ON property_imgs.id_property = property_estate.id JOIN users ON property_estate.owner_id = users.id JOIN user_details on user_details.user_id =users.id 
  JOIN address ON address.id = user_details.address_id WHERE property_estate.id = $id_property";
   
  $result = mysqli_query($con,$sql);
  while ($row = mysqli_fetch_assoc($result)) {
    //Data Product
      $property_id       = $row['id'];
     $owner_id          = $row['owner_id'];
      $property_name     = $row['property_name'];
      $property_desc     = $row['property_desc'];
      $space             = $row['space'];
      $price             = $row['price'];
      $rooms_count       = $row['rooms_count'];
      $grage             = $row['grage'];
      $video             = $row['video'];
      $img_url           = $row['img_url'];
      $img_url2          = $row['img_url2'];
      $img_url3          = $row['img_url3'];
      $floor_plans_img   = $row['floor_plans_img'];
      $type_property     = $row['title'];
      $country           = $row['country'];
      $gov               = $row['gov'];
      $city              = $row['city'];
      $extra_data        = $row['extra_data'];
      $location_map      = $row['location_map'];
      $is_accepted       = $row['is_accepted'];

      // Data Owner Product
      $full_name_owner       = $row['full_name'];
      $email_owner           = $row['email'];
      $img_owner             = $row['img'];
      $phone_owner           = $row['phone'];
      $personal_info_owner   = $row['personal_info'];
      $facebook_owner        = $row['facebook'];
      $twitter_owner         = $row['twitter'];  
      $country_owner         = $row['country']; 
      $gov_owner             = $row['gov']; 
      $city_owner            = $row['city']; 
      $extra_data_owner      = $row['extra_data']; 
      
  }

  if($is_accepted == 0){
    echo 'Erorr: This product is in the waiting list';
    sleep(5);
    header('location: property_grid.php');
  }

}else{
  echo 'Id GIT Erorr';
  sleep(5);
  header('location: property_grid.php');
}

?>

  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single"><?php echo $property_name ; ?></h1>
              <span class="color-text-a"><?php echo $country." , ".$city ; ?></span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="property_grid.php">Properties</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  <?php echo $property_name ; ?>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Single ======= -->
    <section class="property-single nav-arrow-b">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
              <div class="carousel-item-b">
                <img src="<?php echo $img_url ; ?>" alt="">
              </div>
              <div class="carousel-item-b">
                <img src="<?php echo $img_url2 ; ?>" alt="">
              </div>
              <div class="carousel-item-b">
                <img src="<?php echo $img_url3 ; ?>" alt="">
              </div>
            </div>
            <div class="row justify-content-between">
              <div class="col-md-5 col-lg-4">
                <div class="property-price d-flex justify-content-center foo">
                  <div class="card-header-c d-flex">
                    <div class="card-box-ico">
                      <span class="ion-money">$</span>
                    </div>
                    <div class="card-title-c align-self-center">
                      <h5 class="title-c"><?php echo $price ; ?></h5>
                    </div>
                  </div>
                </div>
                <div class="property-summary">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="title-box-d section-t4">
                        <h3 class="title-d">Quick Summary</h3>
                      </div>
                    </div>
                  </div>
                  <div class="summary-list">
                    <ul class="list">
                      <li class="d-flex justify-content-between">
                        <strong>Property ID:</strong>
                        <span><?php echo $id_property ; ?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Location:</strong>
                        <span><?php echo $country." , ".$city;echo (strlen($extra_data>0))?' , '.$extra_data:''; ?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Property Type:</strong>
                        <span><?php echo $type_property ; ?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Rooms Count:</strong>
                        <span><?php echo $rooms_count ; ?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Space:</strong>
                        <span><?php echo $space ; ?>
                          <sup>2</sup>
                        </span>
                      </li>
                      
                      <li class="d-flex justify-content-between">
                        <strong>Garage:</strong>
                        <span><?php echo $grage ; ?></span>
                      </li>
                    </ul>
                  </div>
                  <form action="./op_property/add_property.php?id_property=<?php echo $property_id.'&owner_id='.$owner_id;?>" method="POST">
                  <input type="number" value="1" name="quantity" min="1" class="form-control">
                      <button class="btn btn-success btn-lg">Add Product</button>
                  </form>
                </div>
              </div>
              <div class="col-md-7 col-lg-7 section-md-t3">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Property Description</h3>
                    </div>
                  </div>
                </div>
                <div class="property-description">
                  <p class="description color-text-a">
                    <?php echo $property_desc ; ?>
                  </p>
                  
                </div>
                <div class="row section-t3">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Amenities</h3>
                    </div>
                  </div>
                </div>
                <div class="amenities-list color-text-a">
                  <ul class="list-a no-margin">
                    <li>Balcony</li>
                    <li>Outdoor Kitchen</li>
                    <li>Cable Tv</li>
                    <li>Deck</li>
                    <li>Tennis Courts</li>
                    <li>Internet</li>
                    <li>Parking</li>
                    <li>Sun Room</li>
                    <li>Concrete Flooring</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-10 offset-md-1">
            <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-video-tab" data-toggle="pill" href="#pills-video" role="tab" aria-controls="pills-video" aria-selected="true">Video</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-plans-tab" data-toggle="pill" href="#pills-plans" role="tab" aria-controls="pills-plans" aria-selected="false">Floor Plans</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-map-tab" data-toggle="pill" href="#pills-map" role="tab" aria-controls="pills-map" aria-selected="false">Ubication</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
                <iframe src="<?php echo $video; ?>" width="100%" height="460" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
              </div>
              <div class="tab-pane fade" id="pills-plans" role="tabpanel" aria-labelledby="pills-plans-tab">
                <img src="<?php echo $floor_plans_img; ?>" alt="" class="img-fluid">
              </div>
              <div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
                <iframe src="<?php echo $location_map; ?>" width="100%" height="460" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
              
            </div>
          </div>

          <div class="col-md-12">
            <div class="row section-t3">
              <div class="col-sm-12">
                <div class="title-box-d">
                  <h3 class="title-d">Contact Agent</h3>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-4">
                <img src="<?php echo $img_owner; ?>" alt="" class="img-fluid" style="height: 400px;">
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="property-agent">
                  <h4 class="title-agent"><?php echo $full_name_owner; ?></h4>
                  <p class="color-text-a">
                      <?php echo $personal_info_owner; ?>.
                  </p>
                  <ul class="list-unstyled">
                    <li class="d-flex justify-content-between">
                      <strong>Phone:</strong>
                      <span class="color-text-a"><?php echo $phone_owner; ?></span>
                    </li>
                    
                    <li class="d-flex justify-content-between">
                      <strong>Email:</strong>
                      <span class="color-text-a"><?php echo $email_owner; ?></span>
                    </li>

                    <li class="d-flex justify-content-between">
                      <strong>country:</strong>
                      <span class="color-text-a"><?php echo $country; ?></span>
                    </li>

                    <li class="d-flex justify-content-between">
                      <strong>Governorate:</strong>
                      <span class="color-text-a"><?php echo $gov; ?></span>
                    </li>

                    <li class="d-flex justify-content-between">
                      <strong>City:</strong>
                      <span class="color-text-a"><?php echo $city; ?></span>
                    </li>

                    <?php echo (strlen($extra_data)>0)?'<li class="d-flex justify-content-between">
                      <strong>Street:</strong>
                      <span class="color-text-a">'.$extra_data.'</span>
                    </li>':''; ?>
                    
                  </ul>
                  <div class="socials-a">
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <a href="<?php echo $facebook_owner; ?>">
                          <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="<?php echo $twitter_owner; ?>">
                          <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-dribbble" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-4">
                <div class="property-contact">
                  <form class="form-a">
                    <div class="row">
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Name *" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <input type="email" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="Email *" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <textarea id="textMessage" class="form-control" placeholder="Comment *" name="message" cols="45" rows="8" required></textarea>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-a">Send Message</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Property Single-->

  </main><!-- End #main -->


  <?php
  require './layouts/footer.php';
  ?>