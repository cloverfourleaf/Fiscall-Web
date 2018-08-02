<?php

    $escolha  = $_POST['escolha'];
    $Fabricante  = $_POST['Fabricante'];
    $Modelo  = $_POST['Modelo'];
    $AnoOperacao  = $_POST['AnoOperacao'];
    $AnoFabricacao  = $_POST['AnoFabricacao'];    
    /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
    $qnt_result_pg = 10;
    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

    if($escolha==1){           
           $query = "SELECT tbonibus.codOnibus,placaOnibus,prefixoOnibus,nomeCooperativa,nomeFabricante,nomeModelo,operacao,anoFabricacao 
           FROM tbonibus 
           INNER JOIN tbcooperativa
           ON tbcooperativa.codCooperativa = tbonibus.codCooperativa 
           INNER JOIN tbmodelo 
           ON tbmodelo.codModelo = tbonibus.codModelo 
           INNER JOIN tbfabricante 
           ON tbfabricante.codFabricante = tbmodelo.codFabricante 
           WHERE nomeFabricante='$Fabricante' 
           AND tbmodelo.codModelo='$Modelo' 
           AND anoFabricacao='$AnoFabricacao' 
           AND operacao='$AnoOperacao' 
           ORDER BY placaOnibus ASC LIMIT $inicio, $qnt_result_pg";
    }else if($escolha==2){           
           $query = "SELECT tbonibus.codOnibus,placaOnibus,prefixoOnibus,nomeCooperativa,nomeFabricante,nomeModelo,operacao,anoFabricacao 
           FROM tbonibus 
           INNER JOIN tbcooperativa 
           ON tbcooperativa.codCooperativa = tbonibus.codCooperativa 
           INNER JOIN tbmodelo 
           ON tbmodelo.codModelo = tbonibus.codModelo 
           INNER JOIN tbfabricante 
           ON tbfabricante.codFabricante = tbmodelo.codFabricante 
           WHERE nomeFabricante='$Fabricante' 
           AND anoFabricacao='$AnoFabricacao'
           AND operacao='$AnoOperacao' 
           ORDER BY placaOnibus ASC LIMIT $inicio, $qnt_result_pg";
    }else if($escolha==3){           
           $query = "SELECT tbonibus.codOnibus,placaOnibus,prefixoOnibus,nomeCooperativa,nomeFabricante,nomeModelo,operacao,anoFabricacao 
           FROM tbonibus 
           INNER JOIN tbcooperativa 
           ON tbcooperativa.codCooperativa = tbonibus.codCooperativa 
           INNER JOIN tbmodelo 
           ON tbmodelo.codModelo = tbonibus.codModelo 
           INNER JOIN tbfabricante 
           ON tbfabricante.codFabricante = tbmodelo.codFabricante 
           WHERE nomeFabricante='$Fabricante' 
           AND operacao='$AnoOperacao'
           ORDER BY placaOnibus ASC LIMIT $inicio, $qnt_result_pg";
    }else if($escolha==4){           
           $query = "SELECT tbonibus.codOnibus,placaOnibus,prefixoOnibus,nomeCooperativa,nomeFabricante,nomeModelo,operacao,anoFabricacao 
           FROM tbonibus 
           INNER JOIN tbcooperativa 
           ON tbcooperativa.codCooperativa = tbonibus.codCooperativa 
           INNER JOIN tbmodelo 
           ON tbmodelo.codModelo = tbonibus.codModelo 
           INNER JOIN tbfabricante 
           ON tbfabricante.codFabricante = tbmodelo.codFabricante 
           WHERE nomeFabricante='$Fabricante'
           ORDER BY placaOnibus ASC LIMIT $inicio, $qnt_result_pg";
    }else if($escolha==5){           
           $query = "SELECT tbonibus.codOnibus,placaOnibus,prefixoOnibus,nomeCooperativa,nomeFabricante,nomeModelo,operacao,anoFabricacao 
           FROM tbonibus 
           INNER JOIN tbcooperativa 
           ON tbcooperativa.codCooperativa = tbonibus.codCooperativa 
           INNER JOIN tbmodelo 
           ON tbmodelo.codModelo = tbonibus.codModelo 
           INNER JOIN tbfabricante 
           ON tbfabricante.codFabricante = tbmodelo.codFabricante 
           WHERE nomeFabricante='$Fabricante' 
           AND tbmodelo.codModelo='$Modelo' 
           AND anoFabricacao='$AnoFabricacao'
           ORDER BY placaOnibus ASC LIMIT $inicio, $qnt_result_pg";
    }else if($escolha==6){           
           $query = "SELECT tbonibus.codOnibus,placaOnibus,prefixoOnibus,nomeCooperativa,nomeFabricante,nomeModelo,operacao,anoFabricacao 
           FROM tbonibus 
           INNER JOIN tbcooperativa 
           ON tbcooperativa.codCooperativa = tbonibus.codCooperativa 
           INNER JOIN tbmodelo 
           ON tbmodelo.codModelo = tbonibus.codModelo 
           INNER JOIN tbfabricante 
           ON tbfabricante.codFabricante = tbmodelo.codFabricante 
           WHERE nomeFabricante='$Fabricante' 
           AND tbmodelo.codModelo='$Modelo' 
           AND operacao='$AnoOperacao'
           ORDER BY placaOnibus ASC LIMIT $inicio, $qnt_result_pg";
    }else if($escolha==7){           
           $query = "SELECT tbonibus.codOnibus,placaOnibus,prefixoOnibus,nomeCooperativa,nomeFabricante,nomeModelo,operacao,anoFabricacao 
           FROM tbonibus 
           INNER JOIN tbcooperativa 
           ON tbcooperativa.codCooperativa = tbonibus.codCooperativa 
           INNER JOIN tbmodelo 
           ON tbmodelo.codModelo = tbonibus.codModelo 
           INNER JOIN tbfabricante 
           ON tbfabricante.codFabricante = tbmodelo.codFabricante 
           WHERE anoFabricacao='$AnoFabricacao' 
           AND operacao='$AnoOperacao'
           ORDER BY placaOnibus ASC LIMIT $inicio, $qnt_result_pg";
    }else if($escolha==8){           
           $query = "SELECT tbonibus.codOnibus,placaOnibus,prefixoOnibus,nomeCooperativa,nomeFabricante,nomeModelo,operacao,anoFabricacao 
           FROM tbonibus 
           INNER JOIN tbcooperativa 
           ON tbcooperativa.codCooperativa = tbonibus.codCooperativa 
           INNER JOIN tbmodelo 
           ON tbmodelo.codModelo = tbonibus.codModelo 
           INNER JOIN tbfabricante 
           ON tbfabricante.codFabricante = tbmodelo.codFabricante 
           WHERE anoFabricacao='$AnoFabricacao' 
           ORDER BY placaOnibus ASC LIMIT $inicio, $qnt_result_pg";
    }else if($escolha==9){           
           $query = "SELECT tbonibus.codOnibus,placaOnibus,prefixoOnibus,nomeCooperativa,nomeFabricante,nomeModelo,operacao,anoFabricacao 
           FROM tbonibus 
           INNER JOIN tbcooperativa 
           ON tbcooperativa.codCooperativa = tbonibus.codCooperativa 
           INNER JOIN tbmodelo 
           ON tbmodelo.codModelo = tbonibus.codModelo 
           INNER JOIN tbfabricante 
           ON tbfabricante.codFabricante = tbmodelo.codFabricante 
           WHERE operacao='$AnoOperacao'
           ORDER BY placaOnibus ASC LIMIT $inicio, $qnt_result_pg";
    }else if($escolha==10){
           $query = "SELECT tbonibus.codOnibus,placaOnibus,prefixoOnibus,nomeCooperativa,nomeFabricante,nomeModelo,operacao,anoFabricacao 
           FROM tbonibus 
           INNER JOIN tbcooperativa 
           ON tbcooperativa.codCooperativa = tbonibus.codCooperativa 
           INNER JOIN tbmodelo 
           ON tbmodelo.codModelo = tbonibus.codModelo 
           INNER JOIN tbfabricante 
           ON tbfabricante.codFabricante = tbmodelo.codFabricante 
           WHERE anoFabricacao='$AnoFabricacao'
           AND nomeFabricante='$Fabricante'
           ORDER BY placaOnibus ASC LIMIT $inicio, $qnt_result_pg";
    }else if($escolha==11){
           $query = "SELECT tbonibus.codOnibus,placaOnibus,prefixoOnibus,nomeCooperativa,nomeFabricante,nomeModelo,operacao,anoFabricacao 
           FROM tbonibus 
           INNER JOIN tbcooperativa 
           ON tbcooperativa.codCooperativa = tbonibus.codCooperativa 
           INNER JOIN tbmodelo 
           ON tbmodelo.codModelo = tbonibus.codModelo 
           INNER JOIN tbfabricante 
           ON tbfabricante.codFabricante = tbmodelo.codFabricante 
           WHERE nomeFabricante='$Fabricante'
           AND tbmodelo.codModelo='$Modelo'
           ORDER BY placaOnibus ASC LIMIT $inicio, $qnt_result_pg";
    }
    
    $insert = mysqli_query($connect,$query);
    if($insert){
    ?>
    <table id = "result" class="table table-striped" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                
                                <th>Placa</th>

                                <th>Prefixo</th>
                                <th>Modelo</th>

                                <th>Fabricante</th>

                                <th>Cooperativa</th>
                                <th>Ano de Fabricação</th>

                                <th>Operação</th>
    
                                <th class="actions">Ações</th>
                             </tr>
                        </thead>
                        <tbody>
                            <?php
                             echo"<meta charset='utf-8'>"; 
                                 $result = mysqli_query($connect,$query);
                                 
                                 while($element = mysqli_fetch_array($insert)){
                                
                                
                                
                                
                            echo"<tr>
                                <td data-title='placaOnibus'>".$element['placaOnibus']."</td>

                                <td data-title='prefixoOnibus'>".$element['prefixoOnibus']."</td>   
                                <td data-title='nomeModelo' id='limite'>".$element['nomeModelo']."</td>

                                <td data-title='nomeFabricante' id='limite'>".$element['nomeFabricante']."</td>

                                <td data-title='nomeCooperativa'>".$element['nomeCooperativa']."</td>
                                <td data-title='anoFabricacao'>".$element['anoFabricacao']."</td>

                                <td data-title='operacao'>".$element['operacao']."</td>

                                <td class='actions'>
                                    

                        <a href='../../Function/Relatorio/Especifico/espOnibus.php?codOnibus=" . $element['codOnibus'] . "'><img src='../../../img/print.png'></a>
                        <a href='../Edita/editaOnibus.php?codOnibus=" . $element['codOnibus'] . "'><img src='../../../img/edit.png'></a>
                        <a onclick='deletar($codOnibus)'><img src='../../../img/close.png'></a>
                                </td>

                                </tr>";                             
                            }
                                echo"
                                <script language='javascript' type='text/javascript'>

                                function deletar(cod){

                                swal({
                                  title: 'Tem certeza que deseja excluir?',
                                  text: 'Uma vez deletado, você não poderá recuperar este registro!',
                                  icon: 'warning',
                                  buttons: true,
                                  dangerMode: true,
                                })
                                .then((willDelete) => {
                                  if (willDelete) {
                                    swal({
                                    title: 'Deletado com sucesso!', 
                                    icon: 'success',
                                    }).then((value) => { window.location.href='../../Function/Deletar/deletarOnibus.php?codOnibus='+cod+';'});

                                  } else {
                                    
                                  }
                                });
                                }
                            </script>";
                            $result_pg = "SELECT COUNT(placaOnibus) AS num_result FROM tbonibus";
                            $resultado_pg = mysqli_query($connect, $result_pg);
                            $row_pg = mysqli_fetch_assoc($resultado_pg);
                            $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
                            $max_links = 1;
                        ?>
                        </tbody>
                     </table>
<?php

    }else{
         echo"<script language='javascript' type='text/javascript'> swal('Busca não efetuada!', ' ','error');</script>";
    }
        
    
?>