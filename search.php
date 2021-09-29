<?php
require './includes.php';

require './layouts/navbar.php';   

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $property_type = cleanEr($_POST['property_type']);
    
    $city= cleanEr($_POST['city']);
    if (!isset($city)) {
        $city =" ";
    }
    
    
                
}else{
  header('location: index.php');
}
?>

  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Our Amazing Properties</h1>
              <span class="color-text-a">Grid Properties</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Properties Grid
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Grid ======= -->
    <section class="property-grid grid">
      <div class="container">
        <div class="row">
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

$query ="SELECT property_estate.*,property_type.title,location_property.city,property_imgs.img_url
                FROM `property_estate` JOIN property_type ON property_estate.type_id=property_type.id
                 JOIN location_property ON property_estate.location_id=location_property.id JOIN property_imgs ON property_imgs.id_property = property_estate.id
                  WHERE  location_property.city LIKE '%$city%'";
                   $resultQ = mysqli_query($con,$query);
                while ($row=mysqli_fetch_assoc($resultQ)) {
            ?>

            <div class="col-md-4">
              <div class="card-box-a card-shadow">
                <div class="img-box-a">
                  <img src="profile_sett/<?php echo $row['img_url']; ?>" alt="" class="img-a img-fluid" style="width: 300px;height: 400px;">
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
        <div class="row">
          <div class="col-sm-12">
            <nav class="pagination-a">
              <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">
                    <span class="ion-ios-arrow-back"></span>
                  </a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item next">
                  <a class="page-link" href="#">
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Property Grid Single-->

  </main><!-- End #main -->

  

  <?php
  require './layouts/footer.php';
  ?>