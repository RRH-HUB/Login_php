<?php

if (isset($_POST['login'])) {

    require 'database.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {

        header("Location:../login?login=empty_fields");
        exit();
    } else {
//sql para poder en trar con el correo o el username
        $sql = "SELECT * FROM usuarios WHERE username=? OR email=?;";
        $statement = mysqli_stmt_init($conexion);

        if (!mysqli_stmt_prepare($statement, $sql)) {
            header("Location:../login?login=sql_fail");
            exit();
        } else {
            mysqli_stmt_bind_param($statement, "ss", $username, $username);
            mysqli_stmt_execute($statement);
            $result = mysqli_stmt_get_result($statement);

            if ($fila = mysqli_fetch_assoc($result)) {
                $passwordChecked = password_verify($password, $fila['password']);
                if ($passwordChecked == false) {
                    header("Location:../login?login=wrog_password");
                    exit();
                } else if ($passwordChecked == true) {
                    /*session_start();
                    $_SESSION['id'] = $fila['id'];
                    $_SESSION['username'] = $fila['username'];
                    $_SESSION['acces_granted'] = true;*/

                    header("Location:../lastPage?login=login_succes");
                    exit();
                } else {
                    header("Location:../login?login=wrog_password");
                    exit();
                }
            } else {

                header("Location:../login?login=wrong_user");
                exit();
            }
        }
    }
    $conexion . mysqli_stmt_close($statement);
    mysqli_close($conexion);
} else {
    header("Location:../index?login=not_allowed");
    exit();
}