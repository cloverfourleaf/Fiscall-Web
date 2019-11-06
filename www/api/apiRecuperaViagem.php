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

	$query = $con->prepare('SELECT DISTINCT horarioSaida,descricaoPonto FROM tbgerenciamentolinha INNER JOIN tbmonitoramento ON tbmonitoramento.codMonitoramento = tbgerenciamentolinha.codMonitoramento INNER JOIN tbponto ON tbponto.codPonto = tbmonitoramento.codPonto INNER JOIN tblinha ON tblinha.codLinha = tbponto.codLinha WHERE numLinha="501" ORDER BY horarioSaida DESC');

		$query->execute();

		$out = '[';

		while($result = $query->fetch()){
                        if ($out != '[') {
				$out .= ",";
			}
			$out .= '{"horarioSaida": "'.$result["horarioSaida"].'",';
                        $out .= '"descricaoPonto": "'.$result["descricaoPonto"].'"}';
		}
		$out .= "]";
		echo $out;



} catch (Exception $e) {
	echo "Erro: ". $e->getMessage();
};