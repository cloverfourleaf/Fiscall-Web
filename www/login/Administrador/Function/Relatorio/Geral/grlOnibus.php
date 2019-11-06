<?php

/*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $query = "SELECT * FROM tbonibus INNER JOIN tbmodelo ON tbmodelo.codModelo = tbonibus.codModelo INNER JOIN tbcooperativa ON tbcooperativa.codCooperativa = tbonibus.codCooperativa INNER JOIN tbfabricante ON tbfabricante.codFabricante = tbmodelo.codFabricante";
    $res = mysqli_query($connect, $query);
    $total = mysqli_num_rows($res);
            

        $html = '<table>';	
        $html .= '<thead>';
            $html .= '<tr>';
                $html .= '<th>Placa</th>';
                $html .= '<th>Prefixo</th>';
                $html .= '<th>Modelo</th>';
                $html .= '<th>Fabricante</th>';
                $html .= '<th>Cooperativa</th>';
                $html .= '<th>Ano de Fabricação</th>';
                $html .= '<th>Operação</th>';
            $html .= '</tr>';
        $html .= '</thead>';

    while($row = mysqli_fetch_assoc($res)){
        
        $html .= '<tbody>';
            $html .= '<tr>';

                $html .= '<td>'.$row['placaOnibus']."</td>";
                $html .= '<td>'.$row['prefixoOnibus']."</td>";                
                $html .= '<td>'.$row['nomeModelo']."</td>";
                $html .= '<td>'.$row['nomeFabricante']."</td>";               
                $html .= '<td>'.$row['nomeCooperativa']."</td>";
                $html .= '<td>'.$row['anoFabricacao']."</td>";                
                $html .= '<td>'.$row['operacao']."</td>";
        
            $html .= '</tr>';        
    }
        $html .= '</tbody>';
        $html .= '</table>';
       $html .= '<footer class="Logo"> <img src = "../../../../img/emtu.png"></footer>
        ';

         $html .= '<footer class="Logo2"><p>EMTU</p></footer>
        ';

         $html .= '<footer class="rodape"><p>


        TOTAL DE ÔNIBUS:'.$total.'</p>';

    
    //referenciar o DomPDF com namespace
	   use Dompdf\Dompdf;

	// include autoloader
	   require_once("../dompdf/autoload.inc.php");

	//Criando a Instancia
	   $dompdf = new DOMPDF();
	
	// Carrega seu HTML
	   $dompdf->load_html('

        <h1>Relatório de ônibus</h1>

        <link rel="stylesheet" type="text/css" href="../style.php">'. $html .'
        ');


	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_onibus.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>