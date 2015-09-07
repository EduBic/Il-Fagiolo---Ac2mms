<?php

require("./php/basefunction.php");
require("./php/print.php");

$conn=connection_db();
print_head("log in - Ac2mms");
print_header();
print_menu(); //session_start();
print_path("<a href=\"index.php\">Home</a> &gt;&gt; Log in");
session_control_login();
?>
<div id="form">
				<h1>Accedi all'area riservata</h1>
				<h2>Inserisci login e password (Servizio offerto ai soli soci)</h2>
<?php		
	if(isset($_SESSION['redirect'])) //se $_SESSION['redirect'] non � settatta allora non si � stati ridiretti in login
		{
		if($_SESSION['redirect']=='true')  //$_SESSION['redirect']==true si � sbagliato la user/password
			{
			$messaggio="utente e/o password errati";
			echo "<p id='error-immission'>".$messaggio."</p>";
			}
		else //$_SESSION['redirect']==false si � cercato di entrare in una pagina riservata seza avere effettuato la login
			{
			$messaggio="devi effettuare l'accesso per andare nell'area riservata";
			echo "<p id='error-immission'>".$messaggio."</p>";
			}
		unset($_SESSION['redirect']);
		}
	else{
		if(isset($_SESSION['error'])){
			echo "<p id=\"error-immission\">Login o password errate</p>";
			session_destroy();	
		}
		//else		
			//echo "<p id=\"query\">Inserisci login e password</p>";  
	}
?>
	<fieldset>
	
				<legend>Effettua il login</legend>
                <form id="login" method="post" action="php/accetta.php">
					<p>
						<label for="username">Username</label>
						<input class="text" id="username" type="text" value="" name="username" required/>
					</p>
					<p>
						<label for="password">Password</label>
						<input class="text" id="password" type="password" value="" name="password" required/>
					</p>
					<p>
						<input class="button" type="submit" value="Login" name="Login"/>
					</p>
               </form>
		</fieldset>
        		
		</div>
	</div>
          
<?php
print_footer();
print_close();

?>
