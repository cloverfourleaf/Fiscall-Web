<?php
    
    $nomeCooperativa  = $_POST['nomeCooperativa'];
    $emailCooperativa  = $_POST['emailCooperativa'];
    $cnpjCooperativa  = $_POST['cnpjCooperativa'];
    $pagina = $_POST['pagina'];

    /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $sql = "SELECT * FROM tbcooperativa WHERE cnpjCooperativa = '$cnpjCooperativa'";
    $res = mysqli_query($connect, $sql);
    $total = mysqli_num_rows($res);

    if($pagina=="adiciona"){
        if($nomeCooperativa=="" || $emailCooperativa=="" || $cnpjCooperativa=="" || $nomeCooperativa==null || $emailCooperativa==null || $cnpjCooperativa==null){
                    echo"<script language='javascript' type='text/javascript'>swal('Todos os campos devem ser preenchidos!', ' ','error').then((value) => 
                    { window.location.href='../../Telas/Adiciona/adicionaOnibus.php';});</script>";
        }else{
            if($total>0){
                echo"<script language='javascript' type='text/javascript'>swal('Cooperativa já cadastrada!', ' ','error');</script>";
                die();
            }else{
                $query = "INSERT INTO tbcooperativa (nomeCooperativa, emailCooperativa, cnpjCooperativa) VALUES ('$nomeCooperativa', '$emailCooperativa', '$cnpjCooperativa')";
                $insert = mysqli_query($connect,$query);
                if($insert){
                    echo"<script language='javascript' type='text/javascript'>swal('Cooperativa cadastrada com sucesso!', ' ','success').then((value) => 
                    { window.location.href='../../Telas/Adiciona/adicionaOnibus.php';});</script>";
                }else{
                    echo"<script language='javascript' type='text/javascript'>swal('Cadastro não efetuado!', ' ','error');</script>";
                }
            }
        }
    }else if($pagina=="edita"){
        if($nomeCooperativa=="" || $emailCooperativa=="" || $cnpjCooperativa=="" || $nomeCooperativa==null || $emailCooperativa==null || $cnpjCooperativa==null){
                    echo"<script language='javascript' type='text/javascript'>swal('Todos os campos devem ser preenchidos!', ' ','error');</script>";
        }else{
            if($total>0){
                echo"<script language='javascript' type='text/javascript'>swal('Cooperativa já cadastrada!', ' ','error');</script>";
                die();
            }else{
                $$query = "INSERT INTO tbcooperativa (nomeCooperativa, emailCooperativa, cnpjCooperativa) VALUES ('$nomeCooperativa', '$emailCooperativa', '$cnpjCooperativa')";
                $insert = mysqli_query($connect,$query);

                if($insert){
                    echo"<script language='javascript' type='text/javascript'>swal('Cooperativa cadastrada com sucesso!', ' ','success').then((value) => 
                    { window.location.href='../../Telas/Edita/editaOnibus.php';});</script>";
                }else{
                    echo"<script language='javascript' type='text/javascript'>swal('Cadastro não efetuado!', ' ','error');</script>";
                }
            }
        }
    }
?>