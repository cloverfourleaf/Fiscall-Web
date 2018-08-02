<?php
    $codLinha = filter_input(INPUT_POST, 'codLinha', FILTER_SANITIZE_NUMBER_INT);
    $nomeLinha = filter_input(INPUT_POST, 'nomeLinha', FILTER_SANITIZE_STRING);
    $valorTarifa = filter_input(INPUT_POST, 'valorTarifa', FILTER_SANITIZE_STRING);
    $numLinha = filter_input(INPUT_POST, 'numLinha', FILTER_SANITIZE_STRING);
    $ida = filter_input(INPUT_POST, 'ida', FILTER_SANITIZE_STRING);
    $volta = filter_input(INPUT_POST, 'volta', FILTER_SANITIZE_STRING);
    $horaFuncionamento = filter_input(INPUT_POST, 'horaFuncionamento', FILTER_SANITIZE_STRING);
    $horaTermino = filter_input(INPUT_POST, 'horaTermino', FILTER_SANITIZE_STRING);
    
   /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $sql = "SELECT * FROM tblinha WHERE numLinha = '$numLinha'";
    $res = mysqli_query($connect, $sql);
    $total = mysqli_num_rows($res);

    if($nomeLinha=="" || $numLinha=="" || $ida=="" || $volta=="" ||$nomeLinha==null|| $numLinha==null || $ida==null|| $volta==null ||  $horaFuncionamento=="" ||$horaTermino==null || $horaFuncionamento=="" ||$horaTermino==null){
                echo"<script language='javascript' type='text/javascript'>swal('Todos os campos devem ser preenchidos!', ' ','error');</script>";
    }else{
        $query = "UPDATE tblinha SET nomeLinha='$nomeLinha',numLinha='$numLinha',tarifaLinha='$valorTarifa',horaFuncionamento='$horaFuncionamento',horaTermino='$horaTermino' Where codLinha=$codLinha";
        $insert = mysqli_query($connect,$query);
        
        $query_Ida = "UPDATE tbponto SET descricaoPonto='$ida' Where codLinha='$codLinha' AND codTipoViagem= 1";
        $insert_Ida = mysqli_query($connect,$query_Ida);
        $query_Volta = "UPDATE tbponto SET descricaoPonto='$volta' Where codLinha='$codLinha' AND codTipoViagem= 2";
        
        $insert_Volta = mysqli_query($connect,$query_Volta);
        if($insert){
            echo"<script language='javascript' type='text/javascript'>swal('Linha alterada com sucesso!', ' ','success').then((value) => 
            { window.location.href='../../Telas/Visualiza/visualizaLinha.php';});</script>";
        }else{
        echo"$query";
            echo"<script language='javascript' type='text/javascript'>swal('Não foi possível editar essa linha!', ' ','error');</script>";
        }
    }

    ?>
