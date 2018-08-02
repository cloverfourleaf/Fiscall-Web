<?php
//ESTA API ESTÁ UTILIZANDO O BENCO DE DADOS AULA COM A TABELA
//USUÁRIOS E UTILIZA ENVIO E RETORNO EM OBJETOS
header("Access-Control-Allow-Origin:*");
//header("Content-Type: application/x-www-form-urlencoded");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    $dados; // RECEBE ARRAY PARA RETORNO
$dns = "mysql:host=fdb20.agilityhoster.com;dbname=2753888_bdfiscall";
$user = "2753888_bdfiscall";
$pass = "clover4folhas";

try {
	$con = new PDO($dns, $user, $pass);
    // INSERE OS DADOS

   //VERIFICA SE TEM CONEXÃO
    if($con){
        $query = $con->prepare('select codPonto,descricaoPonto,numLinha from tbponto INNER JOIN tblinha ON tblinha.codLinha=tbponto.codLinha');
        $query ->execute();
        if(!$query){
                   $dados = array('mensage' => "Não foi possivel enviar os dados ");
                   echo json_encode($dados);
         }
        else{
        $out = '[';

		while($result = $query->fetch()){
                        if ($out != '[') {
				$out .= ",";
			}
			$out .= '{"descricaoPonto": "'.$result["descricaoPonto"].'",';
                        $out .= '"codPonto": "'.$result["codPonto"].'",';
                        $out .= '"numLinha": "'.$result["numLinha"].'"}';
		}
		$out .= "]";
		echo $out;
        //        $dados = array('mensage' => "Deu certo porraaaa!");
          //      echo json_encode($dados);
        };
    }
   else{
          $dados = array('mensage' => "Não foi possivel iserir os dados! Tente novamente mais tarde.");
          echo json_encode($dados);
    }
}catch (Exception $e) {
	echo "Erro: ". $e->getMessage();
};
