<?php
$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');
$busca =  $_POST['busca'];
$query = mysqli_query($conn, "SELECT * FROM tbalocacao
INNER JOIN tbturno 
ON tbturno.codTurno = tbalocacao.codTurno
INNER JOIN tbfuncionario 
ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario
INNER JOIN tbusuario 
ON tbusuario.codUsuario = tbfuncionario.codUsuario
INNER JOIN tbnivelusuario 
ON tbnivelusuario.codNivelUsuario = tbusuario.codNivelUsuario
INNER JOIN tbonibus
ON tbonibus.codOnibus = tbalocacao.codOnibus
INNER JOIN tblinha
ON tblinha.codLinha = tbalocacao.codLinha
WHERE nomeFuncionario LIKE '%$busca%'AND descricaoNivelUsuario like 'Motorista'
OR prefixoOnibus LIKE '%$busca%' AND descricaoNivelUsuario like 'Motorista'
OR placaOnibus LIKE '%$busca%' AND descricaoNivelUsuario like 'Motorista'
OR numLinha LIKE '%$busca%' AND descricaoNivelUsuario like 'Motorista'
OR nomeLinha LIKE '%$busca%' AND descricaoNivelUsuario like 'Motorista'
OR inicioAlocacao LIKE '%$busca%' AND descricaoNivelUsuario like 'Motorista'
OR fimAlocacao LIKE '%$busca%' AND descricaoNivelUsuario like 'Motorista'
OR descricaoTurno LIKE '%$busca%' AND descricaoNivelUsuario like 'Motorista'
OR statusAlocacao LIKE '%$busca%'AND descricaoNivelUsuario like 'Motorista'
ORDER BY nomeLinha ASC");
$num = mysqli_num_rows($query);
if($num > 0){
                            
                            echo "<thead>
                            <tr>
                                
                                <th>Nome do Funcionário</th>
                                <th>Prefixo</th>
                                <th>Placa</th>
                                <th>Linha</th>
                                <th> </th>
                                <th>Inicio</th>
                                <th>Validade</th>
                                <th>Turno</th>
                                <th>Status</th>
                        
                                
                                <th class='actions'>Ações</th> 
                                
                                
                             </tr>
                        </thead>";
                            $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
                            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                            $qnt_result_pg = 10;
                            $itens_Pagina = 0;
                            while($row = mysqli_fetch_assoc($query)){
                                $codAlocacao = $row['codAlocacao'];
                                $inicioAlocacao = $row['inicioAlocacao'];
                                $inicioAlocacao = implode("/", array_reverse(explode("-", $inicioAlocacao)));
                                $fimAlocacao = $row['fimAlocacao'];
                                $fimAlocacao = implode("/", array_reverse(explode("-", $fimAlocacao)));
                                if($itens_Pagina<10){
                                    $itens_Pagina++;
                                echo"<tr>
                                    <td data-title='nomeFuncionario' id='limite'>".$row['nomeFuncionario']."</td>
                                    <td data-title='prefixoOnibus'>".$row['prefixoOnibus']."</td>
                                    <td data-title='placaOnibus'>".$row['placaOnibus']."</td>
                                    <td data-title='numLinha'>".$row['numLinha']."</td>
                                    <td data-title='nomeLinha' id='limite'>".$row['nomeLinha']."</td>
                                    <td data-title='inicioAlocacao'>".$inicioAlocacao."</td>
                                    <td data-title='fimAlocacao'>".$fimAlocacao."</td>
                                    <td data-title='descricaoTurno'>".$row['descricaoTurno']."</td>
                                    <td data-title='statusAlocacao'>".$row['statusAlocacao']."</td>
                                    <td class='actions'>
                                    
                        <a href='../../Function/Relatorio/Especifico/espAlocacao.php?codAlocacao=" . $row['codAlocacao'] . "'><img src='../../../img/print.png'></a> 
                        <a href='../Edita/editaAlocacao.php?codAlocacao=" . $row['codAlocacao'] . "'><img src='../../../img/edit.png'></a>
                                </td>

                                </tr>";
                                }
                            
                
        }
}else{   
  echo "Alocação  não encontrado.";
}
?>