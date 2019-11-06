<?php
    
    $nomeFabricante  = $_POST['nomeFabricante'];
    $cnpjFabricante  = $_POST['cnpjFabricante'];
    $pagina = $_POST['pagina'];

    /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $sql = "SELECT * FROM tbfabricante WHERE cnpjFabricante = '$cnpjFabricante'";
    $res = mysqli_query($connect, $sql);
    $total = mysqli_num_rows($res);

    if($pagina=="adiciona"){
        if($nomeFabricante=="" || $cnpjFabricante=="" || $nomeFabricante==null || $cnpjFabricante==null){
                    echo"<script language='javascript' type='text/javascript'>swal('Todos os campos devem ser preenchidos!', ' ','error');</script>";
        }else{
            if($total>0){
                echo"<script language='javascript' type='text/javascript'>swal('Fabricante já cadastrado!', ' ','error');</script>";
                die();
            }else{
                $query = "INSERT INTO tbfabricante (nomeFabricante, cnpjFabricante) VALUES ('$nomeFabricante', '$cnpjFabricante')";
                $insert = mysqli_query($connect,$query);

                if($insert){
                    echo"<script language='javascript' type='text/javascript'>swal('Fabricante cadastrado com sucesso!', ' ','success').then((value) => 
                    { $('#ModalFabricante').modal('hide');});</script>";
                }else{
                    echo"<script language='javascript' type='text/javascript'>swal('Cadastro não efetuado!', ' ','error');</script>";
                }
            }
        }
    }else if($pagina=="adicionaM"){
        if($nomeFabricante=="" || $cnpjFabricante=="" || $nomeFabricante==null || $cnpjFabricante==null){
                echo"<script language='javascript' type='text/javascript'>swal('Todos os campos devem ser preenchidos!', ' ','error');</script>";
        }else{
            if($total>0){
                echo"<script language='javascript' type='text/javascript'>swal('Fabricante já cadastrado!', ' ','error');</script>";
                die();
            }else{
                $query = "INSERT INTO tbfabricante (nomeFabricante, cnpjFabricante) VALUES ('$nomeFabricante', '$cnpjFabricante')";
                $insert = mysqli_query($connect,$query);

                if($insert){
                    echo"<script language='javascript' type='text/javascript'>swal('Fabricante cadastrado com sucesso!', ' ','success').then((value) => 
                    { $('#ModalFabricante').modal('hide');});
                    
                    </script>";
                }else{
                    echo"<script language='javascript' type='text/javascript'>swal('Cadastro não efetuado!', ' ','error');</script>";
                }
            }
        }
    }else if($pagina=="edita"){
        if($nomeFabricante=="" || $cnpjFabricante=="" || $nomeFabricante==null || $cnpjFabricante==null){
                    echo"<script language='javascript' type='text/javascript'>swal('Todos os campos devem ser preenchidos!', ' ','error');</script>";
        }else{
            if($total>0){
                echo"<script language='javascript' type='text/javascript'>swal('Fabricante já cadastrado!', ' ','error');</script>";
                die();
            }else{
                $query = "INSERT INTO tbfabricante (nomeFabricante, cnpjFabricante) VALUES ('$nomeFabricante', '$cnpjFabricante')";
                $insert = mysqli_query($connect,$query);

                if($insert){
                    echo"<script language='javascript' type='text/javascript'>swal('Fabricante Cadastrado com sucesso!', ' ','success').then((value) => 
                    { window.location.href='../../Telas/Edita/editaOnibus.php';});</script>";
                }else{
                    echo"<script language='javascript' type='text/javascript'>swal('Cadastro não efetuado!', ' ','error');</script>";
                }
            }
        }
    }else if($pagina=="editaM"){
        if($nomeFabricante=="" || $cnpjFabricante=="" || $nomeFabricante==null || $cnpjFabricante==null){
                echo"<script language='javascript' type='text/javascript'>swal('Todos os campos devem ser preenchidos!', ' ','error');</script>";
        }else{
            if($total>0){
                echo"<script language='javascript' type='text/javascript'>swal('Fabricante já cadastrado!', ' ','error');</script>";
                die();
            }else{
                $query = "INSERT INTO tbfabricante (nomeFabricante, cnpjFabricante) VALUES ('$nomeFabricante', '$cnpjFabricante')";
                $insert = mysqli_query($connect,$query);

                if($insert){
                    echo"<script language='javascript' type='text/javascript'>swal('Cadastrado com sucesso!', ' ','success').then((value) => 
                    { window.location.href='../../Telas/Edita/editaModelo.php';});</script>";
                }else{
                    echo"<script language='javascript' type='text/javascript'>swal('Cadastro não efetuado!', ' ','error');</script>";
                }
            }
        }
    }
?>

