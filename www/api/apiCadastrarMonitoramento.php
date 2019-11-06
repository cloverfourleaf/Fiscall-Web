<?php
//ESTA API ESTÁ UTILIZANDO O BENCO DE DADOS AULA COM A TABELA
//USUÁRIOS E UTILIZA ENVIO E RETORNO EM OBJETOS
/*header("Access-Control-Allow-Origin:http://127.0.0.1:8100");
header("Access-Control-Allow-Headers: Content-Type");
header ("Access-Control-Allow-Methods", "POST, GET, OPTIONS, PUT");
*/
header("Access-Control-Allow-Origin:*");
header("Content-Type: application/x-www-form-urlencoded");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    //RECUPERAÇÃO DO FORMULÁRIO
    $data = file_get_contents("php://input");
    $objData = json_decode($data, true);
    // TRANSFORMA OS DADOS
    $dataMonitoramento = $objData['dataMonitoramento'];
    $codPonto = $objData['codPonto'];
    $codFuncionario = $objData['codFuncionario'];
    // LIMPA OS DADOS
    $dataMonitoramento = stripslashes($dataMonitoramento);
    $codPonto = stripslashes($codPonto);
    $codFuncionario = stripslashes($codFuncionario);
    $dataMonitoramento = trim($dataMonitoramento);
    $codPonto = trim($codPonto);
    $codFuncionario = trim($codFuncionario);
    $dados; // RECEBE ARRAY PARA RETORNO
    // INSERE OS DADOS

    @$db = new PDO("mysql:host=fdb20.agilityhoster.com;dbname=2753888_bdfiscall", "2753888_bdfiscall", "clover4folhas");
   //VERIFICA SE TEM CONEXÃO
    if($db){
        $sql = " insert into tbmonitoramento(codPonto,codFuncionario,dataMonitoramento)values('".$codPonto."','".$codFuncionario."','".$dataMonitoramento."')";
        $query = $db->prepare($sql);
        $query ->execute();
        if(!$query){
                   $dados = array('mensage' => "Não foi possivel enviar os dados ");
                   echo json_encode($dados);
         }
        else{
                   $dados = array('mensage' => "Os dados foram inseridos com sucesso. Obrigado e bem vindo ");
                  
                  echo json_encode($dados);
         };
    }
   else{
          $dados = array('mensage' => "Não foi possivel iserir os dados! Tente novamente mais tarde.");
          echo json_encode($dados);
    };
