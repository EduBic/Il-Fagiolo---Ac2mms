<?php

require("../private_php/print_private_area.php");
require_file();

$conn=connection_db();
session_control();

if(isset($_POST["Inserisci"])){
	//Verifiche integrità dati
	if(!empty($_POST['nome']) && !empty($_POST['cognome']) && !empty($_POST['gg']) && !empty($_POST['mm']) && !empty($_POST['yy']) &&
		!empty($_POST['luogoN'])){
		
		if(preg_match("/^[^@ ]{2,}@[^@ \.]+\.[^@ \.]{2,}$/",$_POST['email']) or empty($_POST['email'])){
		
			if(checkdate($_POST['mm'], $_POST['gg'], $_POST['yy'])){		
				$dataN=format_data($_POST['yy'], $_POST['mm'], $_POST['gg']);
				$test=true;
			
				$query="INSERT INTO persona (`id`, `nome`, `cognome`, `sesso`, `dataNascita`, `luogoNascita`, `telefono`, `email`, `parrocchia`, `assicurato`) VALUES ('', '".addslashes($_POST['nome'])."', '".addslashes($_POST['cognome'])."', '".$_POST['sesso']."', '$dataN', '".addslashes($_POST['luogoN'])."', '".$_POST['telefono']."', '".$_POST['email']."', '".addslashes($_POST['parrocchia'])."', 'no')";
				mysql_query($query, $conn) or $test=false;
			
				connection_db_close($conn);
			
				if($test){
					$mess=urlencode("siInserimento avvenuto con successo");
					header('location: '.$_SERVER['PHP_SELF'].'?msg='.$mess);
				}
				else
				        echo $query."OPS! query fallita";
			}
			else{
				$mess=urlencode("noIl campo data non è valido");
				header('location: '.$_SERVER['PHP_SELF'].'?msg='.$mess);
			}
			
		}
		else{
			$mess=urlencode("noInserire una email valida");
			header('location: '.$_SERVER['PHP_SELF'].'?msg='.$mess);	
		}
		
	}
	else{
		$mess=urlencode("noI campi contrassegnati da * sono obbligatori");
		header('location: '.$_SERVER['PHP_SELF'].'?msg='.$mess);
	}
}

$user="Admin";
print_arHeader($user);
print_arMenu($user);

print_form_addPersona();

print_arfooter();
print_close();

?>
