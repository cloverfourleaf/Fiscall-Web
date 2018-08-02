<?php

    //-------------------Função Relatorio---------------------//

    require_once("../dompdf/autoload.inc.php");


    //-------------------Conexão---------------------//
    
   /*$connect = mysqli_connect('fdb20.agilityhoster.com','2753888_bdfiscall','clover4folhas','2753888_bdfiscall');*/     $connect = mysqli_connect('localhost','root','','bdfiscall');

    //------------------Alocacao-------------------//
    
    $escolha  = $_GET["escolha"];//filter_input(INPUT_POST, 'escolha', FILTER_SANITIZE_NUMBER_INT);
    $Modelo  = $_GET["Modelo"];//filter_input(INPUT_POST, 'Fabricante', FILTER_SANITIZE_STRING);
    $Fabricante  = $_GET['Fabricante'];
    $AnoFabricacao  = $_GET['AnoFabricacao'];
    $AnoOperacao  = $_GET['AnoOperacao'];


    if($escolha==1){           
           $query = "SELECT tbonibus.codOnibus,placaOnibus,prefixoOnibus,nomeCooperativa,nomeFabricante,nomeModelo,operacao,anoFabricacao 
           FROM tbonibus 
           INNER JOIN tbcooperativa
           ON tbcooperativa.codCooperativa = tbonibus.codCooperativa 
           INNER JOIN tbmodelo 
           ON tbmodelo.codModelo = tbonibus.codModelo 
           INNER JOIN tbfabricante 
           ON tbfabricante.codFabricante = tbmodelo.codFabricante 
           WHERE nomeFabricante='$Fabricante' 
           AND tbmodelo.codModelo='$Modelo' 
           AND anoFabricacao='$AnoFabricacao' 
           AND operacao='$AnoOperacao' 
           ORDER BY placaOnibus ASC";
    }else if($escolha==2){           
           $query = "SELECT tbonibus.codOnibus,placaOnibus,prefixoOnibus,nomeCooperativa,nomeFabricante,nomeModelo,operacao,anoFabricacao 
           FROM tbonibus 
           INNER JOIN tbcooperativa 
           ON tbcooperativa.codCooperativa = tbonibus.codCooperativa 
           INNER JOIN tbmodelo 
           ON tbmodelo.codModelo = tbonibus.codModelo 
           INNER JOIN tbfabricante 
           ON tbfabricante.codFabricante = tbmodelo.codFabricante 
           WHERE nomeFabricante='$Fabricante' 
           AND anoFabricacao='$AnoFabricacao'
           AND operacao='$AnoOperacao' 
           ORDER BY placaOnibus ASC";
    }else if($escolha==3){           
           $query = "SELECT tbonibus.codOnibus,placaOnibus,prefixoOnibus,nomeCooperativa,nomeFabricante,nomeModelo,operacao,anoFabricacao 
           FROM tbonibus 
           INNER JOIN tbcooperativa 
           ON tbcooperativa.codCooperativa = tbonibus.codCooperativa 
           INNER JOIN tbmodelo 
           ON tbmodelo.codModelo = tbonibus.codModelo 
           INNER JOIN tbfabricante 
           ON tbfabricante.codFabricante = tbmodelo.codFabricante 
           WHERE nomeFabricante='$Fabricante' 
           AND operacao='$AnoOperacao'
           ORDER BY placaOnibus ASC ";
    }else if($escolha==4){           
           $query = "SELECT tbonibus.codOnibus,placaOnibus,prefixoOnibus,nomeCooperativa,nomeFabricante,nomeModelo,operacao,anoFabricacao 
           FROM tbonibus 
           INNER JOIN tbcooperativa 
           ON tbcooperativa.codCooperativa = tbonibus.codCooperativa 
           INNER JOIN tbmodelo 
           ON tbmodelo.codModelo = tbonibus.codModelo 
           INNER JOIN tbfabricante 
           ON tbfabricante.codFabricante = tbmodelo.codFabricante 
           WHERE nomeFabricante='$Fabricante'
           ORDER BY placaOnibus ASC";
    }else if($escolha==5){           
           $query = "SELECT tbonibus.codOnibus,placaOnibus,prefixoOnibus,nomeCooperativa,nomeFabricante,nomeModelo,operacao,anoFabricacao 
           FROM tbonibus 
           INNER JOIN tbcooperativa 
           ON tbcooperativa.codCooperativa = tbonibus.codCooperativa 
           INNER JOIN tbmodelo 
           ON tbmodelo.codModelo = tbonibus.codModelo 
           INNER JOIN tbfabricante 
           ON tbfabricante.codFabricante = tbmodelo.codFabricante 
           WHERE nomeFabricante='$Fabricante' 
           AND tbmodelo.codModelo='$Modelo' 
           AND anoFabricacao='$AnoFabricacao'
           ORDER BY placaOnibus ASC";
    }else if($escolha==6){           
           $query = "SELECT tbonibus.codOnibus,placaOnibus,prefixoOnibus,nomeCooperativa,nomeFabricante,nomeModelo,operacao,anoFabricacao 
           FROM tbonibus 
           INNER JOIN tbcooperativa 
           ON tbcooperativa.codCooperativa = tbonibus.codCooperativa 
           INNER JOIN tbmodelo 
           ON tbmodelo.codModelo = tbonibus.codModelo 
           INNER JOIN tbfabricante 
           ON tbfabricante.codFabricante = tbmodelo.codFabricante 
           WHERE nomeFabricante='$Fabricante' 
           AND tbmodelo.codModelo='$Modelo' 
           AND operacao='$AnoOperacao'
           ORDER BY placaOnibus ASC";
    }else if($escolha==7){           
           $query = "SELECT tbonibus.codOnibus,placaOnibus,prefixoOnibus,nomeCooperativa,nomeFabricante,nomeModelo,operacao,anoFabricacao 
           FROM tbonibus 
           INNER JOIN tbcooperativa 
           ON tbcooperativa.codCooperativa = tbonibus.codCooperativa 
           INNER JOIN tbmodelo 
           ON tbmodelo.codModelo = tbonibus.codModelo 
           INNER JOIN tbfabricante 
           ON tbfabricante.codFabricante = tbmodelo.codFabricante 
           WHERE anoFabricacao='$AnoFabricacao' 
           AND operacao='$AnoOperacao'
           ORDER BY placaOnibus ASC";
    }else if($escolha==8){           
           $query = "SELECT tbonibus.codOnibus,placaOnibus,prefixoOnibus,nomeCooperativa,nomeFabricante,nomeModelo,operacao,anoFabricacao 
           FROM tbonibus 
           INNER JOIN tbcooperativa 
           ON tbcooperativa.codCooperativa = tbonibus.codCooperativa 
           INNER JOIN tbmodelo 
           ON tbmodelo.codModelo = tbonibus.codModelo 
           INNER JOIN tbfabricante 
           ON tbfabricante.codFabricante = tbmodelo.codFabricante 
           WHERE anoFabricacao='$AnoFabricacao' 
           ORDER BY placaOnibus ASC ";
    }else if($escolha==9){           
           $query = "SELECT tbonibus.codOnibus,placaOnibus,prefixoOnibus,nomeCooperativa,nomeFabricante,nomeModelo,operacao,anoFabricacao 
           FROM tbonibus 
           INNER JOIN tbcooperativa 
           ON tbcooperativa.codCooperativa = tbonibus.codCooperativa 
           INNER JOIN tbmodelo 
           ON tbmodelo.codModelo = tbonibus.codModelo 
           INNER JOIN tbfabricante 
           ON tbfabricante.codFabricante = tbmodelo.codFabricante 
           WHERE operacao='$AnoOperacao'
           ORDER BY placaOnibus ASC ";
    }else if($escolha==10){
           $query = "SELECT tbonibus.codOnibus,placaOnibus,prefixoOnibus,nomeCooperativa,nomeFabricante,nomeModelo,operacao,anoFabricacao 
           FROM tbonibus 
           INNER JOIN tbcooperativa 
           ON tbcooperativa.codCooperativa = tbonibus.codCooperativa 
           INNER JOIN tbmodelo 
           ON tbmodelo.codModelo = tbonibus.codModelo 
           INNER JOIN tbfabricante 
           ON tbfabricante.codFabricante = tbmodelo.codFabricante 
           WHERE anoFabricacao='$AnoFabricacao'
           AND nomeFabricante='$Fabricante'
           ORDER BY placaOnibus ASC ";
    }else if($escolha==11){
           $query = "SELECT tbonibus.codOnibus,placaOnibus,prefixoOnibus,nomeCooperativa,nomeFabricante,nomeModelo,operacao,anoFabricacao 
           FROM tbonibus 
           INNER JOIN tbcooperativa 
           ON tbcooperativa.codCooperativa = tbonibus.codCooperativa 
           INNER JOIN tbmodelo 
           ON tbmodelo.codModelo = tbonibus.codModelo 
           INNER JOIN tbfabricante 
           ON tbfabricante.codFabricante = tbmodelo.codFabricante 
           WHERE nomeFabricante='$Fabricante'
           AND tbmodelo.codModelo='$Modelo'
           ORDER BY placaOnibus ASC";
    }
    
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