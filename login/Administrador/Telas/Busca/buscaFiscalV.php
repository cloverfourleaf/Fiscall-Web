
<?php

$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');


$busca =  $_POST['busca'];
$query = mysqli_query($conn, "SELECT codFuncionario,nomeFuncionario FROM tbfuncionario
INNER JOIN tbusuario ON tbusuario.codUsuario = tbfuncionario.codUsuario
INNER JOIN tbnivelusuario ON tbnivelusuario.codNivelUsuario = tbusuario.codNivelUsuario
WHERE nomeFuncionario LIKE '%$busca%' AND descricaoNivelUsuario like 'Fiscal' ORDER BY nomeFuncionario ASC");
$num   = mysqli_num_rows($query);
if($num >0){                   
    echo "<thead>   
            <tr>
                <th>Nome</th>
                <th></th>
            </tr>
         </thead>";
        $itens_Pagina = 0;
        while($row = mysqli_fetch_assoc($query)){
            $codFuncionario = $row['codFuncionario'];
            if($itens_Pagina<4){
                $itens_Pagina++;
                    ?>
                <tbody>
                    <tr>
                        <td data-title='nomeFuncionario' id='limite'><?php echo $row['nomeFuncionario']; ?></td>
                        <td><button class='btn btn-primary btn-sm' onclick="addFiscal('<?php echo $row['nomeFuncionario']; ?>')"><span class="glyphicon glyphicon-plus"></span></button></td>
                    </tr>
                    </tbody>
            <?php
            }

        }?>
        
    <?php
}else{   
  echo "Fiscal não encontrado.";
    
}
?>