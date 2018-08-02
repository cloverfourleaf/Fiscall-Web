<?php require_once('../../../../verificaS.php'); session_start(); $nomeUsuario= $_SESSION['nomeUsuario'];              $nome = explode(" ",$nomeUsuario);             $nomeUsuario = $nome[0]; ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
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
                    <h2>Modelo</h2>
                    </div>
                </div>
                <?php echo "<a href='../../Function/Relatorio/Geral/grlModelo.php' target='_blank' class='btn btn-warning pull-left h2'><img src='../../../img/print.png' href='#'></a>";?>

                <div class="col-md-6">
                    <div class="input-group h2">
                       <input id = "busca" name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Modelo">
                        <script> 
                        $("#busca").keyup(function() {
                        var busca  = $("#busca").val();
                        $.post('../Busca/buscaModelo.php', {busca: busca}, function(data){
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

                <div class="col-md-3">
                    <a href="../Adiciona/adicionaModelo.php" class="btn btn-primary pull-right h2">Novo Modelo</a>
                </div>
            </div> <!-- /#top -->
             <hr />
            <div id="list" class="row">

                <div class="table-responsive col-md-12">
                    <table id = "result" class="table table-striped" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                
                                <th>Nome</th>
                                <th></th>
                                <th>Ano de Fabricação</th>
                                <th></th>
                                <th>Fabricante</th>
                                <th></th>
                                <th>Tipo de Ônibus</th>
                                <th></th>
                                <th></th>
                                <th></th>
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
                            $sql = "SELECT * FROM tbmodelo ORDER BY nomeModelo ASC LIMIT $inicio, $qnt_result_pg";
                            $result = mysqli_query($connect,$sql);
                            
                            while($element = mysqli_fetch_array($result)){
                                $codModelo = $element['codModelo'];
                                $codFabricante = $element['codFabricante'];
                                $codTipoModelo = $element['codTipoModelo'];
                                $nomeModelo = $element['nomeModelo'];
                                $anoFabricacao = $element['anoFabricacao'];
                                
                                $sqlF = "SELECT nomeFabricante FROM tbfabricante where codFabricante = $codFabricante";
                                $resultF = mysqli_query($connect,$sqlF);
                                $elementF = mysqli_fetch_array($resultF);
                                $nomeFabricante = $elementF['nomeFabricante'];
                                
                                $sqlT = "SELECT descricaoTipoModelo FROM tbtipomodelo where codTipoModelo= $codTipoModelo";
                                $resultT = mysqli_query($connect,$sqlT);
                                $elementT = mysqli_fetch_array($resultT);
                                $descricaoTipoModelo = $elementT['descricaoTipoModelo'];
                            
                            echo"<tr>
                                    <td data-title='nomeModelo' id='limite'>$nomeModelo</td>
                                    <td></td>
                                    <td data-title='anoFabricacao'>$anoFabricacao</td>
                                    <td></td>
                                    <td data-title='nomeFabricante' id='limite'>$nomeFabricante</td>
                                    <td></td>
                                    <td data-title='descricaoTipoModelo'>$descricaoTipoModelo</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    
                                    <td class='actions'>
                                    <a href='../../Function/Relatorio/Especifico/espModelo.php?codModelo=" . $element['codModelo'] . "' target='_blank'><img src='../../../img/print.png' href='#'></a>
                                    <a href='../Edita/editaModelo.php?codModelo=" . $element['codModelo'] . "'><img src='../../../img/edit.png'></a>
                                     <a onclick='deletar($codModelo)'><img src='../../../img/close.png'></a>
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
                                    }).then((value) => { window.location.href='../../Function/Deletar/deletarModelo.php?codModelo='+cod+';'});

                                  } else {
                                    
                                  }
                                });
                                }
                            </script>";
                            $result_pg = "SELECT COUNT(nomeModelo) AS num_result FROM tbmodelo";
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
                        
                        <li><a href="visualizaModelo.php?pagina=1">&lt; Primeira</a></li>
                        <?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                                    if($pag_ant >=1){
                                        echo "<li><a href='visualizaModelo.php?pagina=$pag_ant'>$pag_ant</a></li>";
                                    }
                                    echo"<li class='disable'><a> $pagina </a></li>";
                                    }for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                                        if($pag_dep <= $quantidade_pg){
                                            echo "<li><a href='visualizaModelo.php?pagina=$pag_dep'>$pag_dep</a></li>";
                                        }
                                    }
                                    echo"<li class='next'><a href='visualizaModelo.php?pagina=$quantidade_pg' rel='next'>Ultima &gt;</a></li>";
                        ?>
                    </ul>

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