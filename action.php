<?php
session_start();
require './includes.php';



$errorMs=[];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name          = cleanEr($_POST['full_name']);
    $email         = cleanEr($_POST['email']);
    $password      = cleanEr($_POST['password']);

    $phone         = cleanEr($_POST['phone']);
    $gender        = cleanEr($_POST['gender']);
    $facebook      = cleanEr($_POST['facebook']);
    $twitter       = cleanEr($_POST['twitter']);
    $personal_info = cleanEr($_POST['personal_info']);
    $rols          = cleanEr($_POST['rols']);
    $imgProfile    = $_FILES['img'];

    $country       = cleanEr($_POST['country']);
    $gov           = cleanEr($_POST['gov']);
    $city       = cleanEr($_POST['city']);
    $extra_data    = cleanEr($_POST['extra_data']);


    //Start Validate Name
    if (!validateInput($name, 'empty')) {
        $errorMs['name']=' Name is Required , Please enter your Name';
    } elseif (!validateInput($name, 'string')) {
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

    //Start Validate Password
    if (!validateInput($password, 'empty')) {
        $errorMs['password']=' Password is Required , Please enter your password';
    } elseif (!validateInput($password, 'password')) {
        $errorMs['password']= 'Please enter the password correctly , Enter more than 8 letters and numbers';
    }
    // End Validate Password

    //Start Validate phone
    if (!validateInput($phone, 'empty')) {
        $errorMs['phone']=' phone is Required , Please enter your phone';
    } elseif (!validateInput($phone, 'phone')) {
        $errorMs['phone']= 'Please enter the phone correctly ';
    }
    // End Validate phone
    

    //Start Validate Gender
    if (!validateInput($gender, 'empty')) {
        $errorMs['gender']=' Gender is Required , Please enter your Gender';
    } elseif (!validateInput($gender, 'string')) {
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


    //Start Validate rols
    if (!validateInput($rols, 'empty')) {
        $errorMs['rols']=' rols is Required , Please enter your rols';
    } elseif (!validateInput($rols, 'rols')) {
        $errorMs['rols']= 'Please enter the rols correctly ';
    }
    // End Validate rols


    //Start Validate img Profile
    if (!validateInput($imgProfile['name'], 'empty')) {
        $errorMs['img']=' Image is Required , Please enter your Image Profile';
    }
    // End Validate img Profile

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
            header("Location: register.php");
        
    } else {
        $imgProfile=uploadImg($imgProfile,'');
        if ($imgProfile) {
            $sql_fetch_user = "select * from users where email = '$email'";

            $op = mysqli_query($con, $sql_fetch_user);
            
            if (mysqli_num_rows($op) > 0) {
                $_SESSION['ErorrMassegs']['email']= 'This email is used, change it';
                header("Location: register.php");
               
            }else{
            
            $password = md5($password);
        
            $sql_user ="INSERT INTO `users`(`full_name`, `email`, `password`, `img`, `role`) VALUES 
            ('$name','$email','$password','$imgProfile',$rols)";
            $result = mysqli_query($con, $sql_user);
            $last_id = mysqli_insert_id($con);

            $sql_address ="INSERT INTO `address`(`country`, `gov`, `city`, `extra_data`) VALUES 
            ('$country','$gov','$city','$extra_data')";
            $result = mysqli_query($con, $sql_address);
            $last_address_id = mysqli_insert_id($con);

            $sql_user_details= "INSERT INTO `user_details`(`phone`, `gender`, `personal_info`, `facebook`, `twitter`, `address_id`, `user_id`) VALUES 
            ($phone, '$gender' , '$personal_info' , '$facebook', '$twitter', '$last_address_id' , '$last_id')";
            

            $result = mysqli_query($con, $sql_user_details);
            
            
            if ($result) {
                header('location: login.php');
            } else {
                echo 'Erorr Register';
            }
         }
        }
    }
}









?>