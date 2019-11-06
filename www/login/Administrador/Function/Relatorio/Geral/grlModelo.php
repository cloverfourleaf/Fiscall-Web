<?php

    //-------------------Função Relatorio---------------------//

    require_once("../dompdf/autoload.inc.php");


    //-------------------Conexão---------------------//
    
   /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');

    //------------------Modelo-------------------//

    $query_Modelo = "SELECT * FROM tbmodelo INNER JOIN tbtipomodelo ON tbtipomodelo.codTipoModelo = tbmodelo.codTipoModelo INNER JOIN tbfabricante ON tbfabricante.codFabricante = tbmodelo.codFabricante";
    $res_Modelo = mysqli_query($connect, $query_Modelo);
    $total = mysqli_num_rows($res_Modelo);
    

    //----------------Cabeçalho--------------------//
    
        $html = '<table>';
            $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<th>Modelo</th>';
                    $html .= '<th>Ano Fabricação</th>';
                    $html .= '<th>Tipo de Ônibus</th>';
                    $html .= '<th>Nome do Fabricante</th>';
                $html .= '</tr>';
            $html .= '</thead>';


    //-----------------Corpo-----------------//

    while($row_Modelo = mysqli_fetch_assoc($res_Modelo)){
        
            $html .= '<tbody>';
                $html .= '<tr>';

                    $html .= '<td>'.$row_Modelo['nomeModelo']."</td>";
                    $html .= '<td>'.$row_Modelo['anoFabricacao']."</td>";
                    $html .= '<td>'.$row_Modelo['descricaoTipoModelo']."</td>";
                    $html .= '<td>'.$row_Modelo['nomeFabricante']."</td>";

                $html .= '</tr>';
    }
            $html .= '</tbody>';
        $html .= '</table>';
       $html .= '<footer class="Logo"> <img src = "../../../../img/emtu.png"></footer>
        ';

         $html .= '<footer class="Logo2"><p>EMTU</p></footer>
        ';

         $html .= '<footer class="rodape"><p>


        TOTAL DE MODELOS:'.$total.'</p>';



    //-----------------------Final------------------//

    use Dompdf\Dompdf;
    $dompdf = new DOMPDF();
     $dompdf->load_html('

        <h1>Relatório de modelo</h1>

        <link rel="stylesheet" type="text/css" href="../style.php">'. $html .'
        ');

	$dompdf->render();
	$dompdf->stream("RelatorioModelo.pdf", 
		array("Attachment" => false)
	);
?>