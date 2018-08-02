<?php require_once('../../../../verificaS.php');session_start(); $nomeUsuario= $_SESSION['nomeUsuario'];              $nome = explode(" ",$nomeUsuario);             $nomeUsuario = $nome[0]; ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <script src="../../../bootstrap/js/alert.js"></script>
        <meta charset="utf-8">
        
        <title>Fiscall</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="../../../bootstrap/css/bootstrap.min.css" rel = "stylesheet">
        <link rel="shortcut icon"  href="../../../img/icone.png" type="image/x-png/"> 
        <link rel="stylesheet" href="../../../css/Smith.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        
          <script>
        
              var i=0;
                                
             </script>
        
      
    </head>
    
    <body>
        
        <script src="../../../bootstrap/js/jquery.min.js"></script>
        <script src="../../../bootstrap/js/bootstrap.min.js"></script>
        <script src="../../../bootstrap/js/alert.js"></script>    
        
        <div id="main" class="container-fluid">
            <div id="top" class="row">
                <div class="col-md-2">
                    
                    <div class="ArrumaSE">
                    <h2>Alocação</h2>
                    </div>
                    
                </div>
                <?php echo "<a href='../../Function/Relatorio/Geral/grlAlocacao.php' target='_blank' class='btn btn-warning pull-left h2' data-toggle='tooltip' data-placement='bottom' title='Gerar um relatório geral de alocações' ><img src='../../../img/print.png' href='#'></a>";?>
                <div class="col-md-6">
                <div id="buscaFiscall">
                    <div class="input-group h2">
                        <input id = "buscaF" name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Alocação">
                        <script> 
                        $("#buscaF").keyup(function() {
                        var busca  = $("#buscaF").val();
                        $.post('../Busca/buscaAlocacaoF.php', {busca: busca}, function(data){
                            $("#resultF").html(data);                            
                                });
                            });
                        </script>
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit" onclick="trocarA()">
                                <span class="glyphicon glyphicon-refresh"></span>
                            </button>
                            </span>
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit" onclick="abrirF()">
                                <span class="glyphicon glyphicon-filter"></span>
                            </button>
                        </span>

                    </div>
                </div>
                <div id="buscaMotorista">
                    <div class="input-group h2">
                        <input id = "busca" name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Alocação">
                        <script> 
                        $("#busca").keyup(function() {
                        var busca  = $("#busca").val();
                        $.post('../Busca/buscaAlocacao.php', {busca: busca}, function(data){
                            $("#result").html(data);                            
                                });
                            });
                        </script>
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit" onclick="trocarA()">
                                <span class="glyphicon glyphicon-refresh"></span>
                            </button>
                        </span>
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit" onclick="abrir()">
                                <span class="glyphicon glyphicon-filter"></span>
                            </button>
                        </span>

                    </div>
                </div>
            </div>

                <div class="adicionaAlocacao">
                  <button type="button" class="btn btn-light" href="../Adiciona/adicionaAlocacaoF.php" data-toggle="tooltip" data-placement="bottom" title="Alocar um fiscal">  <a href="../Adiciona/adicionaAlocacaoF.php" data-toggle="tooltip" data-placement="bottom" title="Alocar um fiscal"><img src='../../../img/prancheta.png'></a></button>
                    <button type="button" class="btn btn-light"> <a href="../Adiciona/adicionaAlocacao.php" data-toggle="tooltip" data-placement="bottom" title="Alocar um motorista" ><img src='../../../img/volante.png'></a></button>
                </div>
            </div> <!-- /#top -->
             

                <!------Chama Linha-------->

                    <script>
                        function chamaLinha() {
                            $(document).ready(function() {
                                $('#ModalLinha').modal('show');
                            });
                        }
                    </script>



            <div id="tdFiscal">
                           <div id="divEsconderF">
                <div id="list" class="row">
                    <div class="form-group col-md-3">
                        <label class="form-check-label">
                           Fiscal
                        </label>
                        <div class="input-group">
                           <span class="input-group-addon" >
                              <input type="checkbox" aria-label="..."id='chkFiscal'>
                           </span>
                           <input class="form-control" placeholder="João" type="text" readonly id="inpFiscal">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalFiscal" onclick="chamaFiscal()"><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-2">
                        <label class="form-check-label">
                           Linha
                        </label>
                        <div class="input-group">
                           <span class="input-group-addon" >
                              <input type="checkbox" aria-label="..."id='chkLinha'>
                           </span>
                           <input class="form-control" placeholder="Itaquera" type="text" readonly id="inpLinha">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalLinha" onclick="chamaLinha()"><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-2">
                        <label class="form-check-label">
                           Turno
                        </label>
                        <div class="input-group">
                           <span class="input-group-addon" >
                              <input type="checkbox" aria-label="..."id='chkTurno'>
                           </span>
                           <select disabled id="inpTurno" name="codTurno" class="form-control">
                            
                            <option value="">
                            Selecione...
                            </option>
                            <?php   
                            /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
                            $sql = "SELECT codTurno,descricaoTurno FROM tbturno";
                            $result = mysqli_query($connect,$sql);
                            while($element = mysqli_fetch_array($result)){
                                $codTurno = $element['codTurno'];
                                $descricaoTurno = $element['descricaoTurno'];
                                echo "<option value = '$codTurno'>$descricaoTurno</option>";
                            }
                            ?>
                        </select>                          
                        </div>
                    </div>
                    
                    <div class="form-group col-md-2">
                        <label class="form-check-label">
                           Status
                        </label>
                        <div class="input-group">
                           <span class="input-group-addon" >
                              <input type="checkbox" aria-label="..."id='chkStatus'>
                           </span>
                           <select disabled id="inpStatus" name="codTurno" class="form-control">
                            
                            <option value="">
                            Selecione...
                            </option>
                            <?php   
                            /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
                            $sql = "SELECT DISTINCT statusAlocacao FROM tbalocacao";
                            $result = mysqli_query($connect,$sql);
                            while($element = mysqli_fetch_array($result)){
                                $statusAlocacao = $element['statusAlocacao'];
                                 echo "<option value = '$statusAlocacao'>$statusAlocacao</option>";
                            }
                            ?>
                        </select>
                          
                        </div>
                    </div>

                </div>
                <div class="row" id="aa">
                    <div class="form-group col-md-2">
                        <label class="form-check-label">
                           Data de Alocação
                        </label>
                        <div class="input-group">
                           <span class="input-group-addon" >
                              <input type="checkbox" aria-label="..."id='chkAnoA'>
                           </span>
                           <input class="form-control" placeholder="01/01/2000" type="date" disabled id="inpAnoA">
                        </div>
                    </div>
                    <div id="ate">
                       <div class="form-group col-md-2">
                           <label class="form-check-label">
                                Até
                            </label>
                       <div class="input-group">
                            <input class="form-control" placeholder="01/01/2000" type="date" readonly id="inpAnoB">
                       </div>
                       </div>
                    </div>
                    
                    <div class="form-group col-md-2">
                        <label class="form-check-label">
                           Data de Validade
                        </label>
                        <div class="input-group">
                           <span class="input-group-addon" >
                              <input type="checkbox" aria-label="..."id='chkAnoV'>
                           </span>
                           <input class="form-control" placeholder="01/01/2000" type="date" disabled id="inpAnoV">
                        </div>
                    </div>
                    <div id="ateB">
                    <div class="form-group col-md-2">
                        <label class="form-check-label">
                           Até
                        </label>
                        <div class="input-group">
                           <input class="form-control" placeholder="01/01/2000" type="date" readonly id="inpAnoVB">
                        </div>
                    </div>
                    </div>
                   </div>
                   <button id="buscaEs" class="btn btn-primary" type="submit" onclick="bFiltro()">
                           <span class="glyphicon glyphicon-search"></span>
                      </button> <!-- href='../../Function/Relatorio/Cruzada/czdOnibus.php' target='_blank'-->
                      <a id="relatorioI" class='btn btn-warning pull-left h2' onclick="relatorioCruzado()"><img src='../../../img/print.png'></a>
             </div>
               <div class="row">
                 <hr/>
            
                <div class="table-responsive col-md-12">
                    <table id = "resultF" class="table table-striped" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                
                                <th>Nome do Fiscal</th>
                                <th>Linha</th>
                                <th> </th>
                                <th>Inicio</th>
                                <th>Validade</th>
                                <th>Turno</th>
                                <th>Status</th>
                        
                                
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
                            $sql = "SELECT * FROM tbalocacao
                            INNER JOIN tbturno
                            ON tbturno.codTurno = tbalocacao.codTurno
                            INNER JOIN tblinha
                            ON tblinha.codLinha = tbalocacao.codLinha
                            INNER JOIN tbfuncionario
                            ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario
                            INNER JOIN tbusuario
                            ON tbfuncionario.codUsuario = tbusuario.codUsuario
                            INNER JOIN tbnivelusuario
                            ON tbnivelusuario.codNivelUsuario = tbusuario.codNivelUsuario
                            WHERE descricaoNivelUsuario LIKE 'Fiscal'
                            ORDER BY fimAlocacao ASC LIMIT $inicio, $qnt_result_pg";
                            $result = mysqli_query($connect,$sql);
                           
                            
                            
                            while($element = mysqli_fetch_array($result)){
                                $codAlocacao = $element['codAlocacao'];
                                $nomeFuncionario = $element['nomeFuncionario'];
                                $numLinha= $element['numLinha'];
                                $nomeLinha = $element['nomeLinha'];
                                $codFuncionario = $element['codFuncionario'];
                                $inicioAlocacao = $element['inicioAlocacao'];
                                $inicioAlocacao = implode("/", array_reverse(explode("-", $inicioAlocacao)));
                                $fimAlocacao = $element['fimAlocacao'];
                                $fimAlocacao = implode("/", array_reverse(explode("-", $fimAlocacao)));
                                $descricaoTurno = $element['descricaoTurno'];
                                $statusAlocacao = $element['statusAlocacao'];
                                
                                
                                
                                
                                
                                //=============================Atualização====================================//
                                $verificaData = mysqli_query($connect,"UPDATE tbalocacao SET statusAlocacao = 'Disponível' WHERE CURRENT_DATE  >= fimAlocacao");
                                $verificaD = mysqli_query($connect,"UPDATE tbalocacao SET statusAlocacao = 'Indisponível' WHERE CURRENT_DATE < fimAlocacao");
                                
                                
                            echo"<tr>
                                    <td data-title='nomeFuncionario' id='limite'>$nomeFuncionario</td>
                                    <td data-title='numLinha' id='limite'>$numLinha</td>
                                    <td data-title='nomeLinha' id='limite'>$nomeLinha</td>
                                    <td data-title='inicioAlocacao'>$inicioAlocacao</td>
                                    <td data-title='fimAlocacao'>$fimAlocacao</td>
                                    <td data-title='descricaoTurno'>$descricaoTurno</td>
                                    <td data-title='statusAlocacao'>$statusAlocacao</td>
            
            
                                    <td class='actions'>
                                    
                                    <a href='../../Function/Relatorio/Especifico/espAlocacao.php?codAlocacao=" . $element['codAlocacao'] . "' target='_blank'><img src='../../../img/print.png' href='#'></a>
                                    <a href='../Edita/editaAlocacaoF.php?codAlocacao=" . $element['codAlocacao'] . "'><img src='../../../img/edit.png' href='#'></a>
                                </td>
                                </tr>";
                            }
                            $result_pg = "SELECT COUNT(codAlocacao) AS num_result FROM tbalocacao                            
                            INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario 
                            INNER JOIN tbusuario ON tbfuncionario.codUsuario = tbusuario.codUsuario 
                            INNER JOIN tbnivelusuario ON tbnivelusuario.codNivelUsuario = tbusuario.codNivelUsuario
                            WHERE descricaoNivelUsuario like 'Fiscal'";
                            $resultado_pg = mysqli_query($connect, $result_pg);
                            $row_pg = mysqli_fetch_assoc($resultado_pg);
                            $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
                            $max_links = 1;
                        ?>
                        </tbody>
                     </table>

                 </div>
           </div>
            </div>

              <div id="tdMotorista" class="tdMotorista">
               <div id="divEsconder">
                <div id="list" class="row">
                    <div class="form-group col-md-3">
                        <label class="form-check-label">
                           Motorista
                        </label>
                        <div class="input-group">
                           <span class="input-group-addon" >
                              <input type="checkbox" aria-label="..."id='chkMotorista'>
                           </span>
                           <input class="form-control" placeholder="João" type="text" readonly id="inpMotorista">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalMotorista" onclick="chamaMotorista()"><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label class="form-check-label">
                           Onibus
                        </label>
                        <div class="input-group">
                           <span class="input-group-addon" >
                              <input type="checkbox" aria-label="..."id='chkOnibus'>
                           </span>
                           <input class="form-control" placeholder="AAA-0000" type="text" readonly id="inpOnibus">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalOnibus" onclick="chamaOnibus()"><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-2">
                        <label class="form-check-label">
                           Linha
                        </label>
                        <div class="input-group">
                           <span class="input-group-addon" >
                              <input type="checkbox" aria-label="..."id='chkLinha'>
                           </span>
                           <input class="form-control" placeholder="Itaquera" type="text" readonly id="inpLinha">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalLinha" onclick="chamaLinha()"><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-2">
                        <label class="form-check-label">
                           Turno
                        </label>
                        <div class="input-group">
                           <span class="input-group-addon" >
                              <input type="checkbox" aria-label="..."id='chkTurno'>
                           </span>
                            <select disabled id="inpTurno" name="codTurno" class="form-control">
                            
                            <option value="">
                            Selecione...
                            </option>
                            <?php   
                            /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
                            $sql = "SELECT codTurno,descricaoTurno FROM tbturno";
                            $result = mysqli_query($connect,$sql);
                            while($element = mysqli_fetch_array($result)){
                                $codTurno = $element['codTurno'];
                                $descricaoTurno = $element['descricaoTurno'];
                                echo "<option value = '$codTurno'>$descricaoTurno</option>";
                            }
                            ?>
                        </select>                          
                        </div>
                    </div>
                    
                    <div class="form-group col-md-2">
                        <label class="form-check-label">
                           Status
                        </label>
                        <div class="input-group">
                           <span class="input-group-addon" >
                              <input type="checkbox" aria-label="..."id='chkStatus'>
                           </span>
                           <select disabled id="inpStatus" name="codTurno" class="form-control">
                            
                            <option value="">
                            Selecione...
                            </option>
                            <?php   
                            /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
                            $sql = "SELECT DISTINCT statusAlocacao FROM tbalocacao";
                            $result = mysqli_query($connect,$sql);
                            while($element = mysqli_fetch_array($result)){
                                $statusAlocacao = $element['statusAlocacao'];
                                 echo "<option value = '$statusAlocacao'>$statusAlocacao</option>";
                            }
                            ?>
                        </select>
                          
                        </div>
                    </div>

                </div>
                <div class="row" id="aa">
                    <div class="form-group col-md-2">
                        <label class="form-check-label">
                           Data de Alocação
                        </label>
                        <div class="input-group">
                           <span class="input-group-addon" >
                              <input type="checkbox" aria-label="..."id='chkAnoA'>
                           </span>
                           <input class="form-control" placeholder="01/01/2000" type="date" disabled id="inpAnoA">
                        </div>
                    </div>
                    <div id="ate">
                       <div class="form-group col-md-2">
                           <label class="form-check-label">
                                Até
                            </label>
                       <div class="input-group">
                            <input class="form-control" placeholder="01/01/2000" type="date" readonly id="inpAnoB">
                       </div>
                       </div>
                    </div>
                    
                    <div class="form-group col-md-2">
                        <label class="form-check-label">
                           Data de Validade
                        </label>
                        <div class="input-group">
                           <span class="input-group-addon" >
                              <input type="checkbox" aria-label="..."id='chkAnoV'>
                           </span>
                           <input class="form-control" placeholder="01/01/2000" type="date" disabled id="inpAnoV">
                        </div>
                    </div>
                    <div id="ateB">
                    <div class="form-group col-md-2">
                        <label class="form-check-label">
                           Até
                        </label>
                        <div class="input-group">
                           <input class="form-control" placeholder="01/01/2000" type="date" readonly id="inpAnoVB">
                        </div>
                    </div>
                    </div>
                </div>
             </div>
                           <div class="row">
                 <hr/>
                <div class="table-responsive col-md-12">
                    <table id = "result" class="table table-striped" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                
                                <th>Nome do Motorista</th>
                                <th>Prefixo</th>
                                <th>Placa</th>
                                <th>Linha</th>
                                <th> </th>
                                <th>Inicio</th>
                                <th>Validade</th>
                                <th>Turno</th>
                                <th>Status</th>
                        
                                
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
                            $sql = "SELECT * FROM tbalocacao
                            INNER JOIN tbturno ON tbturno.codTurno = tbalocacao.codTurno
                            INNER JOIN tbonibus ON tbonibus.codOnibus = tbalocacao.codOnibus
                            INNER JOIN tblinha ON tblinha.codLinha = tbalocacao.codLinha 
                            INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario 
                            INNER JOIN tbusuario ON tbfuncionario.codUsuario = tbusuario.codUsuario 
                            INNER JOIN tbnivelusuario ON tbnivelusuario.codNivelUsuario = tbusuario.codNivelUsuario
                            WHERE descricaoNivelUsuario like 'Motorista'
                            ORDER BY fimAlocacao ASC LIMIT $inicio, $qnt_result_pg";
                            $result = mysqli_query($connect,$sql);
                                                       
                            
                            
                            while($element = mysqli_fetch_array($result)){
                            
                                $codAlocacao = $element['codAlocacao'];
                                $codOninus = $element['codOninus'];
                                $nomeFuncionario = $element['nomeFuncionario'];
                                $prefixoOnibus = $element['prefixoOnibus'];
                                $placaOnibus = $element['placaOnibus'];
                                $numLinha= $element['numLinha'];
                                $nomeLinha = $element['nomeLinha'];
                                $codFuncionario = $element['codFuncionario'];
                                $inicioAlocacao = $element['inicioAlocacao'];
                                $inicioAlocacao = implode("/", array_reverse(explode("-", $inicioAlocacao)));
                                $fimAlocacao = $element['fimAlocacao'];
                                $fimAlocacao = implode("/", array_reverse(explode("-", $fimAlocacao)));
                                $descricaoTurno = $element['descricaoTurno'];
                                $statusAlocacao = $element['statusAlocacao'];
                                
                                
                                echo"
                                <script  type='text/javascript'>
                                
                                var ArrayStatus = document.querySelectorAll('.cor');
                                   
                                var Status = '$statusAlocacao';
                                 
                         
                                if(Status === 'Disponível'){
                                    ArrayStatus[i].style.color ='green';
                                    }
                                    
                                    else{
                                     ArrayStatus[i].style.color ='red';
                                    }
                                  i++;
                                     
                                </script>";
                                
                    
                                
                                
                                //=============================Atualização====================================//
                                $verificaData = mysqli_query($connect,"UPDATE tbalocacao SET statusAlocacao = 'Disponível' WHERE CURRENT_DATE  >= fimAlocacao");
                                
                                $verificaD = mysqli_query($connect,"UPDATE tbalocacao SET statusAlocacao = 'Indisponível' WHERE CURRENT_DATE < fimAlocacao");
                               

                                                    
                                
                            echo"<tr>
                                    <td data-title='nomeCooperativa' id='limite'>$nomeFuncionario</td>
                                    <td data-title='prefixoOnibus'>$prefixoOnibus</td>
                                    <td data-title='placaOnibus'>$placaOnibus</td>
                                    <td data-title='numLinha' id='limite'>$numLinha</td>
                                    <td data-title='nomeLinha' id='limite'>$nomeLinha</td>
                                    <td data-title='inicioAlocacao'>$inicioAlocacao</td>
                                    <td data-title='fimAlocacao'>$fimAlocacao</td>
                                    <td data-title='descricaoTurno' >$descricaoTurno</td>
                                    <td data-title='statusAlocacao' id='status' class='cor'><script>document.write(Status)</script></td>
            
            
                                    <td class='actions'>
                                    
                                    <a href='../../Function/Relatorio/Especifico/espAlocacao.php?codAlocacao=" . $element['codAlocacao'] . "' target='_blank' data-toggle='tooltip' data-placement='left' title='Gerar relatório especifico'><img src='../../../img/print.png' href='#'></a>
                                    <a href='../Edita/editaAlocacao.php?codAlocacao=" . $element['codAlocacao'] . "' data-toggle='tooltip' data-placement='left' title='Editar a alocação'><img src='../../../img/edit.png' href='#'></a>
                                </td>
                                </tr>";
                            }
                            $result_pg = "SELECT COUNT(codAlocacao) AS num_result FROM tbalocacao 
                            INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario 
                            INNER JOIN tbusuario ON tbfuncionario.codUsuario = tbusuario.codUsuario 
                            INNER JOIN tbnivelusuario ON tbnivelusuario.codNivelUsuario = tbusuario.codNivelUsuario
                            WHERE descricaoNivelUsuario like 'Motorista'";
                            $resultado_pg = mysqli_query($connect, $result_pg);
                            $row_pg = mysqli_fetch_assoc($resultado_pg);
                            $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
                            $max_links = 1;
                        ?>
                        </tbody>
                     </table>
                   </div>
                 </div>
             </div> <!-- /#list -->
            <div id="bottom" class="row">
                <div class="col-md-12">

                    <ul class="pagination">
                        
                        <li><a href="visualizaAlocacao.php?pagina=1">&lt; Primeira</a></li>
                        <?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                                    if($pag_ant >=1){
                                        echo "<li><a href='visualizaAlocacao.php?pagina=$pag_ant'>$pag_ant</a></li>";
                                    }
                                    echo"<li class='disable'><a> $pagina </a></li>";
                                }for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                                    if($pag_dep <= $quantidade_pg){
				                        echo "<li><a href='visualizaAlocacao.php?pagina=$pag_dep'>$pag_dep</a></li>";
                                    }
                                }
                                echo"<li class='next'><a href='visualizaAlocacao.php?pagina=$quantidade_pg' rel='next'>Ultima &gt;</a></li>";
                        ?>
                    </ul><!-- /.pagination -->

                </div>
            </div> <!-- /#bottom -->
        </div>  <!-- /#main -->
        
        <section class="Cima">    
            <div class="Bv">
                <div class="TxtInicio">
                    <a href="../../index.php" data-toggle="tooltip" data-placement="right" title="Tela inicial" > <h2>Olá, <?php echo $nomeUsuario;?></h2></a>
                </div>
                <div class="casa">
                    <a href="../../index.php" data-toggle="tooltip" data-placement="right" title="Tela inicial" > <img src="../../../img/CasaBranca.png" width="32px" height="32px"></a>
                </div>              
            </div>
                       
            <div class="divisaoPadrao">  
                <div class="txtPadrao">
                    <a href="../../Telas/Visualiza/visualizaPerfil.php" data-toggle="tooltip" data-placement="right" title="Alterar o seu perfil" ><h1>Perfil</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href="../../Telas/Visualiza/visualizaPerfil.php"data-toggle="tooltip" data-placement="right" title="Alterar o seu perfil" ><img src="../../../img/usuario.png"></a>
                </div>              
            </div>
            
            <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href="../../Telas/Visualiza/visualizaViagem.php" data-toggle="tooltip" data-placement="right" title="Consultar Viagens"><h1>Viagem</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href="../../Telas/Visualiza/visualizaViagem.php" data-toggle="tooltip" data-placement="right" title="Consultar Viagens" ><img src="../../../img/Viagem.png"></a>
                </div>
            </div>

            <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href="../../Telas/Visualiza/visualizaAlocacao.php" data-toggle="tooltip" data-placement="right" title="Consultar Alocações"><h1>Alocação</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href="../../Telas/Visualiza/visualizaAlocacao.php" data-toggle="tooltip" data-placement="right" title="Consultar Alocações"><img src="../../../img/Locacao.png"></a>
                </div>
            </div>
            
            <div class="divisaoPadrao">  
                <div class="txtPadrao">
                    <a href= "../../Telas/Visualiza/visualizaLinha.php" data-toggle="tooltip" data-placement="right" title="Consultar Linhas"><h1>Linha</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href= "../../Telas/Visualiza/visualizaLinha.php" data-toggle="tooltip" data-placement="right" title="Consultar Linhas"><img src="../../../img/linha.png"></a>
                </div>
            </div>
            <div class="divisaoPadrao">  
                <div class="txtPadrao">
                 <a href="../../Telas/Visualiza/visualizaOnibus.php" data-toggle="tooltip" data-placement="right" title="Consultar Ônibus"> <h1>Ônibus</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href="../../Telas/Visualiza/visualizaOnibus.php" data-toggle="tooltip" data-placement="right" title="Consultar Ônibus"><img src="../../../img/aaa.png"></a>
                </div>              
            </div>
            
            <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href = "../../Telas/Visualiza/visualizaFabricante.php" data-toggle="tooltip" data-placement="right" title="Consultar Fabricantes"><h1>Fabricante</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href = "../../Telas/Visualiza/visualizaFabricante.php" data-toggle="tooltip" data-placement="right" title="Consultar Fabricantes"><img src="../../../img/fabricante.png"></a>
                </div>
            </div>
            
            <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href = "../../Telas/Visualiza/visualizaModelo.php" data-toggle="tooltip" data-placement="right" title="Consultar Modelos"><h1>Modelo</h1></a>
                </div>'
                <div class="imgModelo">
                    <a href = "../../Telas/Visualiza/visualizaModelo.php" data-toggle="tooltip" data-placement="right" title="Consultar Modelos"> <img src="../../../img/modelo.png"> </a>
                </div>
            </div>
            
            <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href="../../Telas/Visualiza/visualizaFuncionario.php" data-toggle="tooltip" data-placement="right" title="Consultar Funcionários"> <h1>Funcionário</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href="../../Telas/Visualiza/visualizaFuncionario.php" data-toggle="tooltip" data-placement="right" title="Consultar Funcionários"> <img src="../../../img/Funcionario.png"></a>
                </div>  
            </div>
            
            <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href="../../Telas/Visualiza/visualizaCooperativa.php" data-toggle="tooltip" data-placement="right" title="Consultar Cooperativas"><h1>Cooperativa</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href="../../Telas/Visualiza/visualizaCooperativa.php" data-toggle="tooltip" data-placement="right" title="Consultar Cooperativas"><img src="../../../img/cooperativa.png"></a>
                </div>
            </div>

            
            <div class="separador"> </div>
            
             <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href = "../../../../sair.php" data-toggle="tooltip" data-placement="right" title="Sair do sistema"> <h1>Sair</h1> </a>
                </div>
                <div class="imgPadrao">
                    <a href = "../../../../sair.php" data-toggle="tooltip" data-placement="right" title="Sair do sistema"> <img src="../../../img/logouts.png"> </a>
                </div>  
            </div>
        </section>
    
    </body>
</html>
<script>

//<!-----------Jogo de botões ------------------>
$(document).ready(function() {
  $('#chkAnoA').change(function() {
    var anoA = document.getElementById('chkAnoA').checked;
    if (anoA==true) {
       document.getElementById('inpAnoA').disabled = false;
      document.getElementById('ate').style.display = "inline";       
    } else {
       document.getElementById('inpAnoA').disabled = true;
       document.getElementById('ate').style.display = "none";       
    }
  });
    $('#chkAnoV').change(function() {
    var anoV = document.getElementById('chkAnoV').checked;
    if (anoV==true) {
       document.getElementById('inpAnoV').disabled = false;
      document.getElementById('ateB').style.display = "inline";       
    } else {
       document.getElementById('inpAnoV').disabled = true;
       document.getElementById('ateB').style.display = "none";       
    }
  });
  $('#chkTurno').change(function() {
    var turno = document.getElementById('chkTurno').checked;
    if (turno==true) {
       document.getElementById('inpTurno').disabled = false;
    } else {
       document.getElementById('inpTurno').disabled = true;
    }
  });
    $('#chkStatus').change(function() {
    var turno = document.getElementById('chkStatus').checked;
    if (turno==true) {
       document.getElementById('inpStatus').disabled = false;
    } else {
       document.getElementById('inpStatus').disabled = true;
    }
  });
});

</script>
<script>
var a=0;
      function trocarA(){
              if(a==0){
                      document.getElementById('tdMotorista').style.display = "none";
                      document.getElementById('tdFiscal').style.display = "inline";
                      document.getElementById('buscaMotorista').style.display = "none";
                      document.getElementById('buscaFiscall').style.display = "inline";

                      a=1;
              }else{
                      document.getElementById('tdMotorista').style.display = "inline";
                      document.getElementById('tdFiscal').style.display = "none";
                      document.getElementById('buscaMotorista').style.display = "inline";
                      document.getElementById('buscaFiscall').style.display = "none";
                      a=0;                      
              }
      }
</script>

<script>
var num;
function abrir(){
   if(num==0 || num==null){
      document.getElementById('divEsconder').style.display = "inline";
      num=1;
 //     document.getElementById('relatorioG').style.display = "none";
   }else{
     num=0;
     fechar();
   }
}
function fechar(){
      document.getElementById('divEsconder').style.display = "none";
 //     document.getElementById('relatorioG').style.display = "inline";
}

function abrirF(){
   if(num==0 || num==null){
      document.getElementById('divEsconderF').style.display = "inline";
      num=1;
   //   document.getElementById('relatorioG').style.display = "none";
   }else{
     num=0;
     fecharF();
   }
}
function fecharF(){
      document.getElementById('divEsconderF').style.display = "none";
 //     document.getElementById('relatorioG').style.display = "inline";
}
</script>

    <!--------------------Modal Motorista--------------------->
    <div class="modal fade" id="ModalMotorista" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?php
               /*$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $conn = mysqli_connect('localhost','root','','bdfiscall');
                $query = mysqli_query($conn, "SELECT nomeFuncionario FROM tbfuncionario 
                INNER JOIN tbusuario ON tbusuario.codUsuario = tbfuncionario.codUsuario
                INNER JOIN tbnivelusuario ON tbnivelusuario.codNivelUsuario = tbusuario.codNivelUsuario
                WHERE descricaoNivelUsuario like 'Motorista' 
                ORDER BY nomeFuncionario ASC");

                ?>
                        <h4 class="modal-title" id="myModalLabel">Pesquisar Motorista</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <input type="hidden" name="pagina" value="adiciona">
                        <label for="campo1">Motorista:</label>
                        <input id="buscaMotoristaA" name="data[search]" class="form-control" type="text" placeholder="Pesquisar Motorista">
                    </div>
                    <div id="list" class="row">
                        <div class="table-responsive col-md-12">

                            <table id="resultMotorista" class="table table-striped" cellspacing="0" cellpadding="0">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <?php
                            $itens_Pagina = 0;
                            while($row = mysqli_fetch_assoc($query)){
                                if($itens_Pagina<4){
                                    $itens_Pagina++;
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td data-title='nomeFuncionario'>
                                                <?php echo $row['nomeFuncionario']; ?>
                                            </td>
                                            <td><button class='btn btn-primary btn-sm' onclick="addMotorista('<?php echo $row['nomeFuncionario']; ?>')"><span class="glyphicon glyphicon-plus"></span></button></td>
                                        </tr>
                                    </tbody>
                                    <?php
                                }

                            }?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <section class="ArrumaModal">
                        <button class="btn btn-danger" onclick="fecharModal()">Cancelar</button>
                    </section>
                </div>
            </div>
        </div>
    </div>
        <!--------------------Função Motorista ---------------------->

    <script language='javascript' type='text/javascript'>
        function addMotorista(nomeMotorista) {
            $('#ModalMotorista').modal('hide');
            document.getElementById('inpMotorista').value = nomeMotorista;
            $('#inpMotorista').html(nomeMotorista).attr('value', nomeMotorista);
            document.getElementById('chkMotorista').checked = true;
        }
    </script>

    <!----------------Busca Motorista---------------------->

    <script>
        $("#buscaMotoristaA").keyup(function() {
            var busca = $("#buscaMotoristaA").val();
            $.post('../Busca/buscaMotoristaA.php', {
                busca: busca
            }, function(data) {
                $("#resultMotorista").html(data);
            });
        });
    </script>
    <script>
    function fecharModal(){
       $('#ModalMotorista').modal('hide'); 
      $('#ModalOnibus').modal('hide');  
    }
</script>
    <!--------------------Modal Onibus--------------------->
    <div class="modal fade" id="ModalOnibus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?php
               /*$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $conn = mysqli_connect('localhost','root','','bdfiscall');
                $query = mysqli_query($conn, "SELECT placaOnibus,prefixoOnibus FROM tbonibus ORDER BY placaOnibus ASC");

                ?>
                        <h4 class="modal-title" id="myModalLabel">Pesquisar Ônibus</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <input type="hidden" name="pagina" value="adiciona">
                        <label for="campo1">Ônibus:</label>
                        <input id="buscaOnibusA" name="data[search]" class="form-control" type="text" placeholder="Pesquisar Ônibus">
                    </div>
                    <div id="list" class="row">
                        <div class="table-responsive col-md-12">

                            <table id="resultOnibus" class="table table-striped" cellspacing="0" cellpadding="0">
                                <thead>
                                    <tr>
                                        <th>Placa</th>
                                        <th>Prefixo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <?php
                            $itens_Pagina = 0;
                            while($row = mysqli_fetch_assoc($query)){
                                if($itens_Pagina<4){
                                    $itens_Pagina++;
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td data-title='placaOnibus'>
                                                <?php echo $row['placaOnibus']; ?>
                                            </td>
                                            <td data-title='prefixoOnibus'>
                                                <?php echo $row['prefixoOnibus']; ?>
                                            </td>
                                            <td><button class='btn btn-primary btn-sm' onclick="addOnibus('<?php echo $row['placaOnibus']; ?>')"><span class="glyphicon glyphicon-plus"></span></button></td>
                                        </tr>
                                    </tbody>
                                    <?php
                                }

                            }?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <section class="ArrumaModal">
                        <button class="btn btn-danger" onclick="fecharModal()">Cancelar</button>
                    </section>
                </div>
            </div>
        </div>
    </div>
        <!--------------------Função Onibus ---------------------->

    <script language='javascript' type='text/javascript'>
        function addOnibus(placaOnibus) {
            $('#ModalOnibus').modal('hide');
            document.getElementById('inpOnibus').value = placaOnibus;
            $('#inpOnibus').html(placaOnibus).attr('value', placaOnibus);
            document.getElementById('chkOnibus').checked = true;
        }
    </script>

    <!----------------Busca Onibus---------------------->

    <script>
        $("#buscaOnibusA").keyup(function() {
            var busca = $("#buscaOnibusA").val();
            $.post('../Busca/buscaOnibusA.php', {
                busca: busca
            }, function(data) {
                $("#resultOnibus").html(data);
            });
        });
    </script>
    <!--------------------Modal Linha--------------------->
    <div class="modal fade" id="ModalLinha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?php
               /*$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $conn = mysqli_connect('localhost','root','','bdfiscall');
                $query = mysqli_query($conn, "SELECT nomeLinha,numLinha FROM tblinha ORDER BY nomeLinha ASC");

                ?>
                        <h4 class="modal-title" id="myModalLabel">Pesquisar Linha</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <input type="hidden" name="pagina" value="adiciona">
                        <label for="campo1">Linha:</label>
                        <input id="buscaLinhaA" name="data[search]" class="form-control" type="text" placeholder="Pesquisar Linha">
                    </div>
                    <div id="list" class="row">
                        <div class="table-responsive col-md-12">

                            <table id="resultLinha" class="table table-striped" cellspacing="0" cellpadding="0">
                                <thead>
                                    <tr>
                                        <th>Nome da Linha</th>
                                        <th>Número da Linha</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <?php
                            $itens_Pagina = 0;
                            while($row = mysqli_fetch_assoc($query)){
                                if($itens_Pagina<4){
                                    $itens_Pagina++;
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td data-title='nomeLinha'>
                                                <?php echo $row['nomeLinha']; ?>
                                            </td>
                                            <td data-title='numLinha'>
                                                <?php echo $row['numLinha']; ?>
                                            </td>
                                            <td><button class='btn btn-primary btn-sm' onclick="addLinha('<?php echo $row['numLinha']; ?>')"><span class="glyphicon glyphicon-plus"></span></button></td>
                                        </tr>
                                    </tbody>
                                    <?php
                                }

                            }?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <section class="ArrumaModal">
                        <button class="btn btn-danger" onclick="fecharModal()">Cancelar</button>
                    </section>
                </div>
            </div>
        </div>
    </div>
        <!--------------------Função Linha ---------------------->

    <script language='javascript' type='text/javascript'>
        function addLinha(nomeLinha) {
            $('#ModalLinha').modal('hide');
            document.getElementById('inpLinha').value = nomeLinha;
            $('#inpLinha').html(nomeLinha).attr('value', nomeLinha);
            document.getElementById('chkLinha').checked = true;
        }
    </script>

    <!----------------Busca Linha---------------------->

    <script>
        $("#buscaLinhaA").keyup(function() {
            var busca = $("#buscaLinhaA").val();
            $.post('../Busca/buscaLinhaA.php', {
                busca: busca
            }, function(data) {
                $("#resultLinha").html(data);
            });
        });
    </script>
    <!--------------------Modal Fiscal--------------------->
    <div class="modal fade" id="ModalFiscal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?php
               /*$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $conn = mysqli_connect('localhost','root','','bdfiscall');
                $query = mysqli_query($conn, "SELECT nomeFuncionario FROM tbfuncionario 
                INNER JOIN tbusuario ON tbusuario.codUsuario=tbfuncionario.codUsuario
                INNER JOIN tbnivelusuario ON tbusuario.codNivelUsuario=tbnivelusuario.codNivelUsuario
                ORDER BY nomeFuncionario ASC");

                ?>
                        <h4 class="modal-title" id="myModalLabel">Pesquisar Fiscal</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <input type="hidden" name="pagina" value="adiciona">
                        <label for="campo1">Fiscal:</label>
                        <input id="buscaFiscalA" name="data[search]" class="form-control" type="text" placeholder="Pesquisar Fiscal">
                    </div>
                    <div id="list" class="row">
                        <div class="table-responsive col-md-12">

                            <table id="resultFiscal" class="table table-striped" cellspacing="0" cellpadding="0">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <?php
                            $itens_Pagina = 0;
                            while($row = mysqli_fetch_assoc($query)){
                                if($itens_Pagina<4){
                                    $itens_Pagina++;
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td data-title='nomeFuncionario'>
                                                <?php echo $row['nomeFuncionario']; ?>
                                            </td>
                                            <td><button class='btn btn-primary btn-sm' onclick="addFiscal('<?php echo $row['nomeFuncionario']; ?>')">+</button></td>
                                        </tr>
                                    </tbody>
                                    <?php
                                }

                            }?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <section class="ArrumaModal">
                        <button class="btn btn-danger" onclick="fecharModal()">Cancelar</button>
                    </section>
                </div>
            </div>
        </div>
    </div>
        <!--------------------Função Fiscal ---------------------->

    <script language='javascript' type='text/javascript'>
        function addFiscal(nomeFiscal) {
            $('#ModalFiscal').modal('hide');
            document.getElementById('inpFiscal').value = nomeFiscal;
            $('#inpFiscal').html(nomeFiscal).attr('value', nomeFiscal);
            document.getElementById('chkFiscal').checked = true;
        }
    </script>

    <!----------------Busca Fiscal---------------------->

    <script>
        $("#buscaFiscalA").keyup(function() {
            var busca = $("#buscaFiscalA").val();
            $.post('../Busca/buscaFiscalV.php', {
                busca: busca
            }, function(data) {
                $("#resultFiscal").html(data);
            });
        });
    </script> 
    
        <!------------------FecharModal---------------->
    <script>
        function fecharModal() {
            $('#ModalLinha').modal('hide');
            $('#ModalMotorista').modal('hide');
            $('#ModalOnibus').modal('hide');
            $('#ModalFiscal').modal('hide');
        }
    </script>