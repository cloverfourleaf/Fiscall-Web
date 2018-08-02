<?php require_once('../../../../verificaS.php'); session_start(); $nomeUsuario= $_SESSION['nomeUsuario']; 
$nome = explode(" ",$nomeUsuario);
$nomeUsuario = $nome[0];
$codFuncionario = $_SESSION['codFuncionario'];?>
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
        <script src ='../../../bootstrap/js/alert.js'></script>
    </head>
    
    <body>
        <script src="../../../bootstrap/js/jquery.min.js"></script>
        <script src="../../../bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../../bootstrap/js/jquery.mask.js"></script>
        <div id="main" class="container-fluid">
            <h3 class="page-header">Alterar Perfil</h3>
        
            <form action="../../Function/Editar/EditarFuncionario.php" method="post" id="cpf_form">
                <?php
                /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');

                $result = "SELECT * FROM tbfuncionario INNER JOIN tbusuario ON tbfuncionario.codusuario = tbusuario.codusuario  WHERE codFuncionario = '$codFuncionario'";
                $resultado = mysqli_query($connect, $result);
                $row = mysqli_fetch_assoc($resultado);
                ?>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="campo1">Nome:</label>
                        <input type="text" class="form-control" id="nomeFuncionario" name="nomeFuncionario" placeholder="Ex.: José da Silva" value="<?php echo $row['nomeFuncionario'] ?>" maxlength="90">
                    </div>
                    <input type="hidden" name="codFuncionario" value="<?php echo $codFuncionario ?>">
                    <div class="form-group col-md-3">
                        <label for="campo3">RG:</label>
                        <input type="text" class="form-control" id="rgFuncionario" name="rgFuncionario" placeholder="000.000-00" value="<?php echo $row['rgFuncionario'] ?>" maxlength="12" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="campo4">E-mail:</label>
                        <input type="email" class="form-control" id="emailFuncionario" name="emailFuncionario" placeholder="email@email.com.br" value="<?php echo $row['emailFuncionario'] ?>" maxlength="90">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="campo2">CPF:</label>
                        
                        <input type="text" class="form-control" id="cpfFuncionario" name="cpfFuncionario" placeholder="000.000.000-00" onBlur="validaFormato(this);" onkeypress="return (apenasNumeros(event))" value="<?php echo $row['cpfFuncionario'] ?>" maxlength="14" readonly>
                        
                        <div id = "divResultado"></div>
                            <style>
                                #divResultado{
                                    font-family: sans-serif;
                                    font-size: 14px;
                                    color: black;
                                    margin-top: 2px;
                                }
                            </style>
                    </div>
                    <script>
                        $(document).ready(function () { 
                            var $seuCampoCpf = $("#cpfFuncionario");
                            $seuCampoCpf.mask('000.000.000-00', {reverse: false});
                            });
                    </script>
                </div>
                
                <div class="row">
                    <input type="hidden" id="pagina" name="pagina" value="Perfil">
                    <div class="form-group col-md-3">
                        <label for="campo2">Login:</label>
                        <input type="text" class="form-control" id="loginUsuario" name="loginUsuario" placeholder="Ex.: josesilvaa" value="<?php echo $row['loginUsuario'] ?>" maxlength="40">
                    </div>               
                    <div class="form-group col-md-1">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="campo1">Senha:</label>
                        <input type="password" class="form-control" id="senhaUsuario" name="senhaUsuario" placeholder="Ex.: 0000000" maxlength="16">
                    </div> 
                </div>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="campo2">Confirma Senha</label>
                        <input type="password" class="form-control" id="confirmaSenha" name="confirmaSenha" placeholder="Ex.:000000" maxlength="16">
                    </div>                    
                    
                </div>
                <hr>
                
                <div id="actions" class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                            <a href="../../index.php" class="btn btn-default">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
        <div id="cadastro"></div>

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
<!----------------Enviar Dados------------------->
<script> 
    $(document).ready(function() {
        $("form#cpf_form").submit(function() {
             event.preventDefault();
            var nomeFuncionario  = $("#nomeFuncionario").val();
            var emailFuncionario  = $("#emailFuncionario").val();
            var pagina  = $("#pagina").val();
            var loginUsuario  = $("#loginUsuario").val();
            var senhaUsuario  = $("#senhaUsuario").val();
            var confirmaSenha  = $("#confirmaSenha").val();
            $.post('../../Function/Editar/editarFuncionario.php', {
                pagina: pagina,
                nomeFuncionario: nomeFuncionario,
                emailFuncionario: emailFuncionario,
                loginUsuario:loginUsuario,
                senhaUsuario:senhaUsuario,
                confirmaSenha:confirmaSenha
            }, function(data){
                $("#cadastro").html(data);                            
                }
            );
        });
    });
</script>