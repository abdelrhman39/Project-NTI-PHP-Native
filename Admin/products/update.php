<?php
require '../helpers/dbConnection.php';
require '../helpers/helpers.php';
require '../helpers/checkLogin.php';



$errorMs=[];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $property_name   = CleanInputs($_POST['property_name']);
    $space           = CleanInputs($_POST['space']);
    $property_desc   = CleanInputs($_POST['property_desc']);
    $price           = CleanInputs($_POST['price']);
    $rooms_count     = CleanInputs($_POST['rooms_count']);
    $grage           = CleanInputs($_POST['grage']);
    $type_id         = CleanInputs($_POST['type_id']);
    $video           = $_FILES['video'];

    $country         = CleanInputs($_POST['country']);
    $gov             = CleanInputs($_POST['gov']);
    $city            = CleanInputs($_POST['city']);
    $extra_data      = CleanInputs($_POST['extra_data']);
    $location_map    = CleanInputs($_POST['location_map']);

    $is_accepted     = CleanInputs($_POST['is_accepted']);
    
    
    $img_url         = $_FILES['img_url'];
    $img_url2        = $_FILES['img_url2'];
    $img_url3        = $_FILES['img_url3'];
    $floor_plans_img = $_FILES['floor_plans_img'];


    $property_id = $_POST['property_id'];
    $location_id = $_POST['location_id'];






    

    //Start Validate property_name
    if (!validate($property_name, 'empty')) {
        $errorMs['property Name']='property Name is Required , Please enter your property Name';
    } elseif (!validate($property_name, 'string')) {
        $errorMs['property Name']= 'property Name is NOT Characters , Please enter the property Name correctly';
    }
    // End Validate property_name

    //Start Validate space
    if (!validate($space, 'empty')) {
        $errorMs['property space']=' space is Required , Please enter your property space';
    } elseif (!validate($space, 'number')) {
        $errorMs['property space']= 'space is NOT Number , Please enter the property space correctly';
    }
    // End Validate space

    //Start Validate property_desc
    if (!validate($property_desc, 'empty')) {
        $errorMs['property Description']='property Description is Required , Please enter your property Description';
    } elseif (!validate($property_desc, 'string')) {
        $errorMs['property Description']= 'property Description is NOT Characters , Please enter the property Description correctly';
    }
    // End Validate property_desc

    


    //Start Validate price
    if (!validate($price, 'empty')) {
        $errorMs['price']=' price is Required , Please enter your price';
    } elseif (!validate($price, 'number')) {
        $errorMs['price']= 'Please enter the price correctly ';
    }
    // End Validate price

    //Start Validate rooms_count
    if (!validate($rooms_count, 'empty')) {
        $errorMs['Rooms Count']=' rooms Count is Required , Please enter your rooms Count';
    } elseif (!validate($rooms_count, 'number')) {
        $errorMs['Rooms Count']= 'rooms Count enter the rooms Count correctly ';
    }
    // End Validate rooms_count

    //Start Validate grage
    if (!validate($grage, 'empty')) {
        $errorMs['grage']=' grage is Required , Please enter your grage';
    } elseif (!validate($grage, 'number')) {
        $errorMs['grage']= 'grage enter the grage correctly ';
    }
    // End Validate grage

    //Start Validate type
    if (!validate($type_id, 'empty')) {
        $errorMs['type']=' type is Required , Please enter your type';
    } elseif (!validate($type_id, 'number')) {
        $errorMs['type']= 'type enter the type correctly ';
    }
    // End Validate type

    //Start Validate Country
    if (!validate($country, 'empty')) {
        $errorMs['Country']=' Country is Required , Please enter your Country';
    } elseif (!validate($country, 'string')) {
        $errorMs['Country']= 'Country is NOT Characters , Please enter the Country correctly';
    }
    // End Validate Country

    //Start Validate governorate
    if (!validate($gov, 'empty')) {
        $errorMs['Governorate']=' Governorate is Required , Please enter your Governorate';
    } elseif (!validate($gov, 'string')) {
        $errorMs['Governorate']= 'Governorate is NOT Characters , Please enter the Governorate correctly';
    }
    // End Validate governorate

    //Start Validate City
    if (!validate($city, 'empty')) {
        $errorMs['City']=' City is Required , Please enter your City';
    } elseif (!validate($city, 'string')) {
        $errorMs['City']= 'City is NOT Characters , Please enter the City correctly';
    }
    // End Validate City

    //Start Validate Extra Data
    if (!validate($extra_data, 'string')) {
        $errorMs['Extra Data']= 'Extra Data is NOT Characters , Please enter the Extra Data correctly';
    }
    // End Validate Extra Data


    //Start Validate Extra Data
    if (!validate($extra_data, 'string')) {
        $errorMs['Extra Data']= 'Extra Data is NOT Characters , Please enter the Extra Data correctly';
    }
    // End Validate Extra Data

    //Start Validate location_map
    if (!validate($location_map, 'string')) {
        $errorMs['location Map']= 'location Map is NOT Characters , Please enter the location Map correctly';
    }
    // End Validate location_map
    
   

    














    

    

    


    if (!empty($errorMs)) {
        
            $_SESSION['ErorrMassegs'] = $errorMs;
            header("Location: tables.php");
        
    } else {

        $del_img ="SELECT property_estate.id,property_estate.video ,
         property_imgs.id_property,property_imgs.img_url,property_imgs.img_url2,
         property_imgs.img_url3,property_imgs.floor_plans_img 
        FROM property_estate JOIN property_imgs ON
         property_estate.id = property_imgs.id_property 
         WHERE property_estate.id =$property_id";
         
        $resqult_del = mysqli_query($con, $del_img);
        while ($fetch = mysqli_fetch_assoc($resqult_del)) {

            $img_del             = $fetch['img_url'];
            $img2_del            = $fetch['img_url2'];
            $img3_del            = $fetch['img_url3'];
            $floor_plans_img_del = $fetch['floor_plans_img'];
            $video_del           = $fetch['video'];

        }



        if($img_url['size'] > 0){
            unlink($img_del);
            $img_del   = uploadImg($img_url,'../');
        }
        if($img_url2['size'] > 0){
            unlink($img2_del);
            $img2_del  = uploadImg($img_url2,'../');
        }
        if($img_url3['size'] > 0){
            unlink($img3_del);
            $img3_del  = uploadImg($img_url3,'../');
        }
        if($floor_plans_img['size'] > 0){
            unlink($floor_plans_img_del);
            $floor_plans_img_del = uploadImg($floor_plans_img,'../');
        }
        if($video['size'] > 0){
            unlink($video_del);
            $video_del   = uploadVideo($video,'../');
        }

        
        
        
        
        
            
            $owner_id = $_SESSION['User']['id'];
            
            $sql_location_property = "UPDATE `location_property`SET
            `country`='$country',`gov`='$gov',
            `city`='$city',`extra_data`='$extra_data',
            `location_map`='$location_map' WHERE id =$location_id";

            $result = mysqli_query($con, $sql_location_property);

        
        
            


            $sql_property_estate = "UPDATE `property_estate` SET 
            `property_name`='$property_name',`property_desc`='$property_desc',
            `space`='$space',`price`='$price',
            `rooms_count`=$rooms_count,`grage`='$grage',
            `video`='$video_del',`type_id`=$type_id,
            `location_id`=$location_id,`owner_id`=$owner_id , is_accepted='$is_accepted'
             WHERE id=$property_id";

            $result = mysqli_query($con, $sql_property_estate);




            $sql_property_imgs ="UPDATE `property_imgs` SET 
            `img_url`='$img_del',`img_url2`='$img2_del',
            `img_url3`='$img3_del',`floor_plans_img`='$floor_plans_img_del',
            `id_property`=$property_id WHERE id_property=$property_id";

            $result = mysqli_query($con, $sql_property_imgs);
            
           

            if ($result){
            
                $_SESSION['ErorrMassegs']=['Property Upadated'];
                header('location: index.php');

            } else { 

                $_SESSION['ErorrMassegs']=[' Erorr Update Property , Please Check The Erorr Then Try Again'];
                header('location: index.php');
            }
         
        
    }
}









?>