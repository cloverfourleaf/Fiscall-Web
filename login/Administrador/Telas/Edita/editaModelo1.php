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
        
    </head>
    
    <body>
       <script src ='../../../bootstrap/js/alert.js'></script> 
       <script src="../../../bootstrap/js/jquery.min.js"></script>
       <script src="../../../bootstrap/js/bootstrap.min.js"></script>
       <script type="text/javascript" src="../../../bootstrap/js/jquery.mask.js"></script>
       <script type = "text/javascript" src ="../../../bootstrap/js/cpfcnpj.js"></script>


        <div id="main" class="container-fluid">
            <h3 class="page-header">Editar Modelo</h3>
        
            <form id="editar" method="post">
                <div class="row">
                    <?php
                        /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');

                        $codigo = filter_input(INPUT_GET, 'codModelo', FILTER_SANITIZE_NUMBER_INT);
                        $result_modelo = "SELECT * FROM tbmodelo WHERE codModelo = '$codigo'";
                        $resultado_modelo = mysqli_query($connect, $result_modelo);
                        $row_modelo = mysqli_fetch_assoc($resultado_modelo);
    
                        $codFabricante = $row_modelo['codFabricante'];
                        $codTipoModelo = $row_modelo['codTipoModelo'];
                    
                        $result_fabricante = "SELECT * FROM tbfabricante WHERE codFabricante = '$codFabricante'";
                        $resultado_fabricante = mysqli_query($connect, $result_fabricante);
                        $row_fabricante = mysqli_fetch_assoc($resultado_fabricante);
                        
                        $nomeFabricante = $row_fabricante['nomeFabricante'];
                        
                        $result_tipo = "SELECT * FROM tbtipomodelo WHERE codTipoModelo = '$codTipoModelo'";
                        $resultado_tipo = mysqli_query($connect, $result_tipo);
                        $row_tipo = mysqli_fetch_assoc($resultado_tipo);
                        
                        $descricaoTipoModelo = $row_tipo['descricaoTipoModelo'];
                    
                    ?>
                    <input type="hidden" id="codModelo" name="codModelo" value="<?php echo $codigo ?>">
                    <div class="form-group col-md-4">
                        <label for="campo1">Modelo:</label>
                        <input type="text" class="form-control" id="nomeModelo" name="nomeModelo" placeholder="Ex.: Mercedes" value="<?php echo $row_modelo['nomeModelo']; ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="campo2">Fabricante</label>
                        <div class="input-group">
                        <select id="codFabricante" name="codFabricante" required class="form-control">
                            <?php
                          echo "<option value = '$codFabricante'>$nomeFabricante</option>";
                            
                            /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
                            $sql = "SELECT codFabricante, nomeFabricante FROM tbfabricante ORDER BY nomeFabricante ASC";
                            $result = mysqli_query($connect,$sql);
                            while($element = mysqli_fetch_array($result)){
                                    $codFabricante = $element['codFabricante'];
                                    $nomeFabricante = $element['nomeFabricante'];
                                    echo "<option value = '$codFabricante'>$nomeFabricante</option>";
                            }
                            ?>
                        </select>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalFabricante" onclick="chamaFabricante">+</button>                        
                        </span>
                    </div>
                    
                    </div>
               </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="campo2">Tipo do Ônibus</label>
                        <div class="input-group">
                        <select id="codTipoModelo" name="codTipoModelo" required class="form-control">
                          <?php
                          echo "<option value = '$codTipoModelo'>$descricaoTipoModelo</option>";
                            
                            /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
                            $sql = "SELECT codTipoModelo, descricaoTipoModelo FROM tbtipomodelo ORDER BY descricaoTipoModelo ASC";
                            $result = mysqli_query($connect,$sql);
                            while($element = mysqli_fetch_array($result)){
                              $codTipoModelo = $element['codTipoModelo'];
                              $descricaoTipoModelo = $element['descricaoTipoModelo'];
                              echo "<option value = '$codTipoModelo'>$descricaoTipoModelo</option>";
                            }
                            ?>
                        </select>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalTipoModelo" onclick="chamaTipoModelo">+</button>                        
                        </span>
                        </div>
                    </div>
                    
                    <script>
                        function chamaTipoModelo() {
                            $(document).ready(function() {
                                $('#ModalTipoModelo').modal('show');
                            });
                        }
                    </script>
                    
                    <div class="form-group col-md-1">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="campo1">Ano de Fabricação</label>
                        <input type="text" class="form-control" id="anoFabricacao" name="anoFabricacao" placeholder="2010" value="<?php echo $row_modelo['anoFabricacao']; ?>">
                        <script>
                                  $(document).ready(function () { 
                                    var $seuCampoCpf = $("#anoFabricacao");
                                    $seuCampoCpf.mask('0000', {reverse: false});
                                });
                        </script>
                    </div> 
                </div>
                
                <hr>
                
                <div id="actions" class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                            <a href="../Visualiza/visualizaModelo.php" class="btn btn-default">Cancelar</a>
                    </div>
                </div>
            </form>
            </div>
            
        
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
    function chamaFabricante(){
    $(document).ready(function () {
        $('#ModalFabricante').modal('show');
    });
    }
</script>
<!---------------------Cadastrar Fabricante---------------------------->
<div class="modal fade" id="ModalFabricante" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form id="cadastrarFabricante" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Cadastro de Fabricante</h4>
                </div>
                <div class="modal-body">  
                    <div class="form-group col-md-10">
                        <input type="hidden" name="pagina" id="paginaModelo" value="editaM">
                        <label for="campo1">Fabricante:</label>
                        <input type="text" class="form-control" id="nomeFabricante" name="nomeFabricante" placeholder="Ex.: Mercedes">
                    </div>
                    <div class="form-group col-md-10">
                        <label for="campo1">CNPJ:</label>
                        <input type="text" class="form-control" id="cnpjFabricante" name="cnpjFabricante" placeholder="00.000.000/0000-00" placeholder="00.000.000/0000-00" onBlur="validaFormato(this);" onkeypress="return (apenasNumeros(event))">
                                                <style>
    #divResultado{
        font-family: sans-serif;
        font-size: 14px;
        color: black;
        margin-top: 4px;
    }
    </style>
                            <div id = "divResultado"></div>
</div>
                    <script>
                        $(document).ready(function () { 
                            var $CnpjFabricante = $("#cnpjFabricante");
                            $CnpjFabricante.mask('00.000.000/0000-00', {reverse: false});
                            });
                    </script>  
                    </div>
                <br><br><br><br><br>
                <br><br>
                <div class="modal-footer">
                    <section class="ArrumaModal">
                        <button type="submit" id = "b" class="btn btn-primary">Cadastrar</button>
                    </section>
                </div>
            </div>
        </div>
    </form>
</div>
 <!----------------Cadastrar Fabricante---------------------->

<div id="resultadoFabricante"></div>
<script>
    $(document).ready(function() {
        $("form#cadastrarFabricante").submit(function() {
            event.preventDefault();
            var pagina = $("#paginaModelo").val();
            var nomeFabricante = $("#nomeFabricante").val();
            var cnpjFabricante = $("#cnpjFabricante").val();
            $.post('../../Function/Cadastrar/cadastrarModalFabricanteA.php', {
                    nomeFabricante: nomeFabricante,
                    cnpjFabricante: cnpjFabricante,
                },
                function(data) {
                    $("#resultadoFabricante").html(data);
                });
        });
    });
</script>


 <!---------------- Modal Tipo Modelo---------------------->


    <div class="modal fade" id="ModalTipoModelo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <form id="cadastrarTipoModelo" method="post">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Cadastro do Tipo do Ônibus</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group col-md-10">
                            <input type="hidden" name="pagina" value="edita">
                            <label for="campo1">Tipo do Ônibus:</label>
                            <input type="text" class="form-control" id="descricaoTipoModelo" name="descricaoTipoModelo" placeholder="Ex.: Urbano">
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="modal-footer">
                        <section class="ArrumaModal">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </section>
                    </div>
                </div>
            </div>
        </form>
    </div>
 <!----------------Cadastrar Tipo Modelo---------------------->

<div id="resultadoTipoModelo"></div>
<script>
    $(document).ready(function() {
        $("form#cadastrarTipoModelo").submit(function() {
            event.preventDefault();
            var pagina = $("#paginaCooperativa").val();
            var descricaoTipoModelo = $("#descricaoTipoModelo").val();
            $.post('../../Function/Cadastrar/cadastrarModalTipoModelo.php', {
                    descricaoTipoModelo: descricaoTipoModelo,
                },
                function(data) {
                    $("#resultadoTipoModelo").html(data);
                });
        });
    });
</script>

<!----------------Editar---------------------->
<div id="resultado"></div>
<script> 
    $(document).ready(function() {
    $("form#editar").submit(function() {
        event.preventDefault();
        var codModelo  = $("#codModelo").val();
        var nomeModelo  = $("#nomeModelo").val();
        var anoFabricacao  = $("#anoFabricacao").val();
        var codFabricante  = $("#codFabricante").val();
        var codTipoModelo  = $("#codTipoModelo").val();

        $.post('../../Function/Editar/editarModelo.php', {
            codModelo: codModelo,
            nomeModelo: nomeModelo,
            anoFabricacao: anoFabricacao,
            codFabricante: codFabricante,
            codTipoModelo: codTipoModelo
        },
        function(data){
            $("#resultado").html(data);                            
        });
    });
    });
</script>