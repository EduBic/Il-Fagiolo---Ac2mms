
<?php //effettua la delete dei partecipanti dell'evento scelto selezionati tramite checkbox
if(isset($_GET["Modifica"])){
	$elimina=isset($_GET['elimina']) ? $_GET['elimina'] : array();
		echo "<p>Partecipanti da rimuovere: ".count($aggiungi)."</p>
				<p> all'evento: ".$_GET['evento']." con data: ".$_GET['dataInizio']."</p>";
	
	foreach($aggiungi as $id){
  		echo "<p>Id da rimuovere: ".$id;  
	}
	
	//FARE QUERY DI RIMOZIONE AL DATABASE
		
}
else
        echo "Ops";
//header('location:../setaderente.php');
?>

<?php 
//connection_db_close($conn);
?>