
<?php

$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');


$busca =  $_POST['busca'];
$query = mysqli_query($conn, "SELECT * FROM tblinha 
INNER JOIN tbponto 
ON tblinha.codLinha = tbponto.codLinha 
WHERE nomeLinha LIKE '%$busca%' AND codTipoViagem='1' OR numLinha LIKE '%$busca%'
AND codTipoViagem='1' 
ORDER BY nomeLinha ASC");
$num   = mysqli_num_rows($query);
if($num >0){                   
    echo "<thead>   
            <tr>
                <th>Nome da Linha</th>
                <th>Número da Linha</th>
                <th></th>
            </tr>
         </thead>";
        $itens_Pagina = 0;
        while($row = mysqli_fetch_assoc($query)){
            $codLinha = $row['codLinha'];
            if($itens_Pagina<4){
                $itens_Pagina++;
                    ?>
                <tbody>
                    <tr>
                        <td data-title='nomeLinha' id='limite'><?php echo $row['nomeLinha']; ?></td>
                        <td data-title='numLinha'><?php echo $row['numLinha'];?></td>
                        <td><button class='btn btn-primary btn-sm' onclick="addLinha('<?php echo $row['nomeLinha']; ?>')"><span class="glyphicon glyphicon-plus"></span></button></td>
                    </tr>
                    </tbody>
            <?php
            }

        }?>

    <?php
}else{   
  echo "Linha não encontrada.";
    
}
?>
