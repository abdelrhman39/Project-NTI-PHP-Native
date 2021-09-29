<?php 

require '../helpers/dbConnection.php';
require '../helpers/helpers.php';
require '../helpers/checkLogin.php';







$errorMs=[];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $property_name   = CleanInputs($_POST['property_name']);
    $space           = CleanInputs($_POST['space']);
    $property_desc   = CleanInputs($_POST['property_desc']);
    $price           = CleanInputs($_POST['price']);
    $rooms_count     = CleanInputs($_POST['rooms_count']);
    $grage           = CleanInputs($_POST['grage']);
    $type_id         = CleanInputs($_POST['type_id']);
    $video           = $_FILES['video'];

    $country         = CleanInputs($_POST['country']);
    $gov             = CleanInputs($_POST['gov']);
    $city            = CleanInputs($_POST['city']);
    $extra_data      = CleanInputs($_POST['extra_data']);
    $location_map    = CleanInputs($_POST['location_map']);


    
    $img_url         = $_FILES['img_url'];
    $img_url2        = $_FILES['img_url2'];
    $img_url3        = $_FILES['img_url3'];
    $floor_plans_img = $_FILES['floor_plans_img'];








    

    //Start Validate property_name
    if (!validate($property_name, 'empty')) {
        $errorMs['property Name']='property Name is Required , Please enter your property Name';
    } elseif (!validate($property_name, 'string')) {
        $errorMs['property Name']= 'property Name is NOT Characters , Please enter the property Name correctly';
    }
    // End Validate property_name

    //Start Validate space
    if (!validate($space, 'empty')) {
        $errorMs['property space']=' space is Required , Please enter your property space';
    } elseif (!validate($space, 'number')) {
        $errorMs['property space']= 'space is NOT Number , Please enter the property space correctly';
    }
    // End Validate space

    //Start Validate property_desc
    if (!validate($property_desc, 'empty')) {
        $errorMs['property Description']='property Description is Required , Please enter your property Description';
    } elseif (!validate($property_desc, 'string')) {
        $errorMs['property Description']= 'property Description is NOT Characters , Please enter the property Description correctly';
    }
    // End Validate property_desc

    


    //Start Validate price
    if (!validate($price, 'empty')) {
        $errorMs['price']=' price is Required , Please enter your price';
    } elseif (!validate($price, 'number')) {
        $errorMs['price']= 'Please enter the price correctly ';
    }
    // End Validate price

    //Start Validate rooms_count
    if (!validate($rooms_count, 'empty')) {
        $errorMs['Rooms Count']=' rooms Count is Required , Please enter your rooms Count';
    } elseif (!validate($rooms_count, 'number')) {
        $errorMs['Rooms Count']= 'rooms Count enter the rooms Count correctly ';
    }
    // End Validate rooms_count

    //Start Validate grage
    if (!validate($grage, 'empty')) {
        $errorMs['grage']=' grage is Required , Please enter your grage';
    } elseif (!validate($grage, 'number')) {
        $errorMs['grage']= 'grage enter the grage correctly ';
    }
    // End Validate grage

    //Start Validate type
    if (!validate($type_id, 'empty')) {
        $errorMs['type']=' type is Required , Please enter your type';
    } elseif (!validate($type_id, 'number')) {
        $errorMs['type']= 'type enter the type correctly ';
    }
    // End Validate type

    //Start Validate Country
    if (!validate($country, 'empty')) {
        $errorMs['Country']=' Country is Required , Please enter your Country';
    } elseif (!validate($country, 'string')) {
        $errorMs['Country']= 'Country is NOT Characters , Please enter the Country correctly';
    }
    // End Validate Country

    //Start Validate governorate
    if (!validate($gov, 'empty')) {
        $errorMs['Governorate']=' Governorate is Required , Please enter your Governorate';
    } elseif (!validate($gov, 'string')) {
        $errorMs['Governorate']= 'Governorate is NOT Characters , Please enter the Governorate correctly';
    }
    // End Validate governorate

    //Start Validate City
    if (!validate($city, 'empty')) {
        $errorMs['City']=' City is Required , Please enter your City';
    } elseif (!validate($city, 'string')) {
        $errorMs['City']= 'City is NOT Characters , Please enter the City correctly';
    }
    // End Validate City

    //Start Validate Extra Data
    if (!validate($extra_data, 'string')) {
        $errorMs['Extra Data']= 'Extra Data is NOT Characters , Please enter the Extra Data correctly';
    }
    // End Validate Extra Data


    //Start Validate Extra Data
    if (!validate($extra_data, 'string')) {
        $errorMs['Extra Data']= 'Extra Data is NOT Characters , Please enter the Extra Data correctly';
    }
    // End Validate Extra Data

    //Start Validate location_map
    if (!validate($location_map, 'string')) {
        $errorMs['location Map']= 'location Map is NOT Characters , Please enter the location Map correctly';
    }
    // End Validate location_map
    
    //Start Validate video
    if (!validate($video['name'], 'empty')) {
        $errorMs['video']=' video is Required , Please enter your video';
    }
    // End Validate video

    //Start Validate img 1
    if (!validate($img_url['name'], 'empty')) {
        $errorMs['Image 1']=' Image 1 is Required , Please enter your Image 1';
    }
    // End Validate img 1

    //Start Validate img 2
    if (!validate($img_url2['name'], 'empty')) {
        $errorMs['Image 2']=' Image 2 is Required , Please enter your Image 2';
    }
    // End Validate img 2

    //Start Validate img 3
    if (!validate($img_url3['name'], 'empty')) {
        $errorMs['Image 3']=' Image 3 is Required , Please enter your Image 3';
    }
    // End Validate img 3

    





    if (!empty($errorMs)) {
        
            $_SESSION['Message'] = $errorMs;
            header("Location: index.php");
        
    } else {
        $final_video     = uploadVideo($video,'../');
        $final_img_url   = uploadImg($img_url,'../');
        $final_img_url2  = uploadImg($img_url2,'../');
        $final_img_url3  = uploadImg($img_url3,'../');
        $floor_plans_img = uploadImg($floor_plans_img,'../');
        if ($final_video && $final_img_url && $final_img_url2 && $final_img_url3) {
            
            
            $owner_id = $_SESSION['User']['id'];

            $sql_location_property ="INSERT INTO `location_property`
            (`country`, `gov`, `city`, `extra_data`, `location_map`) VALUES 
            ('$country','$gov','$city','$extra_data','$location_map')";
            $result = mysqli_query($con, $sql_location_property);
            $last_location_id = mysqli_insert_id($con);


            $sql_property_estate ="INSERT INTO `property_estate`
            (`property_name`, `property_desc`, `space`, `price`,`rooms_count`,`grage`,`video`,`type_id`, `location_id`,`owner_id`,`is_accepted`) VALUES 
            ('$property_name','$property_desc','$space','$price',$rooms_count,'$grage','$final_video','$type_id',$last_location_id,'$owner_id',0)";
            $result = mysqli_query($con, $sql_property_estate);

            $lastId_property_estate = mysqli_insert_id($con);
            $sql_property_imgs = "INSERT INTO `property_imgs`(`img_url`, `img_url2`, `img_url3`, `floor_plans_img`, `id_property`) VALUES
            ('$final_img_url', '$final_img_url2' , '$final_img_url3','$floor_plans_img', $lastId_property_estate)";
            $result = mysqli_query($con, $sql_property_imgs);
            

            if ($result){
                $_SESSION['Message']=['Property Added'];
                header('location: index.php');
            } else { 
                $_SESSION['Message']=['Erorr Add Property , Please Check The Erorr Then Try Again'];
                header('location: index.php');
            }
         
        }
    }
}








 require '../Layouts/header.php';
 require '../Layouts/topNav.php';
?>

<div id="layoutSidenav">

    <?php 
    require '../Layouts/sidNav.php';
 ?>




    <div id="layoutSidenav_content">



        <main>
            <div class="container-fluid">

                <h1 class="mt-4">Dashboard </h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">

                        <?php 
                      printMessages('Add Product');
                     ?>

                    </li>
                </ol>



<!--- Start Module Form Add Property --------->
<form action="create.php" method="POST" enctype='multipart/form-data' class="needs-validation" novalidate>
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
            <button type="submit"  class="btn btn-primary">Save Property</button>
          </div>
      </form>

<!--- End Module Form Add Property --------->


            </div>
        </main>




        <?php 
  
  require '../Layouts/footer.php';

?>