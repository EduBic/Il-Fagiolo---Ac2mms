<?php //effettua la login controllando la presenza della username e della password
if(isset($_GET["Invio"])){
	$modifica=isset($_GET['modifica']) ? $_GET['modifica'] : array();
	echo "<p>Nuovi aderenti da inserire: ".count($modifica)."</p>";
	
	foreach($modifica as $id){
  		echo "<p>Id nuovo aderente: ".$id;  
  		echo "  Con ruolo: ".$_GET[$id]."</p>";
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
