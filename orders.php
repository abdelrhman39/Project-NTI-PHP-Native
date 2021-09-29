<?php
require './includes.php';
require './layouts/navbar.php';
?>

  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
 

  
  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Orders</h1>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Contact Single ======= -->
    <section class="contact">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
                <?php 
                if( isset($_GET['order_added']) ){ 
                  echo '<div class="alert alert-success" role="alert">
                            Order Added <i class="far fa-lg fa-calendar-check"></i>'?>
                            
                            <p class="float-right"> 
                              <?php if(isset($_GET['PayerID'])){echo "Payer ID :  ".$_GET['PayerID'];}?>
                            </p>
                        </div>
                        <?php
                }elseif (isset($_GET['order_cancelled']) ){
                    echo '<div class="alert alert-danger" role="alert">
                            Order Cancelled! <i class="far fa-lg fa-calendar-times"></i>
                          </div>';
                }
                 ?>
            <table class="table  ">
              <thead class="thead-light">
                <tr>
                  <th>Image</th>
                  <th>Name</th>
                  <th>quantity</th>
                  <th>Price</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
              <?php
                $id_user = $_SESSION['User']['id'];
                $sql = "SELECT cart.id as cart_id,cart.quantity,cart.owner_id,
                cart.property_id,property_estate.id as property_id,
                 property_estate.property_name,property_estate.price,
                 property_imgs.img_url,users.id FROM `cart` JOIN
                  property_estate ON cart.property_id = property_estate.id JOIN
                   property_imgs ON property_imgs.id_property = property_estate.id JOIN
                    users ON cart.buyer_id = users.id WHERE users.id =$id_user";
                $result = mysqli_query($con,$sql);

                while ($row = mysqli_fetch_assoc($result)) {
                 
                  ?>
                 

                    <tr class="border-bottom mt-3" style="line-height: 7em;">
                        <td class="w-25"><img src="profile_sett/<?php echo $row['img_url'] ?>" style="height: 100px;width:150px"></td>
                        <td><?php echo $row['property_name']; ?></td>
                        <td>


                      <?php $pro_id        = $row['property_id']; ?>
                      <?php $i=1; $property_name[]='';array_push($property_name,$row['property_name']);  ?>
                      <?php $i=1; $cart_id[]='';array_push($cart_id,$row['cart_id']);  ?>

                        <form action="./op_property/add_property.php?id_property=<?php echo  $row['property_id'].'&owner_id='.$row['owner_id'];?>" method="POST">
                            <input type="number" value="<?php echo $row['quantity']; ?>" name="quantity" min="1" class="form-control">
                            <button type="sub" class="btn btn-success btn-sm">UpDate</button>
                        </form>

                          
                        
                        </td>
                        <td><?php echo $row['price']; ?>$</td>
                        <td><?php echo $total = $row['price'] * $row['quantity']; ?>$</td>
                        <td>
                            <a class="btn btn-outline-dark" href="op_property/del_property.php?id=<?php echo $row['cart_id'];?>" class="close" aria-label="Close">
                                    Delete Order
                            </a>
                        </td>

                    </tr>

                  <?php
                  $i=0;
                  @$final_total[1]=0;
                  @$tot_pro = $final_total[$i++] +=$total;
                  
                  
                    }
                    
                    ?>
            </tbody>
            
            <tfoot>
            <?php if(isset($final_total[0])){
                  ?>
                <tr>
                
                  <th></th>
                  <th></th>
                  <th class="border-right">Total</th>
                  <th></th>
                  <th>
                     <?php echo $final_total[0].'$';?>
                  </th>
                  <th></th>
                </tr>
                
              </tfoot>
              
          </table>
          <?php }elseif(isset($_GET['order_added'])){
            echo ' <div class="alert fa-lg alert-info" role="alert">
            You Can Buy Other Products <i class="far fa-lg fa-calendar-plus"></i>
                </div>';
          }else{echo ' <div class="alert fa-lg alert-info" role="alert">
                  No Orders <i class="far fa-lg fa-sad-tear"></i>
              </div>';} ?>
          

<!---------------- Start Paypal ------------------------->
<div claas="conatiner">
      <div id="payment-box">
      <form class="paypal" action="payment/payments.php?" method="post" id="paypal_form" target="_blank">
        <input type="hidden" name="cmd" value="_xclick" />
        <input type="hidden" name="no_note" value="1" />
        <input type="hidden" name="lc" value="UK" />
        <input type="hidden" name="currency_code" value="GBP" />
        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
        <input type="hidden" name="first_name" value="<?php echo $_SESSION['User']['full_name']; ?>"  />
        <input type="hidden" name="payment_status" value="Order"  />
        <input type="hidden" name="payer_email" value="<?php echo $_SESSION['User']['email']; ?>"  />
        <input type="hidden" name="item_number" value="<?php echo $pro_id;?>" />
        <input type="hidden" name="item_amount" value="<?php echo $tot_pro; ?>" />
        <input type="hidden" name="item_name" value="<?php foreach($property_name as $val){if($val){echo $val.' , ';}} ?>" />
        

        <!---- Start Cart ID --------->
        <input type="hidden" name="cart_id" value="<?php foreach($cart_id as $val){if($val){echo $val.',';}} ?>"  />
      <!---- End Cart ID --------->
      <?php

      if(mysqli_num_rows($result)){

      ?>
        <button class="btn btn-danger btn-lg mb-5 float-right" type="submit" name="submit" value="Payment PayPal">
          <i class="fab fa-lg fa-cc-paypal"></i>
           Payment PayPal
        </button>
        
        <a href="payment/order_don.php?idCart=<?php foreach($cart_id as $val){if($val){echo $val.',';}} ?>" class="btn btn-dark btn-lg">
           <i class="far fa-lg fa-handshake"></i>
           Paiement when receiving
        </a>
        <?php 
      }
       ?>
      </form>
    </div>
  </div>

<!---------------- End Paypal ------------------------->



          </div>
        </div>
      </div>

      <div class="container">
        
        <table class="table table-responsive">
        <h3 class="text-center">
          Prepaid Transactions
          <hr class="w-25">
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
                  <td class="w-25"><img src="<?php echo url($row['img_url']); ?>" style="height: 100px;width:150px"></td>
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
    </section><!-- End Contact Single-->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  
  <?php
  
  require './layouts/footer.php';
  ?>
