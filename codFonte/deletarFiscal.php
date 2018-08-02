<?php    
    /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $codFiscal = filter_input(INPUT_GET, 'codFiscal', FILTER_SANITIZE_NUMBER_INT);
    $query = "DELETE FROM tbfiscal WHERE codFiscal='$codFiscal'";
    $res = mysqli_query($connect, $query);
    echo"<script language='javascript' type='text/javascript'>window.location.href='../../Telas/Visualiza/VisualizaFiscal.php';</script>";
?>