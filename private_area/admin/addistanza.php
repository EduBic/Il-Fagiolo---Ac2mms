<?php

require("../private_php/print_private_area.php");
require_file();

$conn=connection_db();
session_control();

$info='';
$successo='no';

if(isset($_GET["Inserisci"])){
	//Verifiche integrità dati
	if(!empty($_GET['ggi']) && !empty($_GET['mmi']) && !empty($_GET['ggf']) && !empty($_GET['mmf']) && !empty($_GET['yyf'])){
		
		if(checkdate( $_GET['mmi'], $_GET['ggi'], $_GET['yyi']) && checkdate($_GET['mmf'], $_GET['ggf'], $_GET['yyf'])){
			
			$dataInizio=format_data($_GET['yyi'],$_GET['mmi'],$_GET['ggi']);
			$dataFine=format_data($_GET['yyf'],$_GET['mmf'],$_GET['ggf']);
			
				if($dataInizio<=$dataFine){
			
				$test=true;
				$query="INSERT INTO istanzaevento VLAUES (".$_GET['evento'].", $dataInizio, $dataFine, ".$_GET['luogo'].", ".$_GET['programma'].", ".$_GET['tema'].")";
				mysql_query($query,$conn) or $test=false;
			
					if($test){
						$info="Inserimento avvenuto con successo";
						$successo='si';
					}
				}
			else
				$info="La data di inizio deve essere minore della data di fine";
		}
		else
			$info="I campi data non sono validi";
	}
	else
		$info="Alcuni campi obbligatori sono vuoti";
}

$user="Admin";
print_arHeader($user);
print_arMenu($user);

print_form_addIstanza($conn,$info,$successo);

print_arfooter();
print_close();


?>
