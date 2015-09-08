<?php

if(isset($_POST["Invio"])){
	$modifica=isset($_POST['modifica']) ? $_POST['modifica'] : array();
	/*echo "<p>Nuovi aderenti da inserire: ".count($modifica)."</p>";*/
	
	$anno=date('Y');
	$query="INSERT INTO `acmms`.`aderente` (`persona`, `anno`, `ruolo`) VALUES ";
	$length=count($modifica);
	$i=true;
	foreach($modifica as $id){
  		//echo "<p>Id nuovo aderente: ".$id;  
  		//echo "  Con ruolo: ".$_POST[$id]."</p>";
		if($i){
			$query.=" ('$id', '$anno', '".$_POST[$id]."')";
			$i=false;
		}
		else
			$query.=", ('$id', '$anno', '".$_POST[$id]."')";
	}
	echo "<p class=\"query\">".$query."</p>";
	
	mysql_query($query,$conn) or die("Ops! Errore: ".mysql_error().", contatta l'amministratore.");
	if(count($modifica)==1){
		$mess=urlencode("si".count($modifica)." persona iscritta con successo");
		header('location: '.$_SERVER['PHP_SELF'].'?msg='.$mess);
	}
	elseif(count($modifica)>1){
		$mess=urlencode("si".count($modifica)." persone iscritte con successo");
		header('location: '.$_SERVER['PHP_SELF'].'?msg='.$mess);		
	}
}

?>
