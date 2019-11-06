<?php
    //-------------------Função Relatorio---------------------//

    require_once("../dompdf/autoload.inc.php");
    //-------------------Conexão---------------------//
    
   /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $escolha = $_GET["escolha"];
    $Fiscal  = $_GET["Fiscal"];//filter_input(INPUT_POST, 'Fabricante', FILTER_SANITIZE_STRING);
    $Motorista  = $_GET['Motorista'];
    $Linha  = $_GET['Linha'];
    $Onibus  = $_GET['Onibus'];
    $Chegada  = $_GET['Chegada'];
    $ChegadaAte  = $_GET['ChegadaAte'];
    $Previsto  = $_GET['Previsto'];
    $PrevistoAte  = $_GET['PrevistoAte'];
    $Status  = $_GET['Status'];
    $Saida  = $_GET['Saida'];
    $SaidaAte  = $_GET['SaidaAte'];
    
    if($escolha==1){
    
    $query = "SELECT * FROM tbgerenciamentolinha 
    INNER JOIN tbalocacao ON tbalocacao.codAlocacao = tbgerenciamentolinha.codAlocacao 
    INNER JOIN tbturno ON tbturno.codTurno = tbalocacao.codTurno 
    INNER JOIN tbonibus ON tbonibus.codOnibus = tbalocacao.codOnibus  
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario 
    INNER JOIN tblinha ON tblinha.codLinha = tbalocacao.codLinha";
    $query2 = "SELECT nomeFuncionario FROM tbgerenciamentolinha 
    INNER JOIN tbmonitoramento ON tbmonitoramento.codMonitoramento = tbgerenciamentolinha.codMonitoramento 
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbmonitoramento.codFuncionario";
    }else if($escolha==2){
    
    $query = "SELECT * FROM tbgerenciamentolinha 
    INNER JOIN tbalocacao ON tbalocacao.codAlocacao = tbgerenciamentolinha.codAlocacao 
    INNER JOIN tbturno ON tbturno.codTurno = tbalocacao.codTurno 
    INNER JOIN tbonibus ON tbonibus.codOnibus = tbalocacao.codOnibus  
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario 
    INNER JOIN tblinha ON tblinha.codLinha = tbalocacao.codLinha 
    WHERE nomeFuncionario like '$Motorista'";
    $query2 = "SELECT nomeFuncionario FROM tbgerenciamentolinha 
    INNER JOIN tbmonitoramento ON tbmonitoramento.codMonitoramento = tbgerenciamentolinha.codMonitoramento 
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbmonitoramento.codFuncionario
    WHERE nomeFuncionario like '$Fiscal'";
    }else if($escolha==3){
    
    $query = "SELECT * FROM tbgerenciamentolinha 
    INNER JOIN tbalocacao ON tbalocacao.codAlocacao = tbgerenciamentolinha.codAlocacao 
    INNER JOIN tbturno ON tbturno.codTurno = tbalocacao.codTurno 
    INNER JOIN tbonibus ON tbonibus.codOnibus = tbalocacao.codOnibus  
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario 
    INNER JOIN tblinha ON tblinha.codLinha = tbalocacao.codLinha
    WHERE horaioChegada BETWEEN '$Chegada' AND '$ChegadaAte'
    AND horarioPrevisto BETWEEN '$Previsto' AND '$PrevistoAte'
    AND horarioSaida BETWEEN '$Saida' AND '$SaidaAte'";
    $query2 = "SELECT nomeFuncionario FROM tbgerenciamentolinha 
    INNER JOIN tbmonitoramento ON tbmonitoramento.codMonitoramento = tbgerenciamentolinha.codMonitoramento 
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbmonitoramento.codFuncionario
    WHERE horaioChegada BETWEEN '$Chegada' AND '$ChegadaAte'
    AND horarioPrevisto BETWEEN '$Previsto' AND '$PrevistoAte'
    AND horarioSaida BETWEEN '$Saida' AND '$SaidaAte'";
    }
    else if($escolha==4){
    
    $query = "SELECT * FROM tbgerenciamentolinha 
    INNER JOIN tbalocacao ON tbalocacao.codAlocacao = tbgerenciamentolinha.codAlocacao 
    INNER JOIN tbturno ON tbturno.codTurno = tbalocacao.codTurno 
    INNER JOIN tbonibus ON tbonibus.codOnibus = tbalocacao.codOnibus  
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario 
    INNER JOIN tblinha ON tblinha.codLinha = tbalocacao.codLinha
    WHERE horaioChegada BETWEEN '$Chegada' AND '$ChegadaAte'";
    $query2 = "SELECT nomeFuncionario FROM tbgerenciamentolinha 
    INNER JOIN tbmonitoramento ON tbmonitoramento.codMonitoramento = tbgerenciamentolinha.codMonitoramento 
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbmonitoramento.codFuncionario
    WHERE horaioChegada BETWEEN '$Chegada' AND '$ChegadaAte'";
    }else if($escolha==5){
    
    $query = "SELECT * FROM tbgerenciamentolinha 
    INNER JOIN tbalocacao ON tbalocacao.codAlocacao = tbgerenciamentolinha.codAlocacao 
    INNER JOIN tbturno ON tbturno.codTurno = tbalocacao.codTurno 
    INNER JOIN tbonibus ON tbonibus.codOnibus = tbalocacao.codOnibus  
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario 
    INNER JOIN tblinha ON tblinha.codLinha = tbalocacao.codLinha
    WHERE horarioPrevisto BETWEEN '$Previsto' AND '$PrevistoAte'";
    $query2 = "SELECT nomeFuncionario FROM tbgerenciamentolinha 
    INNER JOIN tbmonitoramento ON tbmonitoramento.codMonitoramento = tbgerenciamentolinha.codMonitoramento 
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbmonitoramento.codFuncionario
    WHERE horarioPrevisto BETWEEN '$Previsto' AND '$PrevistoAte'";
    }else if($escolha==6){
    
    $query = "SELECT * FROM tbgerenciamentolinha 
    INNER JOIN tbalocacao ON tbalocacao.codAlocacao = tbgerenciamentolinha.codAlocacao 
    INNER JOIN tbturno ON tbturno.codTurno = tbalocacao.codTurno 
    INNER JOIN tbonibus ON tbonibus.codOnibus = tbalocacao.codOnibus  
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario 
    INNER JOIN tblinha ON tblinha.codLinha = tbalocacao.codLinha
    WHERE horarioSaida BETWEEN '$Saida' AND '$SaidaAte'";
    $query2 = "SELECT nomeFuncionario FROM tbgerenciamentolinha 
    INNER JOIN tbmonitoramento ON tbmonitoramento.codMonitoramento = tbgerenciamentolinha.codMonitoramento 
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbmonitoramento.codFuncionario
    WHERE horarioSaida BETWEEN '$Saida' AND '$SaidaAte'";
    }else if($escolha==7){
    
    $query = "SELECT * FROM tbgerenciamentolinha 
    INNER JOIN tbalocacao ON tbalocacao.codAlocacao = tbgerenciamentolinha.codAlocacao 
    INNER JOIN tbturno ON tbturno.codTurno = tbalocacao.codTurno 
    INNER JOIN tbonibus ON tbonibus.codOnibus = tbalocacao.codOnibus  
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario 
    INNER JOIN tblinha ON tblinha.codLinha = tbalocacao.codLinha
    WHERE horaioChegada = '$Chegada'";
    $query2 = "SELECT nomeFuncionario FROM tbgerenciamentolinha 
    INNER JOIN tbmonitoramento ON tbmonitoramento.codMonitoramento = tbgerenciamentolinha.codMonitoramento 
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbmonitoramento.codFuncionario
    WHERE horaioChegada = '$Chegada'";
    }else if($escolha==8){
    
    $query = "SELECT * FROM tbgerenciamentolinha 
    INNER JOIN tbalocacao ON tbalocacao.codAlocacao = tbgerenciamentolinha.codAlocacao 
    INNER JOIN tbturno ON tbturno.codTurno = tbalocacao.codTurno 
    INNER JOIN tbonibus ON tbonibus.codOnibus = tbalocacao.codOnibus  
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario 
    INNER JOIN tblinha ON tblinha.codLinha = tbalocacao.codLinha
    WHERE horarioPrevisto = '$Previsto'";
    $query2 = "SELECT nomeFuncionario FROM tbgerenciamentolinha 
    INNER JOIN tbmonitoramento ON tbmonitoramento.codMonitoramento = tbgerenciamentolinha.codMonitoramento 
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbmonitoramento.codFuncionario
    WHERE horarioPrevisto = '$Previsto'";
    }else if($escolha==9){
    
    $query = "SELECT * FROM tbgerenciamentolinha 
    INNER JOIN tbalocacao ON tbalocacao.codAlocacao = tbgerenciamentolinha.codAlocacao 
    INNER JOIN tbturno ON tbturno.codTurno = tbalocacao.codTurno 
    INNER JOIN tbonibus ON tbonibus.codOnibus = tbalocacao.codOnibus  
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario 
    INNER JOIN tblinha ON tblinha.codLinha = tbalocacao.codLinha
    WHERE horarioSaida = '$Saida'";
    $query2 = "SELECT nomeFuncionario FROM tbgerenciamentolinha 
    INNER JOIN tbmonitoramento ON tbmonitoramento.codMonitoramento = tbgerenciamentolinha.codMonitoramento 
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbmonitoramento.codFuncionario
    WHERE horarioSaida = '$Saida'";
    }
    
    $res = mysqli_query($connect, $query);
    $res2 = mysqli_query($connect, $query2);
    $total = mysqli_num_rows($res);

        $html = '<table>';	
        $html .= '<thead>';
            $html .= '<tr>';
                $html .= '<th>Fiscal</th>';
                $html .= '<th>Motorista</th>';
                $html .= '<th>Número Linha</th>';
                $html .= '<th>Prefixo</th>';
                $html .= '<th>Chegada</th>';
                $html .= '<th>Previsto</th>';
                $html .= '<th>Status</th>';
                $html .= '<th>Saída</th>';
                $html .= '<th>Data</th>';
            $html .= '</tr>';
        $html .= '</thead>';

    while($row = mysqli_fetch_assoc($res)){
    $row2 = mysqli_fetch_assoc($res2);
        
        $html .= '<tbody>';
            $html .= '<tr>';

                $html .= '<td>'.$row2['nomeFuncionario']."</td>";
                $html .= '<td>'.$row['nomeFuncionario']."</td>";                
                $html .= '<td>'.$row['numLinha']."</td>";
                $html .= '<td>'.$row['prefixoOnibus']."</td>";               
                $html .= '<td>'.$row['horarioChegada']."</td>";
                $html .= '<td>'.$row['horarioPrevisto']."</td>";               
                $html .= '<td>'.$row['statusViagem']."</td>";
                $html .= '<td>'.$row['horarioSaida']."</td>";
                $html .= '<td>'.$row['dataViagem']."</td>";
        
            $html .= '</tr>';        
    }
        $html .= '</tbody>';
        $html .= '</table>';
         $html .= '<footer class="Logo"> <img src = "../../../../img/emtu.png"></footer>
        ';

         $html .= '<footer class="Logo2"><p>EMTU</p></footer>
        ';

         $html .= '<footer class="rodape"><p>


        TOTAL DE VIAGENS:'.$total.'</p>';

    //referenciar o DomPDF com namespace
	   use Dompdf\Dompdf;

	// include autoloader
	   require_once("../dompdf/autoload.inc.php");

	//Criando a Instancia
	   $dompdf = new DOMPDF();
	
	// Carrega seu HTML
	  $dompdf->load_html('

        <h1>Relatório da viagem</h1>

        <link rel="stylesheet" type="text/css" href="../style.php">'. $html .'
        ');


	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_viagem.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>