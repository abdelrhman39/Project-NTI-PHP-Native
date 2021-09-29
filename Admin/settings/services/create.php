<?php 

require '../../helpers/dbConnection.php';
require '../../helpers/helpers.php';
require '../../helpers/checkLogin.php';


# Fetch Roles ... 
$sql = "select * from rols";
$select_op  = mysqli_query($con,$sql);



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

     
      $sql = "INSERT INTO `services`(`title`, `desc_serv`, `logo`) VALUES ('$title','$desc_serv','$logo')";
      $op  = mysqli_query($con,$sql);

      if($op){
          $message = ["Data Inserted"];
      }else{
          $message = ["Error in sql OP Try Again"];
      }

        $_SESSION['Message'] = $message;


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
                      printMessages('Add Services');
                     ?>

                    </li>
                </ol>



                <form method="post" action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                    enctype="multipart/form-data">



                    <div class="form-group">
                        <label for="Title">Title</label>
                        <input type="text" name="title" class="form-control" id="Title" aria-describedby=""
                            placeholder="Enter Title services " required >
                    </div>


                    <div class="form-group">
                        <label for="Description">Description Services</label>
                        <textarea name="desc_serv" class="form-control" id="Description" rows="3" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="Logo">Logo</label>
                        <p>Choose a logo from this site : <a href="https://fontawesome.com/v5.15/icons?d=gallery&p=2&m=free">Fontawesome.com</a></p>
                        <input type="text" name="logo" class="form-control" id="Logo" placeholder="Enter Logo" required >
                    </div>




                    <button type="submit" class="btn btn-primary">Save</button>
                </form>


            </div>
        </main>




        <?php 
  
  require '../../Layouts/footer.php';

?>