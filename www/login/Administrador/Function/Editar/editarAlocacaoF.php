<?php
    //------------------------Conexão------------------------
    
    /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    
    //----------------------Dados---------------------
    
    $codAlocacao = filter_input(INPUT_POST, 'codAlocacao', FILTER_SANITIZE_NUMBER_INT);
    $linhaOnibus = filter_input(INPUT_POST, 'linhaOnibus', FILTER_SANITIZE_STRING);
    $Fiscal = filter_input(INPUT_POST, 'Fiscal', FILTER_SANITIZE_STRING);
    $inicioAlocacao = filter_input(INPUT_POST, 'inicioAlocacao', FILTER_SANITIZE_STRING);
    $fimAlocacao = filter_input(INPUT_POST, 'fimAlocacao', FILTER_SANITIZE_STRING);
    $inicioAlocacao = implode("-", array_reverse(explode("/", $inicioAlocacao)));
    $fimAlocacao = implode("-", array_reverse(explode("/", $fimAlocacao)));
    $codTurno = filter_input(INPUT_POST, 'codTurno', FILTER_SANITIZE_NUMBER_INT);
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
    //--------------------------Linha----------------
    $resultL = "SELECT * FROM tblinha WHERE nomeLinha = '$linhaOnibus'";
    $resultadoL = mysqli_query($connect, $resultL);
    $rowL = mysqli_fetch_assoc($resultadoL);
    $codLinha = $rowL['codLinha']; 
    
    
    //--------------------------Funcionario----------------
    $resultF = "SELECT * FROM tbfuncionario WHERE nomeFuncionario = '$Fiscal'";
    $resultadoF = mysqli_query($connect, $resultF);
    $rowF = mysqli_fetch_assoc($resultadoF);
    $codFuncionario = $rowF['codFuncionario'];
    
    
    if($codLinha=="" || $codOnibus==""|| $codFuncionario==""|| $inicioAlocacao==""||$fimAlocacao=="" ||$codTurno==""||$codLinha==null || $codOnibus==null|| $codFuncionario==null|| $inicioAlocacao==null || $fimAlocacao==null|| $codTurno==null){
            echo"<script language='javascript' type='text/javascript'>swal('Todos os campos devem ser preenchidos!', ' ','error');</script>";
    }
    if($status=='Indisponível'){
            echo"<script language='javascript' type='text/javascript'>swal('Fiscal Indisponível', ' ','error');</script>";
    }else{
        $query = "UPDATE tbalocacao SET codFuncionario='$codFuncionario', codLinha='$codLinha', inicioAlocacao='$inicioAlocacao',fimAlocacao='$fimAlocacao',statusAlocacao='$status',codTurno='$codTurno' WHERE codAlocacao='$codAlocacao'";
        $insert = mysqli_query($connect,$query);
        if($insert){
            echo"<script language='javascript' type='text/javascript'>swal('Edição realizada com sucesso!', ' ','success').then((value) => 
            { window.location.href='../../Telas/Visualiza/visualizaAlocacao.php';});</script>";
        }else{
            echo"<script language='javascript' type='text/javascript'>swal('Edição não foi realizada!', ' ','error');</script>";
        }

    }
?>