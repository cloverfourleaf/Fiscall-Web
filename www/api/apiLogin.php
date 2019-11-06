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

	$query = $con->prepare('SELECT * FROM tbusuario INNER JOIN tbfuncionario ON tbusuario.codUsuario = tbfuncionario.codUsuario INNER JOIN tbalocacao ON tbalocacao.codFuncionario = tbfuncionario.codFuncionario INNER JOIN tblinha ON tbalocacao.codLinha = tblinha.codLinha INNER JOIN tbponto ON tbponto.codLinha = tblinha.codLinha WHERE codNivelUsuario = "3"  ');

		$query->execute();

		$out = '[';

		while($result = $query->fetch()){
                        if ($out != '[') {
				$out .= ",";
			}
			$out .= '{"loginUsuario": "'.$result["loginUsuario"].'",';
                        $out .= '"codFuncionario": "'.$result["codFuncionario"].'",';
                        $out .= '"codPonto": "'.$result["codPonto"].'",';
                        $out .= '"descricaoPonto": "'.$result["descricaoPonto"].'",';
                        $out .= '"numLinha": "'.$result["numLinha"].'",';
                        $out .= '"senhaUsuario": "'.$result["senhaUsuario"].'"}';
		}
		$out .= "]";
		echo $out;



} catch (Exception $e) {
	echo "Erro: ". $e->getMessage();
};
