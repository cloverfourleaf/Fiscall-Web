
<?php

$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');

$busca =  $_REQUEST['busca'];
$query = mysqli_query($conn, "SELECT nomeFuncionario FROM tbfuncionario INNER JOIN tbusuario ON tbfuncionario.codUsuario = tbusuario.codUsuario WHERE nomeFuncionario LIKE '%$busca%' AND codNivelUsuario=4 
                ORDER BY nomeFuncionario ASC");

$num   = mysqli_num_rows($query);
if($num >0){                   
    echo "<thead>
            <tr>
                <th>Nome do Motorista</th>
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
                        <td data-title='nomeMotorista' id='limite'><?php echo $row['nomeFuncionario']; ?></td>
                        <td><button class='btn btn-primary btn-sm' onclick="addMotorista('<?php echo $row['nomeFuncionario']; ?>')">+</button></td>
                        </tr>
                    </tbody>
                        
                
            <?php
            }

        }?>
        <script language='javascript' type='text/javascript'>
            function addMotorista(nomeMotorista) {
            $('#status').hide();
        $('#ModalMotorista').modal('hide');
        document.getElementById('Motorista').value = nomeMotorista;
        $('#Motorista').html(nomeMotorista).attr('value', nomeMotorista);
    //    bStatus();
       
        $.getJSON('buscaStatus.php?search=Motorista', {
            Motorista: $('#Motorista').val(),
            ajax: 'true'
        }, function(j) {
            var options = j[0].statusAlocacao;
            if (options != null) {
                $('#status').html(options).show();
                document.getElementById('status').value = options;
                $('#status').attr('value', options);
                if(options=="Indisponível"){
                document.getElementById('botao').disabled= true;
                }else{
                document.getElementById('botao').disabled= false;
                }
            }else{
                options = "Disponivel";
                document.getElementById('status').value = options;
                $('#status').html(options).show();
                $('#status').attr('value', options);
                document.getElementById('botao').disabled= false;
            }
        });
            }
    <?php
}else{   
  echo "Motorista não Existe.";
    
}