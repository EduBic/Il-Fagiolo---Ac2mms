<?php
require(".././php/basefunction.php");
$conn=connection_db();
session_start();
?>



<?php //effettua la login controllando la presenza della username e della password
if(isset($_POST["Login"]))
	{
	$usr=$_POST['username'];
	$pwd=hash('sha512', $_POST['password']);
	$query="select * from utente";
	$query.=" where utente.username='".$usr."'";
	$query.=" and utente.password='".$pwd."'";
	$risultato=mysql_query($query,$conn);
	/*if(!$risultato)
		{
		die("La tabella selezionata non esiste" .mysql_error());
		}*/
	if(mysql_num_rows($risultato)==1){
		$trovato=mysql_fetch_array($risultato);
		$_SESSION['username']=$trovato['username'];
		
		if($_SESSION['username']=="admin"){
			header('location:../private_area/admin/areaadmin.php');
		}
		elseif($_SESSION['username']=="socio"){
			header('location:../private_area/socio/areasocio.php');
		}
		else{
			$_SESSION['redirect']='true';	
			header('location:../login.php');
		}
	}
	else{
		$_SESSION['error']=true;
		header('location:../login.php');
	}
	}
echo "<p><a href='logout.php'>".'logout'."</a></ p>";
?>

<?php 
connection_db_close($conn);
?>
