<?php 
	$conn = mysqli_connect("localhost","root","","bdfiscall");
    session_start();
	$codMotorista = $_REQUEST['codMotorista'];
	$codLinha = $_REQUEST['numLinha'];
    
    $result_Linha = "SELECT codLinha FROM tblinha WHERE numLinha=$codLinha";
	$resultado_Linha = mysqli_query($conn, $result_Linha);
	$row_Linha = mysqli_fetch_assoc($resultado_Linha);
    $codLinha = $row_Linha['codLinha'];
    
  /*
    $result_Linha = "SELECT codLinha FROM tbponto WHERE codPonto=$codPonto";
	$resultado_Linha = mysqli_query($conn, $result_Linha);
	$row_Linha = mysqli_fetch_assoc($resultado_Linha);
    $codLinha = $row_Linha['codLinha'];
	*/
    $result = "SELECT codOnibus FROM tbalocacao WHERE codOnibus=(SELECT MAX(codOnibus) from tbalocacao where codFuncionario=$codMotorista AND codLinha=$codLinha)";
	$resultado = mysqli_query($conn, $result);
    $result_Motorista = "SELECT nomeFuncionario FROM tbfuncionario WHERE codFuncionario=$codMotorista";
	$resultado_Motorista = mysqli_query($conn, $result_Motorista);
	$row_Motorista = mysqli_fetch_assoc($resultado_Motorista);
    
    $row = mysqli_fetch_assoc($resultado);
    $codOnibus = $row['codOnibus'];
    $nome_Motorista = $row_Motorista['nomeFuncionario'];
    $sql = "SELECT prefixoOnibus FROM tbonibus WHERE codOnibus=$codOnibus";
    $query = mysqli_query($conn,$sql);
    $element = mysqli_fetch_assoc($query);
    $prefixoOnibus = $element['prefixoOnibus'];
    $sub_categorias_post[] = array(
        'nomeFuncionario' => $nome_Motorista,
        'codOnibus' => $prefixoOnibus,
    );
	
	
	echo(json_encode($sub_categorias_post));