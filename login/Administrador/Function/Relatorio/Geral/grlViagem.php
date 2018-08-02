<?php

/*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $query = "SELECT * FROM tbgerenciamentolinha 
    INNER JOIN tbalocacao ON tbalocacao.codAlocacao = tbgerenciamentolinha.codAlocacao 
    INNER JOIN tbturno ON tbturno.codTurno = tbalocacao.codTurno 
    INNER JOIN tbonibus ON tbonibus.codOnibus = tbalocacao.codOnibus  
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbalocacao.codFuncionario 
    INNER JOIN tblinha ON tblinha.codLinha = tbalocacao.codLinha";
    $query2 = "SELECT nomeFuncionario FROM tbgerenciamentolinha 
    INNER JOIN tbmonitoramento ON tbmonitoramento.codMonitoramento = tbgerenciamentolinha.codMonitoramento 
    INNER JOIN tbfuncionario ON tbfuncionario.codFuncionario = tbmonitoramento.codFuncionario";
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