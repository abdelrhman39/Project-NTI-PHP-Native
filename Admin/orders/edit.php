<?php 

require '../helpers/dbConnection.php';
require '../helpers/helpers.php';
require '../helpers/checkLogin.php';

if (isset($_SESSION['User'])) {
    if (isset($_GET['id_property'])) {
        $id_property = $_GET['id_property'];
        $id_buyer = $_SESSION['User']['id'];
        $owner_id = $_GET['owner_id'];

        $quantity = $_POST['quantity'];

        $q = "SELECT * FROM `orders_don` where property_id=$id_property and buyer_id=$id_buyer and owner_id=$owner_id";
        $result = mysqli_query($con , $q);
        while($row = mysqli_fetch_assoc($result)){
            if($row['property_id']== $_GET['id_property'] && $_GET['property_id']=$id_property && $_GET['owner_id']=$owner_id){ 

                
                if($quantity == 0){$quantity=1;}
                    $final_quantity= $quantity;
                

               
               
                $sql ="UPDATE `orders_don` SET quantity=$final_quantity WHERE property_id=$id_property and buyer_id=$id_buyer and owner_id=$owner_id";


                $result = mysqli_query($con , $sql);
                if ($result) {
                    $_SESSION['Message'] =['Order Updated '];
                    header('location: index.php');
                    exit();
                }else{
                    $_SESSION['Message'] =['Errorr Update'];
                    header('location: index.php');
                    continue;
                }                
                
              
            }
            
            
        }


    }else{
        header('location: property_grid.php');
    }
}else{
    header('location: ../login.php');
}



?>