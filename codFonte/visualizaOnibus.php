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

    </head>
    
    <body>
        <script src="../../../bootstrap/js/jquery.min.js"></script>
        <script src="../../../bootstrap/js/bootstrap.min.js"></script>
        <script src="../../../bootstrap/js/alert.js"></script>    

        
        <div id="main" class="container-fluid">
            <div id="top" class="row">
                <div class="col-md-2">
                    
                    <div class="ArrumaSE">
                    <h2>Ônibus</h2>
                    </div>
                    
                </div>
                <div id="relatorioG">
                <a href='../../Function/Relatorio/Geral/grlOnibus.php' target='_blank' class='btn btn-warning pull-left h2'><img src='../../../img/print.png' href='#'></a>
                </div>
                <div class="col-md-6">
                    <div class="input-group h2">
                       <input id = "busca" name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Ônibus">
                        <script> 
                        $("#busca").keyup(function() {
                        var busca  = $("#busca").val();
                        $.post('../Busca/buscaOnibus.php', {busca: busca}, function(data){
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
                    <a href="../Adiciona/adicionaOnibus.php" class="btn btn-primary pull-right h2">Novo Ônibus</a>
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
                      <span class="input-group-btn">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalFabricante" onclick="chamaFabricante()"><span class="glyphicon glyphicon-search"></span></button>
                     </span>
                  </div>
                 </div>
                    <!------Chama Fabricante-------->

                    <script>
                        function chamaFabricante() {
                            $(document).ready(function() {
                                $('#ModalFabricante').modal('show');
                            });
                        }
                    </script>
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
                      </button> <!-- href='../../Function/Relatorio/Cruzada/czdOnibus.php' target='_blank'-->
                      <a id="relatorioI" class='btn btn-warning pull-left h2' onclick="relatorioCruzado()"><img src='../../../img/print.png'></a>
                 </div>
             </div>
             <hr/>
            <div id="list" class="row">

                <div class="table-responsive col-md-12">
                <div id="resultadoB"></div>
                <div id="resultadoT">
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
                            /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
                            $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
                            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                            $qnt_result_pg = 10;
                            $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
                            $sql = "SELECT * FROM tbonibus ORDER BY placaOnibus ASC LIMIT $inicio, $qnt_result_pg";
                            $result = mysqli_query($connect,$sql);
                            while($element = mysqli_fetch_array($result)){
                                $codModelo = $element['codModelo'];
                                $codCooperativa = $element ['codCooperativa'];
                                $codOnibus = $element['codOnibus'];
                                
                                $sqlS = "SELECT * FROM tbmodelo WHERE codModelo = '$codModelo'";
                                $resultS = mysqli_query($connect,$sqlS);
                                $elementS = mysqli_fetch_array($resultS);
                                
                                $placaOnibus = $element ['placaOnibus'];
                                $prefixoOnibus= $element ['prefixoOnibus'];
                                $operacao = $element ['operacao'];
                                $ano = $elementS['anoFabricacao'];
                                $modelo = $elementS ['nomeModelo'];   
                                
                                $codFabricante = $elementS ['codFabricante'];
                                $sqlSE = "SELECT * FROM tbfabricante WHERE codFabricante = '$codFabricante'";
                                $resultSE = mysqli_query($connect,$sqlSE);
                                $elementSE = mysqli_fetch_array($resultSE);
                                $fabricante = $elementSE ['nomeFabricante'];
                                
                                $sqlC = "SELECT * FROM tbcooperativa WHERE codCooperativa = '$codCooperativa'";
                                $resultC = mysqli_query($connect,$sqlC);
                                $elementC = mysqli_fetch_array($resultC);
                                $cooperativa = $elementC ['nomeCooperativa'];
                                
                                
                                
                            echo"<tr>
                                <td data-title='placaOnibus'>$placaOnibus</td>

                                <td data-title='prefixoOnibus'>$prefixoOnibus</td>   
                                <td data-title='nomeModelo' id='limite'>$modelo</td>

                                <td data-title='nomeFabricante' id='limite'>$fabricante</td>

                                <td data-title='nomeCooperativa'>$cooperativa</td>
                                <td data-title='anoFabricacao'>$ano</td>

                                <td data-title='operacao'>$operacao</td>

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
                    </div>
                 </div>
             </div> <!-- /#list -->
            <div id="bottom" class="row">
                <div class="col-md-12">

                    <ul class="pagination">
                        
                        <li><a href="visualizaOnibus.php?pagina=1">&lt; Primeira</a></li>
                        <?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                                    if($pag_ant >=1){
                                        echo "<li><a href='visualizaOnibus.php?pagina=$pag_ant'>$pag_ant</a></li>";
                                    }
                                    echo"<li class='disable'><a> $pagina </a></li>";
                                }for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                                    if($pag_dep <= $quantidade_pg){
				                        echo "<li><a href='visualizaOnibus.php?pagina=$pag_dep'>$pag_dep</a></li>";
                                    }
                                }
                                echo"<li class='next'><a href='visualizaOnibus.php?pagina=$quantidade_pg' rel='next'>Ultima &gt;</a></li>";
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
<script>
$(document).ready(function() {
  $('#inpAnoFabricacao').keyup(function() {
    var anoA = document.getElementById('inpAnoFabricacao').val();
    alert(anoA);
    if (anoA!=null) {
       document.getElementById('chkAnoFabricacao').cheked = true;
    } else {
//       document.getElementById('inpAnoA').disabled = true;
  //     document.getElementById('ate').style.display = "none";       
    }
  });
});
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
            $.post('../../Function/Filtro/ftOnibus.php', {
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
            $.post('../../Function/Filtro/ftOnibus.php', {
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
            $.post('../../Function/Filtro/ftOnibus.php', {
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
            $.post('../../Function/Filtro/ftOnibus.php', {
                escolha: escolha,
                Fabricante: Fabricante 
            },
            function(data) {
                document.getElementById('resultadoT').style.display = "none";
                $("#resultadoB").html(data);
            });
            
       }else if(cFabricante==true && cModelo==true && cAnoFabricacao==true && cAnoOperacao==false){
            escolha=5;
           $.post('../../Function/Filtro/ftOnibus.php', {
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
            $.post('../../Function/Filtro/ftOnibus.php', {
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
            $.post('../../Function/Filtro/ftOnibus.php', {
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
            $.post('../../Function/Filtro/ftOnibus.php', {
                escolha: escolha,
                AnoFabricacao: AnoFabricacao
            },
            function(data) {
                document.getElementById('resultadoT').style.display = "none";
                $("#resultadoB").html(data);
            });
            
       }else if(cFabricante==false && cModelo==false && cAnoFabricacao==false && cAnoOperacao==true){
            escolha=9;
            $.post('../../Function/Filtro/ftOnibus.php', {
                escolha: escolha,
                AnoOperacao: AnoOperacao 
            },
            function(data) {
                document.getElementById('resultadoT').style.display = "none";
                $("#resultadoB").html(data);
            });
            
       }else  if(cFabricante==true && cModelo==false && cAnoFabricacao==true && cAnoOperacao==false){
            escolha=10;
            $.post('../../Function/Filtro/ftOnibus.php', {
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
            $.post('../../Function/Filtro/ftOnibus.php', {
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

<!--------------------------Relatorio-Cruzado---------------------------->
<script>
function relatorioCruzado(){
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
            });
            window.open('../../Function/Relatorio/Cruzada/cruOnibus.php?escolha='+escolha+'&Fabricante='+Fabricante+'&Modelo='+Modelo+'&AnoFabricacao='+AnoFabricacao+'&AnoOperacao='+AnoOperacao+'','_blank');
            
       }else if(cFabricante==true && cModelo==false && cAnoFabricacao==true && cAnoOperacao==true){
            escolha=2;
            $.post('../../Function/Relatorio/Cruzada/cruOnibus.php', {
                escolha: escolha,
                Fabricante: Fabricante,
                AnoFabricacao: AnoFabricacao,
                AnoOperacao: AnoOperacao
            });
              window.open('../../Function/Relatorio/Cruzada/cruOnibus.php?escolha='+escolha+'&Fabricante='+Fabricante+'&AnoFabricacao='+AnoFabricacao+'&AnoOperacao='+AnoOperacao+'','_blank');
            
       }else if(cFabricante==true && cModelo==false && cAnoFabricacao==false && cAnoOperacao==true){
            escolha=3;
            $.post('../../Function/Relatorio/Cruzada/cruOnibus.php', {
                escolha: escolha,
                Fabricante: Fabricante,
                AnoOperacao: AnoOperacao 
            });
            window.open('../../Function/Relatorio/Cruzada/cruOnibus.php?escolha='+escolha+'&Fabricante='+Fabricante+'&AnoFabricacao='+AnoFabricacao+'','_blank');
       }else if(cFabricante==true && cModelo==false && cAnoFabricacao==false && cAnoOperacao==false){
            escolha=4;
            $.post('../../Function/Relatorio/Cruzada/cruOnibus.php', {
                escolha: escolha,
                Fabricante: Fabricante 
            });
            window.open('../../Function/Relatorio/Cruzada/cruOnibus.php?escolha='+escolha+'&Fabricante='+Fabricante+'','_blank');
            
       }else if(cFabricante==true && cModelo==true && cAnoFabricacao==true && cAnoOperacao==false){
            escolha=5;
            $.post('../../Function/Relatorio/Cruzada/cruOnibus.php', {
                escolha: escolha,
                Fabricante: Fabricante,
                Modelo: Modelo,
                AnoFabricacao: AnoFabricacao
            });
            window.open('../../Function/Relatorio/Cruzada/cruOnibus.php?escolha='+escolha+'&Fabricante='+Fabricante+'&Modelo='+Modelo+'&AnoFabricacao='+AnoFabricacao+'','_blank');
       }else if(cFabricante==true && cModelo==true && cAnoFabricacao==false && cAnoOperacao==true){
            escolha=6;
            $.post('../../Function/Relatorio/Cruzada/cruOnibus.php', {
                escolha: escolha,
                Fabricante: Fabricante,
                Modelo: Modelo,
                AnoOperacao: AnoOperacao 
            });
            window.open('../../Function/Relatorio/Cruzada/cruOnibus.php?escolha='+escolha+'&Fabricante='+Fabricante+'&Modelo='+Modelo+'&AnoOperacao='+AnoOperacao+'','_blank');
            
       }else if(cFabricante==false && cModelo==false && cAnoFabricacao==true && cAnoOperacao==true){
            escolha=7;
            $.post('../../Function/Relatorio/Cruzada/cruOnibus.php', {
                escolha: escolha,
                AnoFabricacao: AnoFabricacao,
                AnoOperacao: AnoOperacao 
            });
            window.open('../../Function/Relatorio/Cruzada/cruOnibus.php?escolha='+escolha+'&AnoFabricacao='+AnoFabricacao+'&AnoOperacao='+AnoOperacao+'','_blank');            
       
       }else if(cFabricante==false && cModelo==false && cAnoFabricacao==true && cAnoOperacao==false){
            escolha=8;
            $.post('../../Function/Relatorio/Cruzada/cruOnibus.php', {
                escolha: escolha,
                AnoFabricacao: AnoFabricacao
            });
            window.open('../../Function/Relatorio/Cruzada/cruOnibus.php?escolha='+escolha+'&AnoFabricacao='+AnoFabricacao+'','_blank');            
            
       }else if(cFabricante==false && cModelo==false && cAnoFabricacao==false && cAnoOperacao==true){
            escolha=9;
            $.post('../../Function/Relatorio/Cruzada/cruOnibus.php', {
                escolha: escolha,
                AnoOperacao: AnoOperacao 
            });
            window.open('../../Function/Relatorio/Cruzada/cruOnibus.php?escolha='+escolha+'&AnoOperacao='+AnoOperacao+'','_blank');            
            
       }else  if(cFabricante==true && cModelo==false && cAnoFabricacao==true && cAnoOperacao==false){
            escolha=10;
            $.post('../../Function/Relatorio/Cruzada/cruOnibus.php', {
                escolha: escolha,
                Fabricante: Fabricante,
                AnoFabricacao: AnoFabricacao
            });
            window.open('../../Function/Relatorio/Cruzada/cruOnibus.php?escolha='+escolha+'&Fabricante='+Fabricante+'&AnoFabricacao='+AnoFabricacao+'','_blank');
       
       }else if(cFabricante==true && cModelo==true && cAnoFabricacao==false && cAnoOperacao==false){
           escolha=11;
            $.post('../../Function/Relatorio/Cruzada/cruOnibus.php', {
                escolha: escolha,
                Fabricante: Fabricante,
                Modelo: Modelo
            });
            window.open('../../Function/Relatorio/Cruzada/cruOnibus.php?escolha='+escolha+'&Fabricante='+Fabricante+'&Modelo='+Modelo+'','_blank');
       }else{
               document.getElementById('resultadoB').style.display = "none";
               document.getElementById('resultadoT').style.display = "inline";
       }
}
</script>

    <!--------------------Modal Modelo--------------------->
    <div class="modal fade" id="ModalModelo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?php
               /*$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $conn = mysqli_connect('localhost','root','','bdfiscall');
                $query = mysqli_query($conn, "SELECT nomeModelo,descricaoTipoModelo FROM tbmodelo INNER JOIN tbtipomodelo ON tbtipomodelo.codTipoModelo = tbmodelo.codTipoModelo
                ORDER BY nomeModelo ASC");

                ?>
                        <h4 class="modal-title" id="myModalLabel">Pesquisar Modelo</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <input type="hidden" name="pagina" value="adiciona">
                        <label for="campo1">Modelo:</label>
                        <input id="buscaModelo" name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Modelo">
                    </div>
                    <div id="list" class="row">
                        <div class="table-responsive col-md-12">

                            <table id="resultOnibus" class="table table-striped" cellspacing="0" cellpadding="0">
                                <thead>
                                    <tr>
                                        <th>Modelo</th>
                                        <th>Tipo de Modelo</th>
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
                                            <td data-title='nomeModelo'>
                                                <?php echo $row['nomeModelo']; ?>
                                            </td>
                                            <td data-title='descricaoTipoModelo'>
                                                <?php echo $row['descricaoTipoModelo'];?>
                                            </td>
                                            <td><button class='btn btn-primary btn-sm' onclick="addModelo('<?php echo $row['nomeModelo']; ?>')">+</button></td>
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
    <div id="resultado"></div>
    <!--------------------Função Modelo ---------------------->

    <script language='javascript' type='text/javascript'>
        function addModelo(nomeModelo) {
            $('#ModalModelo').modal('hide');
            document.getElementById('inpModelo').value = nomeModelo;
            $('#inpModelo').html(nomeModelo).attr('value', nomeModelo);


        }
    </script>

    <!----------------Busca Modelo---------------------->

    <script>
        $("#buscaModelo").keyup(function() {
            var busca = $("#buscaModelo").val();
            $.post('../Busca/buscaModeloA.php', {
                busca: busca
            }, function(data) {
                $("#resultModelo").html(data);
            });
        });
    </script>

    <!--------------------Modal Fabricante--------------------->
    <div class="modal fade" id="ModalFabricante" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?php
               /*$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $conn = mysqli_connect('localhost','root','','bdfiscall');
                $query = mysqli_query($conn, "SELECT nomeFabricante,cnpjFabricante FROM tbfabricante ORDER BY nomeFabricante ASC");

                ?>
                        <h4 class="modal-title" id="myModalLabel">Pesquisar Fabricante</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <input type="hidden" name="pagina" value="adiciona">
                        <label for="campo1">Fabricante:</label>
                        <input id="buscaFabricante" name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Fabricante">
                    </div>
                    <div id="list" class="row">
                        <div class="table-responsive col-md-12">

                            <table id="resultFabricante" class="table table-striped" cellspacing="0" cellpadding="0">
                                <thead>
                                    <tr>
                                        <th>Fabricante</th>
                                        <th>CNPJ</th>
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
                                            <td data-title='nomeFabricante'>
                                                <?php echo $row['nomeFabricante']; ?>
                                            </td>
                                            <td data-title='cnpjFabricante'>
                                                <?php echo $row['cnpjFabricante'];?>
                                            </td>
                                            <td><button class='btn btn-primary btn-sm' onclick="addFabricante('<?php echo $row['nomeFabricante']; ?>')">+</button></td>
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
    <div id="resultado"></div>
    <!--------------------Função Fabricante ---------------------->

    <script language='javascript' type='text/javascript'>
        function addFabricante(nomeFabricante) {
            $('#ModalFabricante').modal('hide');
            document.getElementById('inpFabricante').value = nomeFabricante;
            $('#inpFabricante').html(nomeFabricante).attr('value', nomeFabricante);
            document.getElementById('chkFabricante').checked = true;
            document.getElementById('chkModelo').disabled = false;
            document.getElementById('slcModelo').disabled = false;
            atualizar();
        }
    </script>

    <!----------------Busca Fabricante---------------------->

    <script>
        $("#buscaFabricante").keyup(function() {
            var busca = $("#buscaFabricante").val();
            $.post('../Busca/buscaFabricanteA.php', {
                busca: busca
            }, function(data) {
                $("#resultFabricante").html(data);
            });
        });
    </script>
    <script>
    function fecharModal(){
       $('#ModalFabricante').modal('hide');  
    }
    </script>
    <script type="text/javascript">
        
            function atualizar() {
                if ($('#inpFabricante').val()) {
                    document.getElementById('slcModelo').style.display = "none";
                    $.getJSON('ModeloPost.php?search=nomeFabricante', {
                    
                        nomeFabricante: $('#inpFabricante').val(),
                        ajax: 'true'
                    }, function(j) {
                        var options = '<option value="">Escolha Modelo</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i].codModelo + '">' + j[i].nomeModelo + '</option>';
                        }
                        $('#slcModelo').html(options);
                      });
                        document.getElementById('slcModelo').style.display = "inline";

                } else {
                $('#slcModelo').show();
                    $('#slcModelo').html('<option value="">– Escolha um Modelo –</option>');
                }
            }
        
    </script>