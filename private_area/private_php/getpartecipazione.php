<?php
if(isset($_GET["Invio"])){
	$aggiungi=isset($_GET['aggiungi']) ? $_GET['aggiungi'] : array();
	echo "<p>Partecipanti da aggiungere: ".count($aggiungi)."</p><p> all'evento: ".$_GET['evento']." con data: ".$_GET['dataInizio']."</p>";
	
	foreach($aggiungi as $id){
  		echo "<p>Id da aggiungiere: ".$id;  
	}
	/* FARE QUERY DI MODIFICA AL DATABASE */
	}
else
        echo "Ops";
//header('location:../setaderente.php');
?>

<?php 
//connection_db_close($conn);
?>