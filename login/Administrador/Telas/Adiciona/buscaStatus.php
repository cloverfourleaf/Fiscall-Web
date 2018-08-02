<?php 
	$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');

	$nomeFuncionario = $_REQUEST['Motorista'];
	
	$result = "SELECT MAX(statusAlocacao) FROM tbalocacao INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario WHERE nomeFuncionario LIKE '$nomeFuncionario'";
	$resultado = mysqli_query($conn, $result);
	$row = mysqli_fetch_assoc($resultado);
	
		$sub_categorias_post[] = array(
                        'statusAlocacao'=> $row['MAX(statusAlocacao)'],
		);

	echo(json_encode($sub_categorias_post));