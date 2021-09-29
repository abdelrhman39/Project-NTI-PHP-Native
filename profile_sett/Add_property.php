<?php
require '../helpers/config.php';
require '../helpers/helpers.php';



$errorMs=[];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $property_name   = cleanEr($_POST['property_name']);
    $space           = cleanEr($_POST['space']);
    $property_desc   = cleanEr($_POST['property_desc']);
    $price           = cleanEr($_POST['price']);
    $rooms_count     = cleanEr($_POST['rooms_count']);
    $grage           = cleanEr($_POST['grage']);
    $type_id         = cleanEr($_POST['type_id']);
    $video           = $_FILES['video'];

    $country         = cleanEr($_POST['country']);
    $gov             = cleanEr($_POST['gov']);
    $city            = cleanEr($_POST['city']);
    $extra_data      = cleanEr($_POST['extra_data']);
    $location_map    = cleanEr($_POST['location_map']);


    
    $img_url         = $_FILES['img_url'];
    $img_url2        = $_FILES['img_url2'];
    $img_url3        = $_FILES['img_url3'];
    $floor_plans_img = $_FILES['floor_plans_img'];








    

    //Start Validate property_name
    if (!validateInput($property_name, 'empty')) {
        $errorMs['property Name']='property Name is Required , Please enter your property Name';
    } elseif (!validateInput($property_name, 'string')) {
        $errorMs['property Name']= 'property Name is NOT Characters , Please enter the property Name correctly';
    }
    // End Validate property_name

    //Start Validate space
    if (!validateInput($space, 'empty')) {
        $errorMs['property space']=' space is Required , Please enter your property space';
    } elseif (!validateInput($space, 'number')) {
        $errorMs['property space']= 'space is NOT Number , Please enter the property space correctly';
    }
    // End Validate space

    //Start Validate property_desc
    if (!validateInput($property_desc, 'empty')) {
        $errorMs['property Description']='property Description is Required , Please enter your property Description';
    } elseif (!validateInput($property_desc, 'string')) {
        $errorMs['property Description']= 'property Description is NOT Characters , Please enter the property Description correctly';
    }
    // End Validate property_desc

    


    //Start Validate price
    if (!validateInput($price, 'empty')) {
        $errorMs['price']=' price is Required , Please enter your price';
    } elseif (!validateInput($price, 'number')) {
        $errorMs['price']= 'Please enter the price correctly ';
    }
    // End Validate price

    //Start Validate rooms_count
    if (!validateInput($rooms_count, 'empty')) {
        $errorMs['Rooms Count']=' rooms Count is Required , Please enter your rooms Count';
    } elseif (!validateInput($rooms_count, 'number')) {
        $errorMs['Rooms Count']= 'rooms Count enter the rooms Count correctly ';
    }
    // End Validate rooms_count

    //Start Validate grage
    if (!validateInput($grage, 'empty')) {
        $errorMs['grage']=' grage is Required , Please enter your grage';
    } elseif (!validateInput($grage, 'number')) {
        $errorMs['grage']= 'grage enter the grage correctly ';
    }
    // End Validate grage

    //Start Validate type
    if (!validateInput($type_id, 'empty')) {
        $errorMs['type']=' type is Required , Please enter your type';
    } elseif (!validateInput($type_id, 'number')) {
        $errorMs['type']= 'type enter the type correctly ';
    }
    // End Validate type

    //Start Validate Country
    if (!validateInput($country, 'empty')) {
        $errorMs['Country']=' Country is Required , Please enter your Country';
    } elseif (!validateInput($country, 'string')) {
        $errorMs['Country']= 'Country is NOT Characters , Please enter the Country correctly';
    }
    // End Validate Country

    //Start Validate governorate
    if (!validateInput($gov, 'empty')) {
        $errorMs['Governorate']=' Governorate is Required , Please enter your Governorate';
    } elseif (!validateInput($gov, 'string')) {
        $errorMs['Governorate']= 'Governorate is NOT Characters , Please enter the Governorate correctly';
    }
    // End Validate governorate

    //Start Validate City
    if (!validateInput($city, 'empty')) {
        $errorMs['City']=' City is Required , Please enter your City';
    } elseif (!validateInput($city, 'string')) {
        $errorMs['City']= 'City is NOT Characters , Please enter the City correctly';
    }
    // End Validate City

    //Start Validate Extra Data
    if (!validateInput($extra_data, 'string')) {
        $errorMs['Extra Data']= 'Extra Data is NOT Characters , Please enter the Extra Data correctly';
    }
    // End Validate Extra Data


    //Start Validate Extra Data
    if (!validateInput($extra_data, 'string')) {
        $errorMs['Extra Data']= 'Extra Data is NOT Characters , Please enter the Extra Data correctly';
    }
    // End Validate Extra Data

    //Start Validate location_map
    if (!validateInput($location_map, 'string')) {
        $errorMs['location Map']= 'location Map is NOT Characters , Please enter the location Map correctly';
    }
    // End Validate location_map
    
    //Start Validate video
    if (!validateInput($video['name'], 'empty')) {
        $errorMs['video']=' video is Required , Please enter your video';
    }
    // End Validate video

    //Start Validate img 1
    if (!validateInput($img_url['name'], 'empty')) {
        $errorMs['Image 1']=' Image 1 is Required , Please enter your Image 1';
    }
    // End Validate img 1

    //Start Validate img 2
    if (!validateInput($img_url2['name'], 'empty')) {
        $errorMs['Image 2']=' Image 2 is Required , Please enter your Image 2';
    }
    // End Validate img 2

    //Start Validate img 3
    if (!validateInput($img_url3['name'], 'empty')) {
        $errorMs['Image 3']=' Image 3 is Required , Please enter your Image 3';
    }
    // End Validate img 3

    










    

    

    


    if (!empty($errorMs)) {
        
            $_SESSION['ErorrMassegs'] = $errorMs;
            header("Location: tables.php");
        
    } else {
        $final_video     = uploadVideo($video,'../');
        $final_img_url   = uploadImg($img_url,'../');
        $final_img_url2  = uploadImg($img_url2,'../');
        $final_img_url3  = uploadImg($img_url3,'../');
        $floor_plans_img = uploadImg($floor_plans_img,'../');
        if ($final_video && $final_img_url && $final_img_url2 && $final_img_url3) {
            
           


            $owner_id = $_SESSION['User']['id'];

            $sql_location_property ="INSERT INTO `location_property`
            (`country`, `gov`, `city`, `extra_data`, `location_map`) VALUES 
            ('$country','$gov','$city','$extra_data','$location_map')";
            $result = mysqli_query($con, $sql_location_property);
            $last_location_id = mysqli_insert_id($con);

            

            $sql_property_estate ="INSERT INTO `property_estate`
            (`property_name`, `property_desc`, `space`, `price`,`rooms_count`,`grage`,`video`,`type_id`, `location_id`,`owner_id`,`is_accepted`) VALUES 
            ('$property_name','$property_desc','$space','$price',$rooms_count,'$grage','$final_video','$type_id',$last_location_id,'$owner_id',0)";
            $result = mysqli_query($con, $sql_property_estate);

            $lastId_property_estate = mysqli_insert_id($con);
            $sql_property_imgs = "INSERT INTO `property_imgs`(`img_url`, `img_url2`, `img_url3`, `floor_plans_img`, `id_property`) VALUES
            ('$final_img_url', '$final_img_url2' , '$final_img_url3','$floor_plans_img', $lastId_property_estate)";
            $result = mysqli_query($con, $sql_property_imgs);
            

            if ($result){

               
                
                $_SESSION['ErorrMassegs']=['Property Added'];
                header('location: tables.php');
            } else { 
                $_SESSION['ErorrMassegs']=[' Erorr Add Property , Please Check The Erorr Then Try Again'];
                header('location: tables.php');
            }
         
        }
    }
}









?>