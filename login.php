<?php 
require './includes.php';


if(isset($_SESSION['User'])){
    header("Location: index.php");
}
$ErorrLogin = false;
if($_SERVER['REQUEST_METHOD'] == "POST"){

    # Logic ... 
    $email    = cleanEr($_POST['email']);
    $password = cleanEr($_POST['password']);
   
    # Validate Inputs ... 
    $errors = [];


      if(!validateInput($email,'empty')){
        $errors['Email'] = "Field Required.";
       }elseif(!validateInput($email,'validataEmail')){
           $errors['Email'] = "Invalid Email.";  
       }


       if(!validateInput($password,'empty')){
        $errors['password'] = "Field Required.";
       }elseif(!validateInput($password,'password')){
           $errors['password'] = "Invalid Length Password is less Than 6 Characters And Greater Than 16 Characters .";  
       }


    if(count($errors) > 0){

        foreach($errors as $key => $value)
        {

            $ErorrSMSLogin = '* '.$key.' : '.$value.'<br>';
            $ErorrLogin = true;
        }
    }else{
     
    $password = md5($password);
     $sql = "select * from users where email = '$email' and password = '$password'";

     $op = mysqli_query($con,$sql);
     
     if( mysqli_num_rows($op) == 1){
           # logic .... 
        $data = mysqli_fetch_assoc($op);
       $_SESSION['User'] = $data;
        
        
       header("Location: index.php");

     }else{
         $ErorrSMSLogin = 'Please check your email and password in Login Try Again';
         $ErorrLogin = true;
       }

    }
}

?>


    <section class="bg-dark vh-100">
        <div class="container py-5 col-md-6">

            <div class="card card-registration m-4 registration">
                <div class="container pt-5 pb-5">
                    <?php 
                    if($ErorrLogin){
                        echo '<div class="w-75 mt-4 container alert alert-danger" role="alert">
                            '.$ErorrSMSLogin.'
                              </div>';
                        } 
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="needs-validation text-center" novalidate>
                        <div class="form-row">

                            <div class="col-md-12 mb-3">
                                <label for="validationCustom02">Email</label>
                                <input type="email" name="email" class="form-control" id="validationCustom02" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="Password">Password</label>
                                <input type="password" name="password" class="form-control" id="Password" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck">
                                <label class="form-check-label" for="invalidCheck">
                                  remember me
                                </label>
                            </div>
                        </div>


                        <button class="btn btn-outline-success" type="submit">Log in</button>

                    </form>
                </div>
            </div>
            <div class="container text-center">
                <p class="text-white">If you are not already registered, register here <a href="register.php" class="btn btn-link">Register</a></p>
            </div>

        </div>
        </div>
    </section>




<?php
require  './layouts/footer.php';
?>