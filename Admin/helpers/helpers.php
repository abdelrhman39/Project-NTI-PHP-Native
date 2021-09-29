<?php 


function validate($input,$flag,$length = 6){
$status = true;

 switch ($flag) {
     case 1:
         # code...
         if(empty($input)){
           $status = false;
         }
         break;

    case 2: 
        if(!preg_match('/^[a-zA-Z.-_\s]*$/',$input)){
            $status = false;
        }
       break;

    case 3: 
        # code 
        if(!filter_var($input,FILTER_VALIDATE_EMAIL)){
            $status = false;
        } 
        break; 


    case 4: 
        $allowedExt = ['png','jpg','jpeg'];
        $extArray = explode('/',$input);
        if(!in_array($extArray[1],$allowedExt)){
            $status = false;
        }
      break;

    case 5: 
        if(strlen($input) < $length){
            $status = false;
        }  
        break;


        case 6: 
            # code 
            if(!filter_var($input,FILTER_VALIDATE_INT)){
                $status = false;
            } 
            break;    
            

        case 7: 
            # code 
            if(!preg_match('/^01[0-2,5][0-9]{8}$/',$input)){
                $status = false;
            } 
            break; 
            
        
            
    

   }
  
    return $status;

}





function CleanInputs($input){
  
    $input = trim($input);
    $input = stripcslashes($input);
    $input = htmlspecialchars($input);

     return $input;
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



  function PrintMessages($txt=null,$del_flag = 0){

  if(isset($_SESSION['Message'])){
                        
   foreach($_SESSION['Message'] as $data){
         echo '* '.$data.'<br>';
      }

  if($del_flag == 0){
      unset($_SESSION['Message']);
     }
    }else{
    echo $txt;
     }
  }



   function url($input){

    return "http://".$_SERVER['HTTP_HOST']."/NTI/project_native/Real_Estate/Admin/".$input;

   }


   function FUrl($input){

    return "http://".$_SERVER['HTTP_HOST']."/NTI/project_native/Real_Estate/".$input;

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
         
        if (move_uploaded_file($imgTemp, $path.'../'.$imgPath)) {
            
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
         
        if (move_uploaded_file($videoTemp, '../'.$videoPath)) {
            
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