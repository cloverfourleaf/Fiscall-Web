<?php session_start(); 
    
   /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $codUsuario = $_SESSION['codUsuario'];
    $codFuncionarioE = $_SESSION['codFuncionario'];
    $codFuncionario = filter_input(INPUT_POST, 'codFuncionario', FILTER_SANITIZE_NUMBER_INT);
    $codUsuarioF = filter_input(INPUT_POST, 'codUsuarioF', FILTER_SANITIZE_NUMBER_INT);
    $nomeFuncionario = $_POST['nomeFuncionario'];
    $rgFuncionario = filter_input(INPUT_POST, 'rgFuncionario', FILTER_SANITIZE_STRING);
    $emailFuncionario = filter_input(INPUT_POST, 'emailFuncionario', FILTER_SANITIZE_STRING);
    $cpfFuncionario = filter_input(INPUT_POST, 'cpfFuncionario', FILTER_SANITIZE_STRING);
    $loginUsuario = filter_input(INPUT_POST, 'loginUsuario', FILTER_SANITIZE_STRING);
    $senhaUsuario = filter_input(INPUT_POST, 'senhaUsuario', FILTER_SANITIZE_STRING);
    $confirmaSenha = filter_input(INPUT_POST, 'confirmaSenha', FILTER_SANITIZE_STRING);
    $cnhFuncionario = filter_input(INPUT_POST, 'cnh_Funcionario', FILTER_SANITIZE_STRING);
    $codNivelUsuario = filter_input(INPUT_POST, 'codNivelUsuario', FILTER_SANITIZE_STRING);
    $pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_STRING);
    
    if($pagina=="Perfil"){
        
        if($nomeFuncionario == "" || $nomeFuncionario == null || $nomeFuncionario == "" || $nomeFuncionario == null || $emailFuncionario == "" || $emailFuncionario == null ||$loginUsuario == "" || $loginUsuario == null || $senhaUsuario == "" || $senhaUsuario == null || $confirmaSenha == "" || $confirmaSenha == null){
            echo"<script language='javascript' type='text/javascript'>swal('Todos os campos devem ser preenchidos!', ' ','error');</script>";
        }else{
            if($senhaUsuario != $confirmaSenha){
                echo"<script language='javascript' type='text/javascript'>swal('As senhas não podem ser diferentes!', ' ','error');</script>";
            }else{
                $sql_Usuario = "UPDATE tbusuario SET loginUsuario = '$loginUsuario', senhaUsuario = '$senhaUsuario' WHERE codUsuario = '$codUsuario'";
                $insert_Usuario = mysqli_query($connect,$sql_Usuario);
                if($insert_Usuario){
                    $sql_Funcionario = "UPDATE tbfuncionario SET nomeFuncionario = '$nomeFuncionario', emailFuncionario = '$emailFuncionario' WHERE codFuncionario = '$codFuncionarioE'";
                    $insert_Funcionario = mysqli_query($connect,$sql_Funcionario);
                    if($insert_Funcionario){
                        unset($_SESSION['nomeUsuario']);
                        unset($_SESSION['loginUsuario']);
                        unset($_SESSION['senhaUsuario']);
                        $_SESSION['loginUsuario'] = $loginUsuario;
                        $_SESSION['senhaUsuario'] = $senhaUsuario;        
                        $_SESSION['nomeUsuario'] = $nomeFuncionario;
                        echo"<script language='javascript' type='text/javascript'>swal('Perfil alterado com sucesso!', ' ','success').then((value) => { window.location.href='../../index.php';});</script>";
                    }else{
                        echo"<script language='javascript' type='text/javascript'>swal('Não deu certo!', ' ','error');</script>";
                    }
                }else{
                    echo"<script language='javascript' type='text/javascript'>swal('Não deu certo!', ' ','error');</script>";
                }
            }
        }
        
    }else if($pagina=="Funcionario"){
        if($nomeFuncionario == "" || $nomeFuncionario == null || $nomeFuncionario == "" || $nomeFuncionario == null || $rgFuncionario == "" || $rgFuncionario == null || $emailFuncionario == "" || $emailFuncionario == null || $cpfFuncionario == "" || $cpfFuncionario == null || $loginUsuario == "" || $loginUsuario == null || $senhaUsuario == "" || $senhaUsuario == null || $confirmaSenha == "" || $confirmaSenha == null){
            echo"<script language='javascript' type='text/javascript'>swal('Todos os campos devem ser preenchidos!', ' ','error');</script>";
        }else{
            if($senhaUsuario != $confirmaSenha){
                echo"<script language='javascript' type='text/javascript'>swal('As senhas não podem ser iguais!', ' ','error');</script>";
            }else{
                $sql_Usuario = "UPDATE tbusuario SET loginUsuario = '$loginUsuario', senhaUsuario = '$senhaUsuario',codNivelUsuario='$codNivelUsuario' WHERE codUsuario = '$codUsuarioF'";
                $insert_Usuario = mysqli_query($connect,$sql_Usuario);
                if($insert_Usuario){                    
                    if($cnhFuncionario==null){
                        $sql_Funcionario = "UPDATE tbfuncionario SET nomeFuncionario = '$nomeFuncionario', rgFuncionario = '$rgFuncionario', emailFuncionario = '$emailFuncionario', cnhFuncionario='$cnhFuncionario', cpfFuncionario='$cpfFuncionario' WHERE codUsuario = '$codUsuarioF'";
                    }else{
                        $sql_Funcionario = "UPDATE tbfuncionario SET nomeFuncionario = '$nomeFuncionario', rgFuncionario = '$rgFuncionario', emailFuncionario = '$emailFuncionario', cnhFuncionario='$cnhFuncionario', cpfFuncionario='$cpfFuncionario' WHERE codUsuario = '$codUsuarioF'";
                    }
                    $insert_Funcionario = mysqli_query($connect,$sql_Funcionario);
                    if($insert_Funcionario){
                        
                        echo"<script language='javascript' type='text/javascript'>swal('Perfil alterado com sucesso!', ' ','success').then((value) => { window.location.href='../../Telas/Visualiza/visualizaFuncionario.php';});</script>";
                    }else{
                        echo"<script language='javascript' type='text/javascript'> swal('Edição não efetuadaa!', ' ','error');</script>";
                    }
                }else{
                        echo"<script language='javascript' type='text/javascript'> swal('Edição não efetuada!', ' ','error');</script>";

                }
            }
        }
    }
    
?>