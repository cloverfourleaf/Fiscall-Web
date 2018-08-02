<?php    
$connect = 
    mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');
    $codLinha = filter_input(INPUT_GET, 'codLinha', FILTER_SANITIZE_NUMBER_INT);

       $result_Linha = "DELETE FROM tblinha WHERE codLinha='$codLinha'";
       $result_Ponto = "DELETE FROM tbponto WHERE codLinha='$codLinha'";

	   $resultado_Linha = mysqli_query($connect, $result_Linha);
	   $resultado_Ponto = mysqli_query($connect, $result_Ponto);
       		
		echo"<script language='javascript' type='text/javascript'>window.location.href='../../Telas/Visualiza/visualizaLinha.php';</script>";
?>