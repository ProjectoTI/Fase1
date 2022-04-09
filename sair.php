<?php
    session_start();    

    // Destroi a sessão actual e redireciona para o login 
    
    unset($_SESSION['UserData']['Username']);
    header('location:login.php');
?>