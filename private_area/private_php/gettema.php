<?php

$info='';

if(isset($_GET["Modifica"])){
	//echo "<p>Tema selezionato per l'evento ".$_GET['evento']." con data ".$_GET['dataInizio'].": ".$_GET['tema']."</p>";
	/* QUERY */
		if($_GET['tema']=="NULL"){
			$query="UPDATE `acmms`.`istanzaevento` 
					SET `tema` = NULL
					WHERE `istanzaevento`.`evento` = '".$_GET['evento']."' AND `istanzaevento`.`dataInizio` = '".$_GET['dataInizio']."'";
			//echo "<p class=\"query\">".$query."</p>";
		}
		
		else{
			$query="UPDATE `acmms`.`istanzaevento` 
						SET `tema` = '".$_GET['tema']."'
						WHERE `istanzaevento`.`evento` = '".$_GET['evento']."' AND `istanzaevento`.`dataInizio` = '".$_GET['dataInizio']."'";
			//echo "<p class=\"query\">".$query."</p>";
		}
	mysql_query($query,$conn) or die("Ops! Errore: ".mysql_error().", contatta l'amministratore.");
	$info="<span class='si'>Modifica effettuata con successo</span>";
	}
?>
