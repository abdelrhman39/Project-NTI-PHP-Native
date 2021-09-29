<?php
require '../helpers/config.php';





if (isset($_SESSION['User'])) {
    if (isset($_GET['id'])) {
        
            $property_id = $_GET['property_id'];
            $id = $_GET['id'];
            
            $sql = "DELETE FROM `cart` WHERE id = $id ";
            $result = mysqli_query($con , $sql);
            if($result){
                header('location: ../orders.php');
            }else{

            }
        

    }else{
        header('location: index.php');
    }
}else{
    header('location: login.php');
}