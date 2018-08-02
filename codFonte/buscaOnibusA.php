
<?php

$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');

$busca =  $_POST['busca'];
$query = mysqli_query($conn, "SELECT placaOnibus,prefixoOnibus FROM tbonibus 
                WHERE placaOnibus LIKE '%$busca%' OR prefixoOnibus LIKE '%$busca%'
                ORDER BY placaOnibus ASC");
$num   = mysqli_num_rows($query);
if($num >0){                   
    echo "<thead>
            <tr>
                <th>Placa do Ônibus</th>
                <th>Prefixo do Ônibus</th>
                <th></th>
            </tr>
        </thead>";
        $itens_Pagina = 0;
        while($row = mysqli_fetch_assoc($query)){
            if($itens_Pagina<4){
                $itens_Pagina++;
                    ?>
                <tbody>
                    <tr>
                        <td data-title='placaOnibus'><?php echo $row['placaOnibus']; ?></td>
                        <td data-title='prefixoOnibus'><?php echo $row['prefixoOnibus']; ?></td>
                        <td><button class='btn btn-primary btn-sm' onclick="addOnibus('<?php echo $row['placaOnibus']; ?>')"><span class="glyphicon glyphicon-plus"></span></button></td>
                    </tr>
                    </tbody>
            <?php
            }

        }?>

    <?php
}else{   
  echo "Ônibus não Existe.";
}
?>
