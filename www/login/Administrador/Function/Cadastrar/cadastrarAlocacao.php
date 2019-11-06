<?php
    //------------------------Conexão------------------------
    
   /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    
    //----------------------Dados---------------------
    
    $linha = $_POST['linhaOnibus'];
    $Onibus  = $_POST['Onibus'];
    $Motorista = $_POST['Motorista'];
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
    //------------------------CodOnibus----------------------
    
    $sql_CodOnibus = "SELECT * FROM tbonibus WHERE placaOnibus = '$Onibus'";
    $res_Onibus = mysqli_query($connect, $sql_CodOnibus);
    $row_Onibus = mysqli_fetch_assoc($res_Onibus);
    $codOnibus = $row_Onibus['codOnibus'];
    
    //------------------------CodLinha----------------------
    
    $sql_CodLinha = "SELECT * FROM tblinha WHERE nomeLinha = '$linha'";
    $res_Linha = mysqli_query($connect, $sql_CodLinha);
    $row_Linha = mysqli_fetch_assoc($res_Linha);
    $codLinha = $row_Linha['codLinha'];

    //------------------------CodFuncionario----------------------
    
    $sql_CodMotorista = "SELECT * FROM tbfuncionario WHERE nomeFuncionario = '$Motorista'";
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

    if($codLinha=="" || $codOnibus==""|| $codFuncionario==""|| $inicioAlocacao==""|| $fimAlocacao==""|| $codLinha==null || $codOnibus==null|| $codFuncionario==null|| $inicioAlocacao==null || $fimAlocacao==null){
            echo"<script language='javascript' type='text/javascript'>swal('Todos os campos devem ser preenchidos!', ' ','error');</script>";  
    }else{
    $query = "INSERT INTO tbalocacao (codFuncionario, codOnibus, codLinha, inicioAlocacao, fimAlocacao,statusAlocacao,codTurno) VALUES ('$codFuncionario', '$codOnibus', '$codLinha', '$inicioAlocacao','$fimAlocacao','Indisponivel','$codTurno')";
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
            echo"<script language='javascript' type='text/javascript'> swal('Este motorista já está alocado!', ' ','error');</script>";
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