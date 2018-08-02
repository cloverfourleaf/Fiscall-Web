<?php
/*$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     
$conn = mysqli_connect('localhost','root','','bdfiscall');
$busca =  $_POST['busca'];
$query = mysqli_query($conn, "SELECT * FROM tbcooperativa WHERE nomeCooperativa LIKE '%$busca%' OR cnpjCooperativa LIKE '%$busca%' OR emailCooperativa LIKE '%$busca%'ORDER BY nomeCooperativa ASC");
$num   = mysqli_num_rows($query);
if($num > 0){
                            
                            echo "<thead>
                            <tr>
                                
                                <th>Nome</th>
                                <th></th>
                                <th>E-mail</th>
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
                                $codCooperativa = $row['codCooperativa'];
                                if($itens_Pagina<10){
                                    $itens_Pagina++;
                                echo"<tr>
                                    <td data-title='nomeCooperativa' id='limite'>".$row['nomeCooperativa']."</td>
                                    <td></td>
                                    <td data-title='emailCooperativa' id='limite'>".$row['emailCooperativa']."</td>
                                    <td></td>
                                    <td></td>
                                    <td data-title='cnpjCooperativa'>".$row['cnpjCooperativa']."</td>
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
                                    
                        <a href='../../Function/Relatorio/Especifico/espCooperativa.php?codCooperativa=" . $row['codCooperativa'] . "'><img src='../../../img/print.png'></a>
                        <a href='../Edita/editaCooperativa.php?codCooperativa=" . $row['codCooperativa'] . "'><img src='../../../img/edit.png'></a>
                        <a onclick='deletar($codCooperativa)'><img src='../../../img/close.png'></a>
                                </td>

                                </tr>";
                                }
                            
                
        }
}else{   
  echo "Cooperativa não encontrada.";
}
?>