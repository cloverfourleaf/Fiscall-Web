<?php  $nomeUsuario= $_SESSION['nomeUsuario'];
$nome = explode(" ",$nomeUsuario);
$nomeUsuario = $nome[0]; ?>
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
    <script src='../../../bootstrap/js/alert.js'></script>
    <script src="../../../bootstrap/js/jquery.min.js"></script>
    <script src="../../../bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../../bootstrap/js/jquery.mask.js"></script>

    <div id="main" class="container-fluid">

        <h3 class="page-header">Relatório</h3>

        <form action="../../Function/Relatorio/RelatorioSelecionado.php" method="post" id="cadastrar">

            <div class="row">

               
                  <div class="form-group col-md-8">
                                  <label class="form-check-label" for="defaultCheck1">
                                    Setor:
                                  </label>
                        <select id="codTipo" name="codTipo" required class="form-control">
                            
                            <option value="">
                            Selecione...
                            </option>
                            <?php   
                            /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
                            $sql = "SELECT codNivelUsuario,descricaoNivelUsuario FROM tbnivelusuario";
                            $result = mysqli_query($connect,$sql);
                            while($element = mysqli_fetch_array($result)){
                                $codNivel = $element['codNivelUsuario'];
                                $descricaoNivel = $element['descricaoNivelUsuario'];
                                echo "<option value = '$codNivel'>$descricaoNivel</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                
                  <div class="row">
                  
                  <div class="form-group col-md-10">
                       <label class="form-check-label" for="defaultCheck1">
                              Intervalo de Data:
                          </label>
                   </div>
                  <div class="form-group col-md-4">
                        <input type="date" class="form-control" id="inicioRelatorio" name="inicioRelatorio" placeholder="Ex.: 00/00/0000" value="" >
                    </div>
                    
                     
                     <div class="form-group col-md-4">
                        <input type="date" class="form-control" id="fimRelatorio" name="fimRelatorio" placeholder="Ex.: 00/00/0000" value="" >
                    </div>
                    
                  </div>
                  
                  
                  <div class="row">
                  <div class="form-group col-md-7">

                    <label for="campo2">Linha:</label>
                    <input type="text" class="form-control" id="linhaOnibus" name="linhaOnibus" placeholder="Ex.: Guarulhos (Jardim Paulista)" readonly>
                   </div>
                   
                   
                        <div class="btnRela">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalLinha" onclick="chamaLinha"><span class="glyphicon glyphicon-search"></span></button>
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
                
                <div class="row">
                
                  <div class="form-group col-md-7">

                    <label for="campo2">Ônibus:</label>
                    <input type="text" class="form-control" id="Onibus" name="Onibus" placeholder="Ex.:AAA-0000" readonly>
                    </div>

                    <!------Botão Onibus-------->

                    <div class="btnBusRel">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalOnibus" onclick="chamaOnibus"><span class="glyphicon glyphicon-search"></span></button>
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
               
                  
                 

               <hr>
                <div class="col-md-12">
                    <button type="submit" id="botao" class="btn btn-primary">Salvar</button>
                    <a href="../Visualiza/visualizaAlocacao.php" class="btn btn-default">Cancelar</a>
                </div>

          
        </form>
        </div>
        
        
        
                     <section class="Cima">    
            <div class="Bv">
                <div class="TxtInicio">
                    <a href="../../index.php" > <h2>Olá, <?php echo $nomeUsuario;?></h2></a>
                </div>
                <div class="casa">
                    <a href="../../index.php"> <img src="../../../img/CasaBranca.png" width="32px" height="32px"></a>
                </div>              
            </div>

            <div class="divisaoPadrao">  
                <div class="txtPadrao">
                    <a href="../../Telas/Visualiza/visualizaPerfil.php" ><h1>Perfil</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href="../../Telas/Visualiza/visualizaPerfil.php" ><img src="../../../img/usuario.png"></a>
                </div>              
            </div>
                       
            <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href="../../Telas/Visualiza/visualizaViagem.php"><h1>Viagem</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href="../../Telas/Visualiza/visualizaViagem.php"><img src="../../../img/Viagem.png"></a>
                </div>
            </div>

            <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href="../../Telas/Visualiza/visualizaAlocacao.php"><h1>Alocação</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href="../../Telas/Visualiza/visualizaAlocacao.php"><img src="../../../img/Locacao.png"></a>
                </div>
            </div>
            
            <div class="divisaoPadrao">  
                <div class="txtPadrao">
                    <a href= "../../Telas/Visualiza/visualizaLinha.php"><h1>Linha</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href= "../../Telas/Visualiza/visualizaLinha.php"><img src="../../../img/linha.png"></a>
                </div>
            </div>
            <div class="divisaoPadrao">  
                <div class="txtPadrao">
                 <a href="../../Telas/Visualiza/visualizaOnibus.php"> <h1>Ônibus</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href="../../Telas/Visualiza/visualizaOnibus.php"><img src="../../../img/aaa.png"></a>
                </div>              
            </div>
            
            <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href = "../../Telas/Visualiza/visualizaFabricante.php"><h1>Fabricante</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href = "../../Telas/Visualiza/visualizaFabricante.php"><img src="../../../img/fabricante.png"></a>
                </div>
            </div>
            
            <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href = "../../Telas/Visualiza/visualizaModelo.php"><h1>Modelo</h1></a>
                </div>'
                <div class="imgModelo">
                    <a href = "../../Telas/Visualiza/visualizaModelo.php"> <img src="../../../img/modelo.png"> </a>
                </div>
            </div>
            
            <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href="../../Telas/Visualiza/visualizaFuncionario.php"> <h1>Funcionário</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href="../../Telas/Visualiza/visualizaFuncionario.php"> <img src="../../../img/Funcionario.png"></a>
                </div>  
            </div>
            
            <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href="../../Telas/Visualiza/visualizaCooperativa.php"><h1>Cooperativa</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href="../../Telas/Visualiza/visualizaCooperativa.php"><img src="../../../img/cooperativa.png"></a>
                </div>
            </div>
            <div>
            
              
            <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href="../../Telas/Visualiza/visualizaRelatorio.php"><h1>Relatório</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href="../../Telas/Visualiza/visualizaRelatorio.php"><img src="../../../img/rel.png"></a>
                </div>
            </div>
            <div>
            
            
            

            
            <div class="separador"> </div>
            
             <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href = "../../../../sair.php"> <h1>Sair</h1> </a>
                </div>
                <div class="imgPadrao">
                    <a href = "../../../../sair.php"> <img src="../../../img/logouts.png"> </a>
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
                ON tbusuario.codUsuario = tbfuncionario.codFuncionario WHERE codNivelUsuario=4
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
        $('#ModalMotorista').modal('hide');
        document.getElementById('Motorista').value = nomeMotorista;
        $('#Motorista').html(nomeMotorista).attr('value', nomeMotorista);
        $('#status').hide();
        $.getJSON('buscaStatus.php?search=', {
            Motorista: $('#Motorista').val(),
            ajax: 'true'
        }, function(j) {
            var options = j[0].statusAlocacao;
            if (options != null) {
                $('#status').html(options).show();
                document.getElementById('status').value = options;
                $('#status').attr('value', options);
            } else {
                options = "Disponivel";
                $('#status').html(options).show();
                document.getElementById('status').value = options;
                $('#status').attr('value', options);
            }

        });

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

    <!----------------Cadastrar---------------------->
    <script>
        $(document).ready(function() {
            $("form#cadastrar").submit(function() {
                event.preventDefault();
                var linhaOnibus = $("#linhaOnibus").val();
                var Onibus = $("#Onibus").val();
                var Motorista = $("#Motorista").val();
                var inicioAlocacao = $("#inicioAlocacao").val();
                var fimAlocacao = $("#fimAlocacao").val();
                var codTurno = $("#codTurno").val();
                $.post('../../Function/Cadastrar/cadastrarAlocacao.php', {
                        linhaOnibus: linhaOnibus,
                        Onibus: Onibus,
                        Motorista: Motorista,
                        inicioAlocacao: inicioAlocacao,
                        fimAlocacao: fimAlocacao,
                        codTurno: codTurno
                    },
                    function(data) {
                        $("#resultado").html(data);
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

    <!------------------BuscaStatus------------->
    <script type="text/javascript">
        $(function() {
            $('#Motorista').change(function() {
                    if ($(this).val()) {
                        $('#status').hide();
                        $.getJSON(buscaStatus.php ? search = ', {
                                Motorista : $(this).val(),
                                ajax: 'true'
                            },
                            function(j) {
                            var options = j[0].statusAlocacao;
                            var nao = document.getElementById("botao");    
                                $('#status').html(options).show();
                                if (options.equals("Disponvel")) {
                                    nao.disabled = false;
                                }else {
                                        nao.disabled = true;
                                    }
                            });
                } else {
                    $('#status').html('Disponivel');
                }
            });
        });
    </script>