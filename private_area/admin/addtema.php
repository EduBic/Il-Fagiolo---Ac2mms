<?php

require("../private_php/print_private_area.php");
require_file();

$conn=connection_db();
session_control();

$info='';
$successo='no';

if(isset($_POST["Inserisci"])){
	//Verifiche integrità dati
	if(!empty($_POST['nome'])){
			
			$test=true;
			$query="INSERT INTO tema (`nome`,`descrizione`) VALUES ('".addslashes($_POST['nome'])."', '".addslashes($_POST['descrizione'])."')";
			mysql_query($query,$conn) or $test=false;
			connection_db_close($conn);
			
			if($test){
				$info="Inserimento avvenuto con successo";
				$successo='si';
			}
			else
				$info="Il nome inserito è già stato utilizzato";
	}
	else
		$info="Il campo obbligatorio nome è vuoto";
}

$user="Admin";
print_arHeader($user);
print_arMenu($user);

print_form_addTema($info, $successo);

print_arfooter();
print_close();

?>
