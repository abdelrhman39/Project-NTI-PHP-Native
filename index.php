<?php
require './includes.php';
require './layouts/navbar.php';

$query = "SELECT property_estate.*,property_imgs.img_url,property_imgs.img_url2,property_imgs.img_url3 FROM `property_estate`
        JOIN property_imgs on property_estate.id = property_imgs.id_property where is_accepted = 1  ORDER BY id DESC";

$result = mysqli_query($con,$query);

?>




<!-- ======= Intro Section ======= -->
<div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
        <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $url_img       = $row['img_url'];
                $url_img2      = $row['img_url2'];
                $url_img3      = $row['img_url3'];
                $property_name = $row['property_name'];
                $property_desc = $row['property_desc'];
                $price         = $row['price'];
                $space         = $row['space'];
                ?>
                
        <div class="carousel-item-a intro-item bg-image" style="background-image: url(<?php echo url($url_img); ?>)">
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="intro-body">
                                    <p class="intro-title-top pt-3">
                                        <br> <?php echo $space; ?>
                                    </p>
                                    <h1 class="intro-title mb-4">
                                        <span class="color-b"><?php echo $property_name; ?> </span><br> 
                                        <?php echo substr($property_desc,0,25).'...'?>

                                    </h1>
                                    <p class="intro-subtitle intro-price">
                                        <a href="#"><span class="price-a">rent | $ <?php echo $price; ?> </span></a>
                                    </p>
                                </div>
                            </div>
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
<!-- End Intro Section -->

<main id="main">

    <!-- ======= Services Section ======= -->
    <section class="section-services section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Our Services</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card-box-c foo">
                        <div class="card-header-c d-flex">
                            <div class="card-box-ico">
                                <span class="fa fa-gamepad"></span>
                            </div>
                            <div class="card-title-c align-self-center">
                                <h2 class="title-c">Lifestyle</h2>
                            </div>
                        </div>
                        <div class="card-body-c">
                            <p class="content-c">
                                Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.
                            </p>
                        </div>
                        <div class="card-footer-c">
                            <a href="#" class="link-c link-icon">Read more
                  <span class="ion-ios-arrow-forward"></span>
                </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-box-c foo">
                        <div class="card-header-c d-flex">
                            <div class="card-box-ico">
                                <span class="fa fa-usd"></span>
                            </div>
                            <div class="card-title-c align-self-center">
                                <h2 class="title-c">Loans</h2>
                            </div>
                        </div>
                        <div class="card-body-c">
                            <p class="content-c">
                                Nulla porttitor accumsan tincidunt. Curabitur aliquet quam id dui posuere blandit. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                            </p>
                        </div>
                        <div class="card-footer-c">
                            <a href="#" class="link-c link-icon">Read more
                  <span class="ion-ios-arrow-forward"></span>
                </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-box-c foo">
                        <div class="card-header-c d-flex">
                            <div class="card-box-ico">
                                <span class="fa fa-home"></span>
                            </div>
                            <div class="card-title-c align-self-center">
                                <h2 class="title-c">Sell</h2>
                            </div>
                        </div>
                        <div class="card-body-c">
                            <p class="content-c">
                                Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.
                            </p>
                        </div>
                        <div class="card-footer-c">
                            <a href="#" class="link-c link-icon">Read more
                  <span class="ion-ios-arrow-forward"></span>
                </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Section -->

    <!-- ======= Latest Properties Section ======= -->
    <section class="section-property section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Latest Properties</h2>
                        </div>
                        <div class="title-link">
                            <a href="property_grid.php">All Property
                            <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="property-carousel" class="owl-carousel owl-theme">

            <?php
                $query2 = "SELECT property_estate.*,property_imgs.img_url,property_imgs.img_url2,property_imgs.img_url3 FROM `property_estate`
                JOIN property_imgs on property_estate.id = property_imgs.id_property where is_accepted = 1  ORDER BY id DESC";
        
                $result2 = mysqli_query($con,$query2);
                while ($row = mysqli_fetch_assoc($result2)) {
            ?>

            <div class="carousel-item-b">
              <div class="card-box-a card-shadow">
                <div class="img-box-a">
                  <img src="<?php echo $row['img_url']; ?>" alt="" class="img-a img-fluid" style="width: 300px;height: 400px;">
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
    </section>
    <!-- End Latest Properties Section -->

    <!-- ======= Agents Section ======= -->
    <section class="section-agents section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Best Agents</h2>
                        </div>
                        <div class="title-link">
                            <a href="agents_grid.php">All Agents
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $sql = 'SELECT users.*, user_details.phone ,user_details.personal_info,user_details.facebook,user_details.twitter 
                FROM users LEFT JOIN user_details on users.id = user_details.user_id WHERE users.role =3 LIMIT 3';
                $result = mysqli_query($con,$sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo' 
                <div class="col-md-4">
                    <div class="card-box-d">
                        <div class="card-img-d ">
                            <img src="'.$row['img'].'" alt="" class="img-fluid w-100" style="height: 350px;">
                        </div>
                        <div class="card-overlay card-overlay-hover">
                            <div class="card-header-d">
                                <div class="card-title-d align-self-center">
                                    <h3 class="title-d">
                                        <a href="agent_single.php?id='.$row['id'].'" class="link-two">
                                            '.$row['full_name'].'
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <div class="card-body-d">
                                <p class="content-d color-text-a">
                                '.substr($row['personal_info'],0,100).'...'.'
                                </p>
                                <div class="info-agents color-a">
                                    <p>
                                        <strong>Phone: </strong> '. $row['phone'].'
                                    </p>
                                    <p>
                                        <strong>Email: </strong> '. $row['email'].'
                                    </p>
                                </div>
                            </div>
                            <div class="card-footer-d">
                                <div class="socials-footer d-flex justify-content-center">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="'. $row['facebook'].'" class="link-one">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="'. $row['twitter'].'" class="link-one">
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
                </div>';


                 }
                ?>
                
                
            </div>
        </div>
    </section>
    <!-- End Agents Section -->

 

    <!-- ======= Testimonials Section ======= -->
    <section class="section-testimonials section-t8 nav-arrow-a">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Testimonials</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div id="testimonial-carousel" class="owl-carousel owl-arrow">
                <div class="carousel-item-a">
                    <div class="testimonials-box">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="testimonial-img">
                                    <img src="assets/img/testimonial-1.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="testimonial-ico">
                                    <span class="ion-ios-quote"></span>
                                </div>
                                <div class="testimonials-content">
                                    <p class="testimonial-text">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, cupiditate ea nam praesentium debitis hic ber quibusdam voluptatibus officia expedita corpori.
                                    </p>
                                </div>
                                <div class="testimonial-author-box">
                                    <img src="assets/img/mini-testimonial-1.jpg" alt="" class="testimonial-avatar">
                                    <h5 class="testimonial-author">Albert & Erika</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item-a">
                    <div class="testimonials-box">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="testimonial-img">
                                    <img src="assets/img/testimonial-2.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="testimonial-ico">
                                    <span class="ion-ios-quote"></span>
                                </div>
                                <div class="testimonials-content">
                                    <p class="testimonial-text">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, cupiditate ea nam praesentium debitis hic ber quibusdam voluptatibus officia expedita corpori.
                                    </p>
                                </div>
                                <div class="testimonial-author-box">
                                    <img src="assets/img/mini-testimonial-2.jpg" alt="" class="testimonial-avatar">
                                    <h5 class="testimonial-author">Pablo & Emma</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonials Section -->

</main>
<!-- End #main -->








<?php

require './layouts/footer.php';
?>