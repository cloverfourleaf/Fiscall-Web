<?php
    
    $descricaoTipoModelo = $_POST['descricaoTipoModelo'];
    $pagina = $_POST['pagina'];
    
    /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $sql = "SELECT * FROM tbtipomodelo WHERE descricaoTipoModelo = '$descricaoTipoModelo'";
    $res = mysqli_query($connect, $sql);
    $total = mysqli_num_rows($res);
    if($pagina=="adiciona"){
        if($descricaoTipoModelo=="" || $descricaoTipoModelo==null){
                    echo"<script language='javascript' type='text/javascript'>swal('Todos os campos devem ser preenchidos!', ' ','error');</script>";
        }else{
            if($total>0){
                echo"<script language='javascript' type='text/javascript'>swal('Tipo de modelo já cadastrado!', ' ','error');</script>";
              die();
            }else{
                $query = "INSERT INTO tbtipomodelo (descricaoTipoModelo) VALUES ('$descricaoTipoModelo')";
                $insert = mysqli_query($connect,$query);
                if($insert){
                    echo"<script language='javascript' type='text/javascript'>swal('Tipo de modelo cadastrado com sucesso!', ' ','success').then((value) => 
                    { window.location.href='../../Telas/Adiciona/adicionaModelo.php';});</script>";
                }else{
                    echo"<script language='javascript' type='text/javascript'>swal('Cadastro não efetuado!', ' ','error');</script>";
                }
            }
        }
    }else if($pagina=="edita"){
        if($descricaoTipoModelo=="" || $descricaoTipoModelo==null){
            echo"<script language='javascript' type='text/javascript'>swal('Todos os campos devem ser preenchidos!', ' ','error');</script>";
        }else{
            if($total>0){
                echo"<script language='javascript' type='text/javascript'>swal('Tipo de usuário já cadastrado!', ' ','error');</script>";
              die();
            }else{
                $query = "INSERT INTO tbtipomodelo (descricaoTipoModelo) VALUES ('$descricaoTipoModelo')";
                $insert = mysqli_query($connect,$query);
                if($insert){
                    echo"<script language='javascript' type='text/javascript'>swal('Tipo de modelo cadastrado com sucesso!', ' ','success').then((value) => 
                    { window.location.href='../../Telas/Edita/editaModelo.php';});</script>";
                }else{
                    echo"<script language='javascript' type='text/javascript'>swal('Edição não efetuada!', ' ','error');</script>";
                }
            }
        }
    }
?>