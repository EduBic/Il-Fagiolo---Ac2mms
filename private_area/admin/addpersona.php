<?php

require("../private_php/print_private_area.php");
require_file();

$conn=connection_db();
session_control();

$info='';
$successo='no';

if(isset($_GET["Inserisci"])){
	//Verifiche integrità dati
	if(empty(!$_GET['nome']) && empty(!$_GET['cognome']) && empty(!$_GET['gg']) && empty(!$_GET['mm']) && empty(!$_GET['yy']) &&
		empty(!$_GET['luogoN'])){
		
		if(checkdate($_GET['mm'], $_GET['gg'], $_GET['yy'])){
			
			$dataN=format_data($_GET['yy'], $_GET['mm'], $_GET['gg']);
			
			$test=true;
			
			$query="INSERT INTO persona (`id`, `nome`, `cognome`, `sesso`, `dataNascita`, `luogoNascita`, `telefono`, `email`, `parrocchia`, `assicurato`) VALUES ('', '".$_GET['nome']."', '".$_GET['cognome']."', '".$_GET['sesso']."', '$dataN', '".$_GET['luogoN']."', '".$_GET['telefono']."', '".$_GET['email']."', '".$_GET['parrocchia']."', 'no')";
			mysql_query($query, $conn) or $test=false;
			
			if($test){
				$info="Inserimento avvenuto con successo";
				$successo='si';
			}
		}
		else
			$info="Il campo data non è valido";
	}
	else
		$info="Nessun campo può essere lasciato vuoto";
			
	//query INSERT
	
/*

get from form "persona"
$nome
$cognome
$data
...
$assicurato="no";

$query="INSERT INTO Persona(Id, VALUE,...) VLAUES ...";
*/
			
}

$user="Admin";
print_arHeader($user);
print_arMenu($user);

print_form_addPersona($info,$successo);

print_arfooter();
print_close();

?>
