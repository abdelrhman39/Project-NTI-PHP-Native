<?php 

require '../helpers/dbConnection.php';
require '../helpers/helpers.php';
require '../helpers/checkLogin.php';


# Fetch Roles ... 
$sql = "select * from cart";
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
                     printMessages('Display Cart');
                     ?>
                    </ol>
                      
   

                        <div class="card mb-4">
                           
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th>Buyer Name</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                        $id_user = $_SESSION['user']['id'];
                                        $sql = "SELECT cart.id as cart_id,cart.quantity,cart.owner_id,
                                        cart.property_id,property_estate.id as property_id,
                                        property_estate.property_name,property_estate.price,
                                        property_imgs.img_url,users.id,users.full_name FROM `cart` JOIN
                                        property_estate ON cart.property_id = property_estate.id JOIN
                                        property_imgs ON property_imgs.id_property = property_estate.id JOIN
                                            users ON cart.buyer_id = users.id ";
                                        $result = mysqli_query($con,$sql);

                                        while ($row = mysqli_fetch_assoc($result)) {
                                        
                                        ?>
                 

                                        <tr class="border-bottom mt-3" >
                                            <td class="w-25"><img src="<?php echo url($row['img_url']); ?>" style="height: 100px;width:150px"></td>
                                            <td><?php echo $row['property_name']; ?></td>
                                            
                                            <td>
                                            <form action="edit.php?id_property=<?php echo  $row['property_id'].'&owner_id='.$row['owner_id'];?>" method="POST">
                                                <input type="number" value="<?php echo $row['quantity']; ?>" name="quantity" min="1" class="form-control">
                                                <button type="sub" class="btn btn-success btn-sm">UpDate</button>
                                            </form>
                                            </td>

                                            <td><?php echo $row['price']; ?>$</td>
                                            <td><?php echo $total = $row['price'] * $row['quantity']; ?>$</td>
                                            <td><?php echo $row['full_name'];  ?></td>
                                            <td>
                                                <a class="btn btn-outline-dark" href="delete.php?id=<?php echo $row['cart_id'];?>" class="close" aria-label="Close">
                                                        Delete Order
                                                </a>
                                            </td>

                                        </tr>
                                        <?php
                                            }
                                        ?>

                                            
                                        </tbody>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                

 <?php 
  
  require '../Layouts/footer.php';

?>