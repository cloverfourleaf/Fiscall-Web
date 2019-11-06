<?php
    
    $nomeLinha = $_POST['nomeLinha'];
    $numLinha = $_POST['numLinha'];
    $valorTarifa = $_POST['valorTarifa'];
    $ida = $_POST['ida'];
    $volta = $_POST['volta'];
    $horaFuncionamento = $_POST['horaFuncionamento'];
    $horaTermino = $_POST['horaTermino'];
    /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $sql = "SELECT * FROM tblinha WHERE numLinha = '$numLinha'";
    $res = mysqli_query($connect, $sql);
    $total = mysqli_num_rows($res);
    $valorTarifa = implode(".",(explode(",", $valorTarifa)));

    
    if($nomeLinha=="" || $numLinha=="" || $ida=="" || $volta=="" || $horaFuncionamento == "" || $horaTermino == "" ||$nomeLinha==null|| $numLinha==null || $ida==null|| $volta==null || $horaFuncionamento == null || $horaTermino == null || $valorTarifa == "" ||$valorTarifa==null){
        ?>
        <script language='javascript' type='text/javascript'>swal('Todos os campos devem ser preenchidos!', ' ','error');</script>
    <?php
    }else{
        if($total>0){
            ?>
            <script language='javascript' type='text/javascript'>swal('Número de linha já cadastrado!', ' ','error');</script>
            <?php
            die();
        }else{
            $query = "INSERT INTO tblinha (nomeLinha, numLinha, tarifaLinha, horaFuncionamento, horaTermino) VALUES ('$nomeLinha', '$numLinha','$valorTarifa','$horaFuncionamento','$horaTermino')";
            $insert = mysqli_query($connect,$query);
            
            if($insert){
                $sql_Linha = "SELECT MAX(codLinha) FROM tblinha WHERE numLinha = '$numLinha'";
                $res_Linha = mysqli_query($connect, $sql_Linha);
                $row_Linha = mysqli_fetch_assoc($res_Linha);
                $codLinha = $row_Linha['MAX(codLinha)'];
                $query_Ida = "INSERT INTO tbponto (descricaoPonto,codLinha,codTipoViagem) VALUES ('$ida', '$codLinha','1')";
                $insert_Ida = mysqli_query($connect,$query_Ida);
            
                $query_Volta = "INSERT INTO tbponto (descricaoPonto,codLinha,codTipoViagem) VALUES ('$volta', '$codLinha','2')";
                $insert_Volta = mysqli_query($connect,$query_Volta);
                ?>
                <script language='javascript' type='text/javascript'>swal('Linha cadastrada com sucesso!', ' ','success').then((value) => 
                { window.location.href='../../Telas/Visualiza/visualizaLinha.php';});</script>
            <?php
            }else{
                ?>
                <script language='javascript' type='text/javascript'>swal('Cadastro não efetuado!', ' ','error');</script>
    <?php
            }
        }
    }
    
?>



