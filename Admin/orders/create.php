<?php 

require '../helpers/dbConnection.php';
require '../helpers/helpers.php';
require '../helpers/checkLogin.php';
require '../helpers/checkSuperAdmin.php';


if($_SERVER['REQUEST_METHOD'] == "POST"){

    $property_id = CleanInputs($_POST['property_id']);
    $owner_id    = CleanInputs($_POST['owner_id']);
    $buyer_id    = CleanInputs($_POST['buyer_id']);
    $quantity    = CleanInputs($_POST['quantity']);
    $order_don   = CleanInputs($_POST['order_don']);
    $PayerID     = CleanInputs($_POST['PayerID']);
    $payment_method     = CleanInputs($_POST['payment_method']);

    


   

    $errors = [];
    # Validate ... 
    if(!validate($property_id,1)){
      $errors['Property Name'] = "Requierd Field";
    }elseif(!validate($property_id,6)){
        $errors['Property Name'] = "Invalid Number";
    }
    if(!validate($owner_id,1)){
        $errors['Owner Name'] = "Requierd Field";
      }elseif(!validate($owner_id,6)){
          $errors['Owner Name'] = "Invalid Number";
    }
    if(!validate($buyer_id,1)){
        $errors['Buyer Name'] = "Requierd Field";
      }elseif(!validate($buyer_id,6)){
          $errors['Buyer Name'] = "Invalid Number";
    }
    if(!validate($quantity,1)){
        $errors['quantity'] = "Requierd Field";
      }elseif(!validate($quantity,6)){
          $errors['quantity'] = "Invalid Number";
    }

    if(!validate($order_don,1)){
        $errors['Order Don'] = "Requierd Field";
      }elseif(!validate($order_don,6)){
          $errors['Order Don'] = "Invalid Number";
    }
    if(!validate($quantity,1)){
        $errors['quantity'] = "Requierd Field";
      }
      if(!validate($payment_method,1)){
        $errors['payment_method'] = "Requierd Field";
      }elseif(!validate($payment_method,6)){
          $errors['payment_method'] = "Invalid Number";
    }


    if(count($errors) > 0){
        $_SESSION['Message'] = $errors;
    }else{

        $sql = "INSERT INTO `orders_don`(`property_id`, `buyer_id`, `owner_id`, `payment_id`,`order_don`, `quantity`, `PayerID`) 
                                 VALUES ($property_id , $buyer_id,$owner_id,$payment_method ,$order_don ,'$quantity','$PayerID')";


        $op  = mysqli_query($con,$sql);
        

      if($op){
          $message = ["Data Inserted"];
      }else{
          $message = ["Error in sql OP Try Again"];
      }

        $_SESSION['Message'] = $message;


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
                      printMessages('Add Cart');
                     ?>
                    
                    </li>
                </ol>



                <form method="post" action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                    enctype="multipart/form-data">



                    <div class="col-md-4 mb-3">
                        <label for="validationCustom04">Property Name</label>
                        <select name="property_id" class="custom-select" id="validationCustom04" required>
                            <option selected disabled value="">Country...</option>
                            <?php
                            $sql = "SELECT DISTINCT id,property_name FROM `property_estate`";
                            $result = mysqli_query($con , $sql);
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['property_name']; ?></option>';
                            <?php
                            }
                            ?>
                        </select>
                        <div class="invalid-feedback">
                            Please select a Property Name.
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="validationCustom04">Buyer Name</label>
                        <select name="buyer_id" class="custom-select" id="validationCustom04" required>
                            <option selected disabled value="">Country...</option>
                            <?php
                            $sql = "SELECT `id`,`full_name` FROM `users` WHERE `role`=2";
                            $result = mysqli_query($con , $sql);
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['full_name']; ?></option>';
                            <?php
                            }
                            ?>
                        </select>
                        <div class="invalid-feedback">
                            Please select a Buyer Name.
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="validationCustom04">Owner Name</label>
                        <select name="owner_id" class="custom-select" id="validationCustom04" required>
                            <option selected disabled value="">Country...</option>
                            <?php
                            $sql = "SELECT DISTINCT property_estate.owner_id, users.full_name FROM `property_estate` JOIN
                             users ON property_estate.owner_id= users.id WHERE users.role=3";
                            $result = mysqli_query($con , $sql);
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <option value="<?php echo $row['owner_id']; ?>"><?php echo $row['full_name']; ?></option>';
                            <?php
                            }
                            ?>
                        </select>
                        <div class="invalid-feedback">
                            Please select a Owner Name.
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="validationCustom04">Payment Method</label>
                        <select name="payment_method" class="custom-select" id="validationCustom04" required>
                            <option selected disabled value="">Country...</option>
                            <?php
                            $sql = "SELECT DISTINCT * FROM `payment_method`";
                            $result = mysqli_query($con , $sql);
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['method_title']; ?></option>';
                            <?php
                            }
                            ?>
                        </select>
                        <div class="invalid-feedback">
                            Please select a Payment Method.
                        </div>
                    </div>

                    <input type="hidden" value="1" name="order_don">
                    <input type="hidden" value="admin" name="PayerID">

                    <div class="col-md-4 mb-3">
                        <label for="validationCustom04">Quantity</label>
                        <input name="quantity" type="number" min="1" class="form-control" id="validationCustom04" required >
                            
                        <div class="invalid-feedback">
                            Please select a Quantity.
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Save</button>
                </form>


            </div>
        </main>




        <?php 
  
  require '../Layouts/footer.php';

?>