
    
    <?php
    $codCooperativa = filter_input(INPUT_POST, 'codCooperativa', FILTER_SANITIZE_NUMBER_INT);
    $nomeCooperativa = filter_input(INPUT_POST, 'nomeCooperativa', FILTER_SANITIZE_STRING);
    $emailCooperativa = filter_input(INPUT_POST, 'emailCooperativa', FILTER_SANITIZE_STRING);
    $cnpjCooperativa = filter_input(INPUT_POST, 'cnpjCooperativa', FILTER_SANITIZE_STRING);

   /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $sql = "SELECT * FROM tbcooperativa WHERE nomeCooperativa = '$nomeCooperativa'";
    $res = mysqli_query($connect, $sql);
    $total = mysqli_num_rows($res);

    if($nomeCooperativa=="" || $nomeCooperativa==null || $emailCooperativa==""|| $emailCooperativa==null|| $cnpjCooperativa=="" || $cnpjCooperativa==null){
        echo"<script language='javascript' type='text/javascript'>swal('Todos os campos devem ser preenchidos!', ' ','error');</script>";
    }else{
        $query = "UPDATE tbcooperativa SET nomeCooperativa='$nomeCooperativa',emailCooperativa='$emailCooperativa', cnpjCooperativa='$cnpjCooperativa' WHERE codCooperativa=$codCooperativa";

        $insert = mysqli_query($connect,$query);

        if($insert){
            echo"<script language='javascript' type='text/javascript'>swal('Cooperativa alterada com sucesso!', ' ','success').then((value) => 
            { window.location.href='../../Telas/Visualiza/visualizaCooperativa.php';});</script>";
        }else{
        echo"$query";
            echo"<script language='javascript' type='text/javascript'>swal('Não foi possível editar esse Cooperativa!', ' ','error');</script>";
        }
        
    }
    ?>
