<?php

/* LIST HTML */

function print_deflist($rows){
	$row_num=mysql_num_rows($rows);
	
	if(!$row_num){
		echo "<h2>Nessun animatore trovato</h2>";
	}
	else{
		echo "<h2>Ecco gli animatori che cerchi:</h2>";
		echo "<dl>";
	while($row=mysql_fetch_array($rows)){
	        $animatore=$row["persona"];
	        $nome=$row["nome"];
	        $cognome=$row["cognome"];
	        $dataNascita=$row["dataNascita"];
	        $parrocchia=$row["parrocchia"];
	        
	        $telefono=$row["telefono"];
	        $email=$row["email"];
	        
		echo<<<END
		<dt class="name"> $nome $cognome</dt>
			<dd>
			<div class="def">
				<div class="picture">
					<img src="img/animatori/$animatore.jpg" alt="Fotografia di $nome"/>
				</div>
				<div class="definition">
					<p>LOREM IPSUM...</p>
					<p>Contatto: tel. $telefono - email $email</p>
				</div>
			</div>
			</dd>
END;
	}
	
	echo "</dl>";
	}
}


function print_eventlist($rows){
	$row_num=mysql_num_rows($rows);
	
	if(!$row_num){
		echo "<h2>Nessun evento ancora esistente</h2>";
	}
	else{
		echo "<dl>";
	while($row=mysql_fetch_array($rows)){
		$nome=$row['nome'];
		$descrizione=$row['descrizione'];
		$periodo=$row['stagione'];
		
		echo<<<END
				<dt class="name">$nome</dt>
				<dd>
				<div class="big-picture">
					<img src="img/events/$nome.jpg" alt="Fotografia di $nome">
				</div>
				<div class="event-definition">
					<p>$descrizione</p>
					<p>Periodo: $periodo</p>
				</div>
				</dd>
END;
	}
		echo "</dl>";
	}
}


/* HEADER HTML */

function print_head($title, $body ="no"){
echo<<<END
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

	<head>
	<meta content="text/html charset=utf-8" http-equiv="Content-Type" />
	<link rel="stylesheet "type="text/css" href="css/style.css"></link>
	<!--LINK SLIDER -->
END;
	
	echo "<link rel=\"stylesheet\" href=\"css/flexslider.css\" type=\"text/css\" media=\"screen\" />";
	if($body=='si')
		echo "<script src=\"./js/script.js\"></script>";
	
	echo "<title>$title</title></head>";
	if($body=="si")
		echo "<body onload=\"scrollCont()\">";
}

function print_header(){
        echo<<<END
        <body>
        <div id="header">
		<span id="logo">
			<img src="img/ACMMS - logo.png" alt="L'acmms" />
		</span>

		<h1 id="site-title">Il Fagiolo</h1>
		<h2>Tutta Ac<sup>2</sup>mms genuina</h2>
	</div>
END;
}

/*PRINT MENU CON LA SESSIONE E Logout*/
function print_menu(){
echo<<<END
		<div id="container">
		<div id="menu">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="chisiamo.php">Chi Siamo</a></li>
				<li><a href="cosafacciamo.php">Cosa Facciamo</a></li>
END;
				session_start();
				if(!isset($_SESSION['username']))
					echo "<li><a href='login.php'>Login</a></li>";
				else
					echo "<li><a href='php
					/logout.php'>Logout</a></li>";
echo<<<END
			</ul>
		</div>
END;
}

function print_path($path){
        echo<<<END
        
        <div id="path">
			Ti trovi in: $path
	</div>
END;
}


/* SLIDER */

function print_slider(){
echo<<<END
<div id="slide">
		<div class="flexslider">
  			<ul class="slides">
    			<li>
      				<img src="img/All-of-us.JPG">
    			</li>
    			<li>
      				<img src="img/All-of-us2.jpg">
    			</li>
    			<li>
      				<img src="img/All-of-us3.jpg">
    			</li>
  			</ul>
		</div>
</div>
END;
}


/* CONTAINER HTML */

function print_sidecontent($eventi){

echo "<div id=\"side-content\" class=\"content\">
	<h2 class=\"right\">Prossimo evento</h2>";
$n=mysql_num_rows($eventi);
if($n<=1)
	{
		echo "<p>Nessun evento trovato</p>";
		echo "<h2 class=\"right\">Ultimo evento</h2>";
		if(!$n) { echo "<p>Nessun evento trovato</p>"; }
		else
				{
				 $eventiTrovati=mysql_fetch_array($eventi);
				 echo "<p class=\"event\"><span class=\"titleevent\">".$eventiTrovati['evento']."</span></p>";
               	 echo "<p class=\"event\">".$eventiTrovati['dataInizio']."</p>";
				}			
	}
else {
        for($i=0; $i<2; $i++){
              $eventiTrovati=mysql_fetch_array($eventi);
              if($i==1)
			  		{
                    echo "<h2 class=\"right\">Ultimo evento</h2>";
                    }
                echo "<p class=\"event\"><span class=\"titleevent\">".$eventiTrovati['evento']."</span></p>";
                echo "<p class=\"event\">".$eventiTrovati['dataInizio']."</p>";
                //echo "<p> Luogo: ".$eventiTrovati['luogo']."</p>";
                }
        }
echo "</div>";
}

/* PRINT EVENTI CON BUG: non stampa se il prossimo evento non c'è.
function print_sidecontent($eventi){

echo "<div id=\"side-content\" class=\"content\">
	<h2 class=\"right\">Prossimo evento</h2>";

if(!mysql_num_rows($eventi)){
                echo "<p>Nessun evento trovato</p>";
		echo "<h2 class=\"right\">Ultimo evento</h2>";
		echo "<p>Nessun evento trovato</p>";
	}
        else{               
                for($i=0; $i<2; $i++){
                        $eventiTrovati=mysql_fetch_array($eventi);
                        if($i==1){
                                echo "<h2 class=\"right\">Ultimo evento</h2>";
                        }
                echo "<p class=\"event\"><span class=\"titleevent\">".$eventiTrovati['evento']."</span></p>";
                echo "<p class=\"event\">".$eventiTrovati['dataInizio']."</p>";
                //echo "<p> Luogo: ".$eventiTrovati['luogo']."</p>";
                }
        }

echo "</div>";
}
*/

function print_maincontent(){
        echo<<<END
        
        <div id="main-content" class="content">
				<h2>Welcome!</h2>
				<p>L'Associazione Cattolica Campeggio Meledo Monticello di Fara Sarego è un'associazione no-profit che opera nel campo dell'educazione giovanile di Azione Cattolica.

L'Associazione nasce nel 1991 per volontà di don Franco Primon, allora parroco di Monticello di Fara, e di Pierluigi Volpiana. Da allora l'Associazione è cresciuta e si è evoluta, mantenendo però i punti cardine dell'educazione alla vita cristiana ed all'essenzialità tramite i campeggi estivi in tenda e le attività di gruppo settimanali che si svolgono durante l'anno.</p>
			</div>
		
	</div>	
END;
}

function print_maincontent2($typelist,$rows){
echo<<<END
<div id="main-content2" class="content">
END;
			if($typelist=='def')
				print_deflist($rows);
			elseif($typelist=='event')
				print_eventlist($rows);
echo<<<END
                        <p id="top-page-link"><a href="#container">Torna su</a></p>
		</div>
	</div> 
END;
}

function print_form(){
echo<<<END
<div id="form">
			<h1>Visualizza gli animatori della tappa specificata</h1>
			<form id="tappa" method="get">
				<fieldset>
					<legend>Scegli la tappa</legend>
					<p>
						<label for="numtappa">Numero tappa</label>
						<select name="select">
							<option value="1">Prima</option>
							<option value="2">Seconda</option>
							<option value="3">Terza</option>
							<option value="4">Quarta</option>
							<option value="5">Quinta</option>
						</select>
					</p>
					<p>
						<input class="button" type="submit" value="invio"/>
					</p>
				</fieldset>
			</form>
		</div>
END;
}


/* FOOTER HTML */

function print_footer($body ="no"){
        echo<<<END
		  		 </div>
        <div id="footer">
		<div class="right">
		        <p>Il Fagiolo - Ac<sup>2</sup>mms <sup>&reg;</sup></p>
		        <img id="logofooter" src="./img/ACMMS - logo.png" alt="logo acmms" />
		        <p>Antonino Macr&iacute; - Eduard Bicego</p>
		</div>
		<div class="left">
			<h3><a href="mappa.html">Mappa del sito</a></h3>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="chisiamo.html">Chi Siamo</a></li>
				<li><a href="cosafacciamo.php">Cosa Facciamo</a></li>
				<li><a href="login.php">Login</a></li>
			</ul>
		</div>
	</div>
END;
	if($body=="si")
		echo "</body>";
}


/* SCRIPT */

function print_jquery(){
echo<<<END
<!-- jQuery -->
  		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

  		<script type=\"text/javascript\">window.jQuery || document.write('<script src=\"js/libs/jquery-1.7.min.js\">\x3C\/script>')</script>


  	<!-- FlexSlider -->
  		<script type="text/javascript" defer="defer" src="js/jquery.flexslider.js"></script>
  
  		<script type="text/javascript">
    
    		$(window).load(function(){
     			 $('.flexslider').flexslider({
       			 animation: "fade"
      			});
     		});
  		</script>
END;
}


/* CLOSE HTML TAG */

function print_close(){
        echo "</body></html>";
}
	
?>
