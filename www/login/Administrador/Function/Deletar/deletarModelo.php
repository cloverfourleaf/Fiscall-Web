<?php    
/*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $codModelo = filter_input(INPUT_GET, 'codModelo', FILTER_SANITIZE_NUMBER_INT);
    $query = "DELETE FROM tbmodelo WHERE codModelo='$codModelo'";
    $insert = mysqli_query($connect, $query);

            echo"<script language='javascript' type='text/javascript'>window.location.href='../../Telas/Visualiza/visualizaModelo.php';</script>";

?>