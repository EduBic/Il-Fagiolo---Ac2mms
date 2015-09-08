<?php

$info='';
if(isset($_POST["Invio"])){
	$aggiungi=isset($_POST['aggiungi']) ? $_POST['aggiungi'] : array();
	//echo "<p>Partecipanti da aggiungere: ".count($aggiungi)."</p><p> all'evento: ".$_POST['evento']." con data: ".$_POST['dataInizio']."</p>";
	
	$anno=date('Y');
	$query="INSERT INTO `partecipazione` (`persona`, `anno`, `dataInizio`, `evento`) VALUES ";
	$length=count($aggiungi);
	$i=true;
	foreach($aggiungi as $id){
  		//echo "<p>Id da aggiungiere: ".$id; 
		if($i){
			$query.=" ('$id', '$anno', '".$_POST['dataInizio']."', '".$_POST['evento']."')";
			$i=false;
		}
		else
			$query.=", ('$id', '$anno', '".$_POST['dataInizio']."', '".$_POST['evento']."')";
	}
	//echo "<p class=\"query\">".$query."</p>";
	
	mysql_query($query,$conn) or die("Ops! Errore: ".mysql_error().", contatta l'amministratore.");
	
	if(count($aggiungi)==1){
		$mess=urlencode("si".count($aggiungi)." persona iscritta con successo");
		header('location: '.$_SERVER['PHP_SELF'].'?msg='.$mess);
		//$info="<span class='si'>".count($aggiungi)." persona iscritta con successo</span>";
	}
	elseif(count($aggiungi)>1){
		$mess=urlencode("si".count($aggiungi)." persone iscritte con successo");
		header('location: '.$_SERVER['PHP_SELF'].'?msg='.$mess);
		//$info="<span class='si'>".count($aggiungi)." persone iscritte con successo</span>";
	}
	
	}

//connection_db_close($conn);
?>
