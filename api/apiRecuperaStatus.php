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

	$query = $con->prepare('SELECT matriculaFuncionario,nomeFuncionario,statusViagem FROM tbgerenciamentolinha INNER JOIN tbalocacao ON tbalocacao.codAlocacao = tbgerenciamentolinha.codAlocacao INNER JOIN tbfuncionario ON tbalocacao.codFuncionario = tbfuncionario.codFuncionario WHERE statusViagem LIKE "Incompleta" ORDER BY codGerenciamentoLinha DESC');

		$query->execute();

		$out = '[';

		while($result = $query->fetch()){
                        if ($out != '[') {
				$out .= ",";
			}
			$out .= '{"nomeFuncionario": "'.$result["nomeFuncionario"].'",';
                        $out .= '"matriculaFuncionario": "'.$result["matriculaFuncionario"].'",';
                        $out .= '"statusViagem": "'.$result["statusViagem"].'"}';
		}
		$out .= "]";
		echo $out;



} catch (Exception $e) {
	echo "Erro: ". $e->getMessage();
};
