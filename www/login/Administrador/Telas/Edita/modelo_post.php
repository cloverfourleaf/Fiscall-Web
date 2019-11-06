<?php 
	$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');
	$codFabricante = $_REQUEST['id_fabricante'];
	
	$result = "SELECT * FROM tbmodelo WHERE codFabricante=$codFabricante ORDER BY nomeModelo ASC";
	$resultado = mysqli_query($conn, $result);
	
	while ($row = mysqli_fetch_assoc($resultado) ) {
		$sub_categorias_post[] = array(
			'codModelo'	=> $row['codModelo'],
			'nomeModelo' => $row['nomeModelo'],
		);
	}
	
	echo(json_encode($sub_categorias_post));