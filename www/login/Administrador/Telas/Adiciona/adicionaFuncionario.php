<?php require_once('../../../../verificaS.php'); $nomeUsuario= $_SESSION['nomeUsuario'];              $nome = explode(" ",$nomeUsuario);             $nomeUsuario = $nome[0]; ?>
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
        <script src="../../../bootstrap/js/jquery.min.js"></script>
        <script src="../../../bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../../bootstrap/js/jquery.mask.js"></script>
        <script type = "text/javascript" src ="../../../bootstrap/js/cpfcnpj.js"></script>

        <div id="main" class="container-fluid">
        
            <h3 class="page-header">Cadastrar Funcionário</h3>
        
            <form id="cadastrar" method="post">
            
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="campo1">Nome:</label>
                        <input type="text" class="form-control" id="nomeFuncionario" name="nomeFuncionario" placeholder="Ex.: Joao" maxlength="90">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="campo2">RG:</label>
                        <input type="text" class="form-control" id="rgFuncionario" name="rgFuncionario" placeholder="Ex.: 000.000-00" maxlength="12">
                    </div>

                </div>
                
                <div class="row">
                    
                    <div class="form-group col-md-4">
                        <label for="campo3">E-mail:</label>
                        <input required type="email" class="form-control" id="emailFuncionario" name="emailFuncionario" placeholder="Ex.: joao@joao" maxlength="90">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="campo4">CPF:</label>
                        <input type="text" class="form-control" maxlength="14" id="cpfFuncionario" name="cpfFuncionario" placeholder="Ex.: 000.000.000-00" onBlur="validaFormato(this);" onkeypress="return (apenasNumeros(event))">
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
                </div>
                <script>
                        $(document).ready(function () { 
                            var $seuCampoCpf = $("#cpfFuncionario");
                            $seuCampoCpf.mask('000.000.000-00', {reverse: false});
                            });
                    </script>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="campo5">Login:</label>
                        <input type="text" class="form-control" id="loginFuncionario" name="loginFuncionario" placeholder="Ex.: joao12" maxlength="40">
                    </div>
                   <div class="form-group col-md-1">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="campo6">Senha:</label>
                        <input type="password" class="form-control" id="senhaFuncionario" name="senhaFuncionario" placeholder="Ex.: ********" maxlength="16">
                    </div>
                </div>
                
                <div class="row">
                    
                    <div class="form-group col-md-3">
                        <label for="campo7">Confirma Senha</label>
                        <input type="password" class="form-control" id="confirmaSenha" name="confirmaSenha" placeholder="Ex.:********" maxlength="16">
                    </div>
                    <div class="form-group col-md-1">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="campo8">Cargo</label>
                        <div class="input-group">
                        <select id="codNivelUsuario" name="codNivelUsuario" required class="form-control">
                            
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
                        <span class="input-group-btn">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalTipoUsuario" onclick="chamaTipoUsuario"><span class="glyphicon glyphicon-plus"></span></button> 
                        </span>
                        </div>
                    </div>  
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="campo6" hidden="hidden" id="cnhFuncionario">CNH:</label>
                        <input type="hidden" class="form-control" id="cnh_Funcionario" name="cnh_Funcionario" placeholder="Ex.: 000000000-0" maxlength="16">
                    </div>   
                </div>
                
            
                <hr/>
                
                <div id="actions" class="row">
                    <div class="col-md-12">
                        <button type="submit" id = "b" class="btn btn-primary">Salvar</button>
                            <a href="../Visualiza/visualizaFuncionario.php" class="btn btn-default">Cancelar</a>
                    </div>
                </div>
            </form>
            <?php 
$quebra = "\n";
$emailsender = "empresa@cloverprojetos.cf";
$nomeremetente = "Fiscall";
$emaildestinatario = $_POST['emailFuncionario'];
$loginFuncionario = $_POST ['loginFuncionario'];
$assunto = "Criação de Conta";
$mensagem = "tenha um ótimo dia.";
$mensagemHTML = '<p>Bem vindo ao Fiscall!</p>
        <p>Utilize o usuário e a sua senha para acessar o sistema.</p>
        <br>'.$mensagem.'<br>
    <hr>';
$headers = "MIME-Version: 1.1".$quebra;
$headers .= "Content-type: text/html; meta charset = 'utf-8'".$quebra;
$headers .= "From:".$emailsender.$quebra;
$headers .= "Return-Path: ".$emailsender.$quebra;

$envio = mail ($emaildestinatario, $assunto, $mensagemHTML, $headers, $emailsender);
?>

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
$(function(){
    $('#codNivelUsuario').change(function(){
        if( $(this).val() ==4) {
            document.getElementById('cnh_Funcionario').type = "text";
            $('#cnhFuncionario').show();
        } else {
            document.getElementById('cnh_Funcionario').type = "hidden";
            $('#cnhFuncionario').hide();
        }
    });
});
</script>

<script type="text/javascript">
$(function(){
    $('#codNivelUsuario').change(function(){
        if( $(this).val() ==4) {
            document.getElementById('matriculaFuncionario').type = "text";
            $('#matriculaFuncionario').show();
        } else {
            document.getElementById('matriculaFuncionario').type = "hidden";
            $('#matriculaFuncionario').hide();
        }
    });
});
</script>

<script>
    function chamaTipoUsuario(){
    $(document).ready(function () {
        $('#ModalTipoUsuario').modal('show');
    });
    }
</script>
<div class="modal fade" id="ModalTipoUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form id="cadastrarTipoUsuario" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Cadastro de Cargo</h4>
                </div>
                <div class="modal-body">  
                    <div class="form-group col-md-10">
                        <input type="hidden" id="paginaCargo" name="paginaCargo" value="adiciona">
                        <label for="campo1">Cargo:</label>
                        <input type="text" class="form-control" id="descricaoTipoUsuario" name="descricaoTipoUsuario" placeholder="Ex.: Fiscal">
                    </div>
                </div>
                <br><br><br><br>

                <div class="modal-footer">
                    <section class="ArrumaModal">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </section>
                </div>
            </div>
        </div>
    </form>
</div>

<!----------------Cadastrar---------------------->
<div id="resultado"></div>
<script> 
    $(document).ready(function() {
    $("form#cadastrar").submit(function() {
        event.preventDefault();
        var nomeFuncionario  = $("#nomeFuncionario").val();
        var rgFuncionario  = $("#rgFuncionario").val();
        var emailFuncionario  = $("#emailFuncionario").val();
        var cpfFuncionario  = $("#cpfFuncionario").val();
        var loginFuncionario  = $("#loginFuncionario").val();
        var senhaFuncionario  = $("#senhaFuncionario").val();
        var confirmaSenha  = $("#confirmaSenha").val();
        var codNivelUsuario  = $("#codNivelUsuario").val();
        var cnhFuncionario  = $("#cnh_Funcionario").val();
        $.post('../../Function/Cadastrar/cadastrarFuncionario.php', {
            nomeFuncionario: nomeFuncionario,
            rgFuncionario: rgFuncionario,
            emailFuncionario: emailFuncionario,
            cpfFuncionario: cpfFuncionario,
            loginFuncionario: loginFuncionario,
            senhaFuncionario: senhaFuncionario,
            confirmaSenha: confirmaSenha,
            codNivelUsuario: codNivelUsuario,
            cnhFuncionario: cnhFuncionario
        },
        function(data){
            $("#resultado").html(data);                            
        });
    });
    });
</script>

<!----------------Cadastrar TipoUsuario---------------------->
<div id="resultadoTipoUsuario"></div>
<script> 
    $(document).ready(function() {
    $("form#cadastrarTipoUsuario").submit(function() {
        event.preventDefault();
        var pagina  = $("#paginaCargo").val();
        var descricaoTipoUsuario  = $("#descricaoTipoUsuario").val();
        $.post('../../Function/Cadastrar/cadastrarModalTipoUsuario.php', {
            pagina: pagina,
            descricaoTipoUsuario: descricaoTipoUsuario,
        },
        function(data){
            $("#resultadoTipoUsuario").html(data);                            
        });
    });
    });
</script>