<?php require_once('../../../../verificaS.php');
session_start();
$nomeUsuario= $_SESSION['nomeUsuario'];
$loginTeste = $_SESSION['loginUsuario'];
$nome = explode(" ",$nomeUsuario);
$nomeUsuari = $nome[0]; ?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">

        <title>Fiscall</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="../../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="../../../img/icone.png" type="image/x-png/">
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
                        <h2>Funcionário</h2>
                    </div>

                </div>
                <div class="relatorioG">
                    <?php echo "<a href='../../Function/Relatorio/Geral/grlFuncionario.php' target='_blank' class='btn btn-warning pull-left h2'><img src='../../../img/print.png' href='#'></a>";?>
                </div>
                <div class="col-md-6">
                    <div class="input-group h2">
                        <input id="busca" name="data[search]" class="form-control" id="busca" type="text" placeholder="Pesquisar Funcionário">
                        <script>
                            $("#busca").keyup(function() {
                                var busca = $("#busca").val();
                                $.post('../Busca/buscaFuncionario.php', {
                                    busca: busca
                                }, function(data) {
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
                    <a href="../Adiciona/adicionaFuncionario.php" class="btn btn-primary pull-right h2">Novo Funcionário</a>
                </div>
            </div>
            <!-- /#top -->

            <div class="row">
                <div id="divEsconder">
                    <div class="form-group col-md-3">
                        <label class="form-check-label" id="lblEmail">
                            Email
                        </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <input type="checkbox" aria-label="..." id="chkEmail">
                           </span>
                            <input class="form-control" placeholder="renato@hotmail.com" id="inpEmail">
                        </div>
                    </div>
                    <!--   cargo -->
                    <div class="form-group col-md-2">
                        <label class="form-check-label" for="defaultCheck1" id="lblCargo">
                            Cargo
                        </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                   <input type="checkbox" aria-label="..."id="chkCargo">
                 </span>
                            <select id="codCargo" name="codCargo" required class="form-control">
                                <option value="">
                                    Selecione...
                                </option>
                                <?php
                       /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
                       $sql = "SELECT codNivelUsuario, descricaoNivelUsuario FROM tbnivelusuario ORDER BY descricaoNivelUsuario ASC";
                       $result = mysqli_query($connect,$sql);
                       while($element = mysqli_fetch_array($result)){
                           $codNivelUsuario = $element['codNivelUsuario'];
                           $descricaoNivelUsuario = $element['descricaoNivelUsuario'];
                           echo "<option value = '$codNivelUsuario'>$descricaoNivelUsuario</option>";
                       }
                       ?>
                            </select>
                        </div>
                    </div>

                    <!--Data Cadastro -->
                    <div class="form-group col-md-2">
                        <label class="form-check-label" id="lblDataCadastro">
                            Data de Início
                        </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <input type="checkbox" aria-label="..." id="chkDataCadastro">
                           </span>
                            <input class="form-control" placeholder="15/04/2015" id="inpDataCadastro" type="text" min="<?php echo" $AnoMin "; ?>" max="<?php echo" $AnoMax "; ?>">
                        </div>
                    </div>
                    <!-- data fim cadastro -->
                    <div class="form-group col-md-2">
                        <label class="form-check-label" id="lblDataCadastro">
                            Data de Fim
                        </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <input type="checkbox" aria-label="..." id="chkcDataEscolha">
                           </span>
                            <input class="form-control" placeholder="15/04/2015" id="inpDataEscolha" type="text" min="<?php echo" $AnoMin "; ?>" max="<?php echo" $AnoMax "; ?>">
                        </div>
                    </div>

                    <!-- icon funil -->

                    <button id="buscaEs" class="btn btn-primary" type="submit" onclick="bFiltro()">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                    <!-- href='../../Function/Relatorio/Cruzada/czdOnibus.php' target='_blank'-->
                    <a id="relatorioI" class='btn btn-warning pull-left h2' onclick="relatorioCruzado()"><img src='../../../img/print.png'></a>
                </div>
            </div>
            <hr/>
            <!-- cadastro -->
            <div id="list" class="row">
                <div class="table-responsive col-md-12">
                    <table id="result" class="table table-striped" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th>Matrícula</th>
                                <th>Nome</th>
                                <th>RG </th>
                                <th>E-mail</th>
                                <th>CNH </th>
                                <th>CPF </th>
                                <th>Login</th>
                                <th>Cargo</th>



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
                            $sql = "SELECT * FROM tbfuncionario INNER JOIN tbusuario ON tbfuncionario.codUsuario = tbusuario.codUsuario ORDER BY nomeFuncionario ASC LIMIT $inicio, $qnt_result_pg";
                            $result = mysqli_query($connect,$sql);

                            while($element = mysqli_fetch_array($result)){


                                $codUsuario = $element['codUsuario'];
                                $codFuncionario = $element['codFuncionario'];
                                $matriculaFuncionario = $element['matriculaFuncionario'];
                                $nomeFuncionario = $element['nomeFuncionario'];
                                $rgFuncionario = $element['rgFuncionario'];
                                $emailFuncionario = $element['emailFuncionario'];
                                $cnhFuncionario = $element['cnhFuncionario'];
                                $cpfFuncionario = $element['cpfFuncionario'];
                                $loginUsuario = $element['loginUsuario'];
                                $codNivelUsuario = $element['codNivelUsuario'];

                                $sqlF = "SELECT descricaoNivelUsuario FROM tbnivelusuario where codNivelUsuario= $codNivelUsuario";
                                $resultF = mysqli_query($connect,$sqlF);
                                $elementF = mysqli_fetch_array($resultF);
                                $tipoUsuario = $elementF['descricaoNivelUsuario'];
                                if($loginUsuario!=$loginTeste){
                                    echo"<tr>
                                        <td data-title='matriculaFuncionario' id='limite'>$matriculaFuncionario</td>
                                        <td data-title='nomeFuncionario' id='limite'>$nomeFuncionario</td>
                                        <td data-title='rgFuncionario'>$rgFuncionario</td>
                                        <td data-title='emailFuncionario' id='limite'>$emailFuncionario</td>
                                        <td data-title='cnhFuncionario'>$cnhFuncionario</td>
                                        <td data-title='cpfFuncionario'>$cpfFuncionario</td>
                                        <td data-title='loginUsuario' id='limite'>$loginUsuario</td>
                                        <td data-title='descricaoNivelUsuario'>$tipoUsuario</td>

                                        <td class='actions'>


                                    <a href='../../Function/Relatorio/Especifico/espFuncionario.php?codFuncionario=" . $element['codFuncionario'] . "' target='_blank'><img src='../../../img/print.png'></a>

                                    <a href='../Edita/editaFuncionario.php?codFuncionario=" . $element['codFuncionario'] . "'><img src='../../../img/edit.png'></a>

                                     <a onclick='deletar($codUsuario)'><img src='../../../img/close.png'></a>
                                    </td>

                                    </tr>";
                            }else{
                                    echo"<tr>
                                        <td data-title='matriculaFuncionario' id='limite'>$matriculaFuncionario</td>
                                        <td data-title='nomeFuncionario' id='limite'>$nomeFuncionario</td>
                                        <td data-title='rgFuncionario'>$rgFuncionario</td>
                                        <td data-title='emailFuncionario' id='limite'>$emailFuncionario</td>
                                        <td data-title='cnhFuncionario'>$cnhFuncionario</td>
                                        <td data-title='cpfFuncionario'>$cpfFuncionario</td>
                                        <td data-title='loginUsuario' id='limite'>$loginUsuario</td>
                                        <td data-title='descricaoNivelUsuario'>$tipoUsuario</td>

                                        <td class='actions'>

                                        <a href='../Edita/editaFuncionario.php?codFuncionario=" . $element['codFuncionario'] . "'><img src='../../../img/edit.png'></a>
                                    </td>

                                    </tr>";
                                }
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
                                    }).then((value) => { window.location.href='../../Function/Deletar/deletarFuncionario.php?codUsuario='+cod+';'});

                                  } else {
                                    window.location.href='visualizaFuncionario.php';
                                  }
                                });
                                }
                            </script>";
                            $result_pg = "SELECT COUNT(nomeFuncionario) AS num_result FROM tbfuncionario";
                            $resultado_pg = mysqli_query($connect, $result_pg);
                            $row_pg = mysqli_fetch_assoc($resultado_pg);
                            $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
                            $max_links = 1;
                        ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- /#list -->
            <div id="bottom" class="row">
                <div class="col-md-12">

                    <ul class="pagination">

                        <li><a href="visualizaFuncionario.php?pagina=1">&lt; Primeira</a></li>
                        <?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                                    if($pag_ant >=1){
                                        echo "<li><a href='visualizaFuncionario.php?pagina=$pag_ant'>$pag_ant</a></li>";
                                    }
                                    echo"<li class='disable'><a> $pagina </a></li>";
                                }for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                                    if($pag_dep <= $quantidade_pg){
				                        echo "<li><a href='visualizaFuncionario.php?pagina=$pag_dep'>$pag_dep</a></li>";
                                    }
                                }
                                echo"<li class='next'><a href='visualizaFuncionario.php?pagina=$quantidade_pg' rel='next'>Ultima &gt;</a></li>";
                        ?>
                    </ul>
                    <!-- /.pagination -->

                </div>
            </div>
            <!-- /#bottom -->
        </div>
        <!-- /#main -->

        <section class="Cima">
            <div class="Bv">
                <div class="TxtInicio">
                    <a href="../../index.php" data-toggle="tooltip" data-placement="right" title="Tela inicial">
                        <h2>Olá, <?php echo $nomeUsuari;?></h2></a>
                </div>
                <div class="casa">
                    <a href="../../index.php" data-toggle="tooltip" data-placement="right" title="Tela inicial"> <img src="../../../img/CasaBranca.png" width="32px" height="32px"></a>
                </div>
            </div>

            <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href="../../Telas/Visualiza/visualizaPerfil.php" data-toggle="tooltip" data-placement="right" title="Alterar o seu perfil"><h1>Perfil</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href="../../Telas/Visualiza/visualizaPerfil.php" data-toggle="tooltip" data-placement="right" title="Alterar o seu perfil"><img src="../../../img/usuario.png"></a>
                </div>
            </div>

            <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href="../../Telas/Visualiza/visualizaViagem.php" data-toggle="tooltip" data-placement="right" title="Consultar Viagens"><h1>Viagem</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href="../../Telas/Visualiza/visualizaViagem.php" data-toggle="tooltip" data-placement="right" title="Consultar Viagens"><img src="../../../img/Viagem.png"></a>
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
                    <a href="../../Telas/Visualiza/visualizaLinha.php" data-toggle="tooltip" data-placement="right" title="Consultar Linhas"><h1>Linha</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href="../../Telas/Visualiza/visualizaLinha.php" data-toggle="tooltip" data-placement="right" title="Consultar Linhas"><img src="../../../img/linha.png"></a>
                </div>
            </div>
            <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href="../../Telas/Visualiza/visualizaOnibus.php" data-toggle="tooltip" data-placement="right" title="Consultar Ônibus">
                        <h1>Ônibus</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href="../../Telas/Visualiza/visualizaOnibus.php" data-toggle="tooltip" data-placement="right" title="Consultar Ônibus"><img src="../../../img/aaa.png"></a>
                </div>
            </div>

            <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href="../../Telas/Visualiza/visualizaFabricante.php" data-toggle="tooltip" data-placement="right" title="Consultar Fabricantes"><h1>Fabricante</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href="../../Telas/Visualiza/visualizaFabricante.php" data-toggle="tooltip" data-placement="right" title="Consultar Fabricantes"><img src="../../../img/fabricante.png"></a>
                </div>
            </div>

            <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href="../../Telas/Visualiza/visualizaModelo.php" data-toggle="tooltip" data-placement="right" title="Consultar Modelos"><h1>Modelo</h1></a>
                </div>'
                <div class="imgModelo">
                    <a href="../../Telas/Visualiza/visualizaModelo.php" data-toggle="tooltip" data-placement="right" title="Consultar Modelos"> <img src="../../../img/modelo.png"> </a>
                </div>
            </div>

            <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href="../../Telas/Visualiza/visualizaFuncionario.php" data-toggle="tooltip" data-placement="right" title="Consultar Funcionários">
                        <h1>Funcionário</h1></a>
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
                    <a href="../../../../sair.php" data-toggle="tooltip" data-placement="right" title="Sair do sistema">
                        <h1>Sair</h1> </a>
                </div>
                <div class="imgPadrao">
                    <a href="../../../../sair.php" data-toggle="tooltip" data-placement="right" title="Sair do sistema"> <img src="../../../img/logouts.png"> </a>
                </div>
            </div>
        </section>
    </body>

    </html>

    <!-----------------------MUDAR TD's-------------------->
    <script>
        var num;

        function abrir() {
            if (num == 0 || num == null) {
                document.getElementById('divEsconder').style.display = "inline";
                document.getElementById('relatorioG').style.display = "none";
                num = 1;
            } else {
                num = 0;
                fechar();
            }
        }

        function fechar() {
            document.getElementById('divEsconder').style.display = "none";
            document.getElementById('relatorioG').style.display = "inline";
        }
    </script>

    <!--------------------------Filtro---------------------------->
    <script>
        function bFiltro() {
            var cCargo = document.getElementById('chkCargo').checked;
            var cEmail = document.getElementById('chkEmail').checked;
            var cDataCadastro = document.getElementById('chkDataCadastro').checked;
            var cDataEscolha = document.getElementById('chkcDataEscolha').checked;

            var Cargo = $("#inpCargo").val();
            var Email = $("#slcEmail").val();
            var DataCadastro = $("#inpDataCadastro").val();
            var DataEscolha = $("#inpDataEscolha").val();
            var escolha = 0;


            if (cCargo == true && cEmail == true && cDataCadastro == true && cDataEscolha == true) {
                escolha = 1;
                $.post('../../Function/Filtro/ftFuncionario.php', {
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

            } else if (cCargo == true && cEmail == true && cDataCadastro == true && cDataEscolha == false) {
                escolha = 2;
                $.post('../../Function/Filtro/ftFuncionario.php', {
                        escolha: escolha,
                        Cargo: Cargo,
                        Email: Email,
                        DataCadastro: DataCadastro
                    },
                    function(data) {
                        document.getElementById('resultadoT').style.display = "none";
                        $("#resultadoB").html(data);
                    });

            } else if (cCargo == true && cEmail == true && cDataCadastro == false && cDataEscolha == true) {
                escolha = 3;
                $.post('../../Function/Filtro/ftFuncionario.php', {
                        escolha: escolha,
                        Cargo: Cargo,
                        Email: Email,
                        DataEscolha: DataEscolhao
                    },
                    function(data) {
                        document.getElementById('resultadoT').style.display = "none";
                        $("#resultadoB").html(data);
                    });

            } else if (cCargo == true && cEmail == true && cDataCadastro == false && cDataEscolha == false) {
                escolha = 4;
                $.post('../../Function/Filtro/ftFuncionario.php', {
                        escolha: escolha,
                        Cargo: Cargo,
                        Email: Email
                    },
                    function(data) {
                        document.getElementById('resultadoT').style.display = "none";
                        $("#resultadoB").html(data);
                    });

            } else if (cCargo == true && cEmail == false && cDataCadastro == true && cDataEscolha == true) {
                escolha = 5;
                $.post('../../Function/Filtro/ftFuncionario.php', {
                        escolha: escolha,
                        Cargo: Cargo,
                        DataCadastro: DataCadastro,
                        DataEscolha: DataEscolha
                    },
                    function(data) {
                        document.getElementById('resultadoT').style.display = "none";
                        $("#resultadoB").html(data);
                    });

            } else if (cCargo == true && cEmail == false && cDataCadastro == true && cDataEscolha == false) {
                escolha = 6;
                $.post('../../Function/Filtro/ftFuncionario.php', {
                        escolha: escolha,
                        Cargo: Cargo,
                        DataCadastro: DataCadastro
                    },
                    function(data) {
                        document.getElementById('resultadoT').style.display = "none";
                        $("#resultadoB").html(data);
                    });

            } else if (cCargo == true && cEmail == false && cDataCadastro == false && cDataEscolha == true) {
                escolha = 7;
                $.post('../../Function/Filtro/ftFuncionario.php', {
                        escolha: escolha,
                        Cargo: Cargo,
                        DataEscolha: DataEscolha
                    },
                    function(data) {
                        document.getElementById('resultadoT').style.display = "none";
                        $("#resultadoB").html(data);
                    });

            } else if (cCargo == true && cEmail == false && cDataCadastro == false && cDataEscolha == false) {
                escolha = 8;
                $.post('../../Function/Filtro/ftFuncionario.php', {
                        escolha: escolha,
                        Cargo: Cargo
                    },
                    function(data) {
                        document.getElementById('resultadoT').style.display = "none";
                        $("#resultadoB").html(data);
                    });

            } else if (cCargo == false && cEmail == true && cDataCadastro == true && cDataEscolha == true) {
                escolha = 9;
                $.post('../../Function/Filtro/ftFuncionario.php', {
                        escolha: escolha,
                        Email: Email,
                        DataCadastro: DataCadastro,
                        DataEscolha: DataEscolha
                    },
                    function(data) {
                        document.getElementById('resultadoT').style.display = "none";
                        $("#resultadoB").html(data);
                    });

            } else if (cCargo == false && cEmail == true && cDataCadastro == true && cDataEscolha == false) {
                escolha = 10;
                $.post('../../Function/Filtro/ftFuncionario.php', {
                        escolha: escolha,
                        Email: Email,
                        DataCadastro: DataCadastro
                    },
                    function(data) {
                        document.getElementById('resultadoT').style.display = "none";
                        $("#resultadoB").html(data);
                    });
            } else if (cCargo == false && cEmail == true && cDataCadastro == false && cDataEscolha == true) {
                escolha = 11;
                $.post('../../Function/Filtro/ftFuncionario.php', {
                        escolha: escolha,
                        Email: Email,
                        DataEscolha: DataEscolha
                    },
                    function(data) {
                        document.getElementById('resultadoT').style.display = "none";
                        $("#resultadoB").html(data);
                    });
            } else if (cCargo == false && cEmail == true && cDataCadastro == false && cDataEscolha == false) {
                escolha = 12;
                $.post('../../Function/Filtro/ftFuncionario.php', {
                        escolha: escolha,
                        Email: Email
                    },
                    function(data) {
                        document.getElementById('resultadoT').style.display = "none";
                        $("#resultadoB").html(data);
                    });
            } else if (cCargo == false && cEmail == true && cDataCadastro == true && cDataEscolha == true) {
                escolha = 13;
                $.post('../../Function/Filtro/ftFuncionario.php', {
                        escolha: escolha,
                        DataCadastro: DataCadastro,
                        DataEscolha: DataEscolha
                    },
                    function(data) {
                        document.getElementById('resultadoT').style.display = "none";
                        $("#resultadoB").html(data);
                    });
            } else if (cCargo == false && cEmail == false && cDataCadastro == true && cDataEscolha == false) {
                escolha = 14;
                $.post('../../Function/Filtro/ftFuncionario.php', {
                        escolha: escolha,
                        DataCadastro: DataCadastro
                    },
                    function(data) {
                        document.getElementById('resultadoT').style.display = "none";
                        $("#resultadoB").html(data);
                    });
            } else if (cCargo == false && cEmail == false && cDataCadastro == false && cDataEscolha == true) {
                escolha = 15;
                $.post('../../Function/Filtro/ftFuncionario.php', {
                        escolha: escolha,
                        DataEscolha: DataEscolha
                    },
                    function(data) {
                        document.getElementById('resultadoT').style.display = "none";
                        $("#resultadoB").html(data);
                    });
            } else {
                document.getElementById('resultadoB').style.display = "none";
                document.getElementById('resultadoT').style.display = "inline";
            }
        }
    </script>

    <!--------------------------Relatorio-Cruzado---------------------------->
    <script>
        function relatorioCruzado() {
            var cCargo = document.getElementById('chkCargo').checked;
            var cEmail = document.getElementById('chkEmail').checked;
            var cDataCadastro = document.getElementById('chkDataCadastro').checked;
            var cDataEscolha = document.getElementById('chkcDataEscolha').checked;

            var Cargo = $("#inpCargo").val();
            var Email = $("#slcEmail").val();
            var DataCadastro = $("#inpDataCadastro").val();
            var DataEscolha = $("#inpDataEscolha").val();
            var escolha = 0;

            if (cCargo == true && cEmail == true && cDataCadastro == true && cDataEscolha == true) {
                escolha = 1;
                $.post('../../Function/Relatorio/Cruzada/cruFuncionario.php', {
                    escolha: escolha,
                    Cargo: Cargo,
                    Email: Email,
                    DataCadastro: DataCadastro,
                    DataEscolha: DataEscolha
                });
                window.open('../../Function/Relatorio/Cruzada/cruFuncionario.php?escolha=' + escolha + '&Cargo=' + Cargo + '&Email=' + Email + '&DataCadastro=' + DataCadastro + '&DataEscolha=' + DataEscolha + '', '_blank');

            } else if (cCargo == true && cEmail == true && cDataCadastro == true && cDataEscolha == false) {
                escolha = 2;
                $.post('../../Function/Relatorio/Cruzada/cruFuncionario.php', {
                    escolha: escolha,
                    Cargo: Cargo,
                    Email: Email,
                    DataCadastro: DataCadastro
                });
                window.open('../../Function/Relatorio/Cruzada/cruFuncionario.php?escolha=' + escolha + '&Cargo=' + Cargo + '&Email=' + Email + '&DataCadastro=' + DataCadastro + '', '_blank');

            } else if (cCargo == true && cEmail == true && cDataCadastro == false && cDataEscolha == true) {
                escolha = 3;
                $.post('../../Function/Relatorio/Cruzada/cruOnibus.php', {
                    escolha: escolha,
                    Cargo: Cargo,
                    Email: Email,
                    DataEscolha: DataEscolha
                });
                window.open('../../Function/Relatorio/Cruzada/cruFuncionario.php?escolha=' + escolha + '&Cargo=' + Cargo + '&Email=' + Email + '&DataEscolha=' + DataEscolha + '', '_blank');

            } else if (cCargo == true && cEmail == true && cDataCadastro == false && cDataEscolha == false) {
                escolha = 4;
                $.post('../../Function/Relatorio/Cruzada/cruFuncionario.php', {
                    escolha: escolha,
                    Cargo: Cargo,
                    Email: Email
                });
                window.open('../../Function/Relatorio/Cruzada/cruFuncionario.php?escolha=' + escolha + '&Cargo=' + Cargo + '&Email='
                    Email '' + , '_blank');

            } else if (cCargo == true && cEmail == false && cDataCadastro == true && cDataEscolha == true) {
                escolha = 5;
                $.post('../../Function/Relatorio/Cruzada/cruFuncionario.php', {
                    escolha: escolha,
                    Cargo: Cargo,
                    DataCadastro: DataCadastro,
                    DataEscolha: DataEscolha
                });
                window.open('../../Function/Relatorio/Cruzada/cruFuncionario.php?escolha=' + escolha + '&Cargo=' + Cargo + '&DataCadastro=' + DataCadastro + '&DataEscolha=' + DataEscolha + '', '_blank');

            } else if (cCargo == true && cEmail == false && cDataCadastro == true && cDataEscolha == false) {
                escolha = 6;
                $.post('../../Function/Relatorio/Cruzada/cruFuncionario.php', {
                    escolha: escolha,
                    Cargo: Cargo,
                    DataCadastro: DataCadastro
                });
                window.open('../../Function/Relatorio/Cruzada/cruFuncionario.php?escolha=' + escolha + '&Cargo=' + Cargo + '&DataCadastro=' + DataCadastro + '', '_blank');

            } else if (cCargo == true && cEmail == false && cDataCadastro == false && cDataEscolha == true) {
                escolha = 7;
                $.post('../../Function/Relatorio/Cruzada/cruFuncionario.php', {
                    escolha: escolha,
                    Cargo: Cargo,
                    DataEscolha: DataEscolha
                });
                window.open('../../Function/Relatorio/Cruzada/cruFuncionario.php?escolha=' + escolha + '&Cargo=' + Cargo + '&DataEscolha=' + DataEscolha + '', '_blank');

            } else if (cCargo == true && cEmail == false && cDataCadastro == false && cDataEscolha == false) {
                escolha = 8;
                $.post('../../Function/Relatorio/Cruzada/cruFuncionario.php', {
                    escolha: escolha,
                    Cargo: Cargo
                });
                window.open('../../Function/Relatorio/Cruzada/cruFuncionario.php?escolha=' + escolha + '&Cargo=' + Cargo + '', '_blank');


            } else if (cCargo == false && cEmail == true && cDataCadastro == true && cDataEscolha == true) {
                escolha = 9;
                $.post('../../Function/Relatorio/Cruzada/cruFuncionario.php', {
                    escolha: escolha,
                    Email: Email,
                    DataCadastro: DataCadastro,
                    DataEscolha: DataEscolha

                });
                window.open('../../Function/Relatorio/Cruzada/cruFuncionario.php?escolha=' + escolha + '&Email=' + Email + '&DataCadastro=' + DataCadastro + '&DataEscolha=' + DataEscolha + '', '_blank');

            } else if (cCargo == false && cEmail == true && cDataCadastro == true && cDataEscolha == false) {
                escolha = 10;
                $.post('../../Function/Relatorio/Cruzada/cruFuncionario.php', {
                    escolha: escolha,
                    Email: Email,
                    DataCadastro: DataCadastro,
                });
                window.open('../../Function/Relatorio/Cruzada/cruFuncionario.php?escolha=' + '&Email=' + Email + '&DataCadastro=' + DataCadastro + '', '_blank');

            } else if (cCargo == false && cEmail == true && cDataCadastro == false && cDataEscolha == true) {
                escolha = 11;
                $.post('../../Function/Relatorio/Cruzada/cruFuncionario.php', {
                    escolha: escolha,
                    Email: Email,
                    DataEscolha: DataEscolha
                });
                window.open('../../Function/Relatorio/Cruzada/cruFuncionario.php?escolha=' + '&Email=' + Email + '&DataEscolha=' + DataEscolha + '', '_blank');

            } else if (cCargo == false && cEmail == true && cDataCadastro == false && cDataEscolha == false) {
                escolha = 12;
                $.post('../../Function/Relatorio/Cruzada/cruFuncionario.php', {
                    escolha: escolha,
                    Email: Email
                });
                window.open('../../Function/Relatorio/Cruzada/cruFuncionario.php?escolha=' + '&Email=' + Email + '', '_blank');

            } else if (cCargo == false && cEmail == true && cDataCadastro == true && cDataEscolha == true) {
                escolha = 13;
                $.post('../../Function/Relatorio/Cruzada/cruFuncionario.php', {
                    escolha: escolha,
                    DataCadastro: DataCadastro,
                    DataEscolha: DataEscolha
                });
                window.open('../../Function/Relatorio/Cruzada/cruFuncionario.php?escolha=' + '&DataCadastro=' + DataCadastro + '&DataEscolha=' + DataEscolha + '', '_blank');

            } else if (cCargo == false && cEmail == false && cDataCadastro == true && cDataEscolha == false) {
                escolha = 14;
                $.post('../../Function/Relatorio/Cruzada/cruFuncionario.php', {
                    escolha: escolha,
                    DataCadastro: DataCadastro
                });
                window.open('../../Function/Relatorio/Cruzada/cruFuncionario.php?escolha=' + '&DataCadastro=' + DataCadastro + '', '_blank');

            } else if (cCargo == false && cEmail == false && cDataCadastro == false && cDataEscolha == true) {
                escolha = 15;
                $.post('../../Function/Relatorio/Cruzada/cruFuncionario.php', {
                    escolha: escolha,
                    DataEscolha: DataEscolha
                });
                window.open('../../Function/Relatorio/Cruzada/cruFuncionario.php?escolha=' + '&DataEscolha=' + DataEscolha + '', '_blank');
            } else {
                document.getElementById('resultadoB').style.display = "none";
                document.getElementById('resultadoT').style.display = "inline";
            }
        }
    </script>
