<?php

$info='';
if(isset($_POST["Modifica"])){
	//echo "<p>Tema selezionato per l'evento ".$_POST['evento']." con data ".$_POST['dataInizio'].": ".$_POST['tema']."</p>";
	/* QUERY */
		if($_POST['tema']=="NULL"){
			$query="UPDATE `acmms`.`istanzaevento` 
					SET `tema` = NULL
					WHERE `istanzaevento`.`evento` = '".$_POST['evento']."' AND `istanzaevento`.`dataInizio` = '".$_POST['dataInizio']."'";
			//echo "<p class=\"query\">".$query."</p>";
		}
		
		else{
			$query="UPDATE `acmms`.`istanzaevento` 
						SET `tema` = '".$_POST['tema']."'
						WHERE `istanzaevento`.`evento` = '".$_POST['evento']."' AND `istanzaevento`.`dataInizio` = '".$_POST['dataInizio']."'";
			//echo "<p class=\"query\">".$query."</p>";
		}
	mysql_query($query,$conn) or die("Ops! Errore: ".mysql_error().", contatta l'amministratore.");
	$info="<span class='si'>Modifica effettuata con successo</span>";
	}
?>
