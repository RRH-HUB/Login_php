<?php include("includes/header.php") ?>
<?php include("includes/footer.php") ?>

<h1>SignUp</h1>
<form action = "controller/singupController.php" method = "POST">
    <input type = "text" name = "username" placeholder = "Username..." required>
    <input type = "email" name = "email" placeholder = "Email..." required>
    <input type = "password" name = "password" placeholder = "password.."required>
    <input type = "password" name = "rpassword" placeholder = "repeat password.."rerquired>

    <input type = "submit" name = "signup">
</form>

