<?php

$info='';
if(isset($_GET["Invio"])){
	$modifica=isset($_GET['modifica']) ? $_GET['modifica'] : array();
	//echo "<p>Aderenti da modificare: ".count($modifica)."</p>";
	
	//2 insert differenziate in base al supoeramento del 1 ottobre dell'anno
	$anno=date('Y');
	if(date('Y-m-d')>"".date('Y')."-09-30"){ 
		$dataInizio=date('Y');
		$dataFine=date('Y')+1;
	}
	else{
		$dataInizio=date('Y')-1; 
		$dataFine=date('Y');
	}
	
	$query="INSERT INTO `acmms`.`appartenenza` (`aderentePersona`, `aderenteAnno`, `tappaNumRif`, `tappaAnnoInizio`, `tappaAnnoFine`) VALUES";
	$length=count($modifica);
	$i=true;
	foreach($modifica as $id){
		if($i){
			$query.=" ('$id', '$anno', '".$_GET[$id]."', '$dataInizio', '$dataFine')";
			$i=false;
		}
		else
			$query.=", ('$id', '$anno', '".$_GET[$id]."', '$dataInizio', '$dataFine')";
	}
	//echo "<p class=\"query\">".$query."</p>";
	
	mysql_query($query,$conn) or die("Ops! Errore: ".mysql_error().", contatta l'amministratore.");
	if(count($modifica)==1)
		$info="<span class='si'>".count($modifica)." persona assegnata con successo</span>";
	elseif(count($modifica)>1)
		$info="<span class='si'>".count($modifica)." persone assegnate con successo</span>";
	}

?>
