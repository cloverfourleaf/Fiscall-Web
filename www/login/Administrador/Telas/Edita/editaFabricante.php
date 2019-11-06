<?php require_once('../../../../verificaS.php');  $nomeUsuario= $_SESSION['nomeUsuario'];              $nome = explode(" ",$nomeUsuario);             $nomeUsuario = $nome[0]; ?>
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
    <script type="text/javascript" src="../../../bootstrap/js/cpfcnpj.js"></script>

    <div id="main" class="container-fluid">
        <h3 class="page-header">Editar Fabricante</h3>

        <form id="editar" method="post">
            <div class="row">
                <?php
                        /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');

                        $codigo = filter_input(INPUT_GET, 'codFabricante', FILTER_SANITIZE_NUMBER_INT);
                        $result_fabricante = "SELECT * FROM tbfabricante WHERE codFabricante = '$codigo'";
                        $resultado_fabricante = mysqli_query($connect, $result_fabricante);
                        $row_fabricante = mysqli_fetch_assoc($resultado_fabricante);
                    ?>
                    <input type="hidden" id="codFabricante" name="codFabricante" value="<?php echo $codigo ?>">
                    <div class="form-group col-md-6">
                        <label for="campo1">Nome:</label>
                        <input type="text" class="form-control" id="nomeFabricante" name="nomeFabricante" placeholder="Mercedes" value="<?php echo $row_fabricante['nomeFabricante']; ?>">
                    </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="campo2">CNPJ:</label>
                    <input type="text" class="form-control" id="cnpjFabricante" name="cnpjFabricante" placeholder="00.000.000/0000-00" value="<?php echo $row_fabricante['cnpjFabricante']; ?>" onBlur="validaFormato(this);" onkeypress="return (apenasNumeros(event))">
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
            <hr>
            <div id="actions" class="row">
                <div class="col-md-12">
                    <button type="submit" id="b" class="btn btn-primary">Salvar</button>
                    <a href="../Visualiza/visualizaFabricante.php" class="btn btn-default">Cancelar</a>
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


<!----------------Editar---------------------->
<div id="resultado"></div>
<script>
    $(document).ready(function() {
        $("form#editar").submit(function() {
            event.preventDefault();
            var codFabricante = $("#codFabricante").val();
            var nomeFabricante = $("#nomeFabricante").val();
            var cnpjFabricante = $("#cnpjFabricante").val();
            $.post('../../Function/Editar/editarFabricante.php', {
                    codFabricante: codFabricante,
                    nomeFabricante: nomeFabricante,
                    cnpjFabricante: cnpjFabricante
                },
                function(data) {
                    $("#resultado").html(data);
                });
        });
    });
</script>