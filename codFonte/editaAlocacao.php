<?php require_once('../../../../verificaS.php'); session_start(); $nomeUsuario= $_SESSION['nomeUsuario'];
$nome = explode(" ",$nomeUsuario);
$nomeUsuario = $nome[0]; ?>
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
        <script src = '../../../bootstrap/js/alert.js'></script>
    </head>
    
    <body>
        <script src = '../../../bootstrap/js/alert.js'></script>
        <script src="../../../bootstrap/js/jquery.min.js"></script>
        <script src="../../../bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../../bootstrap/js/jquery.mask.js"></script>
        
        <div id="main" class="container-fluid">
            
            <h3 class="page-header">Editar Alocação</h3>
        
            <form id="editar" method="post">
                <?php
                /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
                $codAlocacao = filter_input(INPUT_GET, 'codAlocacao', FILTER_SANITIZE_NUMBER_INT);
                $result = "SELECT * FROM tbalocacao INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario INNER JOIN tbonibus ON tbonibus.codOnibus = tbalocacao.codOnibus INNER JOIN tblinha ON tblinha.codLinha = tbalocacao.codLinha INNER JOIN tbturno ON tbturno.codTurno = tbalocacao.codTurno WHERE codAlocacao = '$codAlocacao'";
                $resultado = mysqli_query($connect, $result);
                $row = mysqli_fetch_assoc($resultado);
                $nomeLinha = $row['nomeLinha'];  
                $placaOnibus = $row['placaOnibus'];
                $nomeFuncionario = $row['nomeFuncionario'];
                $inicioAlocacao = $row['inicioAlocacao'];
                $fimAlocacao = $row['fimAlocacao'];
                $codTurno = $row['codTurno'];
                $descricaoTurno = $row['descricaoTurno'];
                $statusAlocacao = $row['statusAlocacao'];
                ?>
                <input type="hidden" name="codAlocacao" id="codAlocacao" value="<?php echo $codAlocacao ?>">
                <div class="row">

                <div class="form-group col-md-3">

                    <label for="campo2">Linha</label>
                    <input type="text" class="form-control" id="linhaOnibus" name="linhaOnibus" placeholder="Ex.: Guarulhos (Jardim Paulista)" value="<?php echo $nomeLinha ?>" readonly>

                    <!------Botão Linha-------->

                    <div class="BotaoLinha">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalLinha" onclick="chamaLinha"><span class="glyphicon glyphicon-search"></span></button>
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

                </div>

                <div class="form-group col-md-1"></div>

                <div class="form-group col-md-2">

                    <label for="campo2">Ônibus</label>
                    <input type="text" class="form-control" id="Onibus" name="Onibus" placeholder="Ex.:AAA-0000" value="<?php echo $placaOnibus ?>" readonly>

                    <!------Botão Onibus-------->

                    <div class="BotaoOnibus">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalOnibus" onclick="chamaOnibus"><span class="glyphicon glyphicon-search"></span></button>
                        </div>
                    </div>

                    <!------Chama Onibus-------->

                    <script>
                        function chamaOnibus() {
                            $(document).ready(function() {
                                $('#ModalOnibus').modal('show');
                            });
                        }
                    </script>

                </div>


                <div class="form-group col-md-1">
                </div>


                <div class="form-group col-md-3">
                    <label for="campo2">Motorista</label>
                    <input type="text" class="form-control" id="Motorista" name="Motorista" placeholder="Ex.: João" value="<?php echo $nomeFuncionario ?>" readonly>

                    <!------Botão Motorista-------->

                    <div class="BotaoMotorista">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalMotorista" onclick="chamaMotorista"><span class="glyphicon glyphicon-search"></span></button>
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

                </div>

            </div>


            <div class="row">



                <?php
                    $data=date("d/m/Y");
                    $data=implode("-", array_reverse(explode("/", $data)));
                    ?>

                    <div class="form-group col-md-2">
                        <label for="campo1">Início da Alocação:</label>
                        <input type="date" class="form-control" id="inicioAlocacao" name="inicioAlocacao" placeholder="Ex.: 00/00/0000" value="<?php echo $inicioAlocacao ?>"  readonly>
                    </div>

                    <div class="form-group col-md-1">
                    </div>
                    <div class="form-group col-md-1">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="campo1">Fim da Alocação:</label>
                        <input type="date" class="form-control" id="fimAlocacao" name="fimAlocacao" placeholder="Ex.: 00/00/0000" min="<?php echo $data ;?>" value="<?php echo $fimAlocacao ?>" >
                    </div>
                    <div class="form-group col-md-1"></div>
                    <div class="form-group col-md-3">
                        <label for="campo6">Turno:</label>
                        <select id="codTurno" name="codTurno" required class="form-control">
                            <?php
                          echo "<option value = '$codTurno'>$descricaoTurno</option>";
                            
                            /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
                            $sql = "SELECT codTurno, descricaoTurno FROM tbturno ORDER BY descricaoTurno ASC";
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
            <div class="row">
                <div class="form-group col-md-2">
                    <label for="campo6">Status:</label>
                    <input type="text" class="form-control" id="status" name="status" value="<?php echo $statusAlocacao ?>" readonly>

                </div>
            </div>
            <hr>
            <div id="actions" class="row">
                <div class="col-md-12">
                    <button type="submit" id="botao" class="btn btn-primary">Salvar</button>
                    <a href="../Visualiza/visualizaAlocacao.php" class="btn btn-default">Cancelar</a>
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


<!-----------------Modal Motorista-------------------->

<div class="modal fade" id="ModalMotorista" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <?php
               /*$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $conn = mysqli_connect('localhost','root','','bdfiscall');
                $query = mysqli_query($conn, "SELECT nomeFuncionario FROM tbfuncionario 
                INNER JOIN tbusuario 
                ON tbfuncionario.codUsuario = tbusuario.codUsuario WHERE codNivelUsuario=4
                ORDER BY nomeFuncionario ASC");

                ?>
                <h4 class="modal-title" id="myModalLabel">Pesquisar Motorista</h4>
            </div>
            <div class="modal-body">
                <div class="form-group col-md-12">
                    <input type="hidden" name="pagina" value="adiciona">
                    <label for="campo1">Nome do Motorista:</label>
                    <input id = "buscaMotorista" name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Motorista">
                </div>
                <div id="list" class="row">
                    <div class="table-responsive col-md-12">

                        <table id = "resultMotorista" class="table table-striped" cellspacing="0" cellpadding="0" >
                            <thead>
                                <tr>
                                    <th>Nome do Motorista</th>
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
                                        <td data-title='nomeLinha'><?php echo $row['nomeFuncionario']; ?></td>
                                        <td><button class='btn btn-primary btn-sm' onclick="addMotorista('<?php echo $row['nomeFuncionario']; ?>')">+</button></td>
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

<!-----------------Modal Motorista-------------------->

<div class="modal fade" id="ModalMotorista" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel">Pesquisar Motorista</h4>
            </div>
            <div class="modal-body">
                <div class="form-group col-md-12">
                    <input type="hidden" name="pagina" value="adiciona">
                    <label for="campo1">Nome do Motorista:</label>
                    <input id="buscaMotorista" name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Motorista">
                </div>
                <div id="list" class="row">
                    <div class="table-responsive col-md-12">
                        <?php
               /*$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $conn = mysqli_connect('localhost','root','','bdfiscall');
                $query = mysqli_query($conn, "SELECT * FROM tbfuncionario 
                INNER JOIN tbusuario 
                ON tbusuario.codUsuario = tbfuncionario.codUsuario WHERE codNivelUsuario=4
                ORDER BY nomeFuncionario ASC");

                ?>
                            <table id="resultMotorista" class="table table-striped" cellspacing="0" cellpadding="0">
                                <thead>
                                    <tr>
                                        <th>Nome do Motorista</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <?php
                            $itens_Pagina = 0;
                            while($row = mysqli_fetch_assoc($query)){
                                $codFuncionario = $row['codFuncionario'];
                                if($itens_Pagina<4){
                                    $itens_Pagina++;
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td data-title='nomeFuncionario'>
                                                <?php echo $row['nomeFuncionario']; ?>
                                            </td>
                                            <td><button class='btn btn-primary btn-sm' onclick="addMotorista('<?php echo $row['nomeFuncionario']; ?>')">+</button></td>
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
     $('#status').hide();
        $('#ModalMotorista').modal('hide');
        document.getElementById('Motorista').value = nomeMotorista;
        $('#Motorista').html(nomeMotorista).attr('value', nomeMotorista);
    //    bStatus();
       
        $.getJSON('../Adiciona/buscaStatus.php?search=Motorista', {
            Motorista: $('#Motorista').val(),
            ajax: 'true'
        },function(j) {
            var options = j[0].statusAlocacao;
            if (options != null) {
                $('#status').html(options).show();
                document.getElementById('status').value = options;
                $('#status').attr('value', options);
                if(options=="Indisponível"){
                document.getElementById('botao').disabled= true;
                }else{
               document.getElementById('botao').disabled= false; 
                }
            }else{
               options = "Disponivel";
               $('#status').attr('value', options);
               document.getElementById('status').value = options;
               $('#status').html(options).show();
               document.getElementById('botao').disabled= false;           
            }
        });
    }
</script>
<script>
function bStatus(){
$('#status').hide();
}

</script>
<!----------------verificaMotorista-------------------->
<?php
        $query = mysqli_query($conn,"SELECT codFuncionario FROM tbfuncionario WHERE nomeFuncionario LIKE $nome");
?>
    <!----------------Busca Motorista---------------------->

    <script>
        $("#buscaMotorista").keyup(function() {
            var busca = $("#buscaMotorista").val();
            $.post('../Busca/buscaMotorista.php', {
                busca: busca
            }, function(data) {
                $("#resultMotorista").html(data);
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
                $query = mysqli_query($conn, "SELECT * FROM tblinha 
                INNER JOIN tbponto 
                ON tblinha.codLinha = tbponto.codLinha WHERE codTipoViagem=1
                ORDER BY nomeLinha ASC");

                ?>
                        <h4 class="modal-title" id="myModalLabel">Pesquisar Linhas</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <input type="hidden" name="pagina" value="adiciona">
                        <label for="campo1">Nome da Linha:</label>
                        <input id="buscaLinha" name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Linha">
                    </div>
                    <div id="list" class="row">
                        <div class="table-responsive col-md-12">

                            <table id="resultLinha" class="table table-striped" cellspacing="0" cellpadding="0">
                                <thead>
                                    <tr>
                                        <th>Nome Linha</th>
                                        <th>Número da Linha</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <?php
                            $itens_Pagina = 0;
                            while($row = mysqli_fetch_assoc($query)){
                                $codLinha = $row['codLinha'];
                                if($itens_Pagina<4){
                                    $itens_Pagina++;
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td data-title='nomeLinha'>
                                                <?php echo $row['nomeLinha']; ?>
                                            </td>
                                            <td data-title='numLinha'>
                                                <?php echo $row['numLinha'];?>
                                            </td>
                                            <td><button class='btn btn-primary btn-sm' onclick="addLinha('<?php echo $row['nomeLinha']; ?>')">+</button></td>
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
        function addLinha(codLinha) {
            $('#ModalLinha').modal('hide');
            document.getElementById('linhaOnibus').value = codLinha;
            $('#linhaOnibus').html(codLinha).attr('value', codLinha);
        }
    </script>

    <!----------------Busca Linha---------------------->

    <script>
        $("#buscaLinha").keyup(function() {
            var busca = $("#buscaLinha").val();
            $.post('../Busca/buscaLinhaA.php', {
                busca: busca
            }, function(data) {
                $("#resultLinha").html(data);
                //$("#funcao").html(dado);

            });

        });
    </script>

    <!--------------------Modal Onibus--------------------->
    <div class="modal fade" id="ModalOnibus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?php
               /*$conn = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $conn = mysqli_connect('localhost','root','','bdfiscall');
                $query = mysqli_query($conn, "SELECT placaOnibus,prefixoOnibus FROM tbonibus 
                ORDER BY placaOnibus ASC");

                ?>
                        <h4 class="modal-title" id="myModalLabel">Pesquisar Ônibus</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <input type="hidden" name="pagina" value="adiciona">
                        <label for="campo1">Placa do Ônbibus:</label>
                        <input id="buscaOnibus" name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Ônibus">
                    </div>
                    <div id="list" class="row">
                        <div class="table-responsive col-md-12">

                            <table id="resultOnibus" class="table table-striped" cellspacing="0" cellpadding="0">
                                <thead>
                                    <tr>
                                        <th>Placa do Ônibus</th>
                                        <th>Prefixo do Ônibus</th>
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
                                                <?php echo $row['placaOnibus']; ?>
                                            </td>
                                            <td data-title='numLinha'>
                                                <?php echo $row['prefixoOnibus'];?>
                                            </td>
                                            <td><button class='btn btn-primary btn-sm' onclick="addOnibus('<?php echo $row['placaOnibus']; ?>')">+</button></td>
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
        function addOnibus(placaOnibus) {
            $('#ModalOnibus').modal('hide');
            document.getElementById('Onibus').value = placaOnibus;
            $('#Onibus').html(placaOnibus).attr('value', placaOnibus);
        }
    </script>

    <!----------------Busca Onibus---------------------->

    <script>
        $("#buscaOnibus").keyup(function() {
            var busca = $("#buscaOnibus").val();
            $.post('../Busca/buscaOnibusA.php', {
                busca: busca
            }, function(data) {
                $("#resultOnibus").html(data);
            });
        });
    </script>

<!----------------Editar---------------------->
<div id="resultadorr"></div>
<script> 
    $(document).ready(function() {
    $("form#editar").submit(function() {
        event.preventDefault();
        var codAlocacao  = $("#codAlocacao").val();
        var linhaOnibus  = $("#linhaOnibus").val();
        var Onibus  = $("#Onibus").val();
        var Motorista  = $("#Motorista").val();
        var inicioAlocacao  = $("#inicioAlocacao").val();
        var fimAlocacao  = $("#fimAlocacao").val();
        var codTurno  = $("#codTurno").val();
        var status  = $("#status").val();
        $.post('../../Function/Editar/editarAlocacao.php', {
            codAlocacao: codAlocacao,
            linhaOnibus: linhaOnibus,
            Onibus: Onibus,
            Motorista: Motorista,
            inicioAlocacao: inicioAlocacao,
            fimAlocacao: fimAlocacao,
            codTurno: codTurno,
            status: status,
        },
        function(data){
            $("#resultadorr").html(data);                            
        });
    });
    });
</script>
    <!------------------FecharModal---------------->
    <script>
        function fecharModal() {
            $('#ModalLinha').modal('hide');
            $('#ModalOnibus').modal('hide');
            $('#ModalMotorista').modal('hide');
        }
    </script>
