<?php //effettua la delete della istanza evento dell'anno in corso selezionata

$info='';
if(isset($_GET["Elimina"])){
	$query="DELETE FROM istanzaevento
					WHERE evento='".$_GET['evento']."' AND dataInizio='".$_GET['dataInizio']."'";
			
	mysql_query($query,$conn) or die("Ops! Errore: ".mysql_error().", contatta l'amministratore.");
	$info="<span class='si'>Evento rimosso con successo</span>";
}

?>
