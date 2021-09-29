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
                     printMessages('Display orders');
                     ?>
                    </ol>
                      
   

                        <div class="card mb-4">
                           
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Property Name</th>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">Date Oredr</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Payer ID / Order ID</th>
                                            <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Property Name</th>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">Date Oredr</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Payer ID / Order ID</th>
                                            <th scope="col">Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                     
                                        <?php
                $id_user = $_SESSION['user']['id'];
                $sql = "SELECT orders_don.id,orders_don.date_order,orders_don.quantity,orders_don.owner_id,orders_don.property_id,
                orders_don.PayerID ,property_estate.property_name,property_imgs.img_url,
                payment_method.method_title FROM orders_don JOIN  property_estate ON
                 property_estate.id=orders_don.property_id JOIN payment_method ON 
                 payment_method.id=orders_don.payment_id JOIN property_imgs ON 
                 property_imgs.id_property=orders_don.property_id";
                $result = mysqli_query($con,$sql);
                $i=1;

                while ($row = mysqli_fetch_assoc($result)) {
                 
                  ?>
                 

                 <tr>
                  <td scope="row"><?php echo $i++; ?></td>
                  <td class="w-25"><img src="<?php echo url($row['img_url']); ?>" style="height: 100px;width:150px"></td>
                  <td><?php echo $row['property_name']; ?></td>
                  <td scope="col"><?php echo $row['method_title']; ?></td>
                  <td scope="col"><?php echo $row['date_order']; ?></td>
                  <td>
                    <form action="edit.php?id_property=<?php echo  $row['property_id'].'&owner_id='.$row['owner_id']?>" method="POST">
                        <input type="number" value="<?php echo $row['quantity']; ?>" name="quantity" min="1" class="form-control">
                        <button type="sub" class="btn btn-success btn-sm">UpDate</button>
                    </form>
                    </td>
                  <td scope="col"><?php  if($row['PayerID']){echo $row['PayerID'];}else{
                      echo $row['id'];
                  } ?></td>
                    <td>
                        <a href='delete.php?id=<?php echo $row['id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                    </td> 

                </tr>

                  <?php
                 
                    }
                    
                    ?>      
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                



<?php 
  
  require '../Layouts/footer.php';

?>