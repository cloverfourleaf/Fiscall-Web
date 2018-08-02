<?php require_once('../../../../verificaS.php'); session_start(); $nomeUsuario= $_SESSION['nomeUsuario'];              $nome = explode(" ",$nomeUsuario);             $nomeUsuario = $nome[0]; ?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">

        <title>Fiscall</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../../../img/icone.png" type="image/x-png/">
        <link href="../../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../../../css/Smith.css">
        <script src='../../../bootstrap/js/alert.js'></script>
    </head>

    <body>
        <script src="../../../bootstrap/js/jquery.min.js"></script>
        <script src="../../../bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../../bootstrap/js/jquery.mask.js"></script>
        <script type="text/javascript" src = "../../../bootstrap/js/cpfcnpj.js"></script>


        <div id="main" class="container-fluid">
            <h3 class="page-header">Cadastrar Modelo</h3>

            <form id="cadastrar" method="post">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="campo1">Nome:</label>
                        <input type="text" class="form-control" id="nomeModelo" name="nomeModelo" placeholder="Ex.: Mercedes" maxlength="20">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="campo2">Fabricante</label>
                        <div class="input-group">
                        <select id="codFabricante" name="codFabricante" required class="form-control">
                            <option value="">
                                Selecione...
                            </option>
                            <?php
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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalFabricante" onclick="chamaFabricante"><span class="glyphicon glyphicon-plus"></span></button>                        
                        </span>
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="campo2">Tipo do Ônibus</label>
                        <div class="input-group">
                        <select id="codTipoModelo" name="codTipoModelo" required class="form-control">
                            <option value="">
                                Selecione...
                            </option>
                            <?php
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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalTipoModelo" onclick="chamaTipoModelo"><span class="glyphicon glyphicon-plus"></span></button>                        
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
                        <input type="text" class="form-control" id="anoFabricacao" name="anoFabricacao" placeholder="2010">
                        <script>
                            $(document).ready(function() {
                                var $seuCampoCpf = $("#anoFabricacao");
                                $seuCampoCpf.mask('0000', {
                                    reverse: false
                                });
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
        function chamaFabricante() {
            $(document).ready(function() {
                $('#ModalFabricante').modal('show');
            });
        }
    </script>
    <div class="modal fade" id="ModalFabricante" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <form method="post" id="cadastrarFabricante">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Cadastro de Fabricante</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group col-md-10">
                            <input type="hidden" id="paginaFabricante" name="pagina" value="adicionaM">
                            <label for="campo1">Fabricante:</label>
                            <input type="text" class="form-control" id="nomeFabricante" name="nomeFabricante" placeholder="Ex.: Mercedes">
                        </div>
                        <div class="form-group col-md-10">
                            <label for="campo1">CNPJ:</label>
                            <input type="text" class="form-control" id="cnpjFabricante" name="cnpjFabricante" placeholder="00.000.000/0000-00" onBlur="validaFormato(this);" onkeypress="return (apenasNumeros(event))">
                            <style>
                                #divResultado {
                                    font-family: sans-serif;
                                    font-size: 14px;
                                    color: black;
                                    margin-top: 4px;
                                }
                            </style>
                            <div id="divResultado"></div>
                        </div>
                    <script>
                        $(document).ready(function() {
                            var $CnpjFabricante = $("#cnpjFabricante");
                            $CnpjFabricante.mask('00.000.000/0000-00', {
                                reverse: false
                            });
                        });
                    </script>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div id="resultado">
                </div>
                <div class="modal-footer">
                    <section class="ArrumaModal">
                        <button type="submit" id="b" class="btn btn-primary">Cadastrar</button>
                    </section>
                </div>
            </div>
            </div>
        </form>
    </div>
    <script>
        $("#busca").keyup(function() {
            var busca = $("#busca").val();
            $.post('../Busca/buscaModelo.php', {
                busca: busca
            }, function(data) {
                $("#result").html(data);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("form#cadastrarFabricante").submit(function() {
                event.preventDefault();
                var pagina = $("#paginaFabricante").val();
                var nomeFabricante = $("#nomeFabricante").val();
                var cnpjFabricante = $("#cnpjFabricante").val();
                $.post('../../Function/Cadastrar/cadastrarModalFabricanteA.php', {
                    pagina: pagina,
                    nomeFabricante: nomeFabricante,
                    cnpjFabricante: cnpjFabricante
                }, function(data) {
                    $("#resultadoFabricante").html(data);
                });
            });
        });
    </script>
    <div class="modal fade" id="ModalTipoModelo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <form id="cadastrarTipoModelo" method="post">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Cadastro do Tipo do Ônibus</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group col-md-10">
                            <input type="hidden" name="pagina" id="paginaTipoModelo" value="adiciona">
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

    <div id="resultadoTipo"></div>
    <div id="resultado"></div>
    <div id="resultadoFabricante"></div>

    <!----------------Cadastrar Principal---------------------->
    <script>
        $(document).ready(function() {
            $("form#cadastrar").submit(function() {
                event.preventDefault();
                var nomeModelo = $("#nomeModelo").val();
                var codFabricante = $("#codFabricante").val();
                var codTipoModelo = $("#codTipoModelo").val();
                var anoFabricacao = $("#anoFabricacao").val();
                $.post('../../Function/Cadastrar/cadastrarModelo.php', {
                        nomeModelo: nomeModelo,
                        codFabricante: codFabricante,
                        codTipoModelo: codTipoModelo,
                        anoFabricacao: anoFabricacao
                    },
                    function(data) {
                        $("#resultado").html(data);
                    });
            });
        });
    </script>

    <!----------------Cadastrar TipoModelo---------------------->
    <script>
        $(document).ready(function() {
            $("form#cadastrarTipoModelo").submit(function() {
                event.preventDefault();
                var descricaoTipoModelo = $("#descricaoTipoModelo").val();
                var pagina = $("#paginaTipoModelo").val();
                $.post('../../Function/Cadastrar/cadastrarModalTipoModelo.php', {
                    pagina: pagina,
                    descricaoTipoModelo: descricaoTipoModelo
                }, function(data) {
                    $("#resultadoTipo").html(data);
                });
            });
        });
    </script>