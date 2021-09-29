<?php
require '../helpers/config.php';
require '../helpers/helpers.php';
require './layouts/topnav.php'; 




$id_property = $_GET['edit_id'];
  $sql = "SELECT property_estate.*,property_imgs.img_url,property_imgs.img_url2,
  property_imgs.img_url3,property_imgs.floor_plans_img,property_type.title, 
  location_property.country,location_property.gov,location_property.city,
  location_property.extra_data ,location_property.location_map 
  FROM property_estate JOIN location_property on property_estate.location_id = location_property.id JOIN property_type ON property_type.id = property_estate.type_id 
  JOIN property_imgs ON property_imgs.id_property = property_estate.id  WHERE property_estate.id = $id_property";

$result = mysqli_query($con,$sql);

  while ($row = mysqli_fetch_assoc($result)) {
    //Data Product
      $property_id       = $row['id'];
      $owner_id          = $row['owner_id'];
      $location_id       = $row['location_id'];
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
      $type_id           = $row['type_id'];

      
      
  }


?>





<!--- Start Module Form Edit Property --------->
<div class="container-fluid" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

       <form action="update.php" method="POST" enctype='multipart/form-data' class="needs-validation" novalidate>
              
          <input type="hidden" name="property_id" value="<?php echo $property_id; ?>">
          <input type="hidden" name="location_id" value="<?php echo $location_id; ?>">
          <input type="hidden" name="type_id" value="<?php echo $type_id; ?>">

              <div class="form-row">
                  <div class="col-md-6 mb-3">
                      <label for="validationCustom01">property Name</label>
                      <input type="text" value="<?php echo $property_name; ?>" name="property_name" class="form-control" id="validationCustom01" >
                      <div class="valid-feedback">
                          Looks good!
                      </div>
                  </div>
                  
                  <div class="col-md-6 mb-3">
                      <label for="validationCustom02">Space</label>
                      <input type="text" value="<?php echo $space; ?>" name="space" class="form-control" id="validationCustom02" >
                      <div class="valid-feedback">
                          Looks good!
                      </div>
                  </div>
                  <div class="col-md-12 mb-3">
                      <label for="validationCustom05">Property Description</label>
                      <textarea type="text" name="property_desc" class="form-control" id="validationCustom05" rows="3" >
                        <?php echo $property_desc; ?>"
                      </textarea>
                      <div class="invalid-feedback">
                          Please provide a valid Property Description.
                      </div>
                  </div>

              </div>
              <div class="form-row">
                  <div class="col-md-6 mb-3">
                      <label for="Password">Price</label>
                      <input type="number" value="<?php echo $price; ?>" name="price" class="form-control" id="Password" >
                      <div class="valid-feedback">
                          Looks good!
                      </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="validationCustom03">Rooms Count</label>
                    <input type="number" value="<?php echo $rooms_count; ?>" name="rooms_count" class="form-control"  id="validationCustom03" >
                    <div class="invalid-feedback">
                        Please provide a valid Rooms Count.
                  </div>

                  
                  
              </div>

              <div class="form-row">

                  <div class="col-md-6 mb-3">
                      <label for="validationCustom03">Grage</label>
                      <input type="number" value="<?php echo $grage; ?>" name="grage" class="form-control"  id="validationCustom03" >
                      <div class="invalid-feedback">
                          Please provide a valid Grage.
                      </div>
                  </div>
                    

                  <div class="col-md-6 mb-3">
                    <div class="">
                        <video autoplay width="100px" control src="<?php echo $video; ?>"></video>
                    </div>
                      <label for="img">Video</label>
                      <input type="file" name="video" class="form-control" id="img" >
                      <div class="valid-feedback">
                          Looks good!
                      </div>
                  </div>
                  
                  <div class="col-md-6 mb-3">
                      <label for="validationCustom04">Property Type</label>
                      <select name="type_id" class="custom-select" id="validationCustom04" >
                        <option selected disabled value="">Country...</option>
                        <?php
                          $sql = "SELECT DISTINCT * FROM `property_type`";
                          $result = mysqli_query($con , $sql);
                          while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <option value="<?php echo $row['id'];?>"  <?php if($row['id'] == $type_id){echo 'selected';}?>  ><?php echo $row['title'];?></option>
                        <?php
                          }
                        ?>
                      </select>
                      <div class="invalid-feedback">
                          Please select a valid Property Type.
                      </div>
                  </div>


                  <div class="col-md-6 mb-3">
                      <label for="validationCustom04">Country</label>
                      <select name="country" class="custom-select" id="validationCustom04" >
                        <option selected disabled value="">Country...</option>
                        <?php
                          $sql = "SELECT DISTINCT country FROM `location_property`";
                          $result = mysqli_query($con , $sql);
                          while($row = mysqli_fetch_assoc($result)){

                            ?>
                            <option value="<?php echo $row['country'];?>"  <?php if($row['country'] == $country){echo 'selected';}?> ><?php echo $row['country'];?></option>
                        <?php
                          }
                        ?>

                              <!-- echo '<option value="'.$row['country'].'">'.$row['country'].'</option>';

                          
                        ?> -->
                      </select>
                      <div class="invalid-feedback">
                          Please select a valid Governorate.
                      </div>
                  </div>

                  <div class="col-md-6 mb-3">
                      <label for="validationCustom04">Governorate</label>
                      <select name="gov" class="custom-select" id="validationCustom04" >
                        <option selected disabled value="">Governorate...</option>
                        <?php
                          $sql = "SELECT DISTINCT gov FROM `location_property`";
                          $result = mysqli_query($con , $sql);
                          while($row = mysqli_fetch_assoc($result)){

                            ?>
                            <option value="<?php echo $row['gov'];?>"  <?php if($row['gov'] == $gov){echo 'selected';}?> ><?php echo $row['gov'];?></option>
                        <?php
                          }
                        ?>
                      </select>
                      <div class="invalid-feedback">
                          Please select a valid Governorate.
                      </div>
                  </div>

                  <div class="col-md-6 mb-3">
                      <label for="validationCustom04">City</label>
                      <select name="city" class="custom-select" id="validationCustom04" >
                        <option selected disabled value="">City...</option>
                        <?php
                          $sql = "SELECT DISTINCT city FROM `location_property`";
                          $result = mysqli_query($con , $sql);
                          while($row = mysqli_fetch_assoc($result)){

                            ?>
                            <option value="<?php echo $row['city'];?>"  <?php if($row['city'] == $city){echo 'selected';}?> ><?php echo $row['city'];?></option>
                        <?php
                          }
                        ?>
                      </select>
                      <div class="invalid-feedback">
                          Please select a valid City.
                      </div>
                  </div>

                  <div class="col-md-6 mb-3">
                      <label for="extra_data">Extra Data ['Street' ,  village]</label>
                      <input type="text" value="<?php echo $extra_data;?>" name="extra_data" class="form-control" >
                      <div class="invalid-feedback">
                          Please provide a valid Extra Data.
                      </div>
                  </div>

                  <div class="col-md-6 mb-3 ">
                      <label for="facebook">Location Map</label>
                      <input type="text" value="<?php echo $location_map;?>"  name="location_map" class="form-control"  >
                      <div class="invalid-feedback">
                          Please provide a valid Location Map.
                      </div>
                  </div>

                  
                  <div class="col-md-6 mb-3">
                      <img width="100px" src="<?php echo url($img_url);?>" >
                      <label for="img">Image 1</label>
                      <input type="file" name="img_url" class="form-control" id="img" >
                      <div class="valid-feedback">
                          Looks good!
                      </div>
                  </div>

                  <div class="col-md-6 mb-3">
                      <img width="100px" src="<?php echo url($img_url2);?>" >
                      <label for="img">Image 2</label>
                      <input type="file" name="img_url2" class="form-control" >
                      <div class="valid-feedback">
                          Looks good!
                      </div>
                  </div>

                  <div class="col-md-6 mb-3">
                      <img width="100px" src="<?php echo url($img_url3);?>" >
                      <label for="img">Image 3</label>
                      <input type="file" name="img_url3" class="form-control" >
                      <div class="valid-feedback">
                          Looks good!
                      </div>
                  </div>

                  <div class="col-md-6 mb-3">
                  <img width="100px" src="<?php echo url($floor_plans_img);?>" >
                      <label for="img">Floor Plans Image</label>
                      <input type="file" name="floor_plans_img" class="form-control" id="img" >
                      <div class="valid-feedback">
                          Looks good!
                      </div>
                  </div>


                  

              </div>
                                
      
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit"  class="btn btn-primary">Edit Property</button>
          </div>
      </form>
    </div>
  </div>
</div>

<!--- End Module Form Edit Property --------->

<?php
require './layouts/footer.php';
?>