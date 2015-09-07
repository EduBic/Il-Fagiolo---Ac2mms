<?php //effettua la delete della istanza evento dell'anno in corso selezionata

$info='';
if(isset($_GET["Modifica"])){
	$modifica=isset($_GET['modifica']) ? $_GET['modifica'] : array();
	
	$i=true;
	foreach($modifica as $id){
		$query="UPDATE persona SET `assicurato`='si' WHERE id=$id";
		mysql_query($query,$conn) or die("Ops! Errore: ".mysql_error().", contatta l'amministratore.");
	}
	//echo "<p class=\"query\">".$query."</p>";

	if(count($modifica)==1)
		$info="<span class='si'>".count($modifica)." persona assicurata con successo</span>";
	elseif(count($modifica)>1)
		$info="<span class='si'>".count($modifica)." persone assicurate con successo</span>";
	}

?>
