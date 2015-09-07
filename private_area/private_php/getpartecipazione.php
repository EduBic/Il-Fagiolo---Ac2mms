<?php

$info='';
if(isset($_GET["Invio"])){
	$aggiungi=isset($_GET['aggiungi']) ? $_GET['aggiungi'] : array();
	//echo "<p>Partecipanti da aggiungere: ".count($aggiungi)."</p><p> all'evento: ".$_GET['evento']." con data: ".$_GET['dataInizio']."</p>";
	
	$anno=date('Y');
	$query="INSERT INTO `acmms`.`partecipazione` (`persona`, `anno`, `dataInizio`, `evento`) VALUES ";
	$length=count($aggiungi);
	$i=true;
	foreach($aggiungi as $id){
  		//echo "<p>Id da aggiungiere: ".$id; 
		if($i){
			$query.=" ('$id', '$anno', '".$_GET['dataInizio']."', '".$_GET['evento']."')";
			$i=false;
		}
		else
			$query.=", ('$id', '$anno', '".$_GET['dataInizio']."', '".$_GET['evento']."')";
	}
	//echo "<p class=\"query\">".$query."</p>";
	
	mysql_query($query,$conn) or die("Ops! Errore: ".mysql_error().", contatta l'amministratore.");
	if(count($aggiungi)==1)
		$info="<span class='si'>".count($aggiungi)." persona iscritta con successo</span>";
	elseif(count($aggiungi)>1)
		$info="<span class='si'>".count($aggiungi)." persone iscritte con successo</span>";
	}

//connection_db_close($conn);
?>
