<?php session_start();?>
<html>
    <head>
            

        <script src = 'login/bootstrap/js/alert.js'></script>
        <script src="login/bootstrap/js/jquery.min.js"></script>
        <script src="login/bootstrap/js/bootstrap.min.js"></script>
        <link href="login/bootstrap/css/bootstrap.min.css" rel = "stylesheet">
    </head>
<body>
    
<?php
    //-------------------------Conexão---------------------//
    
    /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    
    
    //------------------------Dados Digitados-------------------------//
    
    $loginD = $_POST['loginUsuario'];
    $senhaD = $_POST['senhaUsuario'];
    $loginD= strtolower($loginD);
    //-------------------Verifica a data atual e a data final de alocação toda vez que entra no sistema----------------------//
    
    $sqlVerificaData="UPDATE tbalocacao SET statusAlocacao = 'Disponível' WHERE CURRENT_DATE  >= fimAlocacao";
    $verificaData = mysqli_query($connect,$sqlVerificaData);
    $sqlVerifica="UPDATE tbalocacao SET statusAlocacao = 'Indisponível' WHERE CURRENT_DATE < fimAlocacao";
    $verificaD = mysqli_query($connect,$sqlVerifica);
    
    if($loginD == "" || $loginD == null || $senhaD == "" || $senhaD == null){
    
        echo"<script language='javascript' type='text/javascript'>swal('Atenção', 'Nenhum campo pode estar vazio! ','error').then((value) => 
        { window.location.href='index.html';});</script>";

    }else{
    
    //-----------------------Pegar dados do Usuário---------------------//
        $sql_Usuario = "SELECT * FROM tbusuario WHERE loginUsuario = '$loginD'";
        $res_Usuario = mysqli_query($connect, $sql_Usuario);
        $row_Usuario = mysqli_fetch_array($res_Usuario);
        $codUsuario = $row_Usuario['codUsuario'];
        $login = $row_Usuario['loginUsuario'];
        $senha = $row_Usuario['senhaUsuario'];
        $codNivelUsuario = $row_Usuario['codNivelUsuario'];
    
        
    //---------------------Pegar dados do Funcionário------------------//
        
        $sql_Funcionario = "SELECT codFuncionario,nomeFuncionario FROM tbfuncionario WHERE codUsuario = '$codUsuario'";
        $res_Funcionario = mysqli_query($connect, $sql_Funcionario);
        $row_Funcionario = mysqli_fetch_array($res_Funcionario);    
        $nome = $row_Funcionario['nomeFuncionario'];
        $codFuncionario = $row_Funcionario['codFuncionario'];
        
        
        if($login == $loginD && $senha == $senhaD){
            
            $_SESSION['codUsuario'] = $codUsuario;
            $_SESSION['loginUsuario'] = $login;
            $_SESSION['senhaUsuario'] = $senha;        
            $_SESSION['nomeUsuario'] = $nome;
            $_SESSION['codFuncionario'] = $codFuncionario;
            $_SESSION['codNivelUsuario'] = $codNivelUsuario;
            
        //<!-----------------------Administrador-------------------------------->
         
            if($codNivelUsuario==1){
                    echo"<script language='javascript' type='text/javascript'>window.location.href='login/Administrador/index.php';
                        </script>";
            ?>
                <!--script>        
                    $(document).ready(function () {
                        $('#ModalModelo').modal('show');
                    });
                </script>
    
            <!-------------------------Modal Linha Fiscalizada-------------------------->  
                
                <!--div class="modal fade" id="ModalModelo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
                    <form action="cadastros/cadastrarLinhaFiscal.php" method="post">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Linha a ser Fiscalizada</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group col-md-12">
                                        <input type="hidden" name="Nivel" value="Administrador">
                                        <label for="campo1">Número da Linha:</label>
                                        <input type="text" class="form-control" id="numLinha" name="numLinha" placeholder="431">
                                    </div>
                                    <div class="form-group col-md-12">
                                    <label for="campo2">Onde você está?</label>
                                        <select id="pontoFiscal" name="codPonto" required class="form-control">
                                            <option value="">
                                                Selecione...
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <br><br><br>
                                <div class="modal-footer">
                                    <section class="ArrumaModalModelo">
                                        <a href="sair.php"><button type="button"  class="btn btn-danger">Cancelar</button></a>
                                        <button type="submit" class="btn btn-primary">Logar</button>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </form>
                </div-->
    
            <!-----------------------Gerente------------------------>
            
            <?php
            }else if($codNivelUsuario==2){
            ?>
                 <script>        
                    $(document).ready(function () {
                        $('#ModalLinha').modal('show');
                    });
                </script>
                <!-------------------------Modal Linha Fiscalizada-------------------------->    
                <div class="modal fade" id="ModalLinha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
                    <form action="cadastros/cadastrarLinhaFiscal.php" method="post">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Linha a ser Fiscalizada</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group col-md-12">
                                        <input type="hidden" name="Nivel" value="Gerente">
                                        <label for="campo1">Número da Linha:</label>
                                        <input type="text" class="form-control" id="numLinha" name="numLinha" placeholder="431">
                                    </div>
                                    <div class="form-group col-md-12">
                                    <label for="campo2">Onde você está?</label>
                                        <select id="pontoFiscal" name="codPonto" required class="form-control">
                                            <option value="">
                                                Selecione...
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <br><br><br>
                                <div class="modal-footer">
                                    <section class="ArrumaModalModelo">
                                        <a href="sair.php"><button type="button"  class="btn btn-danger">Cancelar</button></a>
                                        <button type="submit" class="btn btn-primary">Logar</button>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
    
        <!-------------------------------Fiscal---------------------------->
            <?php
            }else if($codNivelUsuario==3){
            ?>
                <script>        
                    $(document).ready(function () {
                        $('#ModalLinha').modal('show');
                    });
                </script>
                <!-------------------------Modal Linha Fiscalizada-------------------------->    
                <div class="modal fade" id="ModalLinha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
                    <form action="cadastros/cadastrarLinhaFiscal.php" method="post">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Linha a ser Fiscalizada</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group col-md-12">
                                        <input type="hidden" name="Nivel" value="Fiscal">
                                        <label for="campo1">Número da Linha:</label>
                                        <input type="text" class="form-control" id="numLinha" name="numLinha" placeholder="431">
                                    </div>
                                    <div class="form-group col-md-12">
                                    <label for="campo2">Onde você está?</label>
                                        <select id="pontoFiscal" name="codPonto" required class="form-control">
                                            <option value="">
                                                Selecione...
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <br><br><br>
                                <div class="modal-footer">
                                    <section class="ArrumaModalModelo">
                                        <a href="sair.php"><button type="button"  class="btn btn-danger">Cancelar</button></a>
                                        <button type="submit" class="btn btn-primary">Logar</button>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            
            <?php
            }
        }else{
            echo"<script language='javascript' type='text/javascript'>swal('Atenção','Login e/ou senha incorretos','error').then((value) => { window.location.href='index.html';});</script>";
        }
        
    }
        ?>
    </body>
</html>

<script type="text/javascript">
        $(function() {
            $('#numLinha').change(function() {
                if ($(this).val()) {
                    $('#pontoFiscal').hide();
                    $.getJSON('buscaTipoViagem.php?search=', {
                        numLinha: $(this).val(),
                        ajax: 'true'
                    }, function(j) {
                        var options = '<option value="">-Seu Local -</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i].codPonto + '">' + j[i].descricaoPonto + '</option>';
                        }
                        $('#pontoFiscal').html(options).show();
                    });
                } else {
                    $('#pontoFiscal').html('<option value="">– Escolha um Local –</option>');
                }
            });
        });
</script>