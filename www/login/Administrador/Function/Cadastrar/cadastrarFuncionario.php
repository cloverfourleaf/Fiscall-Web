<html>
    <head>

    </head>
    <body>
        <?php
            /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
            
            $nomeFuncionario  = $_POST['nomeFuncionario'];
            $rgFuncionario  = $_POST['rgFuncionario'];
            $emailFuncionario  = $_POST['emailFuncionario'];
            $cpfFuncionario  = $_POST['cpfFuncionario'];
            $loginFuncionario  = $_POST['loginFuncionario'];
            $loginFuncionario = strtolower($loginFuncionario);
            $senhaFuncionario  = $_POST['senhaFuncionario'];
            $confirmaSenha  = $_POST['confirmaSenha'];
            $cnhFuncionario = $_POST['cnhFuncionario'];
            $codNivelUsuario = $_POST['codNivelUsuario'];
            
            do{
            $matriculaFuncionario  = mt_rand();
            $sql_mat = "SELECT matriculaFuncionario FROM tbfuncionario WHERE matriculaFuncionario = '$matriculaFuncionario'";
            $res_mat = mysqli_query($connect, $sql_mat);
            $total_mat = mysqli_num_rows($res_mat);
            }while($total_mat>0);
            
            $sql_login = "SELECT * FROM tbusuario WHERE loginUsuario = '$loginFuncionario'";
            $res_login = mysqli_query($connect, $sql_login);
            $total_login = mysqli_num_rows($res_login);
            
            $sql_rg = "SELECT * FROM tbfuncionario WHERE rgFuncionario = '$rgFuncionario'";
            $res_rg = mysqli_query($connect, $sql_rg);
            $total_rg = mysqli_num_rows($res_rg);
            
            $sql_email = "SELECT * FROM tbfuncionario WHERE emailFuncionario = '$emailFuncionario'";
            $res_email = mysqli_query($connect, $sql_email);
            $total_email = mysqli_num_rows($res_email);
            
            $sql_cpf = "SELECT * FROM tbfuncionario WHERE cpfFuncionario = '$cpfFuncionario'";
            $res_cpf = mysqli_query($connect, $sql_cpf);
            $total_cpf = mysqli_num_rows($res_cpf);

            if($nomeFuncionario=="" || $loginFuncionario=="" ||$senhaFuncionario=="" || $confirmaSenha=="" ||$codNivelUsuario=="" || $nomeFuncionario==null || $loginFuncionario==null || $senhaFuncionario==null || $confirmaSenha==null || $codNivelUsuario==null){
                echo"<script language='javascript' type='text/javascript'>swal('Todos os campos devem ser preenchidos!', ' ','error');</script>";

            }else{
                if($senhaFuncionario != $confirmaSenha){
                        echo"<script language='javascript' type='text/javascript'>swal('As senhas devem ser iguais!', ' ','warning');</script>";
                }else{
                    if($total_login>0 ){
                        echo"<script language='javascript' type='text/javascript'>swal('Login já cadastrado!', ' ','error');</script>";
                        die();
                    }else if($total_rg>0){
                        echo"<script language='javascript' type='text/javascript'>swal('RG já cadastrado!', ' ','error');</script>";
                    }else if($total_email>0){
                        echo"<script language='javascript' type='text/javascript'>swal('Email já cadastrado!', ' ','error');</script>";
                    }else if($total_cpf>0){
                        echo"<script language='javascript' type='text/javascript'>swal('CPF já cadastrado!', ' ','error');</script>";
                    }else{
                        if(strlen($cpfFuncionario)<14){
                            echo"<script language='javascript' type='text/javascript'>swal('CPF inválido!', ' ','error');</script>";
                        }else{
                            $query = "INSERT INTO tbusuario ( loginUsuario, senhaUsuario, codNivelUsuario) VALUES ('$loginFuncionario', '$senhaFuncionario', '$codNivelUsuario')";
                            $insert = mysqli_query($connect,$query);

                            if($insert){
                                $slq_codUsuario = "SELECT codUsuario from tbusuario where loginUsuario='$loginFuncionario'";
                                $res_codUsuario = mysqli_query($connect,$slq_codUsuario);
                                $element = mysqli_fetch_array($res_codUsuario);
                                $codUsuario =  $element['codUsuario'];
                                if($cnhFuncionario==null){    
                                                            $query = "INSERT INTO tbfuncionario (matriculaFuncionario, nomeFuncionario, rgFuncionario, emailFuncionario,cpfFuncionario,codUsuario,dataCadastroFuncionario) VALUES ('$matriculaFuncionario','$nomeFuncionario', '$rgFuncionario', '$emailFuncionario', '$cpfFuncionario','$codUsuario',CURDATE())";
                                }else{
                                    $query = "INSERT INTO tbfuncionario (matriculaFuncionario, nomeFuncionario, rgFuncionario, emailFuncionario,cnhFuncionario,cpfFuncionario,codUsuario,dataCadastroFuncionario ) VALUES ('$matriculaFuncionario','$nomeFuncionario', '$rgFuncionario', '$emailFuncionario', '$cnhFuncionario','$cpfFuncionario','$codUsuario',CURDATE())";
                                }
                                $insert = mysqli_query($connect,$query);
                                
                                echo"<script language='javascript' type='text/javascript'>swal('Usuário cadastrado com sucesso!', ' ','success').then((value) => { window.location.href='../../Telas/Visualiza/visualizaFuncionario.php';});</script>";

                            }else{
                                echo"<script language='javascript' type='text/javascript'> swal('Cadastro não efetuado!', ' ','error');</script>";
                            }
                        }
                    }
                }
            }
        ?>

</body>
</html>