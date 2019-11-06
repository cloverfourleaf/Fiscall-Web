    <html>
    <head>
        <script src = '../../../bootstrap/js/alert.js'></script>
    </head>
    <body>

    <?php
        /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
        session_start();

        //----------------------Monitoramento-------------------------------//

        $numLinha = $_POST['linhaViagem'];
        $sql_Linha = "SELECT codLinha FROM tblinha WHERE numLinha = '$numLinha'";
        $res_Linha = mysqli_query($connect, $sql_Linha);
        $row_Linha = mysqli_fetch_assoc($res_Linha);
        $total_Linha = mysqli_num_rows($res_Linha);
        $codLinha = $row_Linha['codLinha'];

        $sql_Ponto = "SELECT codPonto FROM tbponto WHERE codLinha = '$codLinha'";
        $res_Ponto = mysqli_query($connect, $sql_Ponto);
        $row_Ponto = mysqli_fetch_assoc($res_Ponto);
        $total_Ponto = mysqli_num_rows($res_Ponto);
        $codPonto = $row_Ponto['codPonto'];
        
        $codFuncionario = $_SESSION['codFuncionario'];
        
        $sql_Monitoramento = "SELECT MAX(codMonitoramento) FROM tbmonitoramento WHERE codPonto='$codPonto' and codFuncionario='$codFuncionario'";
        $res_Monitoramento = mysqli_query($connect, $sql_Monitoramento);
        $row_Monitoramento = mysqli_fetch_assoc($res_Monitoramento);
        $total_Monitoramento = mysqli_num_rows($res_Monitoramento);
        $codMonitoramento = $row_Monitoramento['MAX(codMonitoramento)'];


        //-----------------------OnibusMotorista----------------------------// 

        $prefixoOnibus = filter_input(INPUT_POST, 'prefixoOnibus', FILTER_SANITIZE_STRING);
        $sql_Onibus = "SELECT codOnibus FROM tbonibus WHERE prefixoOnibus ='$prefixoOnibus'";
        $res_Onibus = mysqli_query($connect, $sql_Onibus);
        $row_Onibus = mysqli_fetch_assoc($res_Onibus);
        $total_Onibus = mysqli_num_rows($res_Onibus);
        $codOnibus = $row_Onibus['codOnibus'];

        $codMotorista = $_POST['motoristaViagem'];

        $sql_OnibusMotorista = "SELECT codAlocacao FROM tbalocacao where codOnibus='$codOnibus' and codFuncionario='$codMotorista'";
        $res_OnibusMotorista = mysqli_query($connect, $sql_OnibusMotorista);
        $row_OnibusMotorista = mysqli_fetch_assoc($res_OnibusMotorista);
        $total_OnibusMotorista = mysqli_num_rows($res_OnibusMotorista);

        $codOnibusMotorista = $row_OnibusMotorista['codAlocacao'];


        //----------------------------Turno---------------------------------//

        $descricaoTurno  = $_POST['turnoViagem'];
        $sql_Turno = "SELECT codTurno FROM tbturno WHERE descricaoTurno = '$descricaoTurno'";
        $res_Turno = mysqli_query($connect, $sql_Turno);
        $row_Turno = mysqli_fetch_assoc($res_Turno);
        $total_Turno = mysqli_num_rows($res_Turno);
        $codTurno = $row_Turno['codTurno'];
        
        //---------------------------HoraViagem-----------------------------//

        $chegada = $_POST['chegada'];
        $saida = $_POST['saida'];

        if($numLinha=="" ||  $numLinha==null || $descricaoTurno=="" ||  $descricaoTurno==null || $codMotorista=="" ||  $codMotorista==null || $chegada == "" || $prefixoOnibus==""|| $prefixoOnibus==null || $chegada ==null || $saida=="" || $saida==null){
            echo"<script language='javascript' type='text/javascript'>
                    swal('Todos os campos devem ser preenchidos!', ' ','error').then((value) => { window.location.href='../../Telas/Adiciona/adicionaViagem.php';});
                </script>";
        }else{
            if($total_Linha==0){
                echo"<script language='javascript' type='text/javascript'> swal('Linha não existe!', ' ','error').then((value) => 
                { window.location.href='../../Telas/Adiciona/adicionaViagem.php';});</script>";
                die();

            }else if($total_Monitoramento==0){
                echo"<script language='javascript' type='text/javascript'> swal('Monitoramento não exite!', ' ','error').then((value) => 
                { window.location.href='../../Telas/Adiciona/adicionaViagem.php';});</script>";
                die();

            }else if($total_OnibusMotorista==0){
                echo"<script language='javascript' type='text/javascript'> swal('Motorista não existe!', ' ','error').then((value) => 
                { window.location.href='../../Telas/Adiciona/adicionaViagem.php';});</script>";
                die();

            }else{
                $query = "INSERT INTO tbgerenciamentolinha (codMonitoramento, codAlocacao, chegada, saida, codTurno) VALUES ('$codMonitoramento', '$codOnibusMotorista','$chegada','$saida','$codTurno')";
                $insert = mysqli_query($connect,$query);
                if($insert){
                    echo"<script language='javascript' type='text/javascript'> swal('Boa Viagem!', ' ','success').then((value) => { window.location.href='../../Telas/Visualiza/visualizaViagem.php';});</script>";
                }else{
                    echo"<script language='javascript' type='text/javascript'> 
                            swal('Viagem não Realizada!','','error').then((value=>location.href='../../Telas/Adiciona/adicionaViagem.php';});
                        </script>";

                }
            }
        }
    ?>

</body>
</html>