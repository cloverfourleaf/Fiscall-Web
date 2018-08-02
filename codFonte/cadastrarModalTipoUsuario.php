<script src = '../../../bootstrap/js/alert.js'></script>
<?php
    
    $descricaoNivelUsuario = $_POST['descricaoTipoUsuario'];
    $pagina = $_POST['pagina'];
    
    /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $sql = "SELECT * FROM tbnivelusuario WHERE descricaoNivelUsuario = '$descricaoNivelUsuario'";
    $res = mysqli_query($connect, $sql);
    $total = mysqli_num_rows($res);
    if($pagina=="editaP"){
        if($descricaoNivelUsuario=="" || $descricaoNivelUsuario==null){
                    echo"<script language='javascript' type='text/javascript'>swal('Todos os campos devem ser preenchidos!', ' ','error');</script>";
        }else{
            if($total>0){
                echo"<script language='javascript' type='text/javascript'>swal('Tipo de usuário já cadastrado!', ' ','error');</script>";
              die();
            }else{
                $query = "INSERT INTO tbNivelUsuario (descricaoNivelUsuario) VALUES ('$descricaoNivelUsuario')";
                $insert = mysqli_query($connect,$query);
                if($insert){
                    echo"<script language='javascript' type='text/javascript'>swal('Tipo de usuário cadastrado com sucesso!', ' ','success').then((value) => 
                    { window.location.href='../../Telas/Visualiza/visualizaPerfil.php';});</script>";
                }else{
                    echo"<script language='javascript' type='text/javascript'>swal('Cadastro não efetuado!', ' ','error');</script>";
                }
            }
        }
    }else if($pagina=="edita"){
        if($descricaoNivelUsuario=="" || $descricaoNivelUsuario==null){
            echo"<script language='javascript' type='text/javascript'>swal('Todos os campos devem ser preenchidos!', ' ','error');</script>";
        }else{
            if($total>0){
                echo"<script language='javascript' type='text/javascript'>swal('Tipo de usuário já cadastrado!', ' ','error').then((value) => 
                { window.location.href='../../Telas/Edita/editaFuncionario.php';});</script>";
              die();
            }else{
                $query = "INSERT INTO tbNivelUsuario (descricaoNivelUsuario) VALUES ('$descricaoNivelUsuario')";
                $insert = mysqli_query($connect,$query);
                if($insert){
                    echo"<script language='javascript' type='text/javascript'>swal('Tipo de usuário cadastrado com sucesso!', ' ','success').then((value) => 
                    { window.location.href='../../Telas/Edita/editaFuncionario.php';});</script>";
                }else{
                    echo"<script language='javascript' type='text/javascript'>swal('Cadastrado não efetuado!', ' ','error');</script>";
                }
            }
        }
    }else if($pagina=="adiciona"){
        if($descricaoNivelUsuario=="" || $descricaoNivelUsuario==null){
            echo"<script language='javascript' type='text/javascript'>swal('Todos os campos devem ser preenchidos!', ' ','error');</script>";
        }else{
            if($total>0){
                echo"<script language='javascript' type='text/javascript'>swal('Tipo de usuário já cadastrado!', ' ','error').then((value) => 
                { window.location.href='../../Telas/Adiciona/adicionaFuncionario.php';});</script>";
            die();
            }else{
                $query = "INSERT INTO tbnivelusuario (descricaoNivelUsuario) VALUES ('$descricaoNivelUsuario')";
                $insert = mysqli_query($connect,$query);
                if($insert){
                    echo"<script language='javascript' type='text/javascript'>swal('Tipo de usuário cadastrado com sucesso!', ' ','success').then((value) => 
                    { window.location.href='../../Telas/Adiciona/adicionaFuncionario.php';});</script>";
                }else{
                    echo"<script language='javascript' type='text/javascript'>swal('Cadastro não efetuado!', ' ','error');</script>";
                }
            }
        }
    }
?>

</body>
</html>