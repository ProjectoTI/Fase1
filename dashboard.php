<?php

session_start();

if(!isset($_SESSION['UserData']['Username'])){
        header("location:login.php");
        exit;
}


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







<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="5">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <link rel="stylesheet" href="css/steps.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/menu.css">



    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>


    <script src="js/popper.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>



    <title>Estação Meteorológica Inteligente</title>
</head>

<body>

    <br>

    <div id="colorlib-page">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        <aside id="colorlib-aside" role="complementary" class="js-fullheight">
            <nav id="colorlib-main-menu" role="navigation">
                <ul>
                    <li class="colorlib-active"><a href="#">Dashboard</a></li>

                    <li><a href="historico.php">Histórico</a></li>
                    <li><a href="#">Sobre</a></li>
                    <li><a href="">Sair</a></li>
                </ul>
            </nav>
        </aside> <!-- END COLORLIB-ASIDE -->

        <div id="colorlib-main">
            <section class="ftco-section pt-4 mb-5 ftco-intro">
                <div class="container">
                    <div class="card">
                        <div class="card-body"> <img src="img/estg.png" width="300px" class="float-end"
                                alt="Logotipo do IPLeiria">
                            <h1> Estação Meteorológica Inteligente </h1>
                            <p> Bem vindo UTILIZADOR <b> <?php echo $_SESSION['UserData']['Username']; ?> </b> </p>
                            <small> Tecnologias de Internet - Engenharia
                                Informática
                            </small>
                        </div>
                    </div>
                </div>

        </div>
    </div>
    </section>
    </div>
    </div>

    </section>

    <nav class="navbar navbar-dark bg-dark">
        <!-- Navbar content -->
    </nav>


    <!--- HEADER --->

    <br>
    <!--- CARDS --->
    <div class="container text-center" ;>
        <div class="row" ;>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header"><b><?php echo $nome_humidade.$valor_humidade;?></b></div>

                    <canvas id="myChart" width="400" height="400"></canvas>
                    <script>
                    const ctx = document.getElementById('myChart').getContext('2d');
                    const myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: [20, 15, 10, -5, 0, 5, 10, 15, 20, 25, 30],
                            datasets: [{
                                    label: 'Humidade Absoluta do Ar / Temperatura do Ar',
                                    data: [0.9, 1.4, 2.1, 3.3, 4.9, 6.8, 9.4, 12.9, 17.3, 23.1, 30],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }



                            ]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                    </script>




                    <div class="card-footer"><b>Atualização:</b>2022/03/01 14:31 -
                        <a href="@"></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header"><b><?php echo $nome_temperatura.$valor_temperatura;?></b></div>
                    <canvas id="myChart2" width="400" height="400"></canvas>
                    <script>
                    const ctx2 = document.getElementById('myChart2').getContext('2d');
                    const myChart2 = new Chart(ctx2, {
                        type: 'polarArea',
                        data: {
                            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'],
                            datasets: [{
                                label: '# of Votes',
                                data: [12, 19, 3, 5, 2, 3],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                    </script>

                    <div class="card-footer"><b>Atualização:</b>2022/03/01 14:31 -
                        <a href="@"></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header"><b><?php echo $nome_vento.$valor_vento;?></b></div>
                    <canvas id="myChart3" width="400" height="400"></canvas>
                    <script>
                    const ctx3 = document.getElementById('myChart3').getContext('2d');
                    const myChart3 = new Chart(ctx3, {
                        type: 'radar',
                        data: {
                            labels: ['Brisa Leve', 'Brisa fraca', 'Brisa moderada', 'Brisa forte',
                                'Vento fresco', 'Vento forte', 'ventania', 'ventania forte', 'Tempestade'

                            ],
                            datasets: [{

                                label: 'Velocidade do vento actual',
                                data: [0, 0, 0, 0, 1, 0],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true

                                },

                            },
                            indexAxis: 'y',


                        }
                    });
                    </script>
                </div>
            </div>
            <br>
            <div class="container-xl">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2>Lista de Sensores / Actuadores </h2>
                                </div>
                                <div class="col-sm-6">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-info active">
                                            <input type="radio" name="status" value="all" checked="checked"> All
                                        </label>
                                        <label class="btn btn-success">
                                            <input type="radio" name="status" value="active"> Active
                                        </label>
                                        <label class="btn btn-warning">
                                            <input type="radio" name="status" value="inactive"> Inactive
                                        </label>
                                        <label class="btn btn-danger">
                                            <input type="radio" name="status" value="expired"> Expired
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tipo de Sensor / Atuador</th>
                                    <th>Data de Atualização</th>
                                    <th>Estado Alertas</th>
                                    <th>Valor</th>
                                    <th>Histórico</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-status="active">
                                    <td>1</td>
                                    <td><a href="#">Sensor de Humidade</a></td>
                                    <td><?php echo $data_humidade; ?></td>
                                    <td><span class="label label-success">Activo</span></td>
                                    <td><?php echo $valor_humidade; ?></td>
                                    <td><a href="#" class="btn btn-sm manage">Aceder</a></td>
                                </tr>
                                <tr data-status="active">
                                    <td>2</td>
                                    <td><a href="#">Sensor de Temperatura</a></td>
                                    <td><?php echo $data_temperatura; ?></td>
                                    <td><span class="label label-warning">Activo</span></td>
                                    <td><?php echo $valor_temperatura; ?></td>
                                    <td><a href="#" class="btn btn-sm manage">Aceder</a></td>
                                </tr>
                                <tr data-status="active">
                                    <td>3</td>
                                    <td><a href="#">Sensor de Vento</a></td>
                                    <td><?php echo $data_vento; ?></td>
                                    <td><span class="label label-success">Activo</span></td>
                                    <td><?php echo $valor_vento; ?></td>
                                    <td><a href="#" class="btn btn-sm manage">Aceder</a></td>
                                </tr>
                                <tr data-status="inactive">
                                    <td>4</td>
                                    <td><a href="#">Sensor de precipitação</a></td>
                                    <td>06/09/2016</td>
                                    <td><span class="label label-danger">Inactivo</span></td>
                                    <td>Romania</td>
                                    <td><a href="#" class="btn btn-sm manage">Aceder</a></td>
                                </tr>
                                <tr data-status="inactive">
                                    <td>5</td>
                                    <td><a href="#">???</a></td>
                                    <td>12/08/2017</td>
                                    <td><span class="label label-warning">Inactivo</span></td>
                                    <td>Germany</td>
                                    <td><a href="#" class="btn btn-sm manage">Aceder</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <br>




</html>