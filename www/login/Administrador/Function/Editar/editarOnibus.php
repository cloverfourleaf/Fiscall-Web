<html>
<head>
    <script src = '../../../bootstrap/js/alert.js'></script> 
</head>
<body>



<?php
    $codOnibus = filter_input(INPUT_POST, 'codOnibus', FILTER_SANITIZE_NUMBER_INT);
    $placaOnibus = filter_input(INPUT_POST, 'placaOnibus', FILTER_SANITIZE_STRING);
    $prefixoOnibus = filter_input(INPUT_POST, 'prefixoOnibus', FILTER_SANITIZE_STRING);
    $operacao = filter_input(INPUT_POST, 'operacao', FILTER_SANITIZE_STRING);
    $codModelo = filter_input(INPUT_POST, 'codModelo', FILTER_SANITIZE_NUMBER_INT);
    $codFabricante = filter_input(INPUT_POST, 'codFabricante', FILTER_SANITIZE_NUMBER_INT);
    $codCooperativa = filter_input(INPUT_POST, 'codCooperativa', FILTER_SANITIZE_NUMBER_INT);

   /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $sql = "SELECT * FROM tbonibus WHERE codOnibus = '$codOnibus'";
    $res = mysqli_query($connect, $sql);
    $total = mysqli_num_rows($res);
    if($codCooperativa==""){
// if($placaOnibus=="" || $prefixoOnibus==""|| $operacao=="" || $codModelo ==""|| $codCooperativa ==""||$prefixoOnibus==null|| $placaOnibus==null || $operacao==null || $codModelo ==null|| $codCooperativa ==null){
        echo"$codOninbus";
                echo"<script language='javascript' type='text/javascript'>swal('Todos os campos devem ser preenchidos!', ' ','error');</script>";
    }else{
                    $query = "UPDATE tbonibus SET placaOnibus='$placaOnibus',prefixoOnibus='$prefixoOnibus',operacao='$operacao',codModelo='$codModelo',codCooperativa='$codCooperativa' Where codOnibus=$codOnibus";
            
            $insert = mysqli_query($connect,$query);
            
                if($insert){
                echo"<script language='javascript' type='text/javascript'>swal('Ônibus alterado com sucesso!', ' ','success').then((value) => 
                { window.location.href='../../Telas/Visualiza/visualizaOnibus.php';});</script>";
                }else{
                echo"<script language='javascript' type='text/javascript'>swal('Não foi possível editar esse ônibus!', ' ','error');</script>";
                }
        
    }
    ?>
    </body>
</html>