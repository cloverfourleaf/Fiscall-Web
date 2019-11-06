
    
    <?php
    $codFabricante = filter_input(INPUT_POST, 'codFabricante', FILTER_SANITIZE_NUMBER_INT);
    $nomeFabricante = filter_input(INPUT_POST, 'nomeFabricante', FILTER_SANITIZE_STRING);
    $cnpjFabricante = filter_input(INPUT_POST, 'cnpjFabricante', FILTER_SANITIZE_STRING);

   /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $sql = "SELECT * FROM tbfabricante WHERE codFabricante = '$codFabricante'";
    $res = mysqli_query($connect, $sql);
    $total = mysqli_num_rows($res);

    if($nomeFabricante=="" || $nomeFabricante=="" || $nomeFabricante==""||$cnpjFabricante=="" || $cnpjFabricante=="" || $cnpjFabricante==""){
                echo"<script language='javascript' type='text/javascript'>swal('Todos os campos devem ser preenchidos!', ' ','error');</script>";
    }else{
            $query = "UPDATE tbfabricante SET nomeFabricante='$nomeFabricante', cnpjFabricante='$cnpjFabricante' WHERE codFabricante=$codFabricante";

            $insert = mysqli_query($connect,$query);

                if($insert){
                    echo"<script language='javascript' type='text/javascript'>swal('Fabricante alterado com sucesso!', ' ','success').then((value) => 
                    { window.location.href='../../Telas/Visualiza/visualizaFabricante.php';});</script>";
                        }else
                            echo"<script language='javascript' type='text/javascript'>swal('Não foi possível editar esse fabricante!', ' ','error');</script>";
                        }
    ?>

