<?php
require '../helpers/config.php';


if(isset($_GET['idCart'])){
    $arr_data = explode(",", $_GET['idCart']);



        foreach($arr_data as $value){
            if(strlen($value) > 0){
                echo 'Cart ID: '.$value.'<br>';



                $sql = "SELECT * FROM `cart` WHERE id =".$value;
                $result = mysqli_query($con , $sql);
                while($row = mysqli_fetch_assoc($result)){
                    $property_id = $row['property_id'];
                    $buyer_id    = $row['buyer_id'];
                    $owner_id    = $row['owner_id'];
                    $quantity    = $row['quantity'];
                    $order_don   = $row['order_don'];
                }
                
                if( isset($_GET['PayerID'])){ 
                   $payment_id=2;
                   
                }else{
                    $payment_id=1;
                }
                
                if($result){

                    if(isset($_GET['PayerID'])){
                        $PayerID=$_GET['PayerID'];
                        $q_set_Oredr="INSERT INTO `orders_don`(`property_id`,`buyer_id`, `owner_id`, `payment_id`,order_don,`quantity`,`PayerID`)
                        VALUES ($property_id , $buyer_id , $owner_id , $payment_id,1,$quantity,'$PayerID')";
                    }else{
                        $q_set_Oredr="INSERT INTO `orders_don`(`property_id`,`buyer_id`, `owner_id`, `payment_id`,order_don,`quantity`)
                        VALUES ($property_id , $buyer_id , $owner_id , $payment_id,1,$quantity)";
                    }

                        
                        $result2 = mysqli_query($con , $q_set_Oredr);
                        if ($result2) {
                            
                            $del_cart = "DELETE FROM `cart` WHERE id=".$value;
                            $result_del   = mysqli_query($con , $del_cart);
                            if($result_del){
                                if(isset($_GET['PayerID'])){
                                    $PayerID ='?order_added&PayerID'.'='.$_GET['PayerID'];
                                }else{
                                    $PayerID ='?order_added';
                                }
                                header("Location: ../orders.php".$PayerID);
                                

                            }else{
                                echo 'NOT Invalid Delete';
                            }
                        }

                }








            }
            
        }
    


}



?>