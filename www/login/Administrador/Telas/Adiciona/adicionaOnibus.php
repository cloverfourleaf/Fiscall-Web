<?php require_once('../../../../verificaS.php'); $nomeUsuario= $_SESSION['nomeUsuario'];              $nome = explode(" ",$nomeUsuario);             $nomeUsuario = $nome[0]; ?>
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
    <script src="../../bootstrap/js/google.js"></script>
    <script type="text/javascript" src="../../../bootstrap/js/jquery.mask.js"></script>

    <script type="text/javascript" src="../../../bootstrap/js/cpfcnpj.js"></script>

    <div id="main" class="container-fluid">

        <h3 class="page-header">Cadastrar Ônibus</h3>

        <form method="post" id="cadastrar">

            <div class="row">

                <div class="form-group col-md-3">
                    <label for="campo1">Placa:</label>
                    <input type="text" class="form-control" id="placaOnibus" name="placaOnibus" placeholder="AAA-0000">
                </div>

                <div class="form-group col-md-3">
                    <label for="campo2">Prefixo:</label>
                    <input type="text" class="form-control" id="prefixoOnibus" name="prefixoOnibus" placeholder="00.0000" maxlength="10">
                </div>
                <script>
                    $(document).ready(function() {
                        var $seuCampoCpf = $("#placaOnibus");
                        $seuCampoCpf.mask('SSS-0000', {
                            reverse: false
                        });
                    });
                </script>

            </div>



            <div class="row">

                <div class="form-group col-md-3">
                    <label for="campo1">Operação:</label>
                    <input type="text" class="form-control" id="operacao" name="operacao" placeholder="abr/2010">
                    <script>
                        $(document).ready(function() {
                            var $seuCampoCpf = $("#operacao");
                            $seuCampoCpf.mask('SSS/0000', {
                                reverse: false
                            });
                        });
                    </script>
                </div>

                <div class="form-group col-md-3">
                    <label for="campo2">Fabricante</label>
                    <div class="input-group">
                    <select id="id_fabricante" name="codFabricante" required class="form-control">

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

                <script>
                    function chamaFabricante() {
                        $(document).ready(function() {
                            $('#ModalFabricante').modal('show');
                        });
                    }
                </script>

            </div>
            <div class="row">

                <div class="form-group col-md-3">
                    <label for="campo2">Modelo</label>
                    <div class="input-group">
                    <select id="id_modelo" name="codModelo" required class="form-control">
                        <option>
                        Selecione...
                        </option>
                    </select>
                   <span class="input-group-btn">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalModelo" onclick="chamaModelo"><span class="glyphicon glyphicon-plus"></span></button>                   
                   </span>
                   </div>
                </div>
                <script>
                    function chamaModelo() {
                        $(document).ready(function() {
                            $('#ModalModelo').modal('show');
                        });
                    }
                </script>

                <div class="form-group col-md-3">
                    <label for="campo2">Cooperativa</label>
                    <div class="input-group">
                    <input type="text" class="form-control" id="Cooperativa" name="Cooperativa" placeholder="Ex.:ABC" readonly>
                    <span class="input-group-btn">
                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCooperativa" onclick="chamaCooperativa"><span class="glyphicon glyphicon-search"></span></button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCooperativaC" onclick="chamaCooperativaC"><span class="glyphicon glyphicon-plus"></span></button>                   
                    </span>
                    
                    </div>

                </div> 
            </div>
            
                    <script>
                        function chamaCooperativa(){
                        $(document).ready(function () {
                            $('#ModalCooperativa').modal('show');
                        });
                        }
                    </script> 
                    <script>
                        function chamaCooperativaC(){
                        $(document).ready(function () {
                            $('#ModalCooperativaC').modal('show');
                        });
                        }
                    </script> 

            <hr>
            <div id="actions" class="row">

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="../Visualiza/visualizaOnibus.php" class="btn btn-default">Cancelar</a>
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
<script type="text/javascript">
    $(function() {
        $('#id_fabricante').change(function() {
            if ($(this).val()) {
                $('#id_modelo').hide();
                $.getJSON('modelo_post.php?search=', {
                    id_fabricante: $(this).val(),
                    ajax: 'true'
                }, function(j) {
                    var options = '<option value="">Escolha Modelo</option>';
                    for (var i = 0; i < j.length; i++) {
                        options += '<option value="' + j[i].codModelo + '">' + j[i].nomeModelo + '</option>';
                    }
                    $('#id_modelo').html(options).show();
                });
            } else {
                $('#id_modelo').html('<option value="">– Escolha um Modelo –</option>');
            }
        });
    });
</script>
<div class="modal fade" id="ModalFabricante" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form id="cadastrarFabricante" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Cadastro de Fabricante</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-10">
                        <input type="hidden" name="pagina" id="paginaFabricante" value="adiciona">
                        <label for="campo1">Nome:</label>
                        <input type="text" class="form-control" id="nomeFabricante" name="nomeFabricante" placeholder="Ex.: Mercedes">
                    </div>
                    <div class="form-group col-md-10">
                        <label for="campo2">CNPJ:</label>

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
                        <script>
                            $(document).ready(function() {
                                var $seuCampoCpf = $("#cnpjFabricante");
                                $seuCampoCpf.mask('00.000.000/0000-00', {
                                    reverse: false
                                });
                            });
                        </script>

                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
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
            var nomeFabricante = $("#nomeFabricante").val();
            var pagina = $("#paginaFabricante").val();
            var cnpjFabricante = $("#cnpjFabricante").val();
            $.post('../../Function/Cadastrar/cadastrarModalFabricanteA.php', {
                    nomeFabricante: nomeFabricante,
                    cnpjFabricante: cnpjFabricante,
                    pagina: pagina
                },
                function(data) {
                    $("#resultadoFabricante").html(data);
                });
        });
    });
</script>

<div class="modal fade" id="ModalModelo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form id="cadastrarModelo" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Cadastro de Modelo</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-10">
                        <input type="hidden" name="pagina" id="paginaModelo" value="adiciona">
                        <label for="campo1">Nome:</label>
                        <input type="text" class="form-control" id="nomeModelo" name="nomeModelo" placeholder="Bus-52">
                    </div>
                    <div class="form-group col-md-10">
                        <label for="campo2">Fabricante</label>
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
                    </div>
                    <div class="form-group col-md-10">
                        <label for="campo2">Fabricante</label>
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
                    </div>
                    <div class="form-group col-md-10">
                        <label for="campo1">Ano</label>
                        <input type="text" class="form-control" id="anoFabricacao" name="anoFabricacao" placeholder="2010">
                        <script>
                            $(document).ready(function() {
                                var $ano = $("#ano");
                                $ano.mask('0000', {
                                    reverse: false
                                });
                            });
                        </script>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="modal-footer">
                    <section class="ArrumaModalModelo">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </section>
                </div>
            </div>
        </div>
    </form>
</div>

<!----------------Cadastrar Modelo---------------------->

<div id="resultadoModelo"></div>
<script>
    $(document).ready(function() {
        $("form#cadastrarModelo").submit(function() {
            event.preventDefault();
            var pagina = $("#paginaModelo").val();
            var nomeModelo = $("#nomeModelo").val();
            var anoFabricacao = $("#anoFabricacao").val();
            var codFabricante = $("#codFabricante").val();
            var codTipoModelo = $("#codTipoModelo").val();
            $.post('../../Function/Cadastrar/cadastrarModalModelo.php', {
                    codFabricante: codFabricante,
                    codTipoModelo: codTipoModelo,
                    anoFabricacao: anoFabricacao,
                    nomeModelo: nomeModelo,
                    pagina: pagina
                },
                function(data) {
                    $("#resultadoModelo").html(data);
                });
        });
    });
</script>

<div class="modal fade" id="ModalCooperativaC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form id="cadastrarCooperativa" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Cadastro de Cooperativa</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-10">
                        <input type="hidden" name="pagina" id="paginaCooperativa" value="adiciona">
                        <label for="campo1">Nome:</label>
                        <input type="text" class="form-control" id="nomeCooperativa" name="nomeCooperativa" placeholder="Ex.: Urbano">
                        <br>
                        <label for="campo2">Email:</label>
                        <input type="text" class="form-control" id="emailCooperativa" name="emailCooperativa" placeholder="Ex.: cooperativa@cooperativa.com">
                        <br>

                        <label for="campo3">CNPJ:</label>
                        <input type="text" class="form-control" id="cnpjCooperativa" name="cnpjCooperativa" placeholder="00.000.000/0000-00" onBlur="validaFormato(this);" onkeypress="return (apenasNumeros(event))">
                        <style>
                            #divResultado {
                                font-family: sans-serif;
                                font-size: 14px;
                                color: black;
                                margin-top: 4px;
                            }
                        </style>
                        <div id="divResultado"></div>
                        <script>
                            $(document).ready(function() {
                                var $seuCampoCpf = $("#cnpjCooperativa");
                                $seuCampoCpf.mask('00.000.000/0000-00', {
                                    reverse: false
                                });
                            });
                        </script>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

                <div class="modal-footer">
                    <section class="ArrumaModal">
                        <button type="submit" id = "c" class="btn btn-primary">Cadastrar</button>
                    </section>
                </div>
            </div>
        </div>
    </form>
</div>

<!----------------Cadastrar Cooperativa---------------------->

<div id="resultadoCooperativa"></div>
<script>
    $(document).ready(function() {
        $("form#cadastrarCooperativa").submit(function() {
            event.preventDefault();
            var pagina = $("#paginaCooperativa").val();
            var nomeCooperativa = $("#nomeCooperativa").val();
            var emailCooperativa = $("#emailCooperativa").val();
            var cnpjCooperativa = $("#cnpjCooperativa").val();
            $.post('../../Function/Cadastrar/cadastrarModalCooperativa.php', {
                    emailCooperativa: emailCooperativa,
                    cnpjCooperativa: cnpjCooperativa,
                    nomeCooperativa: nomeCooperativa,
                    pagina: pagina
                },
                function(data) {
                    $("#resultadoCooperativa").html(data);
                });
        });
    });
</script>

<!----------------Cadastrar---------------------->

<div id="resultado"></div>
<script>
    $(document).ready(function() {
        $("form#cadastrar").submit(function() {
            event.preventDefault();
            var placaOnibus = $("#placaOnibus").val();
            var prefixoOnibus = $("#prefixoOnibus").val();
            var operacao = $("#operacao").val();
            var codFabricante = $("#id_fabricante").val();
            var codModelo = $("#id_modelo").val();
            var codCooperativa = $("#cod").val();
            $.post('../../Function/Cadastrar/cadastrarOnibus.php', {
                    placaOnibus: placaOnibus,
                    prefixoOnibus: prefixoOnibus,
                    operacao: operacao,
                    codFabricante: codFabricante,
                    codModelo: codModelo,
                    codCooperativa: codCooperativa
                },
                function(data) {
                    $("#resultado").html(data);
                });
        });
    });
</script>
 <!--------------------Modal Cooperativa--------------------->
    <div class="modal fade" id="ModalCooperativa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?php
               /*$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $conn = mysqli_connect('localhost','root','','bdfiscall');
                $query = mysqli_query($conn, "SELECT nomeCooperativa,cnpjCooperativa FROM tbcooperativa 
                ORDER BY nomeCooperativa ASC");

                ?>
                        <h4 class="modal-title" id="myModalLabel">Pesquisar Cooperativa</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <input type="hidden" name="pagina" value="adiciona">
                        <label for="campo1">Nome da Cooperativa:</label>
                        <input id="buscaCooperativa" name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Cooperativa">
                    </div>
                    <div id="list" class="row">
                        <div class="table-responsive col-md-12">

                            <table id="resultCooperativa" class="table table-striped" cellspacing="0" cellpadding="0">
                                <thead>
                                    <tr>
                                        <th>Nome da Cooperativa</th>
                                        <th>CNPJ da Cooperativa</th>
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
                                            <td data-title='nomeCooperativa'>
                                                <?php echo $row['nomeCooperativa']; ?>
                                            </td>
                                            <td data-title='cnpjCooperativa'>
                                                <?php echo $row['cnpjCooperativa'];?>
                                            </td>
                                            <td><button class='btn btn-primary btn-sm' onclick="addCooperativa('<?php echo $row['nomeCooperativa']; ?>')"><span class="glyphicon glyphicon-plus"></span></button></td>
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
    <!--------------------Função Onibus ---------------------->

    <script language='javascript' type='text/javascript'>
        function addCooperativa(nomeCooperativa) {
            $('#ModalCooperativa').modal('hide');
            document.getElementById('Cooperativa').value = nomeCooperativa;
            $('#Cooperativa').html(nomeCooperativa).attr('value', nomeCooperativa);
        }
    </script>

    <!----------------Busca Cooperativa---------------------->

    <script>
        $("#buscaCooperativa").keyup(function() {
            var busca = $("#buscaCooperativa").val();
            $.post('../Busca/buscaCooperativaA.php', {
                busca: busca
            }, function(data) {
                $("#resultCooperativa").html(data);
            });
        });
    </script>
    <script>
    function fecharModal(){
       $('#ModalCooperativa').modal('hide');  
    }
    </script>
    <script type="text/javascript">
        $(function() {
            $('#id_fabricante').change(function() {
                if ($(this).val()) {
                    $('#id_modelo').hide();
                    $.getJSON('modelo_post.php?search=', {
                        id_fabricante: $(this).val(),
                        ajax: 'true'
                    }, function(j) {
                        var options = '<option value="">Escolha Modelo</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i].codModelo + '">' + j[i].nomeModelo + '</option>';
                        }
                        $('#id_modelo').html(options).show();
                    });
                } else {
                    $('#id_modelo').html('<option value="">– Escolha um Modelo –</option>');
                }
            });
        });
    </script>