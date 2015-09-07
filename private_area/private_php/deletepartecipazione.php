
<?php //effettua la delete dei partecipanti dell'evento scelto selezionati tramite checkbox

$info='';
if(isset($_GET["Elimina"])){
	$elimina=isset($_GET['elimina']) ? $_GET['elimina'] : array();
	//echo "<p>Partecipanti da rimuovere: ".count($elimina)."</p>
		//		<p> all'evento: ".$_GET['evento']." con data: ".$_GET['dataInizio']."</p>";
	
	$anno=date('Y');
	foreach($elimina as $id){
			$query="DELETE FROM partecipazione WHERE persona=$id AND anno=$anno AND dataInizio='".$_GET['dataInizio']."' AND evento='".$_GET['evento']."'";
			mysql_query($query,$conn) or die("Ops! Errore: ".mysql_error().", contatta l'amministratore.");
	}
	echo "<p class=\"query\">".$query."</p>";
	
	if(count($elimina)==1)
		$info="<span class='si'>".count($elimina)." partecipante rimosso con successo</span>";
	elseif(count($elimina)>1)
		$info="<span class='si'>".count($elimina)." partecipanti rimossi con successo</span>";
	}
?>
