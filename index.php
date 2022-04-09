<?php
/* Verifica se o utilizador está logado com as credenciais correctas */
if  (isset($logins[$Username]) && $logins[$Username] == $Password) {
    $_SESSION['logged_in'] = true;
    /* Se sim = redireciona para a dashboard */
    header('Location: dashboard.php');
}
else
{   
    /* Se não = redireciona para o login */
    header('Location: login.php');
}
?>