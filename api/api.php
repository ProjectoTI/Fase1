<?php


header('Content-Type: text/html; charset=utf-8');



// Pedidos POST para enviar dados para API
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "recebido um POST";
    print_r($_POST);

    // Definir caminho com base no nome do sensor
    $nome_sensor = $_POST["nome"];
    
    // Validação dos dados
    if(isset($_POST["nome"])){

        if(isset($_POST["valor"])){

            if(isset($_POST["hora"])){
               
                 // Escrever para os ficheiros correspondentes
                echo file_put_contents("files/$nome_sensor/nome.txt", $_POST["nome"] );
                echo file_put_contents("files/$nome_sensor/valor.txt", $_POST["valor"] );
                echo file_put_contents("files/$nome_sensor/hora.txt", $_POST["hora"] );

                // Escrever para o log do sensor, com linebreak e modo append
                echo file_put_contents("files/$nome_sensor/logs.txt", $_POST["hora"].";".$_POST["valor"].PHP_EOL, FILE_APPEND);

                echo "Valores escritos com sucesso!";

            }
            else
            {
                echo "Erro ao escrever valores";
            }
        }
            
    } 
   

}
// Pedidos GET para receber dados da API
else if ($_SERVER['REQUEST_METHOD'] === 'GET') { 
    echo "recebido um GET";
    print_r($_GET);
    
    if(isset($_GET["nome"])){
        $nome_sensor = $_GET["nome"];
        echo file_get_contents("files/$nome_sensor/valor.txt");

       
    } 
    else
    {
        echo "URL incorrecto!";
        http_response_code(400);

    }
}
else
{

    echo "Método nao permitido";
}