<?php

if(isset($_POST["ModificaAdmin"])){

        $query="SELECT password FROM utente WHERE username='admin'";
        $risultato=mysql_query($query,$conn) or die("Query fallita");
        
        if(mysql_num_rows($risultato)==1){
                $oldpassword=mysql_fetch_array($risultato);
                
                if($_POST['oldpwd']!=$_POST['newpwd']){

	        if( $oldpassword['password']==hash('sha512', $_POST['oldpwd'])){
	                $newpassword=hash('sha512', $_POST['newpwd']);
	                $query2="UPDATE utente SET password='$newpassword' WHERE username='admin'";
	                mysql_query($query2,$conn) or die("Query test fallita");
	                
	                $mess=urlencode("siPassword cambiata correttamente");
		        header('location: '.$_SERVER['PHP_SELF'].'?msg='.$mess);
		}
	        else{
	                $mess=urlencode("noLa password inserita e' errata");
		        header('location: '.$_SERVER['PHP_SELF'].'?msg='.$mess);
	        }
	        
	        }
                else{
                        $mess=urlencode("noLa nuova password e' uguale a quella attuale");
		        header('location: '.$_SERVER['PHP_SELF'].'?msg='.$mess);
                }
        }
        else{
                $mess=urlencode("noLa password inserita e' errata");
		header('location: '.$_SERVER['PHP_SELF'].'?msg='.$mess);
        }
}

elseif(isset($_POST["ModificaSocio"])){

        $query="SELECT password FROM utente WHERE username='socio'";
        $risultato=mysql_query($query,$conn) or die("Query fallita");
        
        if(mysql_num_rows($risultato)==1){
                $oldpassword=mysql_fetch_array($risultato);

                if($_POST['oldpwd']!=$_POST['newpwd']){

	        if( $oldpassword['password']==hash('sha512', $_POST['oldpwd'])){
	                $newpassword=hash('sha512', $_POST['newpwd']);
	                $query2="UPDATE utente SET password='$newpassword' WHERE username='socio'";
	                mysql_query($query2,$conn) or die("Query test fallita");
	                
	                $mess=urlencode("siPassword cambiata correttamente");
		        header('location: '.$_SERVER['PHP_SELF'].'?msg='.$mess);
		}
	        else{
	                $mess=urlencode("noLa password inserita e' errata");
		        header('location: '.$_SERVER['PHP_SELF'].'?msg='.$mess);
	        }
	        
	        }
	        else{
                        $mess=urlencode("noLa nuova password e' uguale a quella attuale");
		        header('location: '.$_SERVER['PHP_SELF'].'?msg='.$mess);
                }
	        
        }
        else{
                $mess=urlencode("noLa password inserita e' errata");
		header('location: '.$_SERVER['PHP_SELF'].'?msg='.$mess);
        }
}
       
?>

