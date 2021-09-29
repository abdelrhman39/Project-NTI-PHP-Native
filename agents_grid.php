<?php

require './includes.php';

require './layouts/navbar.php';

?>

  <main id="main">
    <!-- =======Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Our Amazing Agents</h1>
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
                  Agents Grid
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Agents Grid ======= -->
    <section class="agents-grid grid">
      <div class="container">
      <div class="row">
        <?php
        $sql = 'SELECT users.*, user_details.phone ,user_details.personal_info,user_details.facebook,user_details.twitter 
                FROM users JOIN user_details on users.id = user_details.user_id WHERE users.role =3 ';
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
                                        <a href="agent_single.php?id='. $row['id'].'" class="link-two">
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
    </section><!-- End Agents Grid-->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  
  <?php
  require './layouts/footer.php';
  ?>