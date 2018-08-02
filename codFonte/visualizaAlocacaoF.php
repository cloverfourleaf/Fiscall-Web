<?php require_once('../../../../verificaS.php'); session_start(); $nomeUsuario= $_SESSION['nomeUsuario'];              $nome = explode(" ",$nomeUsuario);             $nomeUsuario = $nome[0]; ?>
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
                <?php echo "<a href='../../Function/Relatorio/Geral/grlAlocacao.php' target='_blank' class='btn btn-warning pull-left h2'><img src='../../../img/print.png' href='#'></a>";?>
                <div class="col-md-6">
                    <div class="input-group h2">
                        <input id = "busca" name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Alocação">
                        <script> 
                        $("#busca").keyup(function() {
                        var busca  = $("#busca").val();
                        $.post('../Busca/buscaAlocacaoF.php', {busca: busca}, function(data){
                            $("#result").html(data);                            
                                });
                            });
                        </script>
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </div>


                <div class="adicionaAlocacao">
                    <a href="../Adiciona/adicionaAlocacaoF.php"><img src='../../../img/prancheta.png'></a>
                    <a href="../Adiciona/adicionaAlocacao.php"><img src='../../../img/volante2.png'></a>

                </div>
            </div> <!-- /#top -->
             <hr />
            <div id="list" class="row">

                <div class="table-responsive col-md-12">
                    <table id = "result" class="table table-striped" cellspacing="0" cellpadding="0">
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
                            INNER JOIN tbturno ON tbturno.codTurno = tbalocacao.codTurno
                            INNER JOIN tblinha ON tblinha.codLinha = tbalocacao.codLinha 
                            INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario 
                            INNER JOIN tbusuario ON tbfuncionario.codUsuario = tbusuario.codUsuario 
                            INNER JOIN tbnivelusuario ON tbnivelusuario.codNivelUsuario = tbusuario.codNivelUsuario
                            WHERE descricaoNivelUsuario like 'Fiscal'
                            ORDER BY fimAlocacao ASC LIMIT $inicio, $qnt_result_pg";
                            $result = mysqli_query($connect,$sql);
                           
                            
                            
                            while($element = mysqli_fetch_array($result)){
                                $codAlocacao = $element['codAlocacao'];
                                $codOninus = $element['codOninus'];
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
             </div> <!-- /#list -->
            <div id="bottom" class="row">
                <div class="col-md-12">

                    <ul class="pagination">
                        
                        <li><a href="visualizaAlocacaoF.php?pagina=1">&lt; Primeira</a></li>
                        <?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                                    if($pag_ant >=1){
                                        echo "<li><a href='visualizaAlocacaoF.php?pagina=$pag_ant'>$pag_ant</a></li>";
                                    }
                                    echo"<li class='disable'><a> $pagina </a></li>";
                                }for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                                    if($pag_dep <= $quantidade_pg){
				                        echo "<li><a href='visualizaAlocacaoF.php?pagina=$pag_dep'>$pag_dep</a></li>";
                                    }
                                }
                                echo"<li class='next'><a href='visualizaAlocacaoF.php?pagina=$quantidade_pg' rel='next'>Ultima &gt;</a></li>";
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