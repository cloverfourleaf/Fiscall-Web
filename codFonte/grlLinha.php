<?php

/*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $query = "SELECT * FROM tblinha INNER JOIN tbponto ON tbponto.codLinha = tblinha.codLinha WHERE codTipoViagem='1'";
    $res = mysqli_query($connect, $query);
    $query2 = "SELECT * FROM tblinha INNER JOIN tbponto ON tbponto.codLinha = tblinha.codLinha WHERE codTipoViagem='2'";
    $res2 = mysqli_query($connect, $query2);
    $total = mysqli_num_rows($res);
            

        $html = '<table>';	
        $html .= '<thead>';
            $html .= '<tr>';
                $html .= '<th>Linha</th>';
                $html .= '<th>Número</th>';
                $html .= '<th>Ida</th>';
                $html .= '<th>Volta</th>';
                $html .= '<th>Tarifa</th>';
                $html .= '<th>Hora de Inicio</th>';
                $html .= '<th>Hora de Termino</th>';
            $html .= '</tr>';
        $html .= '</thead>';

    while($row = mysqli_fetch_assoc($res)){
    $row2 = mysqli_fetch_assoc($res2);
        
        $html .= '<tbody>';
            $html .= '<tr>';

                $html .= '<td>'.$row['nomeLinha']."</td>";
                $html .= '<td>'.$row['numLinha']."</td>";                
                $html .= '<td>'.$row['descricaoPonto']."</td>";
                $html .= '<td>'.$row2['descricaoPonto']."</td>";
                $html .= '<td>'.$row['tarifaLinha']."</td>";
                $html .= '<td>'.$row['horaFuncionamento']."</td>";
                $html .= '<td>'.$row['horaTermino']."</td>";
        
            $html .= '</tr>';        
    }
        $html .= '</tbody>';
        $html .= '</table>';

      $html .= '<footer class="Logo"> <img src = "../../../../img/emtu.png"></footer>
        ';

         $html .= '<footer class="Logo2"><p>EMTU</p></footer>
        ';

         $html .= '<footer class="rodape"><p>


        TOTAL DE LINHAS:'.$total.'</p>';

    
    //referenciar o DomPDF com namespace
	   use Dompdf\Dompdf;

	// include autoloader
	   require_once("../dompdf/autoload.inc.php");

	//Criando a Instancia
	   $dompdf = new DOMPDF();
	
	// Carrega seu HTML
	   $dompdf->load_html('

        <h1>Relatório da linha</h1>

        <link rel="stylesheet" type="text/css" href="../style.php">'. $html .'
        ');


	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorioLinha.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>