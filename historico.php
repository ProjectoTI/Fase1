<?php


// Leitura dos ficheiros de texto

$sensores = array("temperatura", "humidade", "velocidade_vento");

foreach ($sensores as $nome) {

    $nomes_sensores[] = $nome;
    $valores_sensores[] = file_get_contents("api/sensores/$nome/valor.txt");
    $datas_sensores[] = file_get_contents("api/sensores/$nome/data.txt");
}

$nome_temperatura = $nomes_sensores[0];
$valor_temperatura = $valores_sensores[0];
$data_temperatura = $datas_sensores[0];

$nome_humidade = $nomes_sensores[1];
$valor_humidade = $valores_sensores[1];
$data_humidade = $datas_sensores[1];

$nome_vento = $nomes_sensores[2];
$valor_vento = $valores_sensores[2];
$data_vento = $datas_sensores[2];
?>












<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTML 5 Boilerplate</title>
    <!-- <link rel="stylesheet" href="style.css"> -->

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/menu.css">
    <link href="css/grid.css" rel="stylesheet">






</head>

<body>

    <!-- Optional JavaScript -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


    <br>
    <div class="container">


        <!-- A página de histórico irá ser deprecada por uma página individual para cada sensor/actuador na Fase 2 -->

        <h2 class="mt-4">Histórico de Actualização</h2>
        <p>Esta página lista o histórico de cada sensor / actuador da estação.</p>


        <div id="colorlib-page">
            <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
            <aside id="colorlib-aside" role="complementary" class="js-fullheight">
                <nav id="colorlib-main-menu" role="navigation">
                    <ul>
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li class="colorlib-active"><a href="historico.php">Histórico</a></li>
                        <li><a href="sobre.php">Sobre</a></li>
                        <li><a href="sair.php">Sair</a></li>
                    </ul>
                </nav>
            </aside>




            </section>

            <nav class="navbar navbar-dark bg-dark">
                <h3> Temperatura </h3>
            </nav>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"><?php
                echo nl2br(file_get_contents("api/sensores/$nome_temperatura/logs.txt"));
                ?></th>



            </table>

            <br>

            <nav class="navbar navbar-dark bg-dark">
                <h3> Humidade </h3>
            </nav>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"><?php
                echo nl2br(file_get_contents("api/sensores/$nome_humidade/logs.txt"));
                ?></th>
            </table>

            <br>


            <nav class="navbar navbar-dark bg-dark">
                <h3> Velocidade do Vento </h3>
            </nav>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"><?php
                echo nl2br(file_get_contents("api/sensores/$nome_vento/logs.txt"));
                ?></th>
            </table>




</body>

</html>