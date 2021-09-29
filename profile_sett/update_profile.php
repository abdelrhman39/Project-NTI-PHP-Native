<?php
require '../helpers/config.php';
require '../helpers/helpers.php';

$user_id= $_SESSION['User']['id'];

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $full_name    = $_POST['full_name'];
    $email        = $_POST['email'];
    $phone        = $_POST['phone'];
    $gender       =@ $_POST['gender'];
  
    $personal_info= $_POST['personal_info'];
    $facebook     = $_POST['facebook'];
    $twitter      = $_POST['twitter'];
    $country      = $_POST['country'];
    $gov          = $_POST['gov'];
    $city         = $_POST['city'];
    $extra_data   = $_POST['extra_data'];
    
  
  
     # FILE INFO ... 
     $Img = $_FILES['img'];
    
  
  
  
      $errorMs = [];
  
      //Start Validate Name
      if (!validateInput($full_name, 'empty')) {
        $errorMs['name']=' Name is Required , Please enter your Name';
    } elseif (!validateInput($full_name, 'string')) {
        $errorMs['name']= 'Name is NOT Characters , Please enter the name correctly';
    }
    // End Validate Name
  
    //Start Validate Email
    if (!validateInput($email, 'empty')) {
        $errorMs['email']=' Email is Required , Please enter your Email';
    } elseif (!validateInput($email, 'validateEmail')) {
        $errorMs['email']= 'Email is NOT Valid , Please enter the Email correctly';
    }
    // End Validate Email
  
    //Start Validate phone
    if (!validateInput($phone, 'empty')) {
        $errorMs['phone']=' phone is Required , Please enter your phone';
    } elseif (!validateInput($phone, 'phone')) {
        $errorMs['phone']= 'Please enter the phone correctly ';
    }
    // End Validate phone
    
  
    //Start Validate Gender
    if (!validateInput($gender, 'string')) {
        $errorMs['gender']= 'gender is NOT Characters , Please enter the Gender correctly';
    }
    // End Validate Gender
  
  
    //Start Validate facebook Url
    if (!validateInput($facebook, 'empty')) {
        $errorMs['facebook']=' facebook Url is Required , Please enter your facebook Url';
    } elseif (!validateInput($facebook, 'facebook')) {
        $errorMs['facebook']= 'Please enter the facebook Url correctly ';
    }
    // End Validate facebook Url
  
    //Start Validate twitter Url
    if (!validateInput($twitter, 'empty')) {
        $errorMs['twitter']=' twitter Url is Required , Please enter your twitter Url';
    } elseif (!validateInput($twitter, 'twitter')) {
        $errorMs['twitter']= 'Please enter the twitter Url correctly ';
    }
    // End Validate twitter Url
  
    //Start Validate personal informations
    if (!validateInput($personal_info, 'empty')) {
        $errorMs['personal informations']=' personal informations is Required , Please enter your personal informations';
    } elseif (!validateInput($personal_info, 'string')) {
        $errorMs['personal informations']= 'personal informations is NOT Characters , Please enter the personal informations correctly';
    }
    // End Validate personal informations
  
  
  
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
  
  
  
    
    if (!empty($errorMs)) {
        
        $_SESSION['ErorrMassegs'] = $errorMs;
        header("Location: profile.php");
        
    
} else {

    $del_img ="SELECT users.id, users.img,user_details.address_id,
    address.id FROM `users` JOIN user_details ON user_details.user_id = users.id JOIN 
    address ON user_details.address_id = address.id WHERE users.id = $user_id";
     
    $resqult_del = mysqli_query($con, $del_img);
    while ($fetch = mysqli_fetch_assoc($resqult_del)) {

        $oldImg     = $fetch['img'];
        $address_id = $fetch['address_id'];

    }
    
    

    if(!$Img['size'] > 0){
        $img_del = $oldImg;
    }else{
        unlink($oldImg);
        $img_del   = uploadImg($Img, '../');
    }
  
    
    
        
        $owner_id = $_SESSION['User']['id'];
        
        $sql_location_property = "UPDATE `users` SET 
        `full_name`='$full_name',`email`='$email',
        `img`='$img_del'
         WHERE id =$user_id";
         

        $result = mysqli_query($con, $sql_location_property);

        
        
        

        $update_details = "UPDATE `user_details` SET 
        `phone`='$phone',`gender`='$gender',`personal_info`='$personal_info',
        `facebook`='$facebook',
        `twitter`='$twitter',`address_id`= $address_id
         WHERE user_id=$user_id";

        $result = mysqli_query($con, $update_details);

        
    


        $sql_property_imgs ="UPDATE `address` SET 
        `country`='$country',`gov`='$gov',`city`='$city',
        `extra_data`='$extra_data' WHERE id= $address_id";

        $result = mysqli_query($con, $sql_property_imgs);
        
        

        if ($result) {
            $_SESSION['ErorrMassegs']=['Property Upadated'];
            header('location: profile.php');
        } else {
            $_SESSION['ErorrMassegs']=[' Erorr Update Property , Please Check The Erorr Then Try Again'];
            header('location: profile.php');
        }
    
    
}
}

  
  
?>