<?php    
    /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $codFabricante = filter_input(INPUT_GET, 'codFabricante', FILTER_SANITIZE_NUMBER_INT);
    $query = "DELETE FROM tbfabricante WHERE codFabricante='$codFabricante'";
    $insert = mysqli_query($connect, $query);
    
    echo"<script language='javascript' type='text/javascript'>window.location.href='../../Telas/Visualiza/visualizaFabricante.php';</script>";
?>

?>
