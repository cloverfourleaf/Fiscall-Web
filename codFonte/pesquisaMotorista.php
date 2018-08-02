<?php 
	$conn = mysqli_connect("localhost","root","","bdfiscall");

	$codNivelUsuario = $_REQUEST['codNivelUsuario'];
	
	$result = "SELECT * FROM tbNivelUsuario where codNivelUsuario = $codNivelUsuario";
	$resultado = mysqli_query($conn, $result);
	
    $row = mysqli_fetch_assoc($resultado);
    $codNivelUsuario = $row['codNivelUsuario'];

    $sub_categorias_post[] = array(
        'codNivelUsuario' => $codNivelUsuario,
    );
	
	
	echo(json_encode($sub_categorias_post));