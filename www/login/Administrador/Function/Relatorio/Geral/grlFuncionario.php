<?php

/*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');
    $query = "SELECT * FROM tbfuncionario INNER JOIN tbusuario ON tbusuario.codUsuario = tbfuncionario.codUsuario INNER JOIN tbnivelusuario ON tbnivelusuario.codNivelUsuario = tbusuario.codNivelUsuario";
    $res = mysqli_query($connect, $query);
    $total = mysqli_num_rows($res);
            
    

        $html = '<table>';	
        $html .= '<thead>';
            $html .= '<tr>';
                $html .= '<th>Nome</th>';
                $html .= '<th>RG</th>';
                $html .= '<th>CNH</th>';
                $html .= '<th>CPF</th>';
                $html .= '<th>Data de Cadastro</th>';
                $html .= '<th>Cargo</th>';
            $html .= '</tr>';
        $html .= '</thead>';

    while($row = mysqli_fetch_assoc($res)){
        
        $html .= '<tbody>';
            $html .= '<tr>';

                $html .= '<td>'.$row['nomeFuncionario']."</td>";
                $html .= '<td>'.$row['rgFuncionario']."</td>";                
                $html .= '<td>'.$row['cnhFuncionario']."</td>";               
                $html .= '<td>'.$row['cpfFuncionario']."</td>";
                $html .= '<td>'.$row['dataCadastroFuncionario']."</td>";                
                $html .= '<td>'.$row['descricaoNivelUsuario']."</td>";
        
            $html .= '</tr>';        
        }
        $html .= '</tbody>';
        $html .= '</table>';
         $html .= '<footer class="Logo"> <img src = "../../../../img/emtu.png"></footer>
        ';

         $html .= '<footer class="Logo2"><p>EMTU</p></footer>
        ';

         $html .= '<footer class="rodape"><p>


        TOTAL DE  FUNCIONÁRIOS:'.$total.'</p>';

//        
//        $html . ='<class ="img">
//        
//        <img src = "../../../../img/emtu.png">';
    
    //referenciar o DomPDF com namespace
	   use Dompdf\Dompdf;

	// include autoloader
	   require_once("../dompdf/autoload.inc.php");

	//Criando a Instancia
	   $dompdf = new DOMPDF();
	
	// Carrega seu HTML
	   $dompdf->load_html('

        <h1>Relatório de Funcionário</h1>

        <link rel="stylesheet" type="text/css" href="../style.php">'. $html .'
        ');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_funcionario.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>
