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

	$query = $con->prepare('SELECT DISTINCT nomeFuncionario FROM tbfuncionario 
    INNER JOIN tbalocacao 
    ON tbalocacao.codFuncionario = tbfuncionario.codFuncionario  
    INNER JOIN tbturno 
    ON tbturno.codTurno = tbalocacao.codTurno 
    WHERE tbturno.descricaoTurno LIKE "Noite" ');

		$query->execute();

		$out = '[';

		while($result = $query->fetch()){
                        if ($out != '[') {
				$out .= ",";
			}
			$out .= '{"nomeFuncionario": "'.$result["nomeFuncionario"].'"}';
		}
		$out .= "]";
		echo $out;



} catch (Exception $e) {
	echo "Erro: ". $e->getMessage();
};