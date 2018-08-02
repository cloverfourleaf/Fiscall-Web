<?php    
/*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $codCooperativa = filter_input(INPUT_GET, 'codCooperativa', FILTER_SANITIZE_NUMBER_INT);
    $query = "DELETE FROM tbcooperativa WHERE codCooperativa='$codCooperativa'";
    $insert = mysqli_query($connect, $query);

            echo"<script language='javascript' type='text/javascript'>window.location.href='../../Telas/Visualiza/visualizaCooperativa.php';</script>";
?>