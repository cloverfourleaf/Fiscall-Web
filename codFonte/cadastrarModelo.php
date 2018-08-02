<?php
    
    $nomeModelo = $_POST['nomeModelo'];
    $anoFabricacao  = $_POST['anoFabricacao'];
    $codFabricante = $_POST['codFabricante'];
    $codTipoModelo = $_POST['codTipoModelo'];

    /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $sql = "SELECT * FROM tbmodelo WHERE nomeModelo = '$nomeModelo'";
    $res = mysqli_query($connect, $sql);
    $total = mysqli_num_rows($res);
    
    if($nomeModelo=="" || $anoFabricacao==""|| $codFabricante==""|| $codTipoModelo==""|| $nomeModelo==null || $anoFabricacao==null|| $codFabricante==null|| $codTipoModelo==null){
                echo"<script language='javascript' type='text/javascript'>swal('Todos os campos devem ser preenchidos!', ' ','error');</script>";
    
    }else{
        if($anoFabricacao>date('Y')+1){
                echo"<script language='javascript' type='text/javascript'>swal('Insira um ano válido!', ' ','error');</script>";
        }
        else{
            if($total>0){
                echo"<script language='javascript' type='text/javascript'>swal('Modelo já cadastrado!', ' ','error');</script>";
              die();
            }else{
                $query = "INSERT INTO tbmodelo (nomeModelo, anoFabricacao, codFabricante, codTipoModelo) VALUES ('$nomeModelo','$anoFabricacao','$codFabricante','$codTipoModelo')";
                $insert = mysqli_query($connect,$query);
                if($insert){
                    echo"<script language='javascript' type='text/javascript'>swal('Modelo cadastrado com sucesso!', ' ','success').then((value) => 
                    { window.location.href='../../Telas/Visualiza/visualizaModelo.php';});</script>";
                }else{
                    echo $query;
                    echo"<script language='javascript' type='text/javascript'>swal('Cadastro não efetuado!', ' ','error');</script>";
                }
            }
        }
    }
?>