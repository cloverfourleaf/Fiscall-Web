<?php
/*$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     
$conn = mysqli_connect('localhost','root','','bdfiscall');;
$busca =  $_POST['busca'];

$query = mysqli_query($conn, "SELECT * FROM tbgerenciamentolinha
INNER JOIN tbalocacao
ON tbalocacao.codAlocacao = tbgerenciamentolinha.codAlocacao
INNER JOIN tbfuncionario
ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario
INNER JOIN tblinha
ON tblinha.codLinha = tbalocacao.codLinha
INNER JOIN tbonibus
ON tbonibus.codOnibus = tbalocacao.codOnibus
WHERE nomeFuncionario LIKE '%$busca%' 
OR numLinha LIKE '%$busca%' 
OR prefixoOnibus LIKE '%$busca%' 
OR horarioChegada LIKE '%$busca%' 
OR horarioPrevisto LIKE '%$busca%'
OR statusViagem LIKE '%$busca%' 
OR horarioSaida LIKE '%$busca%'
ORDER BY nomeFuncionario ASC");
$num=mysqli_num_rows($query);
if($num > 0){
                            
                            echo "<thead>
                            <tr>
                                
                                <th>Fiscal</th>
                                <th>Motorista</th>
                                <th>Numero Linha</th>
                                <th>Prefixo</th>
                                <th>Chegada</th>
                                <th>Previsto</th>
                                <th>Status</th>
                                <th>Saída</th>
                        
                        
                                
                                <th class='actions'>Ações</th> 
                                
                                
                             </tr>
                        </thead>";
                            $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
                            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                            $qnt_result_pg = 10;
                            $itens_Pagina = 0;
                            while($row = mysqli_fetch_assoc($query)){
                                $codAlocacao = $row['codAlocacao'];
                                if($itens_Pagina<10){
                                    $itens_Pagina++;
                                echo"<tr>
                                    <td data-title='nomeFiscal' id='limite'>".$row['nomeFuncionario']."</td>
                                    <td data-title='nomeMotorista' id='limite'>".$row['nomeFuncionario']."</td>
                                    <td data-title='numLinha'>".$row['numLinha']."</td>
                                    <td data-title='prefixoOnibus'>".$row['prefixoOnibus']."</td>
                                    <td data-title='horarioChegada'>".$row['horarioChegada']."</td>
                                    <td data-title='horarioPrevisto'>".$row['horarioPrevisto']."</td>
                                    <td data-title='statusViagem'>".$row['statusViagem']."</td>
                                    <td data-title='horarioSaida'>".$row['horarioSaida']."</td>
                                    <td class='actions'>
                                    
                                    <a href='../../Function/Relatorio/Especifico/espLinha.php?codGerenciamentoLinha="  . $row['codGerenciamentoLinha'] .  "'><img src='../../../img/print.png'></a>
                                </td>

                                </tr>";
                                }
                            
                
        }
}else{   
  echo "Viagem não encontrado.";
}
?>