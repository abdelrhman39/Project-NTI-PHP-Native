<?php 
require '../helpers/dbConnection.php';
require '../helpers/helpers.php';
require '../helpers/checkLogin.php';


if (isset($_SESSION['User'])) {
  if (isset($_GET['id'])) {
      
          $property_id = $_GET['property_id'];
          $id = $_GET['id'];
          
          $sql = "DELETE FROM `cart` WHERE id = $id ";
          $result = mysqli_query($con , $sql);
          if($result){
            $_SESSION['Message'] =[' Deleted Cart Don'];
              header('location: index.php');
          }else{
            $_SESSION['Message'] =['Error Delet , Please Try Again'];
            header('location: index.php');
          }
      

  }else{
      header('location: index.php');
  }
}else{
  header('location: login.php');
}
?>