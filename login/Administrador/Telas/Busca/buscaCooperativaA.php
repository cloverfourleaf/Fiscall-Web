
<?php

$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');


$busca =  $_POST['busca'];
$query = mysqli_query($conn, "SELECT * FROM tbcooperativa WHERE nomeCooperativa LIKE '%$busca%' OR cnpjCooperativa LIKE '%$busca%' ORDER BY nomeCooperativa ASC");
$num   = mysqli_num_rows($query);
if($num >0){                   
    echo "<thead>   
            <tr>
                <th>Nome da Cooperativa</th>
                <th>CNPJ</th>
                <th></th>
            </tr>
         </thead>";
        $itens_Pagina = 0;
        while($row = mysqli_fetch_assoc($query)){
            $codLinha = $row['codCooperativa'];
            if($itens_Pagina<4){
                $itens_Pagina++;
                    ?>
                <tbody>
                    <tr>
                        <td data-title='nomeCooperativa' id='limite'><?php echo $row['nomeCooperativa']; ?></td>
                        <td data-title='cnpjCooperativa'><?php echo $row['cnpjCooperativa'];?></td>
                        <td><button class='btn btn-primary btn-sm' onclick="addCooperativa('<?php echo $row['nomeCooperativa']; ?>')">+</button></td>
                    </tr>
                    </tbody>
            <?php
            }

        }?>
        <script language='javascript' type='text/javascript'>
            function addCooperativa(codCooperativa) {
                $('#ModalCooperativa').modal('hide');
                document.getElementById('Cooperativa').value = codCooperativa;
                $('#Cooperativa').html(codCooperativa).attr('value', codCooperativa);
            }
        </script>
    <?php
}else{   
  echo "Cooperativa não encontrada.";
    
}
?>