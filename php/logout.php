<?php //effettua il logout
session_start();
if(isset($_SESSION['username']))
	{
	session_destroy();
	$messaggio="logout effettuato";
	echo "<p>".$messaggio."</p>";
	}

header('location:../index.php');
exit;
?>