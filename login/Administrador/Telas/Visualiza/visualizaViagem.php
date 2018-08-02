<?php require_once('../../../../verificaS.php');  $nomeUsuario= $_SESSION['nomeUsuario'];              $nome = explode(" ",$nomeUsuario);             $nomeUsuario = $nome[0]; ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        
        <title>Fiscall</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="shortcut icon"  href="../../../img/icone.png" type="image/x-png/"> 
        <link href="../../../bootstrap/css/bootstrap.min.css" rel = "stylesheet">
        <link rel="stylesheet" href="../../../css/Smith.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </head>
    
    <body>
        <script src="../../../bootstrap/js/alert.js"></script>   
        <script src="../../../bootstrap/js/jquery.min.js"></script>
        <script src="../../../bootstrap/js/bootstrap.min.js"></script>
        
        
        <div id="main" class="container-fluid">
            <div id="top" class="row">
                <div class="col-md-2">
                    
                    <div class="ArrumaSE">
                    <h2>Viagem</h2>
                    </div>
                    
                </div>
                <div id="relatorioG">
                <?php echo "<a href='../../Function/Relatorio/Geral/grlViagem.php' target='_blank'  class='btn btn-warning pull-left h2' data-toggle='tooltip' data-placement='right' title='Gerar relatório geral'><img src='../../../img/print.png' href='#'></a>";?>
                </div>
                <div class="col-md-6">
                    <div class="input-group h2">
                        <input id = "busca" name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Viagem">
                        <script> 
                        $("#busca").keyup(function() {
                        var busca  = $("#busca").val();
                        $.post('../Busca/buscaViagem.php', {busca: busca}, function(data){
                            $("#result").html(data);                            
                                });
                            });
                        </script>
                       <span class="input-group-btn">
                         <button class="btn btn-primary" type="submit" onclick="abrir()" data-toggle="tooltip" data-placement="right" title="Filtrar">
                           <span class="glyphicon glyphicon-filter"></span>
                         </button>
                       </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <a href="../Adiciona/adicionaOnibus.php" class="btn btn-primary pull-right h2">Novo Ônibus</a>
                </div>
            </div> <!-- /#top -->
            
            <div class="row">
            <div id="divEsconder">
            
            <!-----------------------FISCAL----------------------->
                <div class="form-group col-md-3">
                      <label class="form-check-label">
                      Fiscal
                      </label>
                     <div class="input-group">
                      <span class="input-group-addon" >
                        <input type="checkbox" aria-label="..."id='chkFiscal'>
                      </span>
                      <input class="form-control" placeholder="Vitor" type="text" readonly id="inpFiscal">
                      <span class="input-group-btn">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalFiscal" onclick="chamaFiscal()" data-toggle="tooltip" data-placement="right" title="Pesquisar Fiscais"><span class="glyphicon glyphicon-search"></span></button>
                     </span>
                  </div>
                 </div>
                     <!--------------------Modal Fiscal--------------------->
    <div class="modal fade" id="ModalFiscal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?php
               /*$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $conn = mysqli_connect('localhost','root','','bdfiscall');
                $query = mysqli_query($conn, "SELECT nomeFuncionario FROM tbfuncionario 
                INNER JOIN tbusuario ON tbusuario.codUsuario = tbfuncionario.codFuncionario
                INNER JOIN tbnivelusuario ON tbnivelusuario.codNivelUsuario = tbusuario.codNivelUsuario
                WHERE descricaoNivelUsuario like 'Fiscal' ORDER BY nomeFuncionario ASC");

                ?>
                        <h4 class="modal-title" id="myModalLabel">Pesquisar Fiscal</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <input type="hidden" name="pagina" value="adiciona">
                        <label for="campo1">Funcionario:</label>
                        <input id="buscaFiscalV" name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Funcionário">
                    </div>
                    <div id="list" class="row">
                        <div class="table-responsive col-md-12">

                            <table id="resultFiscal" class="table table-striped" cellspacing="0" cellpadding="0">
                                <thead>
                                    <tr>
                                        <th>Fiscal</th>
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
                                            <td><button class='btn btn-primary btn-sm' onclick="addFiscal('<?php echo $row['nomeFuncionario']; ?>')" data-toggle="tooltip" data-placement="right" title="Escolher Fiscal"><span class="glyphicon glyphicon-plus"></span></button></td>
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
                    <!------Chama Fiscal-------->

                    <script>
                        function chamaFiscal() {
                            $(document).ready(function() {
                                $('#ModalFiscal').modal('show');
                            });
                        }
                    </script>
                        <div id="resultado"></div>
    <!--------------------Função Fiscal ---------------------->

    <script language='javascript' type='text/javascript'>
        function addFiscal(nomeFuncionario) {
            $('#ModalFiscal').modal('hide');
            document.getElementById('inpFiscal').value = nomeFuncionario;
            $('#inpFiscal').html(nomeFuncionario).attr('value', nomeFuncionario);
            document.getElementById('chkFiscal').checked = true;
        }
    </script>

    <!----------------Busca Fiscal---------------------->

    <script>
        $("#buscaFiscalV").keyup(function() {
            var busca = $("#buscaFiscalV").val();
            $.post('../Busca/buscaFiscalV.php', {
                busca: busca
            }, function(data) {
                $("#resultFiscal").html(data);
            });
        });
    </script>
    <script>
    function fecharModal(){
       $('#ModalFiscal').modal('hide');  
    }
    </script>
    
    
    <!--------------------MOTORISTA --------------------->
                <div class="form-group col-md-3">
                      <label class="form-check-label">
                      Motorista
                      </label>
                     <div class="input-group">
                      <span class="input-group-addon" >
                        <input type="checkbox" aria-label="..."id='chkMotorista'>
                      </span>
                      <input class="form-control" placeholder="Rogério" type="text" readonly id="inpMotorista">
                      <span class="input-group-btn">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalMotorista" onclick="chamaMotorista()" data-toggle="tooltip" data-placement="right" title="Pesquisar Motoristas"><span class="glyphicon glyphicon-search"></span></button>
                     </span>
                  </div>
                 </div>
<!--------------------Modal Motorista--------------------->
    <div class="modal fade" id="ModalMotorista" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?php
               /*$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $conn = mysqli_connect('localhost','root','','bdfiscall');
                $query = mysqli_query($conn, "SELECT nomeFuncionario FROM tbfuncionario 
                INNER JOIN tbusuario ON tbusuario.codUsuario = tbfuncionario.codFuncionario
                INNER JOIN tbnivelusuario ON tbnivelusuario.codNivelUsuario = tbusuario.codNivelUsuario
                WHERE descricaoNivelUsuario like 'Motorista' ORDER BY nomeFuncionario ASC");

                ?>
                        <h4 class="modal-title" id="myModalLabel">Pesquisar Motorista</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <input type="hidden" name="pagina" value="adiciona">
                        <label for="campo1">Funcionario:</label>
                        <input id="buscaMotoristaA" name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Motorista">
                    </div>
                    <div id="list" class="row">
                        <div class="table-responsive col-md-12">

                            <table id="resultMotorista" class="table table-striped" cellspacing="0" cellpadding="0">
                                <thead>
                                    <tr>
                                        <th>Motorista</th>
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
                                            <td><button class='btn btn-primary btn-sm' onclick="addFuncionario('<?php echo $row['nomeFuncionario']; ?>')" data-toggle="tooltip" data-placement="right" title="Escolher Motorista"><span class="glyphicon glyphicon-plus"></span></button></td>
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
                    <!------Chama Motorista-------->

                    <script>
                        function chamaMotorista() {
                            $(document).ready(function() {
                                $('#ModalMotorista').modal('show');
                            });
                        }
                    </script>
    <!--------------------Função Motorista ---------------------->

    <script language='javascript' type='text/javascript'>
        function addFuncionario(nomeMotorista) {
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
    }
    </script>
    
        <!--------------------Linha--------------------->
                <div class="form-group col-md-3">
                      <label class="form-check-label">
                      Linha
                      </label>
                     <div class="input-group">
                      <span class="input-group-addon" >
                        <input type="checkbox" aria-label="..."id='chkLinha'>
                      </span>
                      <input class="form-control" placeholder="TERMINAL SACOMA" type="text" readonly id="inpLinha">
                      <span class="input-group-btn">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalLinha" onclick="chamaLinha()" data-toggle="tooltip" data-placement="right" title="Pesquisar Linhas"><span class="glyphicon glyphicon-search"></span></button>
                     </span>
                  </div>
                 </div>
<!--------------------Modal Linha--------------------->
    <div class="modal fade" id="ModalLinha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?php
               /*$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $conn = mysqli_connect('localhost','root','','bdfiscall');
                $query = mysqli_query($conn, "SELECT numLinha,nomeLinha FROM tblinha ORDER BY nomeLinha ASC");

                ?>
                        <h4 class="modal-title" id="myModalLabel">Pesquisar Linha</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <input type="hidden" name="pagina" value="adiciona">
                        <label for="campo1">Funcionario:</label>
                        <input id="buscaLinhaA" name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Linha">
                    </div>
                    <div id="list" class="row">
                        <div class="table-responsive col-md-12">

                            <table id="resultLinha" class="table table-striped" cellspacing="0" cellpadding="0">
                                <thead>
                                    <tr>
                                        <th>Nome da Linha</th>
                                        <th>Número da Linha</th>
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
                                            <td data-title='nomeLinha' id='limite'><?php echo $row['nomeLinha']; ?></td>
                                            <td data-title='numLinha'><?php echo $row['numLinha'];?></td>
                                            <td><button class='btn btn-primary btn-sm' onclick="addLinha('<?php echo $row['nomeLinha']; ?>')" data-toggle="tooltip" data-placement="right" title="Escolher Linha"><span class="glyphicon glyphicon-plus"></span></button></td>
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
                    <!------Chama Linha-------->

                    <script>
                        function chamaLinha() {
                            $(document).ready(function() {
                                $('#ModalLinha').modal('show');
                            });
                        }
                    </script>
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
    <script>
    function fecharModal(){
       $('#ModalLinha').modal('hide');  
    }
    </script>
    
            <!--------------------Ônibus--------------------->
                <div class="form-group col-md-3">
                      <label class="form-check-label">
                      Ônibus
                      </label>
                     <div class="input-group">
                      <span class="input-group-addon" >
                        <input type="checkbox" aria-label="..."id='chkOnibus'>
                      </span>
                      <input class="form-control" placeholder="CIL-7266" type="text" readonly id="inpOnibus">
                      <span class="input-group-btn">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalOnibus" onclick="chamaOnibus()" data-toggle="tooltip" data-placement="right" title="Pesquisar Ônibus"><span class="glyphicon glyphicon-search"></span></button>
                     </span>
                  </div>
                 </div>
<!--------------------Modal Ônibus--------------------->
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
                        <input id="buscaOnibusA" name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Ônibus">
                    </div>
                    <div id="list" class="row">
                        <div class="table-responsive col-md-12">

                            <table id="resultOnibus" class="table table-striped" cellspacing="0" cellpadding="0">
                                <thead>
                                    <tr>
                                        <th>Placa do Ônibus</th>
                                        <th>Prefixo do Ônibus</th>
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
                                            <td data-title='placaOnibus'><?php echo $row['placaOnibus']; ?></td>
                                            <td data-title='prefixoOnibus'><?php echo $row['prefixoOnibus']; ?></td>
                                            <td><button class='btn btn-primary btn-sm' onclick="addOnibus('<?php echo $row['placaOnibus']; ?>')" data-toggle="tooltip" data-placement="right" title="Escolher Ônibus"><span class="glyphicon glyphicon-plus"></span></button></td>
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
                    <!------Chama Ônibus-------->

                    <script>
                        function chamaOnibus() {
                            $(document).ready(function() {
                                $('#ModalOnibus').modal('show');
                            });
                        }
                    </script>
    <!--------------------Função Ônibus ---------------------->

    <script language='javascript' type='text/javascript'>
        function addOnibus(placaOnibus) {
            $('#ModalOnibus').modal('hide');
            document.getElementById('inpOnibus').value = placaOnibus;
            $('#inpOnibus').html(placaOnibus).attr('value', placaOnibus);
            document.getElementById('chkOnibus').checked = true;
        }
    </script>

    <!----------------Busca Ônibus---------------------->

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
    <script>
    function fecharModal(){
       $('#ModalOnibus').modal('hide');  
    }
    </script>
    
                 <!------------ CHEGADA -------------->
                 <div class="form-group col-md-2">
                      <label class="form-check-label" id="lblChegada" >
                      Chegada
                      </label>
                      <div class="input-group">
                           <span class="input-group-addon" >
                                <input type="checkbox" aria-label="..." id="chkChegada">
                           </span>

                      <input class="form-control" placeholder="10:04:00" id="inpChegada" type="time">
                      </div>
                 </div>
                <!------------ CHEGADA ATÉ -------------->
                 <div class="form-group col-md-2">
                      <label class="form-check-label" id="lblChegadaAte" >
                      Até
                      </label>
                      <div class="input-group">
                           <span class="input-group-addon" >
                                <input type="checkbox" aria-label="..." id="chkChegadaAte">
                           </span>

                      <input class="form-control" placeholder="10:04:00" id="inpChegadaAte" type="time">
                      </div>
                 </div>
                 <!------------ PREVISTO -------------->
                 <div class="form-group col-md-2">
                      <label class="form-check-label" id="lblPrevisto" >
                      Saída Prevista
                      </label>
                      <div class="input-group">
                           <span class="input-group-addon" >
                                <input type="checkbox" aria-label="..." id="chkPrevisto">
                           </span>

                      <input class="form-control" placeholder="20:24:00" id="inpPrevisto" type="time">
                      </div>
                 </div>
                <!------------ PREVISTO ATÉ -------------->
                 <div class="form-group col-md-2">
                      <label class="form-check-label" id="lblPrevistoAte" >
                      Até
                      </label>
                      <div class="input-group">
                           <span class="input-group-addon" >
                                <input type="checkbox" aria-label="..." id="chkPrevistoAte">
                           </span>

                      <input class="form-control" placeholder="20:24:00" id="inpPrevistoAte" type="time">
                      </div>
                 </div>
                 
                 <!------------ STATUS -------------->
                 <div class="form-group col-md-2">
                      <label class="form-check-label" id="lblStatus" >
                      Status
                      </label>
                      <div class="input-group">
                           <span class="input-group-addon" >
                                <input type="checkbox" aria-label="..." id="chkStatus">
                           </span>
                        <select id="inpStatus" name="inpStatus" class="form-control">
                            
                            <option value="">
                            Selecione...
                            </option>
                            <?php   
                            /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
                            $sql = "SELECT DISTINCT statusViagem FROM tbgerenciamentolinha";
                            $result = mysqli_query($connect,$sql);
                            while($element = mysqli_fetch_array($result)){
                                $statusViagem = $element['statusViagem'];
                                 echo "<option value = '$statusViagem'>$statusViagem</option>";
                            }
                            ?>
                        </select>
                      </div>
                 </div>
                 <!------------ SAÍDA -------------->
                 <div class="form-group col-md-2">
                      <label class="form-check-label" id="lblSaida" >
                      Saída Prevista
                      </label>
                      <div class="input-group">
                           <span class="input-group-addon" >
                                <input type="checkbox" aria-label="..." id="chkSaida">
                           </span>

                      <input class="form-control" placeholder="20:24:00" id="inpSaida" type="time">
                      </div>
                 </div>
                <!------------ SAÍDA ATÉ -------------->
                 <div class="form-group col-md-2">
                      <label class="form-check-label" id="lblSaidaAte" >
                      Até
                      </label>
                      <div class="input-group">
                           <span class="input-group-addon" >
                                <input type="checkbox" aria-label="..." id="chkSaidaAte">
                           </span>

                      <input class="form-control" placeholder="20:24:00" id="inpSaidaAte" type="time">
                      </div>
                 </div>
                 
                      <button id="buscaEs" class="btn btn-primary" type="submit" onclick="bFiltro()" data-toggle="tooltip" data-placement="right" title="Filtar por campos específicos">
                           <span class="glyphicon glyphicon-search"></span>
                      </button> <!-- href='../../Function/Relatorio/Cruzada/czdOnibus.php' target='_blank'-->
                      <a id="relatorioI" class='btn btn-warning pull-left h2' onclick="relatorioCruzado()" data-toggle="tooltip" data-placement="right" title="Gerar relatório de referência cruzada">
                           <img src='../../../img/print.png'>
                      </a>
                 </div>
             </div>
             <hr/>
            <div id="list" class="row">
        
                               <div class="table-responsive col-md-12">
                               <div id="resultadoB"></div>
                               <div id="resultadoT">
                               <table  id="result" class="table table-striped" cellspacing="0" cellpadding="0">
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
                   </div>
                    

                 </div>
             </div> <!-- /#list -->
            <div id="bottom" class="row">
                <div class="col-md-12">

                    <ul class="pagination">
                        
                        <li><a href="visualizaViagem.php?pagina=1">&lt; Primeira</a></li>
                        <?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                                    if($pag_ant >=1){
                                        echo "<li><a href='visualizaViagem.php?pagina=$pag_ant'>$pag_ant</a></li>";
                                    }
                                    echo"<li class='disable'><a> $pagina </a></li>";
                                }for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                                    if($pag_dep <= $quantidade_pg){
				                        echo "<li><a href='visualizaViagem.php?pagina=$pag_dep'>$pag_dep</a></li>";
                                    }
                                }
                                echo"<li class='next'><a href='visualizaViagem.php?pagina=$quantidade_pg' rel='next'>Ultima &gt;</a></li>";
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

    <!------------------FecharModal---------------->
    <script>
        function fecharModal() {
            $('#ModalFiscal').modal('hide');
            $('#ModalMotorista').modal('hide');
            $('#ModalLinha').modal('hide');
            $('#ModalOnibus').modal('hide');
        }
    </script>
<!-----------------------MUDAR TD's-------------------->
<script>
var num;
function abrir(){
   if(num==0 || num==null){
      document.getElementById('divEsconder').style.display = "inline";
      document.getElementById('relatorioG').style.display = "none";
      num=1;
   }else{
     num=0;
     fechar();
   }
}
function fechar(){
      document.getElementById('divEsconder').style.display = "none";
      document.getElementById('relatorioG').style.display = "inline";
}

</script>

<!--------------------------Filtro---------------------------->
<script>
function bFiltro(){
     var cFiscal = document.getElementById('chkFiscal').checked;
     var cMotorista = document.getElementById('chkMotorista').checked;
     var cLinha = document.getElementById('chkLinha').checked;
     var cOnibus = document.getElementById('chkOnibus').checked;
     var cChegada = document.getElementById('chkChegada').checked;
     var cChegadaAte = document.getElementById('chkChegadaAte').checked;
     var cPrevisto = document.getElementById('chkPrevisto').checked;
     var cPrevistoAte = document.getElementById('chkPrevistoAte').checked;
     var cStatus = document.getElementById('chkStatus').checked;
     var cSaida = document.getElementById('chkSaida').checked;
     var cSaidaAte = document.getElementById('chkSaidaAte').checked;


     var Fiscal = $("#inpFiscal").val();
     var Motorista = $("#inpMototista").val();
     var Linha = $("#inpLinha").val();
     var Onibus = $("#inpOnibus").val();
     var Chegada = $("#inpChegada").val();
     var ChegadaAte = $("#inpChegadaAte").val();
     var Previsto = $("#inpPrevisto").val();
     var PrevistoAte = $("#inpPrevistoAte").val();
     var Status = $("#inpStatus").val();
     var Saida = $("#inpSaida").val();
     var SaidaAte = $("#inpSaidaAte").val();
     var escolha = 0;  
     
       if(cFiscal==true && cMotorista==true && cLinha==true && cOnibus==true 
       && cChegada==true && cChegadaAte==true && cPrevisto==true && cPrevistoAte==true && cStatus==true && cSaida==true 
       && cSaidaAte==true){
            escolha=1;
            $.post('../../Function/Filtro/ftViagem.php', {
                escolha: escolha,
                Fiscal: Fiscal,
                Motorista: Motorista,
                Linha: Linha,
                Onibus: Onibus,
                Chegada: Chegada,
                ChegadaAte: ChegadaAte,
                Previsto: Previsto,
                PrevistoAte: PrevistoAte,
                Status: Status,
                Saida: Saida,
                SaidaAte: SaidaAte
                
            },
            function(data) {
                document.getElementById('resultadoT').style.display = "none";
                $("#resultadoB").html(data);
            });
            
       }else if(cFiscal==true && cMotorista==true && cLinha==false && cOnibus==false 
       && cChegada==false && cChegadaAte==false && cPrevisto==false && cPrevistoAte==false && cStatus==false && cSaida==false 
       && cSaidaAte==false){
            escolha=2;
            $.post('../../Function/Filtro/ftViagem.php', {
                escolha: escolha,
                Fiscal: Fiscal,
                Motorista: Motorista
                
            },
            function(data) {
                document.getElementById('resultadoT').style.display = "none";
                $("#resultadoB").html(data);
            });
            
       }else if(cFiscal==false && cMotorista==false && cLinha==false && cOnibus==false 
       && cChegada==true && cChegadaAte==true && cPrevisto==true && cPrevistoAte==true && cStatus==false && cSaida==true 
       && cSaidaAte==true){
            escolha=3;
            $.post('../../Function/Filtro/ftViagem.php', {
                escolha: escolha,
                Chegada: Chegada,
                ChegadaAte: ChegadaAte,
                Previsto: Previsto,
                PrevistoAte: PrevistoAte,
                Saida: Saida,
                SaidaAte: SaidaAte
                
            },
            function(data) {
                document.getElementById('resultadoT').style.display = "none";
                $("#resultadoB").html(data);
            });
            
       }
       else if(cFiscal==false && cMotorista==false && cLinha==false && cOnibus==false 
       && cChegada==true && cChegadaAte==true && cPrevisto==false && cPrevistoAte==false && cStatus==false && cSaida==false 
       && cSaidaAte==false){
            escolha=4;
            alert("a");
            $.post('../../Function/Filtro/ftViagem.php', {
                escolha: escolha,
                Chegada: Chegada,
                ChegadaAte: ChegadaAte
                
            },
            function(data) {
            
               document.getElementById('resultadoT').style.display = "none";
                $("#resultadoB").html(data);
            });
            
       }
       else if(cFiscal==false && cMotorista==false && cLinha==false && cOnibus==false 
       && cChegada==false && cChegadaAte==false && cPrevisto==true && cPrevistoAte==true && cStatus==false && cSaida==false 
       && cSaidaAte==false){
            escolha=5;
            $.post('../../Function/Filtro/ftViagem.php', {
                escolha: escolha,
                Previsto: Previsto,
                PrevistoAte: PrevistoAte
                
            },
            function(data) {
                document.getElementById('resultadoT').style.display = "none";
                $("#resultadoB").html(data);
            });
            
       }else if(cFiscal==false && cMotorista==false && cLinha==false && cOnibus==false 
       && cChegada==false && cChegadaAte==false && cPrevisto==false && cPrevistoAte==false && cStatus==false && cSaida==true 
       && cSaidaAte==true){
            escolha=6;
            $.post('../../Function/Filtro/ftViagem.php', {
                escolha: escolha,
                Saida: Saida,
                SaidaAte: SaidaAte
                
            },
            function(data) {
                document.getElementById('resultadoT').style.display = "none";
                $("#resultadoB").html(data);
            });
            
       }else if(cFiscal==false && cMotorista==false && cLinha==false && cOnibus==false 
       && cChegada==true && cChegadaAte==false && cPrevisto==false && cPrevistoAte==false && cStatus==false && cSaida==false 
       && cSaidaAte==false){
            escolha=7;
            $.post('../../Function/Filtro/ftViagem.php', {
                escolha: escolha,
                Chegada: Chegada
                
            },
            function(data) {
                document.getElementById('resultadoT').style.display = "none";
                $("#resultadoB").html(data);
            });
            
       }
       else if(cFiscal==false && cMotorista==false && cLinha==false && cOnibus==false 
       && cChegada==false && cChegadaAte==false && cPrevisto==true && cPrevistoAte==false && cStatus==false && cSaida==false 
       && cSaidaAte==false){
            escolha=8;
            $.post('../../Function/Filtro/ftViagem.php', {
                escolha: escolha,
                Previsto: Previsto
            },
            function(data) {
                document.getElementById('resultadoT').style.display = "none";
                $("#resultadoB").html(data);
            });
            
       }
       else if(cFiscal==false && cMotorista==false && cLinha==false && cOnibus==false 
       && cChegada==false && cChegadaAte==false && cPrevisto==false && cPrevistoAte==false && cStatus==false && cSaida==true 
       && cSaidaAte==false){
            escolha=9;
            $.post('../../Function/Filtro/ftViagem.php', {
                escolha: escolha,
                Saida: Saida
                
            },
            function(data) {
                document.getElementById('resultadoT').style.display = "none";
                $("#resultadoB").html(data);
            });
            
       }
       else{
               document.getElementById('resultadoB').style.display = "none";
               document.getElementById('resultadoT').style.display = "inline";
       }
}
</script>

<!--------------------------RELATÓRIO CRUZADO---------------------------->
<script>
function relatorioCruzado(){
     var cFiscal = document.getElementById('chkFiscal').checked;
     var cMotorista = document.getElementById('chkMotorista').checked;
     var cLinha = document.getElementById('chkLinha').checked;
     var cOnibus = document.getElementById('chkOnibus').checked;
     var cChegada = document.getElementById('chkChegada').checked;
     var cChegadaAte = document.getElementById('chkChegadaAte').checked;
     var cPrevisto = document.getElementById('chkPrevisto').checked;
     alert("a");
     var cPrevistoAte = document.getElementById('chkPrevistoAte').checked;
     var cStatus = document.getElementById('chkStatus').checked;
     var cSaida = document.getElementById('chkSaida').checked;
     var cSaidaAte = document.getElementById('chkSaidaAte').checked;

     var Fiscal = $("#inpFiscal").val();
     var Motorista = $("#inpMototista").val();
     var Linha = $("#inpLinha").val();
     var Onibus = $("#inpOnibus").val();
     var Chegada = $("#inpChegada").val();
     var ChegadaAte = $("#inpChegadaAte").val();
     var Previsto = $("#inpPrevisto").val();
     var PrevistoAte = $("#inpPrevistoAte").val();
     var Status = $("#inpStatus").val();
     var Saida = $("#inpSaida").val();
     var SaidaAte = $("#inpSaidaAte").val();
     var escolha = 0;  
       if(cFiscal==true && cMotorista==true && cLinha==true && cOnibus==true 
       && cChegada==true && cChegadaAte==true && cPrevisto==true && cPrevistoAte==true && cStatus==true && cSaida==true 
       && cSaidaAte==true){
            escolha=1;
            $.post('../../Function/Relatorio/Cruzada/cruViagem.php', {
                escolha: escolha,
                Fiscal: Fiscal,
                Motorista: Motorista,
                Linha: Linha,
                Onibus: Onibus,
                Chegada: Chegada,
                ChegadaAte: ChegadaAte,
                Previsto: Previsto,
                PrevistoAte: PrevistoAte,
                Status: Status,
                Saida: Saida,
                SaidaAte: SaidaAte
                
            });
            
       }else if(cFiscal==true && cMotorista==true && cLinha==false && cOnibus==false 
       && cChegada==false && cChegadaAte==false && cPrevisto==false && cPrevistoAte==false && cStatus==false && cSaida==false 
       && cSaidaAte==false){
            escolha=2;
            $.post('../../Function/Relatorio/Cruzada/cruViagem.php', {
                escolha: escolha,
                Fiscal: Fiscal,
                Motorista: Motorista
                
            });
            
            window.open('../../Function/Relatorio/Cruzada/cruViagem.php?escolha='+escolha+'&Fiscal='+Fiscal+'&Motorista='+Motorista+'','_blank');
            
       }else if(cFiscal==false && cMotorista==false && cLinha==false && cOnibus==false 
       && cChegada==true && cChegadaAte==true && cPrevisto==true && cPrevistoAte==true && cStatus==false && cSaida==true 
       && cSaidaAte==true){
            escolha=3;
            $.post('../../Function/Relatorio/Cruzada/cruViagem.php', {
                escolha: escolha,
                Chegada: Chegada,
                ChegadaAte: ChegadaAte,
                Previsto: Previsto,
                PrevistoAte: PrevistoAte,
                Saida: Saida,
                SaidaAte: SaidaAte
                
            });
            window.open('../../Function/Relatorio/Cruzada/cruViagem.php?escolha='+escolha+'&Chegada='+Chegada+'&ChegadaAte='+ChegadaAte+'&Previsto='+Previsto+'&PrevistoAte='+PrevistoAte+'&Saida='+Saida+'&SaidaAte='+SaidaAte+'','_blank');
           
       }
       else if(cFiscal==false && cMotorista==false && cLinha==false && cOnibus==false 
       && cChegada==true && cChegadaAte==true && cPrevisto==false && cPrevistoAte==false && cStatus==false && cSaida==false 
       && cSaidaAte==false){
            escolha=4;
            $.post('../../Function/Relatorio/Cruzada/cruViagem.php', {
                escolha: escolha,
                Chegada: Chegada,
                ChegadaAte: ChegadaAte
                
            });
            window.open('../../Function/Relatorio/Cruzada/cruViagem.php?escolha='+escolha+'&Chegada='+Chegada+'&ChegadaAte='+ChegadaAte+'','_blank');
            
       }
       else if(cFiscal==false && cMotorista==false && cLinha==false && cOnibus==false 
       && cChegada==false && cChegadaAte==false && cPrevisto==true && cPrevistoAte==true && cStatus==false && cSaida==false 
       && cSaidaAte==false){
            escolha=5;
            $.post('../../Function/Relatorio/Cruzada/cruViagem.php', {
                escolha: escolha,
                Previsto: Previsto,
                PrevistoAte: PrevistoAte
                
            });
            window.open('../../Function/Relatorio/Cruzada/cruViagem.php?escolha='+escolha+'&Previsto='+Previsto+'&PrevistoAte='+PrevistoAte+'','_blank');
            
       }else if(cFiscal==false && cMotorista==false && cLinha==false && cOnibus==false 
       && cChegada==false && cChegadaAte==false && cPrevisto==false && cPrevistoAte==false && cStatus==false && cSaida==true 
       && cSaidaAte==true){
            escolha=6;
            $.post('../../Function/Relatorio/Cruzada/cruViagem.php', {
                escolha: escolha,
                Saida: Saida,
                SaidaAte: SaidaAte
                
            });
            window.open('../../Function/Relatorio/Cruzada/cruViagem.php?escolha='+escolha+'&Saida='+Saida+'&SaidaAte='+SaidaAte+'','_blank');
            
       }else if(cFiscal==false && cMotorista==false && cLinha==false && cOnibus==false 
       && cChegada==true && cChegadaAte==false && cPrevisto==false && cPrevistoAte==false && cStatus==false && cSaida==false 
       && cSaidaAte==false){
            escolha=7;
            $.post('../../Function/Relatorio/Cruzada/cruViagem.php', {
                escolha: escolha,
                Chegada: Chegada
                
            });
            window.open('../../Function/Relatorio/Cruzada/cruViagem.php?escolha='+escolha+'&Chegada='+Chegada+'','_blank');
            
       }
       else if(cFiscal==false && cMotorista==false && cLinha==false && cOnibus==false 
       && cChegada==false && cChegadaAte==false && cPrevisto==true && cPrevistoAte==false && cStatus==false && cSaida==false 
       && cSaidaAte==false){
            escolha=8;
            $.post('../../Function/Relatorio/Cruzada/cruViagem.php', {
                escolha: escolha,
                Previsto: Previsto
            });
            window.open('../../Function/Relatorio/Cruzada/cruViagem.php?escolha='+escolha+'&Previsto='+Previsto+'','_blank');
       }
       else if(cFiscal==false && cMotorista==false && cLinha==false && cOnibus==false 
       && cChegada==false && cChegadaAte==false && cPrevisto==false && cPrevistoAte==false && cStatus==false && cSaida==true 
       && cSaidaAte==false){
            escolha=9;
            $.post('../../Function/Relatorio/Cruzada/cruViagem.php', {
                escolha: escolha,
                Saida: Saida
                
            });
            window.open('../../Function/Relatorio/Cruzada/cruViagem.php?escolha='+escolha+'&Saida='+Saida+'','_blank');
            
       }
       else{
               document.getElementById('resultadoB').style.display = "none";
               document.getElementById('resultadoT').style.display = "inline";
       }
}
</script>