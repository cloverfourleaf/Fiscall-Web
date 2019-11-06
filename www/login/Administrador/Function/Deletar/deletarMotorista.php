<?php    
$connect = 
    mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');
    $codMotorista = filter_input(INPUT_GET, 'codMotorista', FILTER_SANITIZE_NUMBER_INT);
	   $result_Motorista = "DELETE FROM tbMotorista WHERE codMotorista='$codMotorista'";
	   $resultado_Motorista = mysqli_query($connect, $result_Motorista);

		echo"<script language='javascript' type='text/javascript'>window.location.href='../../Telas/Visualiza/VisualizaMotorista.php';</script>";


?>