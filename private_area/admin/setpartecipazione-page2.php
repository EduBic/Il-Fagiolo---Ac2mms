<?php
if(isset($_POST["Seleziona"])){
	require("../private_php/print_private_area.php");
	require_file();

	$conn=connection_db();
	session_control();

	$user="Admin";
	print_arHeader($user);
	print_arMenu($user);

	print_form_setPartecipazione($conn,$_POST);

	print_arfooter();
	print_close();
	
	connection_db_close($conn);
}
else
	echo "Ops";

?>