<?php
/*$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     
$conn = mysqli_connect('localhost','root','','bdfiscall');
$busca =  $_POST['busca'];
$query = mysqli_query($conn, "SELECT * FROM tbfuncionario 
INNER JOIN tbusuario ON tbusuario.codUsuario = tbfuncionario.codUsuario 
INNER JOIN tbnivelusuario ON tbusuario.codNivelUsuario = tbnivelusuario.codNivelUsuario 
WHERE tbfuncionario.nomeFuncionario LIKE '%$busca%' 
OR tbusuario.loginUsuario LIKE '%$busca%' 
OR tbnivelusuario.descricaoNivelUsuario LIKE '%$busca%' 
OR tbfuncionario.rgFuncionario LIKE '%$busca%' 
OR tbfuncionario.emailFuncionario LIKE '%$busca%' 
OR tbfuncionario.cpfFuncionario LIKE '%$busca%' 
OR tbfuncionario.cnhFuncionario LIKE '%$busca%' 
ORDER BY nomeFuncionario ASC");
$num = mysqli_num_rows($query);
session_start();
$loginTeste = $_SESSION['loginUsuario'];
if($num >0){
    echo "<thead>
        <tr>
            <th>Nome</th>
            <th>RG</th>
            <th>E-mail</th>
            <th>CNH</th>
            <th>CPF</th>
            <th>Login</th>
            <th>Cargo</th>
        <th class='actions'>Ações</th> 
        </tr>
    </thead>";
    $itens_Pagina=0;
    while($element = mysqli_fetch_assoc($query)){
        
        $codUsuario = $element['codUsuario'];
        $nomeFuncionario = $element['nomeFuncionario'];
        $rgFuncionario = $element['rgFuncionario'];
        $emailFuncionario = $element['emailFuncionario'];
        $cnhFuncionario = $element['cnhFuncionario'];
        $cpfFuncionario = $element['cpfFuncionario'];
        
        $sql = "SELECT * FROM tbusuario WHERE codUsuario = '$codUsuario'";
        $result = mysqli_query($conn,$sql);
        $elementU = mysqli_fetch_array($result);
        
        $codNivelUsuario = $elementU['codNivelUsuario'];
        $loginUsuario = $elementU['loginUsuario'];
            
        $sqlN = "SELECT * FROM tbnivelusuario WHERE codNivelUsuario = '$codNivelUsuario'";
        $resultN = mysqli_query($conn,$sqlN);
        $elementN = mysqli_fetch_array($resultN);

        
        
        
        $descricaoNivelUsuario = $elementN['descricaoNivelUsuario'];
        if($itens_Pagina<10){
            if($loginUsuario!=$loginTeste){
                $itens_Pagina++;
                echo"<tr>
                        <td data-title='nomeFuncionario' id='limite'>$nomeFuncionario</td>
                        <td data-title='rgFuncionario'>$rgFuncionario</td>
                        <td data-title='emailFuncionario' id='limite'>$emailFuncionario</td>
                        <td data-title='cnhFuncionario'>$cnhFuncionario</td>
                        <td data-title='cpfFuncionario'>$cpfFuncionario</td>
                        <td data-title='loginUsuario' id='limite'>$loginUsuario</td>
                        <td data-title='descricaoNivelUsuario'>$descricaoNivelUsuario</td>
                    <td class='actions'>
                            <a href='../../Function/Relatorio/Especifico/espFuncionario.php?codFuncionario=" . $element['codFuncionario'] . "'><img src='../../../img/print.png'></a>
                            <a href='../Edita/editaFuncionario.php?codFuncionario=" . $element['codFuncionario'] . "'><img src='../../../img/edit.png'></a>
                            <a onclick='deletar($codUsuario)'><img src='../../../img/close.png'></a>
                        </td>
                    </tr>";
        
            }else{
                $itens_Pagina++;
                echo"<tr>
                        <td data-title='nomeFuncionario'>$nomeFuncionario</td>
                        <td data-title='rgFuncionario'>$rgFuncionario</td>
                        <td data-title='emailFuncionario'>$emailFuncionario</td>
                        <td data-title='cnhFuncionario'>$cnhFuncionario</td>
                        <td data-title='cpfFuncionario'>$cpfFuncionario</td>
                        <td data-title='loginUsuario'>$loginUsuario</td>
                        <td data-title='descricaoNivelUsuario'>$descricaoNivelUsuario</td>
                        <td class='actions'>
                            <a href='../../Function/Relatorio/Especifico/espFuncionario.php?codFuncionario=" . $element['codFuncionario'] . "'><img src='../../../img/print.png'></a>
                            <a href='../Visualiza/visualizaPerfil.php?codFuncionario=" . $element['codFuncionario'] . "'><img src='../../../img/edit.png'></a>
                        </td>
                    </tr>"; 
            }
            
        }
    }  
}else{   
  echo "Funcionario não encontrado.";
}
?>