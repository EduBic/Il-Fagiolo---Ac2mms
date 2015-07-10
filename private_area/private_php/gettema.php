<?php
if(isset($_GET["Modifica"])){
	echo "<p>Tema selezionato per l'evento ".$_GET['evento']." con data ".$_GET['dataInizio'].": ".$_GET['tema']."</p>";
	/* FARE QUERY DI MODIFICA AL DATABASE */
	}
else
   echo "Ops";
//header('location:../setaderente.php');
?>

<?php 
//connection_db_close($conn);
?>
