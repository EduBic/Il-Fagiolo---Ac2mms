
<?php //effettua la login controllando la presenza della username e della password
if(isset($_GET["Invio"]))
	{
	$iscrivi=isset($_GET['iscrivi']) ? $_GET['iscrivi'] : array();
	echo "<p>iscrivi_size: ".count($iscrivi)."</p>";
	$ruoli=isset($_GET['ruolo']) ? $_GET['ruolo'] : array();
	echo "<p>ruolo_size: ".count($ruoli)."</p>";
	$aderente=array_combine($iscrivi,$ruoli);
	foreach($aderente as $id=>$ruolo)
	{
	if($id!='NO')
	{	
	$messaggio="id_persona: ".$id."       ruolo: ".$ruolo."";
	echo "<p>".$messaggio."</p>";
	}
	/*$query="insert into aderente ";
	$query.="value (".$id.",year(curdate()),'".$ruolo."')";
	$risultato=mysql_query($query,$conn);
	if(!$risultato)
		{
		
		die("La tabella selezionata non esiste" .mysql_error());
		}*/
	}
}
else
        echo "Ops";
//header('location:../setaderente.php');
?>

<?php 
//connection_db_close($conn);
?>
