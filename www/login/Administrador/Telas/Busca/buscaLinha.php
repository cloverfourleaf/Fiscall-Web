<?php

/*$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     
$conn = mysqli_connect('localhost','root','','bdfiscall');


$busca =  $_POST['busca'];
$query = mysqli_query($conn, "SELECT * FROM tblinha 
INNER JOIN tbponto 
ON tblinha.codLinha = tbponto.codLinha 
WHERE nomeLinha LIKE '%$busca%'
AND codTipoViagem='1' 
or numLinha LIKE '%$busca%'
AND codTipoViagem='1' 
OR horaFuncionamento LIKE '%$busca%' 
AND codTipoViagem='1' 
OR horaTermino LIKE '%$busca%' 
AND codTipoViagem='1' 
OR descricaoPonto LIKE '%$busca%' 
AND codTipoViagem='1' 
ORDER BY nomeLinha ASC");
$query2 = mysqli_query($conn, "SELECT * FROM tblinha 
INNER JOIN tbponto 
ON tblinha.codLinha = tbponto.codLinha 
WHERE nomeLinha LIKE '%$busca%'
AND codTipoViagem='2' 
or numLinha LIKE '%$busca%'
AND codTipoViagem='2' 
OR horaFuncionamento LIKE '%$busca%' 
AND codTipoViagem='2' 
OR horaTermino LIKE '%$busca%' 
AND codTipoViagem='2' 
OR descricaoPonto LIKE '%$busca%' 
AND codTipoViagem='2' 
ORDER BY nomeLinha ASC");

$num   = mysqli_num_rows($query);
if($num >0){
                            
                            echo "<thead>
                            <tr>
                                
                                <th>Nome</th>
                                <th></th>
                                <th></th>
                                <th>Número</th>
                                <th>Tarifa</th>
                                <th>Ida</th>
                                <th>Volta</th>
                                <th>Hora de Início</th>
                                <th>Hora de Término</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th class='actions'>Ações</th>
                             </tr>
                        </thead>";
                            $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
                            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                            $qnt_result_pg = 6;
                            $itens_Pagina = 0;
                            while($row = mysqli_fetch_assoc($query)){
                                $row2 = mysqli_fetch_assoc($query2);
                                $codLinha = $row['codLinha'];
                                if($itens_Pagina<6){
                                    $itens_Pagina++;
                                echo"<tr>
                                        <td data-title='nomeLinha' id='limite'>".$row['nomeLinha']."</td>
                                        <td></td>
                                        <td></td>
                                        <td data-title='numLinha'>".$row['numLinha']."</td>
                                        <td data-title='tarifaLinha'>".$row['tarifaLinha']."</td>
                                        <td data-title='ida' id='limite'>".$row['descricaoPonto']."</td> 
                                        <td data-title='volta' id='limite'>".$row2['descricaoPonto']."</td> 
                                        <td data-title='horaFuncionamento'>".$row['horaFuncionamento']."</td>
                                        <td data-title='horaTermino'>".$row['horaTermino']."</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    <td class='actions'>

                            <a href='../../Function/Relatorio/Especifico/espLinha.php?codLinha="  . $row['codLinha'] .  "'><img src='../../../img/print.png'></a>
                            <a href='../Edita/editaLinha.php?codLinha=" . $row['codLinha'] . "'><img src='../../../img/edit.png'></a>
                            <a onclick='deletar($codLinha)'><img src='../../../img/close.png'></a>

                                    </td>

                                    </tr>";   
                            }
        
        //echo $row['nomeFiscal'].' - '.$row['rgFiscal'].'<br /><hr>';
        
    }
}else{   
  echo "Linha não encontrada.";
    
}
?>