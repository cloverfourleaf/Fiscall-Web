  <?php
    /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $escolha = $_POST["escolha"];
    $Fiscal  = $_POST["Fiscal"];//filter_input(INPUT_POST, 'Fabricante', FILTER_SANITIZE_STRING);
    $Motorista  = $_POST['Motorista'];
    $Linha  = $_POST['Linha'];
    $Onibus  = $_POST['Onibus'];
    $Chegada  = $_POST['Chegada'];
    $ChegadaAte  = $_POST['ChegadaAte'];
    $Previsto  = $_POST['Previsto'];
    $PrevistoAte  = $_POST['PrevistoAte'];
    $Status  = $_POST['Status'];
    $Saida  = $_POST['Saida'];
    $SaidaAte  = $_POST['SaidaAte'];
    
    $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
    $qnt_result_pg = 10;
    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
  
  if($escolha==1){
    
    $query = "SELECT * FROM tbgerenciamentolinha 
    INNER JOIN tbalocacao ON tbalocacao.codAlocacao = tbgerenciamentolinha.codAlocacao 
    INNER JOIN tbturno ON tbturno.codTurno = tbalocacao.codTurno 
    INNER JOIN tbonibus ON tbonibus.codOnibus = tbalocacao.codOnibus  
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario 
    INNER JOIN tblinha ON tblinha.codLinha = tbalocacao.codLinha";
    $query2 = "SELECT nomeFuncionario FROM tbgerenciamentolinha 
    INNER JOIN tbmonitoramento ON tbmonitoramento.codMonitoramento = tbgerenciamentolinha.codMonitoramento 
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbmonitoramento.codFuncionario";
    }
    else if($escolha==2){
    
    $query = "SELECT * FROM tbgerenciamentolinha 
    INNER JOIN tbalocacao ON tbalocacao.codAlocacao = tbgerenciamentolinha.codAlocacao 
    INNER JOIN tbturno ON tbturno.codTurno = tbalocacao.codTurno 
    INNER JOIN tbonibus ON tbonibus.codOnibus = tbalocacao.codOnibus  
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario 
    INNER JOIN tblinha ON tblinha.codLinha = tbalocacao.codLinha 
    WHERE nomeFuncionario like '$Motorista'";
    $query2 = "SELECT nomeFuncionario FROM tbgerenciamentolinha 
    INNER JOIN tbmonitoramento ON tbmonitoramento.codMonitoramento = tbgerenciamentolinha.codMonitoramento 
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbmonitoramento.codFuncionario
    WHERE nomeFuncionario like '$Fiscal'";
    }else if($escolha==3){
    
    $query = "SELECT * FROM tbgerenciamentolinha 
    INNER JOIN tbalocacao ON tbalocacao.codAlocacao = tbgerenciamentolinha.codAlocacao 
    INNER JOIN tbturno ON tbturno.codTurno = tbalocacao.codTurno 
    INNER JOIN tbonibus ON tbonibus.codOnibus = tbalocacao.codOnibus  
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario 
    INNER JOIN tblinha ON tblinha.codLinha = tbalocacao.codLinha
    WHERE horaioChegada BETWEEN '$Chegada%' AND '$ChegadaAte'
    AND horarioPrevisto BETWEEN '$Previsto%' AND '$PrevistoAte'
    AND horarioSaida BETWEEN '$Saida%' AND '$SaidaAte%'";
    $query2 = "SELECT nomeFuncionario FROM tbgerenciamentolinha 
    INNER JOIN tbmonitoramento ON tbmonitoramento.codMonitoramento = tbgerenciamentolinha.codMonitoramento 
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbmonitoramento.codFuncionario
    WHERE horaioChegada BETWEEN '$Chegada%' AND '$ChegadaAte%'
    AND horarioPrevisto BETWEEN '$Previsto%' AND '$PrevistoAte%'
    AND horarioSaida BETWEEN '$Saida%' AND '$SaidaAte%'";
    }
    else if($escolha==4){
    
    $query = "SELECT * FROM tbgerenciamentolinha 
    INNER JOIN tbalocacao ON tbalocacao.codAlocacao = tbgerenciamentolinha.codAlocacao 
    INNER JOIN tbturno ON tbturno.codTurno = tbalocacao.codTurno 
    INNER JOIN tbonibus ON tbonibus.codOnibus = tbalocacao.codOnibus  
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario 
    INNER JOIN tblinha ON tblinha.codLinha = tbalocacao.codLinha
    WHERE horarioChegada BETWEEN '$Chegada%' AND '$ChegadaAte%'";
    $query2 = "SELECT nomeFuncionario FROM tbgerenciamentolinha 
    INNER JOIN tbmonitoramento ON tbmonitoramento.codMonitoramento = tbgerenciamentolinha.codMonitoramento 
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbmonitoramento.codFuncionario
    WHERE horarioChegada BETWEEN '$Chegada%' AND '$ChegadaAte%'";
    }else if($escolha==5){
    
    $query = "SELECT * FROM tbgerenciamentolinha 
    INNER JOIN tbalocacao ON tbalocacao.codAlocacao = tbgerenciamentolinha.codAlocacao 
    INNER JOIN tbturno ON tbturno.codTurno = tbalocacao.codTurno 
    INNER JOIN tbonibus ON tbonibus.codOnibus = tbalocacao.codOnibus  
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario 
    INNER JOIN tblinha ON tblinha.codLinha = tbalocacao.codLinha
    WHERE horarioPrevisto BETWEEN '$Previsto' AND '$PrevistoAte'";
    $query2 = "SELECT nomeFuncionario FROM tbgerenciamentolinha 
    INNER JOIN tbmonitoramento ON tbmonitoramento.codMonitoramento = tbgerenciamentolinha.codMonitoramento 
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbmonitoramento.codFuncionario
    WHERE horarioPrevisto BETWEEN '$Previsto%' AND '$PrevistoAte%'";
    }else if($escolha==6){
    
    $query = "SELECT * FROM tbgerenciamentolinha 
    INNER JOIN tbalocacao ON tbalocacao.codAlocacao = tbgerenciamentolinha.codAlocacao 
    INNER JOIN tbturno ON tbturno.codTurno = tbalocacao.codTurno 
    INNER JOIN tbonibus ON tbonibus.codOnibus = tbalocacao.codOnibus  
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario 
    INNER JOIN tblinha ON tblinha.codLinha = tbalocacao.codLinha
    WHERE horarioSaida BETWEEN '$Saida' AND '$SaidaAte%'";
    $query2 = "SELECT nomeFuncionario FROM tbgerenciamentolinha 
    INNER JOIN tbmonitoramento ON tbmonitoramento.codMonitoramento = tbgerenciamentolinha.codMonitoramento 
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbmonitoramento.codFuncionario
    WHERE horarioSaida BETWEEN '$Saida%' AND '$SaidaAte%'";
    }else if($escolha==7){
    
    $query = "SELECT * FROM tbgerenciamentolinha 
    INNER JOIN tbalocacao ON tbalocacao.codAlocacao = tbgerenciamentolinha.codAlocacao 
    INNER JOIN tbturno ON tbturno.codTurno = tbalocacao.codTurno 
    INNER JOIN tbonibus ON tbonibus.codOnibus = tbalocacao.codOnibus  
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario 
    INNER JOIN tblinha ON tblinha.codLinha = tbalocacao.codLinha
    WHERE horaioChegada = '$Chegada%'";
    $query2 = "SELECT nomeFuncionario FROM tbgerenciamentolinha 
    INNER JOIN tbmonitoramento ON tbmonitoramento.codMonitoramento = tbgerenciamentolinha.codMonitoramento 
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbmonitoramento.codFuncionario
    WHERE horaioChegada = '$Chegada%'";
    }else if($escolha==8){
    
    $query = "SELECT * FROM tbgerenciamentolinha 
    INNER JOIN tbalocacao ON tbalocacao.codAlocacao = tbgerenciamentolinha.codAlocacao 
    INNER JOIN tbturno ON tbturno.codTurno = tbalocacao.codTurno 
    INNER JOIN tbonibus ON tbonibus.codOnibus = tbalocacao.codOnibus  
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario 
    INNER JOIN tblinha ON tblinha.codLinha = tbalocacao.codLinha
    WHERE horarioPrevisto = '$Previsto%'";
    $query2 = "SELECT nomeFuncionario FROM tbgerenciamentolinha 
    INNER JOIN tbmonitoramento ON tbmonitoramento.codMonitoramento = tbgerenciamentolinha.codMonitoramento 
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbmonitoramento.codFuncionario
    WHERE horarioPrevisto = '$Previsto%'";
    }else if($escolha==9){
    
    $query = "SELECT * FROM tbgerenciamentolinha 
    INNER JOIN tbalocacao ON tbalocacao.codAlocacao = tbgerenciamentolinha.codAlocacao 
    INNER JOIN tbturno ON tbturno.codTurno = tbalocacao.codTurno 
    INNER JOIN tbonibus ON tbonibus.codOnibus = tbalocacao.codOnibus  
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario 
    INNER JOIN tblinha ON tblinha.codLinha = tbalocacao.codLinha
    WHERE horarioSaida = '$Saida%'";
    $query2 = "SELECT nomeFuncionario FROM tbgerenciamentolinha 
    INNER JOIN tbmonitoramento ON tbmonitoramento.codMonitoramento = tbgerenciamentolinha.codMonitoramento 
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbmonitoramento.codFuncionario
    WHERE horarioSaida = '$Saida%'";
    } 
    
    $insert = mysqli_query($connect,$query);
    $insert2 = mysqli_query($connect,$query2);
    if($insert && $insert2){
    echo"dhsdhasjdhaskjdhjskahdkjashdkjashdkjsahdksaj";
    ?>
    
 <table id = "result" class="table table-striped" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                
                                <th>Fiscal</th>
                                <th>Motorista</th>
                                <th>Linha</th>
                                <th>Prefixo</th>
                                <th>Chegada</th>
                                <th>Previsto</th>
                                <th>Status</th>
                                <th>Saída</th>

                                <th></th>
                                <th class="actions">Ações</th> 
                                
                             </tr>
                        </thead>
                        <tbody>
                               <?php
                             echo"<meta charset='utf-8'>";  
                            /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
                            
                            $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
                            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                            $qnt_result_pg = 10;
                            $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
                            $sql = "SELECT * FROM tbgerenciamentolinha ORDER BY codGerenciamentoLinha DESC LIMIT $inicio, $qnt_result_pg";
                            $result = mysqli_query($connect,$sql);
                            
                            while($element = mysqli_fetch_array($result)){
                                $codMonitoramento = $element['codMonitoramento'];
                                $codAlocacao = $element['codAlocacao'];
                                $codTurno = $element['codTurno'];
                                $horarioChegada = $element['horarioChegada'];
                                $horarioPrevisto= $element['horarioPrevisto'];
                                $statusViagem= $element['statusViagem'];
                                $horarioSaida= $element['horarioSaida'];
                                
                                //----------------------Monitoramento---------------//
                                $sql_Monitoramento = "SELECT * FROM tbmonitoramento WHERE codMonitoramento = $codMonitoramento";
                                $result_Monitoramento = mysqli_query($connect, $sql_Monitoramento);
                                $element_Monitoramento = mysqli_fetch_array($result_Monitoramento);
                                $codFuncionario = $element_Monitoramento['codFuncionario'];
                                $codPonto = $element_Monitoramento['codPonto'];
                                
                                
                             
                                //--------------------Fiscal-----------------//
                                
                                $sql_Funcionario = "SELECT nomeFuncionario FROM tbfuncionario WHERE codFuncionario = $codFuncionario";
                                $result_Funcionario = mysqli_query($connect, $sql_Funcionario);
                                $element_Funcionario = mysqli_fetch_array($result_Funcionario);
                                $nomeFuncionario = $element_Funcionario['nomeFuncionario'];
                            
                                //-------------------Alocacao-----------//
                                $sql_Alocacao = "SELECT codOnibus,codLinha,codFuncionario FROM tbalocacao WHERE codAlocacao = $codAlocacao";
                                $result_Alocacao = mysqli_query($connect, $sql_Alocacao);
                                $element_Alocacao = mysqli_fetch_array($result_Alocacao);
                                $codOnibus = $element_Alocacao['codOnibus'];
                                $codLinha = $element_Alocacao['codLinha'];
                                $codMotorista = $element_Alocacao['codFuncionario'];
                                
                                //--------------------Linha---------------------//
                                
                                $sql_Linha = "SELECT numLinha FROM tblinha WHERE codLinha = $codLinha";
                                $result_Linha = mysqli_query($connect, $sql_Linha);
                                $element_Linha = mysqli_fetch_array($result_Linha);
                                $numLinha = $element_Linha['numLinha'];
                                
                                
                                //--------------------Motorista-----------------//

                                $sql_Motorista = "SELECT nomeFuncionario FROM tbfuncionario WHERE codFuncionario = $codMotorista";
                                $result_Motorista = mysqli_query($connect, $sql_Motorista);
                                $element_Motorista = mysqli_fetch_array($result_Motorista);
                                $nomeMotorista = $element_Motorista['nomeFuncionario'];

                                
                                //-----------------Prefixo--------------//
                                
                                $sql_Onibus = "SELECT prefixoOnibus FROM tbonibus WHERE codOnibus = $codOnibus";
                                $result_Onibus = mysqli_query($connect, $sql_Onibus);
                                $element_Onibus = mysqli_fetch_array($result_Onibus);
                                $prefixoOnibus = $element_Onibus['prefixoOnibus'];
                                
                                
                                //-----------------Turno---------------------//
                            
                                    echo"<tr>
                                        <td data-title='nomeFuncionario' id='limite'>$nomeFuncionario</td>
                                        <td data-title='nomeMotorista' id='limite'>$nomeMotorista</td>
                                        <td data-title='numLinha'>$numLinha</td>
                                        <td data-title='prefixo'>$prefixoOnibus</td>
                                        <td data-title='horarioChegada'>$horarioChegada</td>
                                        <td data-title='horarioPrevisto'>$horarioPrevisto</td>
                                        <td data-title='statusViagem'>$statusViagem</td>
                                        <td data-title='horarioSaida'>$horarioSaida</td>
                                       
                                        <td class='actions'></td>
                                        <td>
                                        <a href='../../Function/Relatorio/Especifico/espViagem.php?codGerenciamentoLinha="  . $element['codGerenciamentoLinha'] .  "' target='_blank' data-toggle='tooltip' data-placement='right' title='Gerar relatório específico'><img src='../../../img/print.png'></a>
                                        </td>
                                    </tr>";    
                            }
                            $result_pg = "SELECT COUNT(codGerenciamentoLinha) AS num_result FROM tbgerenciamentolinha";
                            $resultado_pg = mysqli_query($connect, $result_pg);
                            $row_pg = mysqli_fetch_assoc($resultado_pg);
                            $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
                            $max_links = 1;
                        ?>
                        </tbody>
                     </table>
<?php

    }else{
         echo"$query  ,   $query2";
         echo"<script language='javascript' type='text/javascript'> swal('Busca não efetuada!', ' ','error');</script>";
    }
        
    
?>