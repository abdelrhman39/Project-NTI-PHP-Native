<?php 

require '../helpers/dbConnection.php';
require '../helpers/helpers.php';
require '../helpers/checkLogin.php';


# Fetch Roles ... 
$user_is = $_SESSION['User']['id'];
$sql = "SELECT property_estate.*,users.id as user_id,property_imgs.img_url FROM `property_estate` 
JOIN users on property_estate.owner_id = users.id LEFT JOIN property_imgs ON property_imgs.id_property = property_estate.id";

$op  = mysqli_query($con,$sql);



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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                                                     
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
                    </ol>
                      
   

                        <div class="card mb-4">
                           
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Product name</th>
                                                <th>Product Price</th>
                                                <th>Product Description</th>
                                                <th>Product Space</th>
                                                <th>Room Count</th>
                                                <th>Accepted</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Product name</th>
                                                <th>Product Price</th>
                                                <th>Product Description</th>
                                                <th>Product Space</th>
                                                <th>Room Count</th>
                                                <th>Accepted</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                     
                                 <?php 
                                    $x = 1;
                               
                                    if (mysqli_num_rows($op) > 0) {
                                        while ($row = mysqli_fetch_assoc($op)) {
                                            ?>
                                            <tr>
                                            <th scope="row"><?php echo $x++; ?></th>
                                            <th><img width="100px" src="<?php echo FUrl($row['img_url']); ?>"></th>
                                            <td><?php echo $row['property_name']; ?></td>
                                            <td><?php echo $row['price']; ?></td>
                                            <td><?php echo substr($row['property_desc'], 0, 30) . '.....'; ?></td>
                                            <td><?php echo $row['space']; ?></td>
                                            <td><?php echo $row['rooms_count']; ?></td>
                                            <td><?php echo ($row['is_accepted']>0)?'Yes':'No'; ?></td>
                                            <td>

                                            <a href='delete.php?id=<?php echo $row['id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                                            <a href='edit.php?id=<?php echo $row['id'];?>' class='btn btn-primary m-r-1em'>Edit</a>
                                                                                            
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






<?php
  
  require '../Layouts/footer.php';

?>