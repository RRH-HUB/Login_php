<?php include("includes/header.php") ?>
<?php include("includes/footer.php") ?>
<div class="card col-md-4"></div>
<h1>Login</h1>
<form class="form-group" action = "controller/loginController.php" method = "POST">
    <input type = "text" name = "username" placeholder = "Username...">
    <input type = "password" name = "password" placeholder = "password..">
    <input class="btn btn-dark btn-lg" type = "submit" name = "login">
</form>
</div>
