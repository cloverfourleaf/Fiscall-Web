<?php
$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');
$busca =  $_POST['busca'];
$query = mysqli_query($conn, "SELECT * FROM tbonibus 
INNER JOIN tbmodelo 
on tbmodelo.codModelo = tbonibus.codModelo 
INNER JOIN tbfabricante 
on tbfabricante.codFabricante= tbmodelo.codFabricante
INNER JOIN tbcooperativa 
on tbonibus.codCooperativa = tbcooperativa.codCooperativa
WHERE placaOnibus LIKE '%$busca%' 
OR prefixoOnibus LIKE '%$busca%' 
OR tbfabricante.nomeFabricante LIKE '%$busca%' 
OR tbmodelo.nomeModelo LIKE '%$busca%'
OR tbmodelo.anoFabricacao LIKE '%$busca%'
OR operacao LIKE '%$busca%'
OR tbcooperativa.nomeCooperativa LIKE '%$busca%'
ORDER BY placaOnibus ASC");


$num = mysqli_num_rows($query);
if($num >0){
                            
                      echo  "<thead>
                            <tr>
                                
                                <th>Placa</th>
                                <th></th>
                                <th>Prefixo</th>
                                <th>Modelo</th>
                                <th></th>
                                <th></th>
                                <th>Fabricante</th>
                                <th></th>
                                <th>Cooperativa</th>
                                <th>Ano de Fabricação</th>
                                <th></th>
                                <th></th>
                                <th>Operação</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th class='actions'>Ações</th> 
                                
                                
                             </tr>
                        </thead>";
                                $itens_Pagina = 0;
                                while($element = mysqli_fetch_assoc($query)){
                                $codOnibus = $element['codOnibus'];
                                $codModelo = $element['codModelo'];
                                $sql = "SELECT * FROM tbmodelo WHERE codModelo = '$codModelo'";
                                $result = mysqli_query($conn,$sql);
                                $elementE = mysqli_fetch_array($result);
                                
                                $codFabricante = $elementE['codFabricante'];
                                $sqlS = "SELECT * FROM tbfabricante WHERE codFabricante = '$codFabricante'";
                                $resultS = mysqli_query($conn,$sqlS);
                                $elementS = mysqli_fetch_array($resultS);
                                
                                $codCooperativa = $element['codCooperativa'];
                                $sqlC = "SELECT * FROM tbcooperativa WHERE codCooperativa = '$codCooperativa'";
                                $resultC = mysqli_query($conn,$sqlC);
                                $elementC = mysqli_fetch_array($resultC);
                                
                                    if($itens_Pagina<10){
                                    $itens_Pagina++;
                            echo"<tr>
                                <td data-title='placaOnibus'>".$element['placaOnibus']."</td>
                                <td></td>
                                <td data-title='prefixoOnibus'>".$element['prefixoOnibus']."</td>
                                <td data-title='nomeModelo' id='limite'>".$elementE['nomeModelo']."</td> 
                                <td></td><td></td>
                                <td data-title='nomeFabricante' id='limite'>".$elementS['nomeFabricante']."</td> 
                                <td></td>
                                <td data-title='nomeCooperativa' id='limite'>".$elementC['nomeCooperativa']."</td>
                                <td data-title='anoFabricacao'>".$elementE['anoFabricacao']."</td>
                                <td></td><td></td>
                                <td data-title='operacao'>".$element['operacao']."</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class='actions'>
                                    
                        <a href='../../Function/Relatorio/Especifico/espOnibus.php?codOnibus=" . $element['codOnibus'] . "'><img src='../../../img/print.png'></a>
                        <a href='../Edita/editaOnibus.php?codOnibus=" . $element['codOnibus'] . "'><img src='../../../img/edit.png'></a>
                        <a onclick='deletar($codOnibus)'><img src='../../../img/close.png'></a>
                                    
                                </td>

                                </tr>";
                                    }
        //echo $row['nomeFiscal'].' - '.$row['rgFiscal'].'<br /><hr>';
    }
        
}else{   
  echo "Ônibus não encontrado.";
}
?>