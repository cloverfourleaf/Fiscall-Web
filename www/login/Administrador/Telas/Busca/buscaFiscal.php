
<?php

/*$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     
$conn = mysqli_connect('localhost','root','','bdfiscall');

$busca =  $_REQUEST['busca'];
$query = mysqli_query($conn, "SELECT nomeFuncionario FROM tbfuncionario INNER JOIN tbusuario ON tbfuncionario.codUsuario = tbusuario.codUsuario WHERE nomeFuncionario LIKE '%$busca%' AND codNivelUsuario=3 
                ORDER BY nomeFuncionario ASC");

$num   = mysqli_num_rows($query);
if($num >0){                   
    echo "<thead>
            <tr>
                <th>Nome do Fiscal</th>
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
                        <td data-title='nomeFiscal' id='limite'><?php echo $row['nomeFuncionario']; ?></td>
                        <td><button class='btn btn-primary btn-sm' onclick="addFiscal('<?php echo $row['nomeFuncionario']; ?>')">+</button></td>
                        </tr>
                    </tbody>
                        
                
            <?php
            }

        }?>

        <script language='javascript' type='text/javascript'>
            function addFiscal(nomeFiscal) {
            $('#status').hide();
        $('#ModalFiscal').modal('hide');
        document.getElementById('Fiscal').value = nomeFiscal;
        $('#Fiscal').html(nomeFiscal).attr('value', nomeFiscal);
    //    bStatus();
       
        $.getJSON('buscaStatus.php?search=Fiscal', {
            Motorista: $('#Fiscal').val(),
            ajax: 'true'
        }, function(j) {
            var options = j[0].statusAlocacao;
            var nao = document.getElementById("botao");    
                $('#status').html(options).show();
                document.getElementById('status').value = options;
                $('#status').attr('value', options);
                if (options.equals("Disponivel")) {
                                    nao.disabled = false;
                                }else {
                                        nao.disabled = true;
                                    }
            }else{
               options = "Disponível";
               document.getElementById('status').value = options;
               $('#status').attr('value', options);
               $('#status').show();
               document.getElementById('botao').disabled= false;
            }

        });
        </script>
    <?php
}else{   
  echo "Fiscal não Existe.";
    
}