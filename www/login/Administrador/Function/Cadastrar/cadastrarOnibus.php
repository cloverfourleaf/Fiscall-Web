<?php
    
    $placaOnibus = $_POST['placaOnibus'];
    $prefixoOnibus = $_POST['prefixoOnibus'];
    $operacao = $_POST['operacao'];
    $codModelo = $_POST['codModelo'];
    $codCooperativa = $_POST['codCooperativa'];

    /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $sql = "SELECT * FROM tbonibus WHERE placaOnibus = '$placaOnibus'";
    $res = mysqli_query($connect, $sql);
    $total_placa = mysqli_num_rows($res);
    
    $sql = "SELECT * FROM tbonibus WHERE prefixoOnibus = '$prefixoOnibus'";
    $res = mysqli_query($connect, $sql);
    $total_prefixo = mysqli_num_rows($res);
    
    if($placaOnibus=="" || $prefixoOnibus==""  || $operacao =="" || $codModelo ==0|| $codCooperativa ==0 || $placaOnibus==null || $prefixoOnibus==null || $operacao==null){
                echo"<script language='javascript' type='text/javascript'>swal('Todos os campos devem ser preenchidos!', ' ','error');</script>";
    }else{
        if($total_placa>0){
            echo"<script language='javascript' type='text/javascript'>swal('Placa já cadastrada!', ' ','error');</script>";
            die();
        }else if($total_prefixo){
            echo"<script language='javascript' type='text/javascript'>swal('Prefixo já cadastrado!', ' ','error');</script>";
            die();
        }else{
            $query = "INSERT INTO tbonibus (placaOnibus, prefixoOnibus, operacao, codModelo, codCooperativa) VALUES ('$placaOnibus', '$prefixoOnibus','$operacao','$codModelo','$codCooperativa')";
            $insert = mysqli_query($connect,$query);
            if($insert){
                echo"<script language='javascript' type='text/javascript'>swal('Ônibus cadastrado com sucesso!', ' ','success').then((value) => 
                { window.location.href='../../Telas/Visualiza/visualizaOnibus.php';});</script>";
            }else{
                echo"<script language='javascript' type='text/javascript'>swal('Cadastro não efetuado!', ' ','error');</script>";
            }
        }
    }
?>
