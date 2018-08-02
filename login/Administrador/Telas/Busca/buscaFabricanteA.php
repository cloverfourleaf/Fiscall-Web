
<?php

$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');


$busca =  $_POST['busca'];
$query = mysqli_query($conn, "SELECT * FROM tbfabricante 
WHERE nomeFabricante LIKE '%$busca%' OR cnpjFabricante LIKE '%$busca%'
ORDER BY nomeFabricante ASC");
$num   = mysqli_num_rows($query);
if($num >0){                   
    echo "<thead>   
            <tr>
                <th>Nome do Fabricante</th>
                <th>CPNJ do Fabricante</th>
                <th></th>
            </tr>
         </thead>";
        $itens_Pagina = 0;
        while($row = mysqli_fetch_assoc($query)){
            $codFabricante = $row['codFabricante'];
            if($itens_Pagina<4){
                $itens_Pagina++;
                    ?>
                <tbody>
                    <tr>
                        <td data-title='nomeFabricante' id='limite'><?php echo $row['nomeFabricante']; ?></td>
                        <td data-title='cnpjFabricante'><?php echo $row['cnpjFabricante'];?></td>
                        <td><button class='btn btn-primary btn-sm' onclick="addLinha('<?php echo $row['nomeFabricante']; ?>')">+</button></td>
                    </tr>
                    </tbody>
            <?php
            }

        }?>
        <script language='javascript' type='text/javascript'>
            function addLinha(nomeFabricante) {
                $('#ModalFabricante').modal('hide');
                document.getElementById('inpFabricante').value = nomeFabricante;
                $('#inpFabricante').html(nomeFabricante).attr('value', nomeFabricante);
                  atualizar();
            }
        </script>
    <?php
}else{   
  echo "Fabricante não encontrado.";
    
}
?>
