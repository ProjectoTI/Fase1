<?php


// Leitura dos ficheiros de texto

$sensores = array("temperatura", "humidade", "velocidade_vento");

foreach ($sensores as $nome) {

    $nomes_sensores[] = $nome;
    $valores_sensores[] = file_get_contents("src/api/sensores/$nome/valor.txt");
    $datas_sensores[] = file_get_contents("src/api/sensores/$nome/data.txt");
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
    <title>Sobre</title>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <link rel="stylesheet" href="src/css/sidebar.css">


    <!-- Optional JavaScript -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</head>



<body>

    <main>



        <!--- SIDEBAR VERTICAL --->


        <div id="menu-page">
            <a href="#" class="js-menu-nav-toggle menu-nav-toggle"><i></i></a>
            <aside id="menu-aside" role="complementary" class="js-fullheight">
                <nav id="menu-main-menu" role="navigation">
                    <ul>
                        <li><a href="dashboard.php">Dashboard</a></li>

                        <li><a href="historico.php">Histórico</a></li>
                        <li class="menu-active"><a href="sobre.php">Sobre</a></li>
                        <li><a href="sair.php">Sair</a></li>
                    </ul>
                </nav>
            </aside>


        </div>




        <!--- SOBRE --->

        <div class="container">



            <h2 class="mt-4">Trabalho realizado por</h2>
            <br>




            <div class="container">
                <br />

                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">

                            </div>
                            <div class="panel-body text-center">
                                <p class="lead">
                                    <strong>João Pedrosa</strong>
                                </p>
                            </div>
                            <ul class="list-group list-group-flush">

                                <li class="list-group-item liitem"><strong>Nº Aluno:</strong>
                                    <span class="pull-right">2201706</span>
                                </li>

                            </ul>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-xs-4 col-sm-3 col-md-4 col-lg-2"></div>
                                    <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4" id="qr1"></div>
                                    <div class="col-xs-6 col-sm-5 col-md-4 col-lg-6"></div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>


                <br>

                <br>

                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">

                            </div>
                            <div class="panel-body text-center">
                                <p class="lead">
                                    <strong>Tomás</strong>
                                </p>
                            </div>
                            <ul class="list-group list-group-flush">

                                <li class="list-group-item liitem"><strong>Nº Aluno:</strong>
                                    <span class="pull-right">2211082
                                    </span>
                                </li>
                            </ul>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-xs-4 col-sm-3 col-md-4 col-lg-2"></div>
                                    <div class="col-xs-2 col-sm-4 col-md-4 col-lg-4" id="qr1"></div>
                                    <div class="col-xs-6 col-sm-5 col-md-4 col-lg-6"></div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        </div>

    </main>




</body>

</html>