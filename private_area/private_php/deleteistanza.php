
<?php //effettua la delete delle istanze evento dell'anno in corso selezionate tramite checkbox
if(isset($_GET["Invio"])){
	$elimina=isset($_GET['elimina']) ? $_GET['elimina'] : array();
	echo "<p>Istanze da eliminare: ".count($elimina)."</p>";
		
	foreach($elimina as $evento){
  		echo "Elimina evento: ".$evento;
		/*$query="DELETE FROM istanzaevento
					WHERE YEAR(dataInizio)=YEAR(CURDATE()) AND evento=$evento;"*/
	}
}
else
        echo "Ops";
//header('location:../setaderente.php');
?>

<?php 
//connection_db_close($conn);
?>