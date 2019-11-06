<?php 
	$conn = mysqli_connect("localhost","root","","bdfiscall");

	$nomeMotorista = $_REQUEST['nomeMotorista'];
    $codLinha = $_REQUEST['numLinha'];
    $result_Linha = "SELECT codLinha FROM tblinha WHERE numLinha=$codLinha";
	$resultado_Linha = mysqli_query($conn, $result_Linha);
	$row_Linha = mysqli_fetch_assoc($resultado_Linha);
    $codLinha = $row_Linha['codLinha'];

    $result_Motorista = "SELECT codFuncionario FROM tbfuncionario WHERE nomeFuncionario='$nomeMotorista'";
	$resultado_Motorista = mysqli_query($conn, $result_Motorista);
	$row_Motorista = mysqli_fetch_assoc($resultado_Motorista);
	$codMotorista = $row_Motorista['codFuncionario'];

	$result = "SELECT codOnibus FROM tbalocacao WHERE codOnibus=(SELECT MAX(codOnibus) from tbalocacao where codFuncionario=$codMotorista and codLinha='$codLinha')";
	$resultado = mysqli_query($conn, $result);
    $row = mysqli_fetch_assoc($resultado);
    $codOnibus = $row['codOnibus'];
    
    $sql = "SELECT prefixoOnibus FROM tbonibus WHERE codOnibus=$codOnibus";
    $query = mysqli_query($conn,$sql);
    $element = mysqli_fetch_assoc($query);
    $prefixoOnibus = $element['prefixoOnibus'];
    $sub_categorias_post[] = array(
        'codFuncionario' => $codMotorista,
        'codOnibus' => $prefixoOnibus,
    );
	
	
	echo(json_encode($sub_categorias_post));