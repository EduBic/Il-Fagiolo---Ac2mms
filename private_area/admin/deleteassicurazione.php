<?php

require("../private_php/print_private_area.php");
require_file();

$conn=connection_db();
session_control();

$info='';
$successo='no';

if(isset($_GET['Reset'])){
	$query="call insurance_flag('no')";
	$test=true;
	mysql_query($query,$conn) or $test=false;
	
	if($test){
		$info="Reset avvenuto con successo ";
		$successo='si';
	}
	else
		$info="Reset non avvenuto, errore ".mysql_error().", contatta l'amministratore del server";
}

$user="Admin";
print_arHeader($user);
print_arMenu($user);

print_form_deleteAssicurazione($info,$successo);

print_arfooter();
print_close();


?>