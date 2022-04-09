<?php


header('Content-Type: text/html; charset=utf-8');

$metodo = $_SERVER['REQUEST_METHOD'];

// Pedidos POST para enviar dados para API
if ($metodo === 'POST') {
    echo "recebido um POST";
    print_r($_POST);

    // Definir caminho com base no nome do sensor
    $nome_sensor = $_POST["nome"];
    
    // Validação dos dados
    if(isset($_POST["nome"])){

        if(isset($_POST["valor"])){

            if(isset($_POST["data"])){
               
                 // Escrever para os ficheiros correspondentes
                echo file_put_contents("sensores/$nome_sensor/nome.txt", $_POST["nome"] );
                echo file_put_contents("sensores/$nome_sensor/valor.txt", $_POST["valor"] );
                echo file_put_contents("sensores/$nome_sensor/data.txt", $_POST["data"] );

                // Escrever para o log do sensor, com linebreak e modo append
                echo file_put_contents("sensores/$nome_sensor/logs.txt", $_POST["data"]." - ".$_POST["valor"].PHP_EOL, FILE_APPEND);

                echo "Valores escritos com sucesso!";

            }
            else
            {
                echo "Erro ao escrever valores";
            }
        }
            
    } 
   

}
else if ($metodo === 'GET') { 
    //echo "Recebido um GET";

    
  
        print_r($_GET);
   
   
    
    if(isset($_GET["nome"])){
        $nome_sensor = $_GET["nome"];
        echo file_get_contents("sensores/$nome_sensor/valor.txt");

       
    } 
    else
    {
        //echo "URL incorrecto!";
        http_response_code(400);

    }
}
else
{

    echo "Método nao permitido";
}

?>