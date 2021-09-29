<?php
require '../helpers/config.php';
require '../helpers/helpers.php';

?>
<!-- Main content -->
<div class="main-content" id="panel">


  <?php require './layouts/topnav.php'; ?>


  <!-- Header -->
  <!-- Header -->
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Settings</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Settings</a></li>
                <li class="breadcrumb-item active" aria-current="page">Settings</li>
              </ol>
            </nav>
          </div>
        </div>
        <!-- Card stats -->
        <div class="row">
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h6 class="card-title text-uppercase text-muted mb-0">Total My products</h6>
                    <span class="h2 font-weight-bold mb-0">350,897</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                      <i class="ni ni-active-40"></i>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h6 class="card-title text-uppercase text-muted mb-0">Products approved by admin</h6>
                    <span class="h2 font-weight-bold mb-0">2,356</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                      <i class="ni ni-chart-pie-35"></i>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h6 class="card-title text-uppercase text-muted mb-0">Products that have not been approved</h6>
                    <span class="h2 font-weight-bold mb-0">924</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                      <i class="ni ni-money-coins"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Total sales</h5>
                    <span class="h2 font-weight-bold mb-0">49,65%</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                      <i class="ni ni-chart-bar-32"></i>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>






  <!-- Start  Data Tables -->
  <div class="container-fluid mt--6">



  <?php

if ($_SESSION['User']['role'] != 2) {

?>

  <!-- Start My Properties -->
    <div class="row">
      <div class="col text-white">
        <div class="card bg-default shadow">
          <div class="card-header bg-transparent   border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="text-white mb-0">My Properties</h3>
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

              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add Product</button>

            </div>
          </div>
          <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-dark table-flush">
              <thead class="thead-dark">

                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Product name</th>
                  <th scope="col">Product Price</th>
                  <th scope="col">Product Description</th>
                  <th scope="col">Product Space</th>
                  <th scope="col">Room Count</th>
                  <th scope="col">Accepted</th>
                  <th scope="col">Action</th>

                </tr>
              </thead>
              <tbody>

                <?php
                $user_is = $_SESSION['User']['id'];
            $sql = "SELECT property_estate.*,users.id as user_id FROM `property_estate` 
            JOIN users on property_estate.owner_id = users.id WHERE
              users.id = $user_is";

            $x = 1;
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                      <th scope="row"><?php echo $x++; ?></th>
                      <td><?php echo $row['property_name']; ?></td>
                      <td><?php echo $row['price']; ?></td>
                      <td><?php echo substr($row['property_desc'], 0, 30) . '.....'; ?></td>
                      <td><?php echo $row['space']; ?></td>
                      <td><?php echo $row['rooms_count']; ?></td>
                      <td><?php echo ($row['is_accepted']>0)?'Yes':'No'; ?></td>
                      <td>
                        <a href="del_product.php?del_id=<?php echo $row['id'];?>" class="btn btn-danger ">Delete</a>
                        <a href="edit_product.php?edit_id=<?php echo $row['id'];?>" class="btn btn-light">Edit</a>
                        
                      </td>
                    </tr>
                <?php
                  }
              } else {
                  echo 'No Product';
              } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>

<?php
} 
?>
















  <!-- Start My Cart -->
    <div class="row">
      <div class="col text-white">
        <div class="card bg-default shadow">
          <div class="card-header bg-transparent   border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="text-white mb-0">Cart </h3>
              </div>

            </div>
          </div>
          <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-dark table-flush">
              <thead class="thead-light">

                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Product Image</th>
                  <th scope="col">Product name</th>
                  <th scope="col">Product price</th>
                  <th scope="col">Action</th>

                </tr>
              </thead>
              <tbody>

                <?php
                $user_is = $_SESSION['User']['id'];
            $sql = "SELECT cart.* , property_estate.property_name,property_estate.price,property_imgs.img_url
             FROM cart JOIN property_estate ON cart.property_id = property_estate.id
            JOIN users ON users.id = cart.buyer_id JOIN property_imgs
             ON property_estate.id = property_imgs.id_property WHERE cart.buyer_id=$user_is";

            $x = 1;
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                      <th scope="row"><?php echo $x++; ?></th>
                      <td style="width: 35%;"><img class="w-25" src="<?php echo $row['img_url'];?>" ></td>
                      <td><?php echo $row['property_name']; ?></td>
                      <td><?php echo $row['price']; ?></td>
                      <td>
                        <a href="del_product.php?del_id=<?php echo $row['id'];?>" class="btn btn-danger ">Delete</a>
                      </td>
                    </tr>
                <?php
                  }
              } else {
                  echo 'No Orders';
              } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>










    <!-- Start My Order Prepaid Transactions -->
    <div class="row">
      <div class="col text-white">
        <div class="card bg-default shadow">
          <div class="card-header bg-transparent   border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="text-white mb-0">My Orders  </h3>
              </div>

            </div>
          </div>
          <div class="table-responsive">

        
      <table class="table align-items-center table-dark table-flush">
        <h3 class="text-center text-white">
          Prepaid Transactions
          <hr class="w-25 border-light">
        </h3>
          <thead class="thead-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Image</th>
              <th scope="col">Property Name</th>
              <th scope="col">Payment Method</th>
              <th scope="col">Date Oredr</th>
              <th scope="col">Quantity</th>
              <th scope="col">Payer ID / Order ID</th>

            </tr>
          </thead>
          <tbody>
          <?php $sql="SELECT orders_don.id,orders_don.date_order,orders_don.quantity,
            orders_don.PayerID ,property_estate.property_name,property_imgs.img_url,
            payment_method.method_title FROM orders_don JOIN  property_estate ON
             property_estate.id=orders_don.property_id JOIN payment_method ON 
             payment_method.id=orders_don.payment_id JOIN property_imgs ON 
             property_imgs.id_property=orders_don.property_id 
            WHERE orders_don.buyer_id = ".$_SESSION['User']['id']; 
            $i=1;
            $result = mysqli_query($con, $sql);
            if($result){
              
              while ($row = mysqli_fetch_assoc($result)) {
                
                ?>
              

                <tr>
                  <td scope="row"><?php echo $i++; ?></td>
                  <td class="w-25"><img src="<?php echo $row['img_url']; ?>"  style="height: 100px;width:150px"></td>
                  <td><?php echo $row['property_name']; ?></td>
                  <td scope="col"><?php echo $row['method_title']; ?></td>
                  <td scope="col"><?php echo $row['date_order']; ?></td>
                  <td scope="col"><?php echo $row['quantity']; ?></td>
                  <td scope="col"><?php  if($row['PayerID']){echo $row['PayerID'];}else{
                      echo $row['id'];
                  } ?></td>
                </tr>

            

              <?php
              
            }
          }
            ?>



          </tbody>
        </table>

          </div>
        </div>
      </div>

    </div>


















  </div>



</div>




<!--- Start Module Form Add Property --------->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <form action="Add_property.php" method="POST" enctype='multipart/form-data' class="needs-validation" novalidate>
              <div class="form-row">
                  <div class="col-md-6 mb-3">
                      <label for="validationCustom01">property Name</label>
                      <input type="text" name="property_name" class="form-control" id="validationCustom01" required>
                      <div class="valid-feedback">
                          Looks good!
                      </div>
                  </div>
                  
                  <div class="col-md-6 mb-3">
                      <label for="validationCustom02">Space</label>
                      <input type="text" name="space" class="form-control" id="validationCustom02" required>
                      <div class="valid-feedback">
                          Looks good!
                      </div>
                  </div>
                  <div class="col-md-12 mb-3">
                      <label for="validationCustom05">Property Description</label>
                      <textarea type="text" name="property_desc" class="form-control" id="validationCustom05" rows="3" required></textarea>
                      <div class="invalid-feedback">
                          Please provide a valid Property Description.
                      </div>
                  </div>

              </div>
              <div class="form-row">
                  <div class="col-md-6 mb-3">
                      <label for="Password">Price</label>
                      <input type="number" name="price" class="form-control" id="Password" required>
                      <div class="valid-feedback">
                          Looks good!
                      </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom03">Rooms Count</label>
                    <input type="number" name="rooms_count" class="form-control"  id="validationCustom03" required>
                    <div class="invalid-feedback">
                        Please provide a valid Rooms Count.
                  </div>

                  
                  
              </div>

              <div class="form-row">

                  <div class="col-md-6 mb-3">
                      <label for="validationCustom03">Grage</label>
                      <input type="number" name="grage" class="form-control"  id="validationCustom03" required>
                      <div class="invalid-feedback">
                          Please provide a valid Grage.
                      </div>
                  </div>

                  <div class="col-md-6 mb-3">
                      <label for="img">Video</label>
                      <input type="file" name="video" class="form-control" id="img" required>
                      <div class="valid-feedback">
                          Looks good!
                      </div>
                  </div>
                  
                  <div class="col-md-6 mb-3">
                      <label for="validationCustom04">Property Type</label>
                      <select name="type_id" class="custom-select" id="validationCustom04" required>
                        <option selected disabled value="">Country...</option>
                        <?php
                          $sql = "SELECT DISTINCT * FROM `property_type`";
                          $result = mysqli_query($con , $sql);
                          while($row = mysqli_fetch_assoc($result)){

                              echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';

                          }
                        ?>
                      </select>
                      <div class="invalid-feedback">
                          Please select a valid Property Type.
                      </div>
                  </div>


                  <div class="col-md-6 mb-3">
                      <label for="validationCustom04">Country</label>
                      <select name="country" class="custom-select" id="validationCustom04" required>
                        <option selected disabled value="">Country...</option>
                        <?php
                          $sql = "SELECT DISTINCT country FROM `location_property`";
                          $result = mysqli_query($con , $sql);
                          while($row = mysqli_fetch_assoc($result)){

                              echo '<option value="'.$row['country'].'">'.$row['country'].'</option>';

                          }
                        ?>
                      </select>
                      <div class="invalid-feedback">
                          Please select a valid Governorate.
                      </div>
                  </div>

                  <div class="col-md-6 mb-3">
                      <label for="validationCustom04">Governorate</label>
                      <select name="gov" class="custom-select" id="validationCustom04" required>
                        <option selected disabled value="">Governorate...</option>
                        <?php
                          $sql = "SELECT DISTINCT gov FROM `location_property`";
                          $result = mysqli_query($con , $sql);
                          while($row = mysqli_fetch_assoc($result)){

                              echo '<option value="'.$row['gov'].'">'.$row['gov'].'</option>';

                          }
                        ?>
                      </select>
                      <div class="invalid-feedback">
                          Please select a valid Governorate.
                      </div>
                  </div>

                  <div class="col-md-6 mb-3">
                      <label for="validationCustom04">City</label>
                      <select name="city" class="custom-select" id="validationCustom04" required>
                        <option selected disabled value="">City...</option>
                        <?php
                          $sql = "SELECT DISTINCT city FROM `location_property`";
                          $result = mysqli_query($con , $sql);
                          while($row = mysqli_fetch_assoc($result)){

                              echo '<option value="'.$row['city'].'">'.$row['city'].'</option>';

                          }
                        ?>
                      </select>
                      <div class="invalid-feedback">
                          Please select a valid City.
                      </div>
                  </div>

                  <div class="col-md-6 mb-3">
                      <label for="extra_data">Extra Data ['Street' ,  village]</label>
                      <input type="text" name="extra_data" class="form-control" required>
                      <div class="invalid-feedback">
                          Please provide a valid Extra Data.
                      </div>
                  </div>

                  <div class="col-md-6 mb-3 ">
                      <label for="facebook">Location Map</label>
                      <input type="text" name="location_map" class="form-control"  required>
                      <div class="invalid-feedback">
                          Please provide a valid Location Map.
                      </div>
                  </div>

                  
                  <div class="col-md-6 mb-3">
                      <label for="img">Image 1</label>
                      <input type="file" name="img_url" class="form-control" id="img" required>
                      <div class="valid-feedback">
                          Looks good!
                      </div>
                  </div>

                  <div class="col-md-6 mb-3">
                      <label for="img">Image 2</label>
                      <input type="file" name="img_url2" class="form-control" id="img" required>
                      <div class="valid-feedback">
                          Looks good!
                      </div>
                  </div>

                  <div class="col-md-6 mb-3">
                      <label for="img">Image 3</label>
                      <input type="file" name="img_url3" class="form-control" id="img" required>
                      <div class="valid-feedback">
                          Looks good!
                      </div>
                  </div>

                  <div class="col-md-6 mb-3">
                      <label for="img">Floor Plans Image</label>
                      <input type="file" name="floor_plans_img" class="form-control" id="img" required>
                      <div class="valid-feedback">
                          Looks good!
                      </div>
                  </div>


                  

              </div>
                                
      
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit"  class="btn btn-primary">Save Property</button>
          </div>
      </form>
    </div>
  </div>
</div>

<!--- End Module Form Add Property --------->




<?php
require './layouts/footer.php';
?>