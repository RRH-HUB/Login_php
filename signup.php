<?php include("includes/header.php") ?>

<div class="row justify-content-md-center">
    <div class="card col-md-8"> 
        <h1>SignUp</h1>
        <form action = "controller/singupController.php" method = "POST">
            <div class="form-group ">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">WhateverNicksname</span>
                    </div>
                    <input  class="form-control" type = "text" name = "username" placeholder = "Username..." required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">whatever@nosense.com/es</span>
                    </div>
                    <input class="form-control" type = "email" name = "email" placeholder = "Email..." required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Pazzguord = Pazzguord</span>
                    </div>      
                    <input class="form-control" type = "password" name = "password" placeholder = "password.."required>
                    <input class="form-control" type = "password" name = "rpassword" placeholder = "repeat password.."rerquired>
                </div>
                <div class="row justify-content-md-center">
                    <input class="btn btn-dark btn-lg"type = "submit" name = "signup">

                </div>
            </div>
        </form>
    </div>
</div>
<?php include("includes/footer.php") ?>