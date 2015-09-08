<?php //effettua la delete delle appartenenze dell'anno in corso selezionata

$info='';
if(isset($_POST["Elimina"])){
	$query="DELETE FROM appartenenza
					WHERE aderentePersona='".$_POST['id']."' AND aderenteAnno='".$_POST['anno']."' AND tappaNumRif='".$_POST['tappaNumRif']."'";
			
	mysql_query($query,$conn) or die("Ops! Errore: ".mysql_error().", contatta l'amministratore.");
	$info="<span class='si'>Appartenenza eliminata con successo</span>";
}

?>
