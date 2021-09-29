<?php 
require '../helpers/dbConnection.php';
require '../helpers/helpers.php';
require '../helpers/checkLogin.php';



 $id = sanitize($_GET['id'],1);

 $error = [];

 if(!validate($id,6)){
     $error['id'] = "Invalid Integar";
 }


 if(count($error) > 0){
     $message  = $error;
 }else{

    # Image Name 
    $sql = "SELECT property_imgs.*,property_estate.video FROM `property_imgs` 
    JOIN property_estate ON property_imgs.id_property = property_estate.id 
    WHERE property_estate.id=".$id;

    $op  = mysqli_query($con,$sql);
    $data = mysqli_fetch_assoc($op);
    $image           = $data['img_url'];
    $image2          = $data['img_url2'];
    $image3          = $data['img_url3'];
    $floor_plans_img = $data['floor_plans_img'];
    $video           = $data['video']; 


     $sql = "delete from property_estate where id =".$id;

     $op  = mysqli_query($con,$sql);

     if($op){
        $path_img             = '../'.$image;
        $path_image2          = '../'.$image2;
        $path_image3          = '../'.$image3;
        $path_floor_plans_img = '../'.$floor_plans_img;
        $path_video           = '../'.$image;
       
       if(file_exists($path_img)){
        unlink($path_img);
        unlink($path_image2);
        unlink($path_image3);
        unlink($path_floor_plans_img);
        unlink($path_video);
     } 
     

         $_SESSION['ErorrMassegs'] = ["Record Deleted"];
     }else{
        $_SESSION['ErorrMassegs']= ["Error Try Again"];
     }

 }

 
 header("Location: index.php");




?>