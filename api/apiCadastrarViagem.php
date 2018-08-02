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
    $codAlocacao = $objData['codAlocacao'];
    $codMonitoramento = $objData['codMonitoramento'];
    $dataViagem = $objData['dataViagem'];
    $horarioChegada = $objData['horarioChegada'];
    $horarioPrevisto = $objData['horarioPrevisto'];
    $statusViagem = $objData['statusViagem'];
    // LIMPA OS DADOS
    $codAlocacao = stripslashes($codAlocacao);
    $codMonitoramento = stripslashes($codMonitoramento);
    $dataViagem = stripslashes($dataViagem);
    $horarioChegada = stripslashes($horarioChegada);
    $horarioPrevisto = stripslashes($horarioPrevisto);
    $statusViagem = stripslashes($statusViagem);
    $codAlocacao = trim($codAlocacao);
    $codMonitoramento = trim($codMonitoramento);
    $dataViagem = trim($dataViagem);
    $horarioChegada = trim($horarioChegada);
    $horarioPrevisto = trim($horarioPrevisto);
    $statusViagem = trim($statusViagem);
    $dados; // RECEBE ARRAY PARA RETORNO
    // INSERE OS DADOS

    @$db = new PDO("mysql:host=fdb20.agilityhoster.com;dbname=2753888_bdfiscall", "2753888_bdfiscall", "clover4folhas");
   //VERIFICA SE TEM CONEXÃO
   $query = $db->prepare('SELECT MAX(codGerenciamentoLinha) FROM tbgerenciamentolinha WHERE codAlocacao = "'.$codAlocacao.'" ');
    $query->execute();
    $result = $query->fetch();
    $codGerenciamentoLinha = $result["MAX(codGerenciamentoLinha)"];
    
    if($db){
        if($statusViagem!="Incompleta"){
             $sql = " insert into tbgerenciamentolinha(codMonitoramento,codAlocacao,horarioChegada,horarioPrevisto,statusViagem,horarioSaida,dataViagem)values('".$codMonitoramento."','".$codAlocacao."','".$horarioChegada."','".$horarioPrevisto."','Incompleta','00:00:00','".$dataViagem."')";
        }else{
             $sql = "UPDATE tbgerenciamentolinha SET statusViagem='Completa',horarioSaida='".$horarioChegada."' WHERE codGerenciamentoLinha = '".$codGerenciamentoLinha."'";
        }
        
        $query = $db->prepare($sql);
        $query ->execute();
        if(!$query){
                   $dados = array('mensage' => "Não foi possivel enviar os dados ");
                   echo json_encode($dados);
         }
        else{
                   $dados = array('mensage' => "Os dados foram inseridos com sucesso. Obrigado e bem vindo");
                  
                  echo json_encode($dados);
         };
    }
   else{
          $dados = array('mensage' => "Não foi possivel iserir os dados! Tente novamente mais tarde.");
          echo json_encode($dados);
    };
