<?php

/* Inicia a sessão */
session_start();


if (isset($_POST['Submit'])) {
    /* Definição dos utilizadores 'estáticos' */
    $logins = array('Admin' => 'Admin', 'username1' => 'password1', 'username2' => 'password2');

    /* Check and assign submitted Username and Password to new variable */
    $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
    $Password = isset($_POST['Password']) ? $_POST['Password'] : '';

    /* Check Username and Password existence in defined array */
    if (isset($logins[$Username]) && $logins[$Username] == $Password) {
        /* Success: Set session variables and redirect to Protected page  */
        $_SESSION['UserData']['Username'] = $logins[$Username];

        header("location:dashboard.php");
        exit;
    } else {
        /*Unsuccessful attempt: Set error message */
        echo "Erro! Credenciais inválidas";
        $msg = "<span style='color:red'>Invalid Login Details</span>";
    }
}
?>










<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>



    <link href="css/login.css" rel="stylesheet">



</head>

<body class="text-center">

    <main class="form-signin">
        <form action="" method="post">
            <img src="img/estg.png" class="img-fluid" alt="Responsive image">
            <h1 class="h3 mb-3 fw-normal">Faça o login!</h1>

            <div class="form-floating">
                <input type="text" name="Username" class="form-control" id="floatingInput" placeholder="username">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" name="Password" class="form-control" id="floatingPassword"
                    placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Lembrar-me
                </label>
            </div>
            <button type="submit" name="Submit" class="button button-block" />Log In</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2021-2022</p>
        </form>
    </main>



</body>

</html>