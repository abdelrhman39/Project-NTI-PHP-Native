<?php
require '../helpers/config.php';
require '../helpers/helpers.php';


if(isset($_GET['del_id'])){

    $del_id=$_GET['del_id'];

    $sql = "select property_estate.id,property_estate.video,property_imgs.img_url,property_imgs.img_url2,property_imgs.img_url3,property_imgs.floor_plans_img from property_estate 
            JOIN property_imgs ON property_estate.id = property_imgs.id_property WHERE property_estate.id =".$del_id;
            $op  = mysqli_query($con,$sql);
            $data =mysqli_fetch_assoc($op);
            $image = $data['img_url'];
            $image2 = $data['img_url2'];
            $image3 = $data['img_url3'];
            $floor_plans_img = $data['floor_plans_img'];
            $video = $data['video'];

            $path      = '../uploads/'.$image;
            $path2      = '../uploads/'.$image2;
            $path3      = '../uploads/'.$image3;
            $floor_plans_img  = '../uploads/'.$floor_plans_img;
            $path_video = '../uploads/'.$video;

    $sql = "DELETE FROM `property_estate` WHERE `property_estate`.`id` =$del_id";
    $result = mysqli_query($con , $sql);
        
        if($result){
            $_SESSION['ErorrMassegs'] =["Deleted Don"];
            # Image Name 
            
               unlink($path);
                unlink($path2);
                unlink($path3);
                unlink($floor_plans_img);
                unlink($path_video);
            header("Location: tables.php");

        }else{
            $_SESSION['ErorrMassegs'] =['Error Delet , Please Try Again'];
            header("Location: tables.php");
        }
  
  }else{
    $_SESSION['ErorrMassegs'] =['Error Delet , Please Try Again'];
    header("Location: tables.php");
  }

?>