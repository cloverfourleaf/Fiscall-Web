<?php
/*$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     
$conn = mysqli_connect('localhost','root','','bdfiscall');
$busca =  $_POST['busca'];
$query = mysqli_query($conn, "SELECT * FROM tbfabricante WHERE nomeFabricante LIKE '%$busca%' OR cnpjFabricante LIKE '%$busca%' ORDER BY nomeFabricante ASC");
$num   = mysqli_num_rows($query);
if($num > 0){
                            
                            echo "<thead>
                            <tr>
                                
                                <th>Nome</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>CNPJ</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
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
                            $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
                            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                            $qnt_result_pg = 10;
                            $itens_Pagina = 0;
                            while($row = mysqli_fetch_assoc($query)){
                                $codFabricante = $row['codFabricante'];
                                if($itens_Pagina<10){
                                    $itens_Pagina++;
                                echo"<tr>
                                    <td data-title='nomeFabricante' id='limite'>".$row['nomeFabricante']."</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td data-title='cnpjFabricante'>".$row['cnpjFabricante']."</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class='actions'>
                                    
                        <a href='../../Function/Relatorio/Especifico/espFabricante.php?codFabricante=" . $row ['codFabricante'] . "'>
                        <img src='../../../img/print.png' href ='#'></a>
                        <a href='../Edita/editaFabricante.php?codFabricante=" . $row['codFabricante'] . "'><img src='../../../img/edit.png'></a>
                        <a onclick='deletar($codFabricante)'><img src='../../../img/close.png'></a>
                        
                                </td>

                                </tr>";
                                }
                
    }
}else{   
  echo "Fabricante não encontrado.";
}
?>