
<?php //effettua la delete delle istanze evento dell'anno in corso selezionate tramite checkbox
if(isset($_GET["Modifica"])){
	
	echo "<p>Evento selezionato: ".$_GET['evento']." con data inizio: ".$_GET['dataInizio']." e fine: ".$_GET['dataFine']." con ".$_GET['nPartecipanti']." partecipanti.</p>";
		
}
else
        echo "Ops";
//header('location:../setaderente.php');
?>

<?php 
//connection_db_close($conn);
?>