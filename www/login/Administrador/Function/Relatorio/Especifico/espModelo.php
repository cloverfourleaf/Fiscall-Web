<?php

    //-------------------Função Relatorio---------------------//

    require_once("../dompdf/autoload.inc.php");


    //-------------------Conexão---------------------//
    
   /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $codModelo = filter_input(INPUT_GET, 'codModelo', FILTER_SANITIZE_NUMBER_INT);

    //------------------Modelo-------------------//

    $query_Modelo = "SELECT * FROM tbmodelo WHERE codModelo='$codModelo'";
    $res_Modelo = mysqli_query($connect, $query_Modelo);
    $row_Modelo = mysqli_fetch_assoc($res_Modelo);
    $nomeModelo = $row_Modelo['nomeModelo'];
    $anoFabricacao = $row_Modelo['anoFabricacao'];
    $codTipoModelo = $row_Modelo ['codTipoModelo'];
    $codFabricante = $row_Modelo['codFabricante'];

    //----------------Tipo do Modelo--------------------//

    $query_TipoModelo = "SELECT descricaoTipoModelo FROM tbtipomodelo WHERE codTipoModelo='$codTipoModelo'";
    $res_TipoModelo = mysqli_query($connect, $query_TipoModelo);
    $row_TipoModelo = mysqli_fetch_assoc($res_TipoModelo);


    //----------------Fabricante--------------------//

    $query_Fabricante = "SELECT nomeFabricante FROM tbfabricante WHERE codFabricante='$codFabricante'";
    $res_Fabricante = mysqli_query($connect, $query_Fabricante);
    $row_Fabricante = mysqli_fetch_assoc($res_Fabricante);


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

            $html .= '<tbody>';
                $html .= '<tr>';

                    $html .= '<td>'.$row_Modelo['nomeModelo']."</td>";
                    $html .= '<td>'.$row_Modelo['anoFabricacao']."</td>";
                    $html .= '<td>'.$row_TipoModelo['descricaoTipoModelo']."</td>";
                    $html .= '<td>'.$row_Fabricante['nomeFabricante']."</td>";
                    //$html .= '<td>'.$row_Linha['nomeLinha']."</td>";
                    //$html .= '<td>'.$row['codLinha']."</td>";
                    //$html .= '<td>'.$row['codLinha']."</td>";
                    //$html .= '<td>'.$row['codLinha']."</td>";

                $html .= '</tr>';        
            $html .= '</tbody>';
        $html .= '</table>';

          $html .= '<footer class="Logo"> <img src = "../../../../img/emtu.png"></footer>
        ';

         $html .= '<footer class="Logo2"><p>EMTU</p></footer>
        ';


    //-----------------------Final------------------//

    use Dompdf\Dompdf;
    $dompdf = new DOMPDF();
     $dompdf->load_html('

        <h1>Relatório do modelo</h1>

        <link rel="stylesheet" type="text/css" href="../style.php">'. $html .'
        ');

	$dompdf->render();
	$dompdf->stream("RelatorioModelo.pdf", 
		array("Attachment" => false)
	);
?>