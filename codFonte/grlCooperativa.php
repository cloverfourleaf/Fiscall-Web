<?php

/*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');

    $query = "SELECT * FROM tbcooperativa";
    $res = mysqli_query($connect, $query);
    $total = mysqli_num_rows($res);
            

        $html = '<table>';	
        $html .= '<thead>';
            $html .= '<tr>';
                $html .= '<th>Nome</th>';
                $html .= '<th>E-mail</th>';
                $html .= '<th>CNPJ</th>';
            $html .= '</tr>';
        $html .= '</thead>';

   while($row = mysqli_fetch_assoc($res)){
        
        $html .= '<tbody>';
            $html .= '<tr>';

                $html .= '<td>'.$row['nomeCooperativa']."</td>";
                $html .= '<td>'.$row['emailCooperativa']."</td>";                
                $html .= '<td>'.$row['cnpjCooperativa']."</td>";
        
            $html .= '</tr>';        
    }
        $html .= '</tbody>';
        $html .= '</table>';
       $html .= '<footer class="Logo"> <img src = "../../../../img/emtu.png"></footer>
        ';

         $html .= '<footer class="Logo2"><p>EMTU</p></footer>
        ';

         $html .= '<footer class="rodape"><p>


        TOTAL DE COOPERATIVAS:'.$total.'</p>';

    
    //referenciar o DomPDF com namespace
	   use Dompdf\Dompdf;

	// include autoloader
	   require_once("../dompdf/autoload.inc.php");

	//Criando a Instancia
	   $dompdf = new DOMPDF();
	
	// Carrega seu HTML
	   $dompdf->load_html('

        <h1>Relatório da Cooperativa</h1>

        <link rel="stylesheet" type="text/css" href="../style.php">'. $html .'
        ');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_cooperativa.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>