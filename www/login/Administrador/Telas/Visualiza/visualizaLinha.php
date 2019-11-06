<?php require_once('../../../../verificaS.php');
 $nomeUsuario= $_SESSION['nomeUsuario']; 
            $nome = explode(" ",$nomeUsuario);
            $nomeUsuario = $nome[0];
?>
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
        
    </head>
    
    <body>
        <script src="../../../bootstrap/js/jquery.min.js"></script>
        <script src="../../../bootstrap/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="../../../bootstrap/js/alert.js"></script>    

        <div id="main" class="container-fluid">
            <div id="top" class="row">
                <div class="col-md-2">
                    
                    <div class="ArrumaSE">
                    <h2>Linhas</h2>
                    </div>
                    
                </div>
                <?php echo "<a href='../../Function/Relatorio/Geral/grlLinha.php' target='_blank' class='btn btn-warning pull-left h2'><img src='../../../img/print.png' href='#'></a>";?>
                <div class="col-md-6">
                    <div class="input-group h2">
                        <input id = "busca" name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Linha">
                        <script> 
                        $("#busca").keyup(function() {
                        var busca  = $("#busca").val();
                        $.post('../Busca/buscaLinha.php', {busca: busca}, function(data){
                            $("#result").html(data);                            
                                });
                            });
                        </script>
                         <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit" onclick="abrir()">
                                <span class="glyphicon glyphicon-filter"></span>
                            </button>
                        </span>
                    </div>
                </div>

                <div class="col-md-3">
                    <a href="../Adiciona/adicionaLinha.php" class="btn btn-primary pull-right h2">Nova Linha</a>
                </div>
            </div> <!-- /#top -->
            
             <div class="row">
            <div id="divEsconder">
                <div class="form-group col-md-3">
                      <label class="form-check-label">
                      Fabricante
                      </label>
                     <div class="input-group">
                      <span class="input-group-addon" >
                        <input type="checkbox" aria-label="..."id='chkFabricante'>
                      </span>
                      <input class="form-control" placeholder="Caio" type="text" readonly id="inpFabricante">
                  </div>
                 </div>
                
                    <div class="form-group col-md-3">
                      <label class="form-check-label" for="defaultCheck1" id="lblModelo">
                      Modelo:
                      </label>
                      <div class="input-group">
                      <span class="input-group-addon" >
                        <input type="checkbox" aria-label="..."id="chkModelo" disabled>
                      </span>
                      <select disabled name="codModelo" id="slcModelo" required class="form-control">
                        <option>
                        Selecione...
                        </option>
                      </select>
                      </div>
                    </div>
                 <?php
                 $Ano = date("Y");
                 $AnoMin = $Ano-15;
                 $AnoMax = $Ano+10;
                 ?>
                 <div class="form-group col-md-2">
                      <label class="form-check-label" id="lblAnoFabricacao">
                      Ano Fabricação
                      </label>
                      <div class="input-group">
                           <span class="input-group-addon" >
                                <input type="checkbox" aria-label="..." id="chkAnoFabricacao">
                           </span>
                           <input class="form-control" placeholder="2010" id="inpAnoFabricacao" type="text"  min="<?php echo"$AnoMin"; ?>" max="<?php echo"$Ano"; ?>">
                      </div>
                 </div>
                 <div class="form-group col-md-2">
                      <label class="form-check-label" id="lblAnoOperacao" >
                      Ano Operação
                      </label>
                      <div class="input-group">
                           <span class="input-group-addon" >
                                <input type="checkbox" aria-label="..." id="chkAnoOperacao">
                           </span>

                      <input class="form-control" placeholder="2010" id="inpAnoOperacao" type="text" min="<?php echo"$AnoMin"; ?>" max="<?php echo"$AnoMax"; ?>" >
                      </div>
                 </div>
                      <button id="buscaEs" class="btn btn-primary" type="submit" onclick="bFiltro()">
                           <span class="glyphicon glyphicon-search"></span>
                      </button>
                      <a href='../../Function/Relatorio/Geral/grlOnibus.php' target='_blank' id="relatorioI" class='btn btn-warning pull-left h2'><img src='../../../img/print.png'></a>
                 </div>
             </div>
             <hr />
            <div id="list" class="row">

                <div class="table-responsive col-md-12">
                    <table id ="result" class="table table-striped" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                
                                <th id="limite">Linha</th>
                                <th id="limite">Número</th>
                                <th id="limite">Tarifa</th>
                                <th id="limite">Ida</th>
                                <th id="limite">Volta</th>
                                <th id="limite">Início</th>
                                <th id="limite">Término</th>
                                <th class="actions">Ações</th>
                             </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                             echo"<meta charset='utf-8'>";
                            /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
                            $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
                            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                            $qnt_result_pg = 6;
                            $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
                            $sql = "SELECT * FROM tblinha ORDER BY nomeLinha ASC LIMIT $inicio, $qnt_result_pg";
                            $result = mysqli_query($connect,$sql);
                            while($element = mysqli_fetch_array($result)){
                                $codLinha = $element['codLinha'];
                                $sql_Ida = "SELECT * FROM tbponto WHERE codLinha='$codLinha' AND codTipoViagem='1'";
                                $result_Ida = mysqli_query($connect,$sql_Ida);
                                $element_Ida = mysqli_fetch_array($result_Ida);
                                $sql_Volta = "SELECT * FROM tbponto WHERE codLinha='$codLinha' AND codTipoViagem='2'";
                                $result_Volta = mysqli_query($connect,$sql_Volta);
                                $element_Volta = mysqli_fetch_array($result_Volta);
                                $nomeLinha = $element['nomeLinha'];
                                $numLinha = $element['numLinha'];
                                $tarifaLinha = $element['tarifaLinha'];
                                $ida = $element_Ida['descricaoPonto'];
                                $volta = $element_Volta['descricaoPonto'];
                                $horaFuncionamento = $element['horaFuncionamento'];
                                $horaTermino = $element['horaTermino'];
                            
                            echo"<tr>
                                    <td data-title='nomeLinha' id='limite'>$nomeLinha</td>
                                    <td data-title='numLinha'>$numLinha</td>
                                    <td data-title='tarifaLinha'>$tarifaLinha</td>
                                    <td data-title='ida' id='limite'>$ida</td> 
                                    <td data-title='volta' id='limite'>$volta</td> 
                                    <td data-title='horaFuncionamento'>$horaFuncionamento</td> 
                                    <td data-title='horaTermino'>$horaTermino</td> 
                                    
                                <td class='actions' id='limite'>
                                    
                                    <a href='../../Function/Relatorio/Especifico/espLinha.php?codLinha="  . $element['codLinha'] .  "' target='_blank'><img src='../../../img/print.png'></a>
                                    <a href='../Edita/editaLinha.php?codLinha=" . $element['codLinha'] . "'><img src='../../../img/edit.png'></a>
                                     <a onclick='deletar($codLinha)' href='#'><img src='../../../img/close.png'></a>
                                </td>";                             
                            }
                            echo"<script language='javascript' type='text/javascript'>

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
                                        }).then((value) => { window.location.href='../../Function/Deletar/deletarLinha.php?codLinha='+cod+';'});

                                      } else {
                                        
                                      }
                                    });
                                }
                            </script>";
                            $result_pg = "SELECT COUNT(nomeLinha) AS num_result FROM tblinha";
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
                        <li><a href="visualizaLinha.php?pagina=1">&lt; Primeira</a></li>
                        <?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                                    if($pag_ant >=1){
                                        echo "<li><a href='visualizaLinha.php?pagina=$pag_ant'>$pag_ant</a></li>";
                                    }
                                    echo"<li class='disable'><a> $pagina </a></li>";
                                }for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                                    if($pag_dep <= $quantidade_pg){
				                        echo "<li><a href='visualizaLinha.php?pagina=$pag_dep'>$pag_dep</a></li>";
                                    }
                                }
                                echo"<li class='next'><a href='visualizaLinha.php?pagina=$quantidade_pg' rel='next'>Ultima &gt;</a></li>";
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


<!--------------------------Relatorio-Cruzado---------------------------->
<script>
function bFiltro(){
     var cFabricante = document.getElementById('chkFabricante').checked;
     var cModelo = document.getElementById('chkModelo').checked;
     var cAnoFabricacao = document.getElementById('chkAnoFabricacao').checked;
     var cAnoOperacao = document.getElementById('chkAnoOperacao').checked;

     var Fabricante = $("#inpFabricante").val();
     var Modelo = $("#slcModelo").val();
     var AnoFabricacao = $("#inpAnoFabricacao").val();
     var AnoOperacao = $("#inpAnoOperacao").val();
     var escolha = 0;  
     
       if(cFabricante==true && cModelo==true && cAnoFabricacao==true && cAnoOperacao==true){
            escolha=1;
            $.post('../../Function/Relatorio/Cruzada/cruOnibus.php', {
                escolha: escolha,
                Fabricante: Fabricante,
                Modelo: Modelo,
                AnoFabricacao: AnoFabricacao,
                AnoOperacao: AnoOperacao 
            },
            function(data) {
                document.getElementById('resultadoT').style.display = "none";
                $("#resultadoB").html(data);
            });
            
       }else if(cFabricante==true && cModelo==false && cAnoFabricacao==true && cAnoOperacao==true){
            escolha=2;
            $.post('../../Function/Relatorio/Cruzada/cruOnibus.php', {
                escolha: escolha,
                Fabricante: Fabricante,
                AnoFabricacao: AnoFabricacao,
                AnoOperacao: AnoOperacao
            },
            function(data) {
                document.getElementById('resultadoT').style.display = "none";
                $("#resultadoB").html(data);
            });
            
       }else if(cFabricante==true && cModelo==false && cAnoFabricacao==false && cAnoOperacao==true){
            escolha=3;
            $.post('../../Function/Relatorio/Cruzada/cruOnibus.php', {
                escolha: escolha,
                Fabricante: Fabricante,
                AnoOperacao: AnoOperacao 
            },
            function(data) {
                document.getElementById('resultadoT').style.display = "none";
                $("#resultadoB").html(data);
            });
            
       }else if(cFabricante==true && cModelo==false && cAnoFabricacao==false && cAnoOperacao==false){
            escolha=4;
            $.post('../../Function/Relatorio/Cruzada/cruOnibus.php', {
                escolha: escolha,
                Fabricante: Fabricante 
            },
            function(data) {
                document.getElementById('resultadoT').style.display = "none";
                $("#resultadoB").html(data);
            });
            
       }else if(cFabricante==true && cModelo==true && cAnoFabricacao==true && cAnoOperacao==false){
            escolha=5;
            $.post('../../Function/Relatorio/Cruzada/cruOnibus.php', {
                escolha: escolha,
                Fabricante: Fabricante,
                Modelo: Modelo,
                AnoFabricacao: AnoFabricacao
            },
            function(data) {
                document.getElementById('resultadoT').style.display = "none";
                $("#resultadoB").html(data);
            });
            
       }else if(cFabricante==true && cModelo==true && cAnoFabricacao==false && cAnoOperacao==true){
            escolha=6;
            $.post('../../Function/Relatorio/Cruzada/cruOnibus.php', {
                escolha: escolha,
                Fabricante: Fabricante,
                Modelo: Modelo,
                AnoOperacao: AnoOperacao 
            },
            function(data) {
                document.getElementById('resultadoT').style.display = "none";
                $("#resultadoB").html(data);
            });
            
       }else if(cFabricante==false && cModelo==false && cAnoFabricacao==true && cAnoOperacao==true){
            escolha=7;
            $.post('../../Function/Relatorio/Cruzada/cruOnibus.php', {
                escolha: escolha,
                AnoFabricacao: AnoFabricacao,
                AnoOperacao: AnoOperacao 
            },
            function(data) {
                document.getElementById('resultadoT').style.display = "none";
                $("#resultadoB").html(data);
            });
            
       }else if(cFabricante==false && cModelo==false && cAnoFabricacao==true && cAnoOperacao==false){
            escolha=8;
            $.post('../../Function/Relatorio/Cruzada/cruOnibus.php', {
                escolha: escolha,
                AnoFabricacao: AnoFabricacao
            },
            function(data) {
                document.getElementById('resultadoT').style.display = "none";
                $("#resultadoB").html(data);
            });
            
       }else if(cFabricante==false && cModelo==false && cAnoFabricacao==false && cAnoOperacao==true){
            escolha=9;
            $.post('../../Function/Relatorio/Cruzada/cruOnibus.php', {
                escolha: escolha,
                AnoOperacao: AnoOperacao 
            },
            function(data) {
                document.getElementById('resultadoT').style.display = "none";
                $("#resultadoB").html(data);
            });
            
       }else  if(cFabricante==true && cModelo==false && cAnoFabricacao==true && cAnoOperacao==false){
            escolha=10;
            $.post('../../Function/Relatorio/Cruzada/cruOnibus.php', {
                escolha: escolha,
                Fabricante: Fabricante,
                AnoFabricacao: AnoFabricacao
            },
            function(data) {
                document.getElementById('resultadoT').style.display = "none";
                $("#resultadoB").html(data);
            });
       }else if(cFabricante==true && cModelo==true && cAnoFabricacao==false && cAnoOperacao==false){
           escolha=11;
            $.post('../../Function/Relatorio/Cruzada/cruOnibus.php', {
                escolha: escolha,
                Fabricante: Fabricante,
                Modelo: Modelo
            },
            function(data) {
                document.getElementById('resultadoT').style.display = "none";
                $("#resultadoB").html(data);
            });
       }else{
               document.getElementById('resultadoB').style.display = "none";
               document.getElementById('resultadoT').style.display = "inline";
       }
}
</script>