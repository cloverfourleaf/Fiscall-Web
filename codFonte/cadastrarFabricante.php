<?php

    $nomeFabricante  = $_POST['nomeFabricante'];
    $cnpjFabricante  = $_POST['cnpjFabricante'];
    /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $sql = "SELECT * FROM tbfabricante WHERE cnpjFabricante = '$cnpjFabricante'";
    $res = mysqli_query($connect, $sql);
    $total = mysqli_num_rows($res);

    if($nomeFabricante=="" || $cnpjFabricante=="" || $nomeFabricante==null || $cnpjFabricante==null){
                echo"<script language='javascript' type='text/javascript'> swal('Todos os campos devem ser preenchidos!', ' ','error');</script>";
    }else{
        if($total>0){
            echo"<script language='javascript' type='text/javascript'> swal('CNPJ já cadastrado!', ' ','error').then((value) => 
            { window.location.href='../../Telas/Adiciona/adicionaFabricante.php';});</script>";
            die();
        }else{
            $query = "INSERT INTO tbfabricante (nomeFabricante, cnpjFabricante) VALUES ('$nomeFabricante', '$cnpjFabricante')";
            $insert = mysqli_query($connect,$query);

                if($insert){
                    echo"<script language='javascript' type='text/javascript'> swal('Fabricante Cadastrado com sucesso!', ' ','success').then((value) => 
                    { window.location.href='../../Telas/Visualiza/visualizaFabricante.php';});
                    </script>";

                }else{
                    echo"<script language='javascript' type='text/javascript'> swal('Cadastro não efetuado!', ' ','error');</script>";
                }
        }
    }
?>