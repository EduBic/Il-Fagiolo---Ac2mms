<?php

if(isset($_POST["Invio"])){
	$modifica=isset($_POST['modifica']) ? $_POST['modifica'] : array();
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
	
	$test="SELECT * FROM tappa WHERE annoInizio='$dataInizio' AND annoFine='$dataFine' AND (numRiferimento='1' OR numRiferimento='2'
							OR numRiferimento='3' OR numRiferimento='4' OR numRiferimento='5')";
	$risultato=mysql_query($test,$conn) or die("Query test fallita");
	
	if(mysql_num_rows($risultato)!=5){
		$mess=urlencode("no.$num.Una delle tappe di quest'anno non esiste. Prima di assegnare l'appartenenza assicurarsi di crearle tutte su Aggiungi->tappa");
		header('location: '.$_SERVER['PHP_SELF'].'?msg='.$mess);
	}
	else{
	$query="INSERT INTO `acmms`.`appartenenza` (`aderentePersona`, `aderenteAnno`, `tappaNumRif`, `tappaAnnoInizio`, `tappaAnnoFine`) VALUES";
	$length=count($modifica);
	$i=true;
	foreach($modifica as $id){
		if($i){
			$query.=" ('$id', '$anno', '".$_POST[$id]."', '$dataInizio', '$dataFine')";
			$i=false;
		}
		else
			$query.=", ('$id', '$anno', '".$_POST[$id]."', '$dataInizio', '$dataFine')";
	}
	//echo "<p class=\"query\">".$query."</p>";
	
	mysql_query($query,$conn) or die("Ops".mysql_error());
		if(count($modifica)==1){
			$mess=urlencode("si".count($modifica)." persona assegnata con successo");
			header('location: '.$_SERVER['PHP_SELF'].'?msg='.$mess);
		}
		elseif(count($modifica)>1){
			$mess=urlencode("si".count($modifica)." persone assegnate con successo");
			header('location: '.$_SERVER['PHP_SELF'].'?msg='.$mess);		
		}
	}
}

?>
