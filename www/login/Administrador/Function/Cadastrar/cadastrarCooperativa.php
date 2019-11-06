<html>
<head>
<script src = '../../../bootstrap/js/alert.js'></script>
</head>
<body>

<?php

    $nomeCooperativa  = $_POST['nomeCooperativa'];
    $emailCooperativa  = $_POST['emailCooperativa'];
    $cnpjCooperativa  = $_POST['cnpjCooperativa'];
    /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $sql = "SELECT * FROM tbcooperativa WHERE cnpjCooperativa = '$cnpjCooperativa'";
    $res = mysqli_query($connect, $sql);
    $total_cnpj = mysqli_num_rows($res);
    
    $sql = "SELECT * FROM tbcooperativa WHERE emailCooperativa = '$emailCooperativa'";
    $res = mysqli_query($connect, $sql);
    $total_email = mysqli_num_rows($res);

    if($nomeCooperativa=="" || $cnpjCooperativa=="" || $nomeCooperativa==null || $cnpjCooperativa==null || $emailCooperativa=="" || $emailCooperativa==null){
                echo"<script language='javascript' type='text/javascript'> swal('Todos os campos devem ser preenchidos!', ' ','error').then((value) => 
                { window.location.href='../../Telas/Adiciona/adicionaCooperativa.php';});</script>";
    }else{
        if($total_cnpj>0){
            echo"<script language='javascript' type='text/javascript'> swal('CNPJ já cadastrado!', ' ','error');</script>";
            die();
        }else if($total_email>0){
            echo"<script language='javascript' type='text/javascript'> swal('Email já cadastrado!', ' ','error');</script>";
            die();
        }else{
            $query = "INSERT INTO tbcooperativa (nomeCooperativa, emailCooperativa, cnpjCooperativa) VALUES ('$nomeCooperativa', '$emailCooperativa', '$cnpjCooperativa')";
            $insert = mysqli_query($connect,$query);
                if($insert){
                    echo"<script language='javascript' type='text/javascript'> swal('Cooperativa cadastrada com sucesso!', ' ','success').then((value) => 
                    { window.location.href='../../Telas/Visualiza/visualizaCooperativa.php';});
                    </script>";

                }else{
                    echo"<script language='javascript' type='text/javascript'> swal('Cadastro não efetuado!', ' ','error');</script>";
                }
        }
    }
?>

</body>
</html>