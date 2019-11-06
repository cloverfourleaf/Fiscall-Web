<?php    
/*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $codUsuario = filter_input(INPUT_GET, 'codUsuario', FILTER_SANITIZE_NUMBER_INT);
    $query = "DELETE FROM tbfuncionario WHERE codUsuario='$codUsuario'";
    $queryU = "DELETE FROM tbusuario WHERE codUsuario='$codUsuario'";
    
    $insert = mysqli_query($connect, $query);
    $insertU = mysqli_query($connect, $queryU);
    
if($insertU){
    
            echo"<script language='javascript' type='text/javascript'>window.location.href='../../Telas/Visualiza/visualizaFuncionario.php';</script>";
}
?>