
<?php //effettua la delete dei partecipanti dell'evento scelto selezionati tramite checkbox

$info='';
if(isset($_POST["Elimina"])){
	$elimina=isset($_POST['elimina']) ? $_POST['elimina'] : array();
	//echo "<p>Partecipanti da rimuovere: ".count($elimina)."</p>
		//		<p> all'evento: ".$_POST['evento']." con data: ".$_POST['dataInizio']."</p>";
	
	$anno=date('Y');
	foreach($elimina as $id){
			$query="DELETE FROM partecipazione WHERE persona=$id AND anno=$anno AND dataInizio='".$_POST['dataInizio']."' AND evento='".$_POST['evento']."'";
			mysql_query($query,$conn) or die("Ops! Errore: ".mysql_error().", contatta l'amministratore.");
	}
	//echo "<p class=\"query\">".$query."</p>";
	
	if(count($elimina)==1)
		$info="<span class='si'>".count($elimina)." partecipante rimosso con successo</span>";
	elseif(count($elimina)>1)
		$info="<span class='si'>".count($elimina)." partecipanti rimossi con successo</span>";
	}
?>
