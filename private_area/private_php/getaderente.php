<?php

$info='';
if(isset($_GET["Invio"])){
	$modifica=isset($_GET['modifica']) ? $_GET['modifica'] : array();
	/*echo "<p>Nuovi aderenti da inserire: ".count($modifica)."</p>";*/
	
	$anno=date('Y');
	$query="INSERT INTO `acmms`.`aderente` (`persona`, `anno`, `ruolo`) VALUES ";
	$length=count($modifica);
	$i=true;
	foreach($modifica as $id){
  		//echo "<p>Id nuovo aderente: ".$id;  
  		//echo "  Con ruolo: ".$_GET[$id]."</p>";
		if($i){
			$query.=" ('$id', '$anno', '".$_GET[$id]."')";
			$i=false;
		}
		else
			$query.=", ('$id', '$anno', '".$_GET[$id]."')";
	}
	echo "<p class=\"query\">".$query."</p>";
	
	mysql_query($query,$conn) or die("Ops! Errore: ".mysql_error().", contatta l'amministratore.");
	if(count($modifica)==1)
		$info="<span class='si'>".count($modifica)." persona iscritta con successo</span>";
	elseif(count($modifica)>1)
		$info="<span class='si'>".count($modifica)." persone iscritte con successo</span>";
	}

?>
