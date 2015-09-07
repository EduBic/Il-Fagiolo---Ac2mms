<?php //effettua la delete delle appartenenze dell'anno in corso selezionata

$info='';
if(isset($_GET["Elimina"])){
	$query="DELETE FROM appartenenza
					WHERE aderentePersona='".$_GET['id']."' AND aderenteAnno='".$_GET['anno']."' AND tappaNumRif='".$_GET['tappaNumRif']."'";
			
	mysql_query($query,$conn) or die("Ops! Errore: ".mysql_error().", contatta l'amministratore.");
	$info="<span class='si'>Appartenenza eliminata con successo</span>";
}

?>
