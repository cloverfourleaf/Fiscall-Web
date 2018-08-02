<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');


$dns = "mysql:host=fdb20.agilityhoster.com;dbname=2753888_bdfiscall";
$user = "2753888_bdfiscall";
$pass = "clover4folhas";

try {
	$con = new PDO($dns, $user, $pass);

	if(!$con){
		echo "Não foi possivel conectar com Banco de Dados!";
	}

	$query = $con->prepare('SELECT numLinha,tarifaLinha,horaFuncionamento,horaTermino,descricaoPonto from tblinha INNER JOIN tbponto on tbponto.codLinha = tblinha.codLinha');

		$query->execute();

		$out = '[';

		while($result = $query->fetch()){
                        if ($out != '[') {
				$out .= ",";
			}
			$out .= '{"numLinha": "'.$result["numLinha"].'",';
                        $out .= '"tarifaLinha": "'.$result["tarifaLinha"].'",';
                        $out .= '"horaFuncionamento": "'.$result["horaFuncionamento"].'",';
                        $out .= '"descricaoPonto": "'.$result["descricaoPonto"].'",';
			$out .= '"horaTermino": "'.$result["horaTermino"].'"}';
		}
		$out .= "]";
		echo $out;



} catch (Exception $e) {
	echo "Erro: ". $e->getMessage();
};
