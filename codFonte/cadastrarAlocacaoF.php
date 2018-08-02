<?php
    //------------------------Conexão------------------------
    
   /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    
    //----------------------Dados---------------------
    
    $linha = $_POST['linhaOnibus'];
    $Fiscal = $_POST['Fiscal'];
    $inicioAlocacao = $_POST['inicioAlocacao'];
    $inicioAlocacao = implode("-", array_reverse(explode("/",$inicioAlocacao)));
    $fimAlocacao = $_POST['fimAlocacao'];
    $fimAlocacao = implode("-", array_reverse(explode("/", $fimAlocacao)));
    $codTurno = $_POST['codTurno'];
    $data =Date("d/m/Y");       
    $data = explode("/", $data);
    $dia = $data[0];
    $mes = $data[1];
    $ano = $data[2];
    //------------------------CodLinha----------------------
    
    $sql_CodLinha = "SELECT * FROM tblinha WHERE nomeLinha = '$linha'";
    $res_Linha = mysqli_query($connect, $sql_CodLinha);
    $row_Linha = mysqli_fetch_assoc($res_Linha);
    $codLinha = $row_Linha['codLinha'];
    
    //------------------------CodFuncionario----------------------
    
    $sql_CodMotorista = "SELECT * FROM tbfuncionario WHERE nomeFuncionario = '$Fiscal'";
    $res_Motorista = mysqli_query($connect, $sql_CodMotorista);
    $row_Motorista = mysqli_fetch_assoc($res_Motorista);
    $codFuncionario = $row_Motorista['codFuncionario'];
    
    //------------------------DataBanco----------------------
    
    $sql_data = "SELECT MAX(fimAlocacao) FROM tbalocacao WHERE codFuncionario = '$codFuncionario'";
    $res_data = mysqli_query($connect, $sql_data);
    $row_data = mysqli_fetch_assoc($res_data);
    $total = mysqli_num_rows($res_data);
    $dataB = $row_data['MAX(fimAlocacao)'];
    $dataB = explode("-", $dataB);
    $anoB = $dataB[0];
    $mesB = $dataB[1];
    $diaB = $dataB[2];    

    if($codLinha=="" || $codFuncionario==""|| $inicioAlocacao==""|| $fimAlocacao==""|| $codLinha==null || $codFuncionario==null|| $inicioAlocacao==null || $fimAlocacao==null){
            echo"<script language='javascript' type='text/javascript'>swal('Toodos os campos devem ser preenchidos!', ' ','error');</script>";  
    }else{
    $query = "INSERT INTO tbalocacao (codFuncionario, codLinha, inicioAlocacao, fimAlocacao,statusAlocacao,codTurno) VALUES ('$codFuncionario', '$codLinha', '$inicioAlocacao','$fimAlocacao','Indisponivel','$codTurno')";
        if($total>0){
            if($mes>=$mesB && $ano>=$anoB && $dia>=$diaB){
            $insert = mysqli_query($connect,$query);
                if($insert){
                    echo"<script language='javascript' type='text/javascript'>swal('Alocação realizada com sucesso!', ' ','success').then((value) => 
                    { window.location.href='../../Telas/Visualiza/visualizaAlocacao.php';});</script>";
                }else{
                    echo"<script language='javascript' type='text/javascript'>swal('Alocação não foi realizada!', ' ','error');</script>";
                    
                }
            }else{
            echo"<script language='javascript' type='text/javascript'> swal('Este fiscal já está alocado!', ' ','error');</script>";
            die();
            }
            
        }else{
                $insert = mysqli_query($connect,$query);
                if($insert){
                    echo"<script language='javascript' type='text/javascript'>swal('Alocação realizada com sucesso!', ' ','success').then((value) => 
                    { window.location.href='../../Telas/Visualiza/visualizaAlocacao.php';});</script>";
                }else{
                    echo"<script language='javascript' type='text/javascript'>swal('Alocação não foi realizada!', ' ','error');</script>";
                }
        }
    }
?>