<?php
require './includes.php';


if(isset($_SESSION['User'])){
    header("Location: index.php");
}
?>


    <section class="h-100 bg-dark">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration m-4 registration">


                        <ul class="nav nav-tabs m-auto text-center pt-5" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="Buyer-tab" data-toggle="tab" href="#Buyer" role="tab" aria-controls="Buyer" aria-selected="true">Register as a Buyer</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="Owner-tab" data-toggle="tab" href="#Owner" role="tab" aria-controls="Owner" aria-selected="false">Register as a Owner</a>
                            </li>
                        </ul>

                        <?php if(isset($_GET['errorEmail']))
                        {echo '<div class="container alert alert-danger" role="alert">
                            '.$_GET['errorEmail'].'
                            </div>';} 

                            if (isset($_SESSION['ErorrMassegs'])) {
                                foreach($_SESSION['ErorrMassegs'] as $err){
                                    echo '<div class="w-75 mt-4 container alert alert-danger" role="alert">
                                    '.$err.'
                                    </div>';
                                    
                                }
                                unset($_SESSION['ErorrMassegs']);
                            }
                            ?>

                        <div class="tab-content" id="myTabContent">
                            <div class="container tab-pane fade show active" id="Buyer" role="tabpanel" aria-labelledby="Buyer-tab">


                                <div class="container pt-5 pb-5">
                                    <form action="./action.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom01">Full Name</label>
                                                <input type="text" name="full_name" class="form-control" id="validationCustom01" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom02">Email</label>
                                                <input type="email" name="email" class="form-control" id="validationCustom02" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="Password">Password</label>
                                                <input type="password" name="password" class="form-control" id="Password" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="img">Iamge Profile</label>
                                                <input type="file" name="img" class="form-control" id="img"  required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom03">phone</label>
                                                <input type="text" name="phone" class="form-control"  id="validationCustom03" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid phone.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom04">Gender</label>
                                                <select name="gender" class="custom-select" id="validationCustom04" required>
                                                  <option selected disabled value="">Choose...</option>
                                                  <option value="male">Maile</option>
                                                  <option value="female">Femail</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid Gender.
                                                </div>
                                            </div>


                                            <div class="col-md-6 mb-3 ">
                                                <label for="facebook">URL Facebook</label>
                                                <input type="url" name="facebook" class="form-control" id="facebook" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid URL Facebook.
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3 ">
                                                <label for="twitter">URL Twitter</label>
                                                <input type="url" name="twitter" class="form-control" id="twitter" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid URL Twitter.
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="validationCustom05">Personal Information</label>
                                                <textarea type="text" name="personal_info" class="form-control" id="validationCustom05" rows="3" required></textarea>
                                                <div class="invalid-feedback">
                                                    Please provide a valid Personal Information.
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom04">address</label>
                                                <select name="country" class="custom-select" id="validationCustom04" required>
                                                  <option selected disabled value="">Country...</option>
                                                  <?php
                                                    $sql = "SELECT DISTINCT country FROM `address`";
                                                    $result = mysqli_query($con , $sql);
                                                    while($row = mysqli_fetch_assoc($result)){

                                                        echo '<option value="'.$row['country'].'">'.$row['country'].'</option>';

                                                    }
                                                  ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid Country.
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom04">Governorate</label>
                                                <select name="gov" class="custom-select" id="validationCustom04" required>
                                                  <option selected disabled value="">Governorate...</option>
                                                  <?php
                                                    $sql = "SELECT DISTINCT gov FROM `address`";
                                                    $result = mysqli_query($con , $sql);
                                                    while($row = mysqli_fetch_assoc($result)){

                                                        echo '<option value="'.$row['gov'].'">'.$row['gov'].'</option>';

                                                    }
                                                  ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid Governorate.
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom04">City</label>
                                                <select name="city" class="custom-select" id="validationCustom04" required>
                                                  <option selected disabled value="">City...</option>
                                                  <?php
                                                    $sql = "SELECT DISTINCT city FROM `address`";
                                                    $result = mysqli_query($con , $sql);
                                                    while($row = mysqli_fetch_assoc($result)){

                                                        echo '<option value="'.$row['city'].'">'.$row['city'].'</option>';

                                                    }
                                                  ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid City.
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="extra_data">Extra Data ['Street' ,  village]</label>
                                                <input type="text" name="extra_data" class="form-control" id="extra_data">
                                                <div class="invalid-feedback">
                                                    Please provide a valid Extra Data.
                                                </div>
                                            </div>

                                        </div>




                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                                <label class="form-check-label" for="invalidCheck">
                                                  Agree to terms and conditions
                                                </label>
                                                <div class="invalid-feedback">
                                                    You must agree before submitting.
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="rols" value="2">
                                        <button class="btn btn-outline-success btn-lg" type="submit">Register</button>
                                    </form>
                                </div>



                            </div>

                        <div class="container tab-pane fade" id="Owner" role="tabpanel" aria-labelledby="Owner-tab">

                        <div class="container pt-5 pb-5">
                                    <form action="./action.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom01">Full Name</label>
                                                <input type="text" name="full_name" class="form-control" id="validationCustom01" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom02">Email</label>
                                                <input type="email" name="email" class="form-control" id="validationCustom02" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="Password">Password</label>
                                                <input type="password" name="password" class="form-control" id="Password" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="img">Iamge Profile</label>
                                                <input type="file" name="img" class="form-control" id="img"  required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom03">phone</label>
                                                <input type="number" name="phone" class="form-control"  id="validationCustom03" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid phone.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom04">Gender</label>
                                                <select name="gender" class="custom-select" id="validationCustom04" required>
                                                  <option selected disabled value="">Choose...</option>
                                                  <option value="male">Maile</option>
                                                  <option value="female">Femail</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid Gender.
                                                </div>
                                            </div>


                                            <div class="col-md-6 mb-3 ">
                                                <label for="facebook">URL Facebook</label>
                                                <input type="url" name="facebook" class="form-control" id="facebook" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid URL Facebook.
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3 ">
                                                <label for="twitter">URL Twitter</label>
                                                <input type="url" name="twitter" class="form-control" id="twitter" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid URL Twitter.
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="validationCustom05">Personal Information</label>
                                                <textarea type="text" name="personal_info" class="form-control" id="validationCustom05" rows="3" required></textarea>
                                                <div class="invalid-feedback">
                                                    Please provide a valid Personal Information.
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom04">address</label>
                                                <select name="country" class="custom-select" id="validationCustom04" required>
                                                  <option selected disabled value="">Country...</option>
                                                  <?php
                                                    $sql = "SELECT DISTINCT country FROM `address`";
                                                    $result = mysqli_query($con , $sql);
                                                    while($row = mysqli_fetch_assoc($result)){

                                                        echo '<option value="'.$row['country'].'">'.$row['country'].'</option>';

                                                    }
                                                  ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid Country.
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom04">Governorate</label>
                                                <select name="gov" class="custom-select" id="validationCustom04" required>
                                                  <option selected disabled value="">Governorate...</option>
                                                  <?php
                                                    $sql = "SELECT DISTINCT gov FROM `address`";
                                                    $result = mysqli_query($con , $sql);
                                                    while($row = mysqli_fetch_assoc($result)){

                                                        echo '<option value="'.$row['gov'].'">'.$row['gov'].'</option>';

                                                    }
                                                  ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid Governorate.
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom04">City</label>
                                                <select name="city" class="custom-select" id="validationCustom04" required>
                                                  <option selected disabled value="">City...</option>
                                                  <?php
                                                    $sql = "SELECT DISTINCT city FROM `address`";
                                                    $result = mysqli_query($con , $sql);
                                                    while($row = mysqli_fetch_assoc($result)){

                                                        echo '<option value="'.$row['city'].'">'.$row['city'].'</option>';

                                                    }
                                                  ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid City.
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="extra_data">Extra Data ['Street' ,  village]</label>
                                                <input type="text" name="extra_data" class="form-control" id="extra_data">
                                                <div class="invalid-feedback">
                                                    Please provide a valid Extra Data.
                                                </div>
                                            </div>

                                        </div>




                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                                <label class="form-check-label" for="invalidCheck">
                                                  Agree to terms and conditions
                                                </label>
                                                <div class="invalid-feedback">
                                                    You must agree before submitting.
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="rols" value="3">
                                        <button class="btn btn-outline-success btn-lg" type="submit">Register</button>
                                    
                                    </form>
                                </div>
                        </div>
                        <div class="container text-center">
                            <p>If you are already registered, log in from here <a href="login.php" class="btn btn-link">Log in</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>



<?php
require './layouts/footer.php';
?>