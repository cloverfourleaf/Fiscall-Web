

    <?php
    $codModelo = filter_input(INPUT_POST, 'codModelo', FILTER_SANITIZE_NUMBER_INT);
    $nomeModelo = filter_input(INPUT_POST, 'nomeModelo', FILTER_SANITIZE_STRING);
    $anoFabricacao = filter_input(INPUT_POST, 'anoFabricacao', FILTER_SANITIZE_NUMBER_INT);
    $codFabricante = filter_input(INPUT_POST, 'codFabricante', FILTER_SANITIZE_NUMBER_INT);
    $codTipoModelo = filter_input(INPUT_POST, 'codTipoModelo', FILTER_SANITIZE_NUMBER_INT);
    /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $sql = "SELECT * FROM tbmodelo WHERE nomeModelo = '$nomeModelo'";
    $res = mysqli_query($connect, $sql);
    $total = mysqli_num_rows($res);

    if($nomeModelo=="" || $nomeModelo==null || $anoFabricacao=="" || $anoFabricacao==null|| $codFabricante=="" || $codFabricante==null|| $codTipoModelo=="" || $codTipoModelo==null){
                echo"<script language='javascript' type='text/javascript'>swal('Todos os campos devem ser preenchidos!', ' ','error');</script>";
    }else{
        if($anoFabricacao>date('Y')+1){
                echo"<script language='javascript' type='text/javascript'>swal('Insira um ano válido!', ' ','error');</script>";
        }
    else{
            $query = "UPDATE tbmodelo SET nomeModelo='$nomeModelo', anoFabricacao=$anoFabricacao,codFabricante=$codFabricante,codTipoModelo=$codTipoModelo WHERE codModelo=$codModelo";

            $insert = mysqli_query($connect,$query);

                if($insert){
                    echo"<script language='javascript' type='text/javascript'>swal('Modelo alterado com sucesso!', ' ','success').then((value) => 
                    { window.location.href='../../Telas/Visualiza/visualizaModelo.php';});</script>";
                        }else{
                            echo"<script language='javascript' type='text/javascript'>swal('Não foi possível editar esse modelo!', ' ','error');</script>";
                        }
    }
    }
?>
