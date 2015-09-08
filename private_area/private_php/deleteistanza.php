<?php //effettua la delete della istanza evento dell'anno in corso selezionata

$info='';
if(isset($_POST["Elimina"])){
	$query="DELETE FROM istanzaevento
					WHERE evento='".$_POST['evento']."' AND dataInizio='".$_POST['dataInizio']."'";
			
	mysql_query($query,$conn) or die("Ops! Errore: ".mysql_error().", contatta l'amministratore.");
	$info="<span class='si'>Evento rimosso con successo</span>";
}

?>
