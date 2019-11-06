<?php

    //-------------------Função Relatorio---------------------//

    require_once("../dompdf/autoload.inc.php");


    //-------------------Conexão---------------------//
    
   /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $codAlocacao = filter_input(INPUT_GET, 'codAlocacao', FILTER_SANITIZE_NUMBER_INT);

    //------------------Alocacao-------------------//

    $query_Alocacao = "SELECT * FROM tbalocacao WHERE codAlocacao=$codAlocacao";
    $res_Alocacao = mysqli_query($connect, $query_Alocacao);
    $row_Alocacao = mysqli_fetch_assoc($res_Alocacao);
    $codFuncionario = $row_Alocacao['codFuncionario'];
    $codOnibus = $row_Alocacao['codOnibus'];
    $codLinha = $row_Alocacao['codLinha'];
    $inicioAlocacao = $row_Alocacao['inicioAlocacao'];
    $fimAlocacao = $row_Alocacao['fimAlocacao'];
    $statusAlocacao = $row_Alocacao['statusAlocacao'];
    $codTurno = $row_Alocacao['codTurno'];
    
    //----------------Funcionario--------------------//

    $query_Funcionario = "SELECT nomeFuncionario FROM tbfuncionario WHERE codFuncionario='$codFuncionario'";
    $res_Funcionario = mysqli_query($connect, $query_Funcionario);
    $row_Funcionario = mysqli_fetch_assoc($res_Funcionario);


    //----------------Onibus--------------------//

    $query_Onibus = "SELECT placaOnibus,prefixoOnibus FROM tbonibus WHERE codOnibus='$codOnibus'";
    $res_Onibus = mysqli_query($connect, $query_Onibus);
    $row_Onibus = mysqli_fetch_assoc($res_Onibus);


    //----------------Linha--------------------//

    $query_Linha = "SELECT nomeLinha FROM tblinha WHERE codLinha='$codLinha'";
    $res_Linha = mysqli_query($connect, $query_Linha);
    $row_Linha = mysqli_fetch_assoc($res_Linha);


    //----------------Turno--------------------//

    $query_Turno = "SELECT descricaoTurno FROM tbturno WHERE codTurno='$codTurno'";
    $res_Turno = mysqli_query($connect, $query_Turno);
    $row_Turno = mysqli_fetch_assoc($res_Turno);

    //----------------Cabeçalho--------------------//
    
        $html = '<table>';
            $html .= '<thead>';
                $html .= '<tr>';
                    $html .= '<th>Nome do Motorista</th>';
                    $html .= '<th>Prefixo do Onibus</th>';
                    $html .= '<th>Placa do Onibus</th>';
                    $html .= '<th>Linha</th>';
                    $html .= '<th>Início</th>';
                    $html .= '<th>Validade</th>';
                    $html .= '<th>Status</th>';
                    $html .= '<th>Turno</th>';
                $html .= '</tr>';
            $html .= '</thead>';


    //-----------------Corpo-----------------//

            $html .= '<tbody>';
                $html .= '<tr>';

                    $html .= '<td>'.$row_Funcionario['nomeFuncionario']."</td>";
                    $html .= '<td>'.$row_Onibus['prefixoOnibus']."</td>";
                    $html .= '<td>'.$row_Onibus['placaOnibus']."</td>";
                    $html .= '<td>'.$row_Linha['nomeLinha']."</td>";
                    $html .= '<td>'.$row_Alocacao['inicioAlocacao']."</td>";
                    $html .= '<td>'.$row_Alocacao['fimAlocacao']."</td>";
                    $html .= '<td>'.$row_Alocacao['statusAlocacao']."</td>";
                    $html .= '<td>'.$row_Turno['descricaoTurno']."</td>";

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

        <h1>Relatório da alocação</h1>

        <link rel="stylesheet" type="text/css" href="../style.php">'. $html .'
        ');

	$dompdf->render();
	$dompdf->stream("RelatorioAlocacao.pdf", 
		array("Attachment" => false)
	);
?>