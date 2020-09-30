<?php include("includes/header.php") ?>
<?php include("includes/footer.php") ?>
<h1>Login</h1>
<form action = "controller/loginController.php" method = "POST">
    <input type = "text" name = "username" placeholder = "Username...">
    <input type = "password" name = "password" placeholder = "password..">
    <input type = "submit" name = "login">
</form>

