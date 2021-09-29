<?php


function url($input){

    return "http://".$_SERVER['HTTP_HOST']."/NTI/project_native/Real_Estate/".$input;

   }
   
function cleanEr($input)
{
    $input = trim($input);
    $input = htmlspecialchars($input);
    $input = stripslashes($input);

    return $input;
}
function validateInput($input,$flag){
    $status = true;
    
     switch ($flag) {
        case 'empty':
             if(empty($input)){
               $status = false;
             }
             break;
    
        case 'string': 
            if(filter_var($input, FILTER_VALIDATE_INT)){
                $status = false;
            }
           break;
        case 'number': 
            if(!filter_var($input, FILTER_VALIDATE_INT)){
                $status = false;
            }
           break;
    
        case 'validataEmail': 
            if(!preg_match('/^(?=.{1,64}@.{4,64}$)(?=.{6,100}$).*/',$input)){
                $status = false;
            } 
            break; 
    
    
        case 'password': 
            if(!preg_match('/^[0-9A-Za-z!@#$%]{6,15}$/',$input)){
                $status = false;
            }
            break;

        case 'phone': 
            if(!preg_match('/^01[0-2,5][0-9]{8}$/',$input)){
                $status = false;
            }
            break;

            case 'facebook': 
                if(!preg_match("/(?:http:\/\/)?(?:www.)?facebook.com\/(?:(?:\w)*#!\/)?(?:pages\/)?(?:[?\w\-]*\/)?(?:profile.php\?id=(\d.*))?([\w\-]*)?/",$input)){
                    $status = false;
                }
                break;
            case 'twitter': 
                if(!preg_match("/(?:http:\/\/)?(?:www.)?twitter.com\/(?:(?:\w)*#!\/)?(?:pages\/)?(?:[?\w\-]*\/)?(?:profile.php\?id=(\d.*))?([\w\-]*)?/",$input)){
                    $status = false;
                    }
                break;
                
            case 'rols': 
                if(!preg_match('/[1-3]{1}/',$input)){
                    $status = false;
                }
                break;
       }
        return $status;
    }





    function sanitize($input,$flag){
    
        switch ($flag) {
            case 1:
                # code...
                $input = filter_var($input,FILTER_SANITIZE_NUMBER_INT);     
                break;
            
        }
    
        return $input;
    }
    


function uploadImg($img,$path=''){
    
        $imge_profile = $img;
        $imgName     = $imge_profile['name'];
        $imgTemp      = $imge_profile['tmp_name'];
        $imgType      = $imge_profile['type'];
        
        $Ext = ['png','jpg','jpeg'];
        $extarctArr = explode('/', $imgType);
     
        if (in_array($extarctArr[1], $Ext)) {
            $finalPath =   rand().time().'.'.$Ext[1];
            $imgPath = 'uploads/'.$finalPath;
             
            if (move_uploaded_file($imgTemp, $path.$imgPath)) {
                
                return  $imgPath;
                
            } else {
                echo 'Error In Uploading Try Again';
            }
        }else{
            echo '<div class="alert alert-danger" role="alert">This is not a picture, please patch a picture</div>';
            sleep(4);
            header('location:index.php');
        }

    }

    function uploadVideo($video,$path){
    
        $video_profile = $video;
        $videoName      = $video_profile['name'];
        $videoTemp      = $video_profile['tmp_name'];
        $videoType      = $video_profile['type'];
        $videoSize      = $video_profile['size'];

        $maxsize = 5242880; // 5MB
        if(($videoSize >= $maxsize) || ($videoSize == 0)) {
            echo $errorMs['Max Size video'] = "File too large. File must be less than 5MB.";
        }
        $Ext = ['mp4','ogg','wmv','webm','hdv','3GP',"avi","3gp","mov","mpeg"];
        $extarctArr = explode('/', $videoType);
     
        if (in_array($extarctArr[1], $Ext)) {
            $finalPath =   rand().time().'.'.$Ext[1];
            $videoPath = $path.'uploads/'.$finalPath;
             
            if (move_uploaded_file($videoTemp, $videoPath)) {
                
                return  $videoPath;
                
            } else {
                echo 'Error In Uploading Try Again';
            }
        }else{
            echo '<div class="alert alert-danger" role="alert">This is not a picture, please patch a picture</div>';
            sleep(4);
            header('location:index.php');
        }

    }

    




    

?>