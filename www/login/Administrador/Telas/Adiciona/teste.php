
<?php
   /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $sql = "SELECT codTipoModelo, descricaoTipoModelo FROM tbtipomodelo ORDER BY descricaoTipoModelo ASC";
    $result = mysqli_query($connect,$sql);

    while ($row = mysqli_fetch_assoc($result) ) {
		$sub_categorias_post[] = array(
			'codTipoModelo'	=> $row['codTipoModelo'],
			'descricaoTipoModelo' => $row['descricaoTipoModelo'],
		);
	}
	
	echo(json_encode($sub_categorias_post));