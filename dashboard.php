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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">




    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/dashboard.css">


    <title>Estação Meteorológica Inteligente</title>
</head>

<body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>


    <br>

    <div id="colorlib-page">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        <aside id="colorlib-aside" role="complementary" class="js-fullheight">
            <nav id="colorlib-main-menu" role="navigation">
                <ul>
                    <li class="colorlib-active"><a href="#">Dashboard</a></li>

                    <li><a href="historico.php">Histórico</a></li>
                    <li><a href="sobre.php">Sobre</a></li>
                    <li><a href="sair.php">Sair</a></li>
                </ul>
            </nav>
        </aside>

        <div id="colorlib-main">
            <section class="ftco-section pt-4 mb-5 ftco-intro">
                <div class="container">
                    <div class="card">
                        <div class="card-body"> <img src="img/estg.png" width="300px" class="float-end"
                                alt="Logotipo do IPLeiria">
                            <h1> Estação Meteorológica Inteligente </h1>
                            <p> Bem-vindo <b> <?php echo $_SESSION['UserData']['Username']; ?> </b> </p>
                            <small> Projecto IoT - Tecnologias de Internet - Engenharia
                                Informática
                            </small>
                        </div>
                    </div>
                </div>

        </div>
    </div>

    <nav class="navbar navbar-dark bg-dark">
        <!-- Navbar content -->
    </nav>




    <br>


    <!--- GRÁFICOS CHART.JS --->
    <!--- NOTA: Os gráficos são apenas para fins demonstrativos e ainda não fazem sincronização com a API, tendo como objectivo implementar essa funcionalidade na Fase 2 --->

    <div class="container text-center" ;>
        <div class="row" ;>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header"><b>Humidade do Ar</b></div>

                    <canvas id="myChart" width="400" height="400"></canvas>
                    <script>
                    const ctx = document.getElementById('myChart').getContext('2d');
                    const myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: [20, 15, 10, -5, 0, 5, 10, 15, 20, 25, 30],
                            datasets: [{
                                    label: 'Humidade Absoluta (g/m³) / Temperatura do Ar (Cº)',
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




                    <div class="card-footer"><b>Atualização: </b><?php echo $data_humidade; ?>
                        <a href="@"></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header"><b>Temperatura Ambiente</b></div>
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

                    <div class="card-footer"><b>Atualização: </b><?php echo $data_temperatura; ?>
                        <a href="@"></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header"><b>Velocidade do Vento</b></div>
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
                    <div class="card-footer"><b>Atualização: </b><?php echo $data_vento; ?>
                        <a href="@"></a>
                    </div>
                </div>
            </div>

            <br>

            <!--- TABELA DE SENSORES / ACTUADORES --->




            <div class="container-xl">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2>Lista de Sensores / Actuadores </h2>
                                </div>

                                <!-- EM CONSTRUÇÃO -- Filtro de estados dos sensores
                                 
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
                              !-->

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
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-status="activo">
                                    <td>1</td>
                                    <td><a href="#">Sensor de Humidade</a></td>
                                    <td><?php echo $data_humidade; ?></td>
                                    <td><span class="label label-success">Activo</span></td>
                                    <td><?php echo $valor_humidade." g/m³"; ?></td>
                                    <td><a href="#">
                                </tr>
                                <tr data-status="activo">
                                    <td>2</td>
                                    <td><a href="#">Sensor de Temperatura</a></td>
                                    <td><?php echo $data_temperatura; ?></td>
                                    <td><span class="label label-warning">Activo</span></td>
                                    <td><?php echo $valor_temperatura." Cº"; ?></td>
                                    <td><a href="#">
                                </tr>
                                <tr data-status="activo">
                                    <td>3</td>
                                    <td><a href="#">Sensor de Vento</a></td>
                                    <td><?php echo $data_vento; ?></td>
                                    <td><span class="label label-success">Activo</span></td>
                                    <td><?php echo $valor_vento; ?></td>
                                    <td><a href="#">
                                </tr>
                                <tr data-status="inactivo">
                                    <td>4</td>
                                    <td><a href="#">Sensor de precipitação</a></td>
                                    <td>06/09/2016</td>
                                    <td><span class="label label-danger">Inactivo</span></td>
                                    <td>Nulo</td>
                                    <td><a href="#">
                                </tr>
                                <tr data-status="inactivo">
                                    <td>5</td>
                                    <td><a href="#">???</a></td>
                                    <td>12/08/2017</td>
                                    <td><span class="label label-warning">Inactivo</span></td>
                                    <td>Nulo</td>
                                    <td><a href="#">
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <br>




</html>