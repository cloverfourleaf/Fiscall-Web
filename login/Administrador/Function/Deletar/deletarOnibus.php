<?php    
$connect = 
    mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');
    $codOnibus = filter_input(INPUT_GET, 'codOnibus', FILTER_SANITIZE_NUMBER_INT);
    $result_Onibus = "DELETE FROM tbonibus WHERE codOnibus='$codOnibus'";
    $resultado_Onibus = mysqli_query($connect, $result_Onibus);
    echo"<script language='javascript' type='text/javascript'>window.location.href='../../Telas/Visualiza/visualizaOnibus.php';</script>";

?>