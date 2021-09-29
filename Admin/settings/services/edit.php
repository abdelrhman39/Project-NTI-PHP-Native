<?php 

require '../../helpers/dbConnection.php';
require '../../helpers/helpers.php';
require '../../helpers/checkLogin.php';


# Fetch Roles ... 
$sql = "select * from services";
$select_op  = mysqli_query($con,$sql);


# ID & Validate ...  
$_SESSION['del_falg'] = 0;

# GET data ... 

$id = sanitize($_GET['id'],1);

$error = [];
if(!validate($id,6)){
    $error['id'] = "Invalid Integar";
}

if(count($error) > 0){
     $_SESSION['Message'] = $error;
     $_SESSION['del_falg'] = 1;
     header("Location: index.php");
}

# Fetch User Data
$sql = "select * from services where id=".$id;
$op  = mysqli_query($con,$sql);
$data = mysqli_fetch_assoc($op);
  
if(mysqli_num_rows($op) == 0){
    $_SESSION['Message'] = ["No data For this Id"];
    $_SESSION['del_falg'] = 1;
    header("Location: index.php");
}








if($_SERVER['REQUEST_METHOD'] == "POST"){

    $title     = CleanInputs($_POST['title']);
    $desc_serv = CleanInputs($_POST['desc_serv']);
    $logo      = $_POST['logo'];

    $errors = [];

    # Validate ... 
    if(!validate($title,1)){
        $errors['title'] = "title : Requierd Field";
      }elseif(!validate($title,2)){
          $errors['title'] = "title : Invalid String";
        }
  
        if(!validate($desc_serv,1)){
          $errors['Description Services'] = "Description Services : Requierd Field";
        }elseif(!validate($desc_serv,2)){
            $errors['Description Services'] = "Description Services : Invalid String";
      }elseif(!validate($desc_serv,5,50)){
          $errors['Description Services'] = "Description Services : Invalid Length >= 50 Characters";
    }
  
    if(!validate($logo,1)){
      $errors['logo'] = "logo : Requierd Field";
    }



    if(count($errors) > 0){
        $_SESSION['Message'] = $errors;
    }else{

     //$password = md5($password);
     
      $sql = "update services  set title = '$title' ,desc_serv = '$desc_serv',logo = '$logo' where id =".$id;
      $op  = mysqli_query($con,$sql);


      if($op){
          $message = ["Data Updated"];
          $_SESSION['Message'] = $message;
          $_SESSION['del_falg'] = 1;
          header("Location: index.php");
          exit();
      }else{
          $message = ["Error in sql OP Try Again"];
          $_SESSION['Message'] = $message;

      }

  


    }  



}









 require '../../Layouts/header.php';
 require '../../Layouts/topNav.php';
?>

<div id="layoutSidenav">

    <?php 
    require '../../Layouts/sidNav.php';
 ?>




    <div id="layoutSidenav_content">



        <main>
            <div class="container-fluid">

                <h1 class="mt-4">Dashboard </h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">

                        <?php 
                      printMessages('Edit');
                     ?>

                    </li>
                </ol>



                <form method="post" action="edit.php?id=<?php echo $data['id'];?>"
                    enctype="multipart/form-data">



                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" name="title" value="<?php echo $data['title'];?>" class="form-control" id="exampleInputName" aria-describedby=""
                            placeholder="Enter Title">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea name="desc_serv" class="form-control" id="Description" rows="3" required><?php echo $data['desc_serv'];?></textarea>
                    </div>

                


                    <div class="form-group">
                        <label for="logo">logo</label>
                        <p class="fa-2x"><?php echo $data['logo'];?></p>
                        <input type="text" name="logo" value='<?php echo $data['logo'];?>'  class="form-control" id="logo" aria-describedby="emailHelp" placeholder="Enter logo">
                    </div>


                    <button type="submit" class="btn btn-primary">Save</button>
                </form>


            </div>
        </main>




        <?php 
  
  require '../../Layouts/footer.php';

?>