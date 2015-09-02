<?php
if(isset($_GET["Seleziona"])){
	require("../private_php/print_private_area.php");
	require_file();

	$conn=connection_db();

	session_control();
	
	$user="Socio";
	print_arHeader($user);
	print_arMenu($user);

	print_infoTappa($conn,$_GET);

	print_arfooter();
	print_close();
}
else
	echo "Ops! Qualcosa è andato storto!";
?>
