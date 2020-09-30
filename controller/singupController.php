<?php

if (isset($_POST['signup'])) {
    require 'database.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];

    /* comprobacion redundante ya se hizo en HTML
      if (empty($username)||empty($email)||empty($password)||empty($rpassword)){
      header("Location:../signup?error=empty_fields");
      exit();
      } */
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location:../signup?error=invalid_email");
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location:../signup?error=invalid_username");
        exit();
    } else if ($password !== $rpassword) {
        header("Location:../signup?error=diferent_password");
        exit();
    } else {
        $sql = "SELECT username FROM usuarios WHERE username=?";
        $statement = mysqli_stmt_init($conexion);
        if (!mysqli_stmt_prepare($statement, $sql)) {
            header("Location:../signup?error=db_error");
            exit();
        } else {
            mysqli_stmt_bind_param($statement, "s", $username);
            mysqli_stmt_execute($statement);
            mysqli_stmt_store_result($statement);
            $result = mysqli_stmt_num_rows($statement);

            if ($result > 0) {
                header("Location:../signup?error=user_already_exist");
                exit();
            } else {
                $sql = "INSERT INTO usuarios (username, email, password) VALUES (?,?,?)";
                $statement = mysqli_stmt_init($conexion);
                if (!mysqli_stmt_prepare($statement, $sql)) {
                    header("Location:../signup?error=db_error");
                    exit();
                } else {
                    $hashPassword = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($statement, "sss", $username, $email, $hashPassword);
                    mysqli_stmt_execute($statement);
                    mysqli_stmt_store_result($statement);
                    header("Location:../signup?signup=succes");

                    exit();
                }
            }
        }
    }
    $conexion . mysqli_stmt_close($statement);
    mysqli_close($conexion);
} else {
    header("Location:../index?signup=not_allowed");
}    