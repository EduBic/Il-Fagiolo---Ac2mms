<?php

require("../private_php/print_private_area.php");
require_file();

$conn=connection_db();
session_control();

$info="";
$successo="no";

if(isset($_POST['Inserisci'])){
	
	if(!empty($_POST['annata'])){
		
		$query="call inserisci_annata(".$_POST['annata'].")";
		//echo "<p class=\"query\">".$query."</p>";
		
		$test=true;
		
		mysql_query($query,$conn) or $test=false;
		connection_db_close($conn);
		
		if($test){
			$info="Inserimento avvenuto con successo";
			$successo="si";
		}
		else{
			$info="Inserimento non riuscito, la tappa esiste già";
			$successo="no";
		}
	}
	else
		$info="Campo dati vuoto!";
}

$user="Admin";
print_arHeader($user);
print_arMenu($user);

print_form_addTappa($info, $successo);

print_arfooter();
print_close();

?>
