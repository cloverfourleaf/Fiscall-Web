<?php require_once('../../verificaSession.php'); $nomeUsuario= $_SESSION['nomeUsuario'];              $nome = explode(" ",$nomeUsuario);             $nomeUsuario = $nome[0]; ?>
<!DOCTYPE html>
<html lang = "pt-br">
    <head>
        <title>Fiscall</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon"  href="../img/icone.png" type="image/x-png/"> 
        <link href="../bootstrap/css/bootstrap.min.css" rel = "stylesheet">
        <link rel="stylesheet" href="../css/Smith.css">
        <link rel="stylesheet" type="text/css" href="../css/Fundo.css">
    </head>
    
    <body>
        
        <section class="Cima">
            <div class="Bv">
                <div class="TxtInicio">
                    <a href="index.php">
                        <h2>Olá,
                            <?php
                           
                            $nomeUsuario = $_SESSION['nomeUsuario'];
                            $nome = explode(" ",$nomeUsuario);
                            $nomeUsuario = $nome[0];
                            echo ($nomeUsuario."<br>");
                            ?>
                        </h2>
                    </a>

                </div>
                
                <div class="casa">
                    <a href="index.php"> <img src="../img/CasaBranca.png" width="32px" height="32px"></a>
                </div>              
            </div>
            
            <div class="divisaoPadrao">  
                <div class="txtPadrao">
                    <a href="Telas/Visualiza/visualizaPerfil.php" ><h1>Perfil</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href="Telas/Visualiza/visualizaPerfil.php" ><img src="../img/usuario.png"></a>
                </div>              
            </div>
            
             <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href="Telas/Visualiza/visualizaViagem.php"><h1>Viagem</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href="Telas/Visualiza/visualizaViagem.php"><img src="../img/Viagem.png"></a>
                </div>
            </div>
            
            <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href="Telas/Visualiza/visualizaAlocacao.php"><h1>Alocação</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href="Telas/Visualiza/visualizaAlocacao.php"><img src="../img/Locacao.png"></a>
                </div>
            </div>
            
            <div class="divisaoPadrao">  
                <div class="txtPadrao">
                    <a href= "Telas/Visualiza/visualizaLinha.php"><h1>Linha</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href= "Telas/Visualiza/visualizaLinha.php"><img src="../img/linha.png"></a>
                </div>
            </div>
            <div class="divisaoPadrao">  
                <div class="txtPadrao">
                 <a href="Telas/Visualiza/visualizaOnibus.php"> <h1>Ônibus</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href="Telas/Visualiza/visualizaOnibus.php"><img src="../img/aaa.png"></a>
                </div>              
            </div>
            
            <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href = "Telas/Visualiza/visualizaFabricante.php"><h1>Fabricante</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href = "Telas/Visualiza/visualizaFabricante.php"><img src="../img/fabricante.png"></a>
                </div>
            </div>
            
            <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href = "Telas/Visualiza/visualizaModelo.php"><h1>Modelo</h1></a>
                </div>'
                <div class="imgModelo">
                    <a href = "Telas/Visualiza/visualizaModelo.php"> <img src="../img/modelo.png"> </a>
                </div>
            </div>
            
            <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href="Telas/Visualiza/visualizaFuncionario.php"> <h1>Funcionário</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href="Telas/Visualiza/visualizaFuncionario.php"> <img src="../img/Funcionario.png"></a>
                </div>  
            </div>
            
            <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href="Telas/Visualiza/visualizaCooperativa.php"><h1>Cooperativa</h1></a>
                </div>
                <div class="imgPadrao">
                    <a href="Telas/Visualiza/visualizaCooperativa.php"><img src="../img/cooperativa.png"></a>
                </div>
            </div>
            
            
            <div class="separador"> </div>
            
             <div class="divisaoPadrao">
                <div class="txtPadrao">
                    <a href = "../../sair.php"> <h1>Sair</h1> </a>
                </div>
                <div class="imgPadrao">
                    <a href = "../../sair.php"> <img src="../img/logouts.png"> </a>
                </div>  
            </div>
        
        </section>
			<?PHP
	ob_end_flush();
	?>
    </body>
</html>