<?php

require("../private_php/print_private_area.php");
require_file();

$conn=connection_db();
session_control();

$info='';
$successo='no';

if(isset($_POST["Inserisci"])){
	//Verifiche integrità dati
	if(!empty($_POST['ggi']) && !empty($_POST['mmi']) && !empty($_POST['ggf']) && !empty($_POST['mmf']) && !empty($_POST['yyf'])){
		
		if(checkdate( $_POST['mmi'], $_POST['ggi'], $_POST['yyi']) && checkdate($_POST['mmf'], $_POST['ggf'], $_POST['yyf'])){
			
			$dataInizio=format_data($_POST['yyi'],$_POST['mmi'],$_POST['ggi']);
			$dataFine=format_data($_POST['yyf'],$_POST['mmf'],$_POST['ggf']);
			
			if(strtotime($dataInizio)>strtotime(date('Y-m-d'))){
				if($dataInizio<=$dataFine){
				
				//Gestisco il tema a Null
				if($_POST['tema']=='Nessuno')
					$tema='NULL';
				else
					$tema="'".$_POST['tema']."'";
			
				$test=true;
				$query="INSERT INTO istanzaevento (`evento`, `dataInizio`, `dataFine`, `luogo`, `nPartecipanti`, `programma`, `tema`) VALUES ('".addslashes($_POST['evento'])."', '$dataInizio', '$dataFine', '".addslashes($_POST['luogo'])."', '0', '".addslashes($_POST['programma'])."', ".addslashes($tema).")";
					//echo $query;
				mysql_query($query,$conn) or $test=false;
			
					if($test){
						$info="Inserimento avvenuto con successo";
						$successo='si';
					}
					else{
						$info="L'evento è già stato inserito";
					}
				}
			else
				$info="La data di inizio deve essere minore della data di fine";
			}
			else
				$info="La data di inizio deve essere futura";
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

connection_db_close($conn);

?>
