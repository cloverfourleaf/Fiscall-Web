<?php
/*$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     
$conn = mysqli_connect('localhost','root','','bdfiscall');
$busca =  $_POST['busca'];
$query = mysqli_query($conn, "SELECT * FROM tbmodelo 
INNER JOIN tbfabricante 
ON tbmodelo.codFabricante = tbfabricante.codFabricante
INNER JOIN tbtipomodelo
ON tbmodelo.codTipoModelo = tbtipomodelo.codTipoModelo
WHERE nomeModelo LIKE '%$busca%' 
OR anoFabricacao LIKE '%$busca%'
OR tbfabricante.nomeFabricante LIKE '%$busca%'
OR tbtipomodelo.descricaoTipoModelo LIKE '%$busca%'
ORDER BY nomeModelo ASC");
$num   = mysqli_num_rows($query);
if($num > 0){
                            
                            echo "<thead>
                            <tr>
                                
                                <th>Nome do Modelo</th>
                                <th></th>
                                <th>Ano do Modelo</th>
                                <th></th>
                                <th>Fabricante</th>
                                <th></th>
                                <th>Tipo de Ônibus</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                        
                                
                                <th class='actions'>Ações</th> 
                                
                                
                             </tr>
                        </thead>";
                            $itens_Pagina = 0;
                            while($row = mysqli_fetch_assoc($query)){
                                
                                $codModelo = $row['codModelo'];
                                $codFabricante = $row['codFabricante'];
                                $codTipoModelo = $row['codTipoModelo'];
                                $sql = "SELECT * FROM tbfabricante where codFabricante= $codFabricante";
                                $result = mysqli_query($conn,$sql);
                                $element = mysqli_fetch_array($result);
                                $sqlTipo = "SELECT * FROM tbtipomodelo where codTipoModelo= $codTipoModelo";
                                $resultTipo = mysqli_query($conn,$sqlTipo);
                                $elementTipo = mysqli_fetch_array($resultTipo);
                                if($itens_Pagina<10){
                                    $itens_Pagina++;
                                echo"<tr>
                                    <td data-title='nomeModelo' id='limite'>".$row['nomeModelo']."</td>
                                    <td></td>
                                    <td data-title='anoFabricacao'>".$row['anoFabricacao']."</td>
                                    <td></td>
                                    <td data-title='nomeFabricante' id='limite'>".$element['nomeFabricante']."</td>
                                    <td></td>
                                    <td data-title='descricaoTipoModelo'>".$elementTipo['descricaoTipoModelo']."</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    
                                    <td class='actions'>
                                    
                        <a href='../../Function/Relatorio/Especifico/espModelo.php?codModelo=" . $row['codModelo'] . "'><img src='../../../img/print.png'></a> 
                        <a href='../Edita/editaModelo.php?codModelo=" . $row['codModelo'] . "'><img src='../../../img/edit.png'></a>
                        <a onclick='deletar($codModelo)'><img src='../../../img/close.png'></a>    
                                </td>

                                </tr>";
                
                
                                }
    }
}else{   
  echo "Modelo não encontrado.";
}
?>