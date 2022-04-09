  <!--
        
    <br>

    <nav class="navbar navbar-dark bg-dark">
        <!- - Navbar content -->
  </nav>

  <nav class="navbar navbar-dark bg-primary">
      <!- - Navbar content -->
  </nav>

  <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
      <!- - Navbar content -->
  </nav>
  <!--- HEADER --->
  <div class="container">
      <div class="card">
          <div class="card-body"> <img src="estg.png" width="300px" class="float-end" alt="Logotipo do IPLeiria">
              <h1> Servidor IoT </h1>
              <p> Bem vindo <b> UTILIZADOR XPTO </b> </p> <small> Tecnologias de Internet - Engenharia Informática
              </small>

          </div>
      </div>
  </div>
  <br>
  <!--- CARDS --->
  <div class="container text-center" ;>
      <div class="row" ;>
          <div class="col-sm-4">
              <div class="card">
                  <div class="card-header"><b>Luminosidade: 80%</b></div>
                  <div class="card-body"><img src="dia.png" alt="Luz"></div>
                  <div class="card-footer"><b>Atualização:</b><?php echo $hora_temperatura; ?>-
                      <a href="@"></a>
                  </div>
              </div>
          </div>
          <div class="col-sm-4">
              <div class="card">
                  <div class="card-header"><b>Temperatura: <?php echo $valor_temperatura; ?>º</b></div>
                  <div class="card-body"><img src="temperature.png" alt="Temp"></div>
                  <div class="card-footer"><b>Atualização:</b>2022/03/01 14:31 -
                      <a href="@"></a>
                  </div>
              </div>
          </div>
          <div class="col-sm-4">
              <div class="card">
                  <div class="card-header"><b>Porta: Fechada</b></div>
                  <div class="card-body"><img src="door.png" alt="Porta"></div>
                  <div class="card-footer"><b>Atualização:</b>2022/03/01 14:31 -
                      <a href="@"></a>
                  </div>
              </div>
          </div>
          <br>



          <! --- TABELA --->
              <div class="container">
                  <div class="card">
                      <div class="card-header"><b>Tabela de Sensores</b></div>
                      <div class="card-body">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th scope="col">Tipo de Dispositivo IoT</th>
                                      <th scope="col">Valor</th>
                                      <th scope="col">Data de Atualização</th>
                                      <th scope="col">Estado Alertas</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <th scope="row">Sensor de Luz</th>
                                      <td>1000</td>
                                      <td>2021/03/01 14:31</td>
                                      <td><span class="badge rounded-pill bg-success">Ativo</span></td>
                                  </tr>
                                  <tr>
                                      <th scope="row"><?php echo $nome_temperatura; ?></th>
                                      <td><?php echo $valor_temperatura; ?>º</td>
                                      <td><?php echo $hora_temperatura; ?></td>
                                      <td><span class="badge rounded-pill bg-danger">Desativo</span></td>
                                  </tr>
                                  <tr>
                                      <th scope="row">Humidade</th>
                                      <td>85%</td>
                                      <td>2021/03/01 14:31</td>
                                      <td><span class="badge rounded-pill bg-warning text-dark">Warning</span>
                                      </td>
                                  </tr>
                                  <tr>
                                      <th scope="row">Luminosidade</th>
                                      <td>80%</td>
                                      <td>2021/03/01 14:31</td>
                                      <td><span class="badge rounded-pill bg-danger">Muito Forte</span></td>
                                  </tr>
                              </tbody>
                          </table>
                          <div class="" <script
                              src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                              integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                              crossorigin="anonymous">
                              </script>

                              <br>
                              <br>
                              <br>

                              -->













                              <table class="table table-bordered table-dark">
                                  <thead>
                                      <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">First</th>

                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <th scope="row"><?php

                                echo nl2br(file_get_contents("api/sensores/$nomes_sensores[0]/logs.txt")); // get the contents, and echo it out.
                                ?></th>
                                          <td>stuffies</td>

                                      </tr>

                                  </tbody>
                              </table>