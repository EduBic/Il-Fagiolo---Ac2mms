<?php

function require_file(){
	require("../../php/basefunction.php");
	require("../../php/print.php");
}

function print_arHeader($user){
echo<<<END
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">

<head>
<meta content="text/html" charset="utf-8" http-equiv="Content-Type" />
<link rel="stylesheet "type="text/css" href="../../css/style.css"/>
<link rel="stylesheet" type="text/css" href="../../css/ar_style.css" />
   
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="../../js/script.js"></script>

<title>Area $user - Ac2mms</title>

<!--<script>
	window.onload=function(){
		scroll();
	}
</script>-->

</head>

<body>

	<div id="arheader">
		<h1>Area Riservata $user</h1>
	</div>
END;
}

function print_arMenu($user){
	if($user=="Admin"){
		echo<<<END
<div id='armenu'>
<ul>
   <li><a href='./areaadmin.php'>Menu</a></li>
   <li class='active has-sub'><a href='#'>Aggiungi</a>
      <ul>
         <li><a href="./addpersona.php">Persona</a></li>
	<li><a href="./addtappa.php">Tappa</a></li>
	<li><a href="./addistanza.php">Istanza Evento</a></li>
	<li><a href="./addtema.php">Tema</a></li>
	<li><a href="./addevento.php">Evento</a></li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'>Assegna</a>
      <ul>
        <li><a href="./setaderente.php">Iscrizione Aderente</a></li>
	<li><a href="./setpartecipazione.php">Partecipazione</a></li>
	<li><a href="./setappartenenza.php">Appartenenza</a></li>
	<li><a href="./settema.php">Tema</a></li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'>Cancella</a>
      <ul>
	<li><a href="./deleteistanza-page.php">Istanza Evento</a></li>
	<li><a href="./deletepartecipazione-page.php">Partecipanti Evento</a></li>
      </ul>
   </li>
</ul>
</div>

END;
                }
	elseif($user=="Socio"){
		echo<<<END

<div id='armenu'>
<ul>
   <li><a href='./areasocio.php'>Menu</a></li>
   <li class='active has-sub'><a href='#'>Statistiche</a>
      <ul>
         <li class='active has-sub'><a href='#'>Base</a>
            <ul>
               <li><a href='#'>Sub Item</a></li>
               <li><a href='#'>Sub Item</a></li>
            </ul>
         </li>
	 <li class='active has-sub'><a href='#'>Avanzate</a>
            <ul>
               <li><a href='#'>Sub Item</a></li>
               <li><a href='#'>Sub Item</a></li>
            </ul>
         </li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'>Operazioni</a>
      <ul>
        <li><a href="#">Cerca Persona</a></li>
	<li><a href="#">Programma Evento</a></li>
	<li><a href="#">Informazioni Tappa</a></li>
	<li><a href="#">Dettagli Tema</a></li>
      </ul>
   </li>
   <li><a href='#'>Query Avanzate</a></li>
</ul>
</div>
END;
		}
}	

function print_arContent($user){
	if($user=="Admin"){
	echo<<<END
	<body>
	<div id="arcontent">
			<h2>BENVENUTO NELL'AREA SOCI</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
				Quisque molestie, nisl sed vulputate mollis, tortor velit facilisis mi, laoreet iaculis erat turpis id orci. 
				Proin a semper lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
				Quisque molestie, nisl sed vulputate mollis, tortor velit facilisis mi, laoreet iaculis erat turpis id orci. 
				Proin a semper lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
				Quisque molestie, nisl sed vulputate mollis, tortor velit facilisis mi, laoreet iaculis erat turpis id orci. 
				Proin a semper lectus.</p>
				Proin a semper lectus.</p>
				Proin a semper lectus.</p>
				Proin a semper lectus.</p>
				Proin a semper lectus.</p>
				Proin a semper lectus.</p>
				Proin a semper lectus.</p>
				Proin a semper lectus.</p>
				Proin a semper lectus.</p>
				Proin a semper lectus.</p>
				Proin a semper lectus.</p>
				Proin a semper lectus.</p>
				Proin a semper lectus.</p>
				Proin a semper lectus.</p>
				Proin a semper lectus.</p>
				Proin a semper lectus.</p>
				Proin a semper lectus.</p>
	</div>
END;
	}
	elseif($user=="Socio"){
		echo<<<END
	<div id="arcontent">
		<h2>Benvenuto nell'area socio!</h2>
		<p>Tramite il menu qui a fianco avrai a disposizione diversi servizi:</p>
		<dl>
			<dt class="info">Statistiche:</dt>
			<dd class="info">Da cui potrai avere accesso agli ultimi dati aggiornati sulle più importanti 
			e rilevanti andamenti della base di dati.</dd>
			<dt class="info">Operazioni:</dt> 
			<dd class="info">In cui avrai a disposizioni molteplici possibilità di interrogazioni alla base 
			di dati per ricavare subito e in semplicità le informazioni di tuo interesse.</dd>
			<dt class="info">Query Avanzate:</dt> 
			<dd class="info">sezione con le query costruite solo ai fini didattici del progetto accompagnate 
			da descrizione testuale.<dd>
			</dl>
		<p>Buon lavoro!</p>
		
		<div id="help">
			<p>Se invece ti sembra di avver smarrito il sentiero, non preoccuparti, puoi tornare alla <a href="../../index.php">Home</a>, altrimenti puoi consultare la <a href="../../mappa.html">mappa del sito.</a></p>
		</div>
		   
	</div>
END;
	}
}

function print_arfooter(){
        echo<<<END
        <div id="footer">
		<div class="right">
			<p>Il Fagiolo - Ac<sup>2</sup>mms <sup>&reg;</sup></p>
			<img id="logofooter" src="../../img/ACMMS - logo.png" alt="logo acmms" />
		        <p>Antonino Macr&iacute; - Eduard Bicego</p>
		</div>
		<div class="left">
			<h3><a href="../../mappa.html">Mappa del sito</a></h3>
			<ul>
				<li><a href="../../index.php">Home</a></li>
				<li><a href="../../chisiamo.html">Chi Siamo</a></li>
				<li><a href="../../cosafacciamo.php">Cosa Facciamo</a></li>
				<li><a href="../../login-logout/logout.php">Logout</a></li>
			</ul>
		</div>
	</div>
	</body>
END;
}


						/*  PRINT FORM  */

/*Form Admin*/

/*Aggiungi*/
function print_form_addPersona(){
	echo<<<END
	<body onload="scroll()">
	<div id="arcontent">
	        <div id=\"path\">Ti trovi in: <a href="./areaadmin.php">Area riservata</a> &gt;&gt; Aggiungi Persona</div>
		<form id="persona" class="form" action="#" method="get">
		    <!--
	            Form che raccoglie i dati principali per eseguire una insert in 'persona'.
	            La funzione php dovra' occuparsi anche dei controlli sui dati inseriti.
			-->
			<fieldset>
				<legend>Inserisci i dati personali</legend>
				<p><label for="nome">Nome</label>
				<input class="text" type="text" name="nome"></input></p>
				<p><label for="cognome">Cognome</label>
				<input class="text" type="text" name="cognome"></input></p>
				<p><label for="sesso">Sesso</label>
				<select class="select" name="sesso">
					<option>M</option>
					<option>F</option>
				</select></p>
				<p><label>Data di nascita</label>
				<input class="data" type="text" name="gg"/>
				<input class="data" type="text" name="mm"/>
				<input class="data" type="text" name="yy"/></p>
				<p><label for="luogoN">Luogo di nascita</label>
				<input class="text" type="text" name="luogoN"></input></p>
				<p><label for="telefono">Telefono</label>
				<input class="text" type="text" name="telefono"></input></p>
				<p><label for="email">Email</label>
				<input class="text" type="text" name="email"></input></p>
				<p><label for="parrocchia">Parrocchia</label>
				<input class="text" type="text" name="parrocchia"></input></p>
				<p><input class="button" type="submit" value="Invio"/></p>
			</fieldset>

		</form>
		</div>
END;
}

function print_form_addTappa(){
	echo<<<END
	<body onload="scroll()">
	<div id="arcontent">
	<div id=\"path\">Ti trovi in: <a href="./areaadmin.php">Area riservata</a> &gt;&gt; Aggiungi Annata</div>
                <form id="tappa" action="#" method="get">
			<!--
				Inserisco semplicemente una data maggiore di CURDATE() (!) e dando l'invio una procedura creera' il percorso completo della nuova tapppa
			-->
			<fieldset>
				<legend>Inserisci la nuova annata</legend>
				<p>
				    <label>Annata</label>
				    <input class="text" type="text" name="annata"/>
				</p>
			</fieldset>
		</form>
	</div>
END;
}

function print_form_addIstanza(){
	echo<<<END
	<body onload="scroll()">
	<div id="arcontent">
	<div id=\"path\">Ti trovi in: <a href="./areaadmin.php">Area riservata</a> &gt;&gt; Aggiungi Istanza Evento</div>
		<form id="istanza" class="form" action="#" method="get">
		    <!--
	            Scelto un evento dalla lista, creata raccogliendo il nome nella tabella 'evento', la funzione crea una nuova istanza di quell'evento
	            nell'anno in corso con i dati raccolti.
	            Tra i dati c'e' anche la scelta di tema, anch'essa deriva da una lista creata raccogliendo i nomi dei temi nella tabella 'tema'.
	            La funzione dovra' provvedere a eseguire i controlli nei dati inseriti, soprattutto nella data.
			-->
			<fieldset>
				<legend>Aggiungi un evento "\$anno"</legend>
				<p><label>Data inizio: </label>
				<input class="data" type="text" name="gg"/>
				<input class="data" type="text" name="mm"/>
				<input class="data" type="text" name="yy"/>
				</p>
				<p><label>Data fine: </label>
				<input class="data" type="text" name="gg"/>
				<input class="data" type="text" name="mm"/>
				<input class="data" type="text" name="yy"/>
				</p>
				<p><label>Luogo:</label>
				<input class="text" type="text" name="luogo"/>
				</p>
				<p><label>Programma:</label>
				<textarea name="programma" class="text"></textarea>
				</p>
				<p><label>Quota  €:</label>
				<input class="text" type="text" name="quota"/>
				</p>
				<p><label>Spesa  €:</label>
				<input class="text" type="text" name="spesa"/>
				</p>
				<p><label>Tema: </label>
				<select>  <!-- for each -->
					<option>Nessuno</option>
					<option>Coraggio</option>
					<option>Alla ricerca di sé</option>
					<!-- option presi da table TEMI tramite script php -->
				</select>
				</p>
				<p><input class="button" type="submit" value="Invio"/></p>
			</fieldset>
		</form>
	</div>
END;
}

function print_form_addTema(){
	echo<<<END
	<body onload="scroll()">
	<div id="arcontent">
	<div id=\"path\">Ti trovi in: <a href="./areaadmin.php">Area riservata</a> &gt;&gt; Aggiungi Tema</div>
		<form id="tema" class="form" action="#" method="get">
		    <!--
	            Semplicemente aggiunge alla tabella 'tema' un nuovo tema.
			-->
			<fieldset>
				<legend>Inserisci nuovo tema</legend>
				<p><label>Nome: </label>
				<input class="text" type="text" name="nome"/>
				</p>
				<p><label>Descrizione: </label>
				<textarea name="descrizione" class="text"></textarea>
				</p>
				<p><input class="button" type="button" value="Invio"/></p>
			</fieldset>
		</form>
	</div>
END;
}

function print_form_addEvento(){
	echo<<<END
	<body onload="scroll()">
	<div id="arcontent">
	<div id="path">Ti trovi in: <a href="./areaadmin.php">Area riservata</a> &gt;&gt; Aggiungi Evento Annuale</div>
		<form id="evento" class="form" action="#" method="get">
		    <!--
	            Semplicemente si crea un nuovo evento a cadenza annuale tipico dell'associazione.
			-->
			<fieldset>
				<legend>Aggiungi un evento annuale</legend>
				<p><label>Nome evento: </label>
				<input class="text" type="text" name="nome"/></p>
				<p><label>Descrizione: </label>
				<textarea class="text" name="descrizione" rows="5" cols="20"></textarea></p>
				<p><label>Periodo: </label>
					<select id="periodo" name="periodo">
					<option>inverno</option>
					<option>primavera</option>
					<option>estate</option>
					<option>autunno</option>
				</select></p>
				<p>
				<input class="button" type="submit" value="Invio"/></p>
			</fieldset>
		</form>
	</div>
END;
}

function print_table_rows($row){  //stampa le prime celle della riga ma non la conclusione
        echo "<tr>";
        echo "<td>".$row['nome']."</td>";
        echo "<td>".$row['cognome']."</td>";
        echo "<td>".$row['dataNascita']."</td>";
}

/*Assegna*/
function print_form_setAderente($conn){
	echo<<<END
	<body onload="scroll()">
	<div id="arcontent">
	<div id="path">Ti trovi in: <a href="./areaadmin.php">Area riservata</a> &gt;&gt; Assegna Aderenti dell'Anno</div>
END;

        $query="select p.id,p.nome,p.cognome,p.dataNascita ";
        $query.="from persona as p ";
        $query.="where p.id not in (select ad.persona from aderente as ad where ad.anno=year(curdate()))";

        echo "<p class=\"query\">".$query."</p>";

        $risultato=mysql_query($query,$conn) or die( "Ops".mysql_error());

        $row_num=mysql_num_rows($risultato);
        if(!$row_num){
                echo "<h2>Nessun persona non aderente trovata</h2>";
                }
        else{
					 echo<<<END
				<form id="aderente" action=".././private_php/getaderente.php" method="get">
	        <!--
	            Si raccolgono tutte le persone salvate nel database.
	            Si costruisce cosi' una tabella a video che rende disponibile la funzione di impostare il ruolo della persona e iscriverla in aderente.
	            L'azione e' consideranta nell'anno in corso.
			-->
				<fieldset>
				<legend>Accetta le iscrizioni</legend>
				
				<table>
					<thead>
						<th>Nome</td>
						<th>Cognome</td>
						<th>Data Nascita</th>
						<th>Ruolo</td>
						<th>Iscrivi</td>
					</thead>
					<tbody>
END;

        while($row=mysql_fetch_array($risultato)){
                print_table_rows($row);
                echo<<<END
                <td>
	                <select class="selecttable" name="ruolo[]">
	                        <option value="AN">Animato</option>
				            <option value="AR">Animatore</option>
				            <option value="GE">Genitore</option>
			        </select>
		</td>
END;
        echo "<td>
                    <select class=\"selecttable\" name=\"iscrivi[]\">
	                        <option value=\"NO\">NO</option>
				            <option value=\"" .$row['id']. "\">SI</option>
			        </select>
			  </td>";
		/*echo "<td><p class=\"radio\"><input class=\"radio\" type=\"radio\" name=\"iscrivi[]\" value=\"no\" checked=\"checked\"/><label class=\"lab\">No</label></p>";
		echo "<p class=\"radio\"><input class=\"radio\" type=\"radio\" name=\"iscrivi[]\" value=\"" .$row['id']. "\"/><label class=\"lab\">Si</label></p></td>";*/
                echo "</tr>"; //chiudo la row iniziata da print_table_rows
                }
                
        echo "</tbody></table>";
        echo "<p class=\"buttons\"><input class=\"button\" type=\"reset\" value=\"Reset\"/>";
        echo "<input class=\"button\" type=\"submit\" name=\"Invio\" value=\"Invio\"/></p></fieldset></form>";
        }
    echo "<p id=\"top-page-link\"><a href=\"#arcontent\">Torna su</a></p></div>";
}

function print_form_setPartecipazione($conn,$event){  //GRAFICA HTML
		echo "<body onload=\"scroll()\">
	<div id=\"arcontent\">
		<div id=\"path\">Ti trovi in: <a href=\"./areaadmin.php\">Area riservata</a> &gt;&gt; Assegna partecipanti</div>
	<!-- -->";
	
	echo "<h1>Evento selezionato:</h1>";
	echo "<table>
				<thead>
					<th>Evento</th>
					<th>Data Inizio</th>
					<th>Data Fine</th>
					<th>N Partecipanti</th>
				</thead>
				<tbody>
					<tr class=\"select-row\">
						<td>".$event['evento']."</td>
						<td>".$event['dataInizio']."</td>
						<td>".$event['dataFine']."</td>
						<td>".$event['nPartecipanti']."</td>
					</tr>
				</tbody>
			</table>";
	
	$query="SELECT id,nome,cognome,dataNascita FROM persona JOIN aderente ON Id=Persona WHERE anno=YEAR(CURDATE())";
	echo "<p class=\"query\">".$query." *# QUERY INCOMPLETA #* </p>";
	$risultato=mysql_query($query,$conn) or die( "Ops".mysql_error());

   $row_num=mysql_num_rows($risultato);
   if(!$row_num){
       echo "<h2>Nessun persona da aggiungere trovata</h2>";
   }
   else{
		echo "<form id=\"setpartecipazione\" action=\"../private_php/getpartecipazione.php\" method=\"get\">";
		echo<<<END
	        <!--
	            Si raccolgono tutte le persone salvate nel database.
	            Si costruisce cosi' una tabella a video che rende disponibile la funzione di far partecipare una persona
					all'istanza evento selezionata precedemente. N.B. tutto è considerato nell'anno in corso.
			-->
				<fieldset>
				<legend>Seleziona i nuovi partecipanti</legend>
				
				<table>
					<thead>
						<th>Nome</td>
						<th>Cognome</td>
						<th>Data Nascita</th>
						<th>Aggiungi Partecipante</td>
					</thead>
					<tbody>
END;

        while($row=mysql_fetch_array($risultato)){
            print_table_rows($row);
		  		echo "<td><input type=\"checkbox\" name=\"aggiungi[]\" value=\"".$row['id']."\"></td></tr>";
            echo "</tr>"; //chiudo la row iniziata da print_table_row
		  }
                
        echo "</tbody></table>";
		 	echo "<input type=\"hidden\" name=\"evento\" value=\"".$event['evento']."\">";
			echo "<input type=\"hidden\" name=\"dataInizio\" value=\"".$event['dataInizio']."\">";
        echo "<p class=\"buttons\"><input class=\"button\" type=\"reset\" value=\"Reset\"/>";
        echo "<input class=\"button\" type=\"submit\" name=\"Invio\" value=\"Invio\"/></p></fieldset></form>";
        }
    echo "<p id=\"top-page-link\"><a href=\"#arcontent\">Torna su</a></p></div>";
}

/*function print_form_setPartecipazione($conn){
	echo<<<END
	<div id="arcontent">
	    <div id="path">Ti trovi in: <a href="./areaadmin.php">Area riservata</a> &gt;&gt; Assegna Partecipanti agli Eventi dell'Anno</div>
	        <form id="partecipazione" action="#" method="get">
	        <!--
	                
		    -->
			<fieldset>
				<legend>Aggiungi partecipanti eventi"\$anno"</legend>
				<p><label>Seleziona evento:</label>
				<select>
					<option>Campeggio</option>	
					<option>Torneo Fagiolo</option>
					<!-- option presi da table ISTANZA EVENTO tramite script php-->
				</select>
				</p>
				<table>
					<thead>
						<th>Nome</th>
						<th>Cognome</th>
						<th>Data Nascita</th>
						<th>Partecipazione</th>
					</thead>
END;
        $query=" ";

        echo "<p class=\"query\">".$query."</p>";

        $risultato=mysql_query($query,$conn) or die( "Ops".mysql_error());

        $row_num=mysql_num_rows($risultato);
        if(!$row_num){
                echo "<h2>Nessun risultato trovato</h2>";
                }
        else{
                echo "<tbody>";
                while($row=mysql_fetch_array($risultato)){
                    print_table_rows($row); //costruisco inizio row
				    echo "<td><input class=\"checkbox\" type=\"checkbox\" name=\"partecipa\" value=\"" .$row['id']. "\"/></td>";
                    echo "</tr>"; //chiudo row
		            }
	            }

					
					
					<td>
						<input type="checkbox" name="partecipa" value="si"/>
					</td>	
}*/

function print_form_setAppartenenza($conn){
	echo<<<END
	<body onload="scroll()">
	<div id="arcontent">
	<div id="path">Ti trovi in: <a href="./areaadmin.php">Area riservata</a> &gt;&gt; Assegna Appartenenza</div>
END;
	
	$query="SELECT p.id, p.nome, p.cognome, p.dataNascita
			FROM persona AS p JOIN aderente AS a ON p.id=a.persona
			WHERE a.ruolo='AR' OR a.ruolo='AN';";
	
	echo "<p class=\"query\">".$query."</p>";
	
	$risultato=mysql_query($query,$conn) or die( "Ops".mysql_error());
	
	$row_num=mysql_num_rows($risultato);
        if(!$row_num){
                echo "<h2>Nessun aderente animatore o animato trovato</h2>";
                }
        else{
			  		 echo "
	<form id=\"appartenenza\" action=\"./private_php/getappartenenza.php\" method=\"get\">
			<!--
				Prelevo le info Nome Cognome DataNascita da Persona riferita agli aderenti con ruolo='AR' or 'AN' dell'anno in corso(es. 2015),
				Ho la possibilità di assegnare ad essi una tappa tramite NumRiferimento con annoInizio dell'anno in corso(es. 2015).
				Quindi si avrà: 	anno \$anno=2015
										Nome | Cognome | Data di Nascita | N° tappa 
										Mario | Rossi  | 1980-01-01      | select (1,2,3,4,5) 
			-->
			<fieldset>
			<legend>Assegna la tappa - ".date('Y')."</legend>
			<table>
				<thead>
					<th>Nome</th>
					<th>Cognome</th>
					<th>Data Nascita</th>
					<th>N° Tappa</th>
					<th />
				</thead>";
			  
				 while($row=mysql_fetch_array($risultato)){
                print_table_rows($row);
					 
					 echo "<td>
						<select name=\"".$row['id']."\">   <!-- Id dell'utente -->
							<option value=\"1\">1</option>
							<option value=\"2\">2</option>
							<option value=\"3\">3</option>
							<option value=\"4\">4</option>
							<option value=\"5\">5</option>
						</select>
						</td>";
						
					 //echo "<td><input type=\"submit\" name=\"Modifica\" value=\"".$row['id']."\"/></td></tr>";  //check box con id
					 echo "<td><input type=\"checkbox\" name=\"modifica[]\" value=\"".$row['id']."\"></td></tr>";
					 }  
		  echo "</tbody></table>";
        echo "<p class=\"buttons\"><input class=\"button\" type=\"reset\" value=\"Reset\"/>";
        echo "<input class=\"button\" type=\"submit\" name=\"Invio\" value=\"Invio\"/></p></fieldset></form>";
        }
    echo "<p id=\"top-page-link\"><a href=\"#arcontent\">Torna su</a></p></div>";
}

function print_form_setTema($conn,$event){
	echo<<<END
	<body onload="scroll()">
	<div id="arcontent">
	<div id="path">Ti trovi in: <a href="./areaadmin.php">Area riservata</a> &gt;&gt; Assegna Tema</div>
	<!-- 		Prelevo i nomi e le dateInizio degli eventi in istanzaevento che hanno il campo tema='null'(es. Kart Endurance 2015-04-25)
				Prelevo tutti i temi disponibili in tema e creo per ogni row la lista di temi
				Infine costruisco il relativo pulsante univoco per ogni riga (!)
				In questo modo all'utente è data la lista di istanze e a fianco la possibilità di assegnare un tema tra quelli
				disponibili.
				-->
END;
	
	echo "<h1>Evento selezionato:</h1>";
	echo "<table>
				<thead>
					<th>Evento</th>
					<th>Data Inizio</th>
					<th>Data Fine</th>
					<th>N Partecipanti</th>
				</thead>
				<tbody>
					<tr class=\"select-row\">
						<td>".$event['evento']."</td>
						<td>".$event['dataInizio']."</td>
						<td>".$event['dataFine']."</td>
						<td>".$event['nPartecipanti']."</td>
					</tr>
				</tbody>
			</table>";
	
	echo "<form id=\"settema\" action=\"../private_php/gettema.php\" method=\"get\"><fieldset>";
	echo "<legend>Seleziona il tema da assegnare</legend>";
	
	$query="SELECT nome FROM tema";
	echo "<p class=\"query\">".$query."</p>";
	$risultato=mysql_query($query,$conn) or die( "Ops".mysql_error());
	
	echo "<select name=\"tema\">";
	while($temi=mysql_fetch_array($risultato)){
		echo "<option value=\"".$temi['nome']."\">".$temi['nome']."</option>";
	}
	echo "</select>";
	
	echo "<input type=\"hidden\" name=\"evento\" value=\"".$event['evento']."\"/>
			<input type=\"hidden\" name=\"dataInizio\" value=\"".$event['dataInizio']."\"/>
			<input type=\"hidden\" name=\"dataFine\" value=\"".$event['dataFine']."\"/>
			<input type=\"hidden\" name=\"nPartecipanti\" value=\"".$event['nPartecipanti']."\"/>";
	echo "<input class=\"button\" type=\"submit\" name=\"Modifica\" value=\"Modifica\"/></fieldset></form>";
	
	echo "</div>";
}


/*Cancella*/
function print_form_deleteIstanza($conn){
	
	echo "<body onload=\"scroll()\"><div id=\"arcontent\">
		<div id=\"path\">Ti trovi in: <a href=\"./areaadmin.php\">Area riservata</a> &gt;&gt; cancella istanza evento ".date('Y')."</div>";
	
	$query="SELECT * FROM istanzaevento WHERE dataInizio>CURDATE()";
	echo "<p class=\"query\">".$query." *#DA SISTEMARE LA CURDATE#*</p>";
	
	$risultato=mysql_query($query,$conn) or die( "Ops".mysql_error());
	
	$row_num=mysql_num_rows($risultato);
        if(!$row_num){
                echo "<h2>Nessun evento programmato quest'anno</h2>";
                }
        else{
	
	echo "<form id=\"deleteistanza\" action=\"../private_php/deleteistanza.php\" method=\"get\">
	        <!--
	           form dove vengno mostrati tutti le istanze d'evento dell'anno in corso da cui è possibile eliminarle
		    -->
			<fieldset>
			<legend>Elimina eventi ".date('Y')."</legend>
				<table>
					<thead>
						<th>Evento</th>
						<th>Data Inizio</th>
						<th>Data Fine</th>
						<th>Luogo</th>
						<th>Tema</th>
						<th>Elimina</th>
					</thead>";
					
				while($row=mysql_fetch_array($risultato)){
               echo "<tr>";
					echo "<td>".$row['evento']."</td>";
        			echo "<td>".$row['dataInizio']."</td>";
					echo "<td>".$row['dataFine']."</td>";
        			echo "<td>".$row['luogo']."</td>";
					echo "<td>".$row['tema']."</td>";
			  		echo "<td><input type=\"checkbox\" name=\"elimina[]\" value=\"".$row['evento']."\"></td>";
					echo "</tr>";
				}  
		  echo "</tbody></table>";
        echo "<p class=\"buttons\"><input class=\"button\" type=\"reset\" value=\"Reset\"/>";
        echo "<input class=\"button\" type=\"submit\" name=\"Invio\" value=\"Invio\"/></p></fieldset></form>";
		  }
	echo "<p id=\"top-page-link\"><a href=\"#arcontent\">Torna su</a></p></div>";
}

function print_form_deletePartecipazione($conn, $event){
	echo "<body onload=\"scroll()\">
	<div id=\"arcontent\">
		<div id=\"path\">Ti trovi in: <a href=\"./areaadmin.php\">Area riservata</a> &gt;&gt; Cancella partecipazione</div>
	<!-- Mostra l'evento selezionato precedentemente e mostra i temi da assegnarli -->";
	
	echo "<h1>Evento selezionato:</h1>";
	echo "<table>
				<thead>
					<th>Evento</th>
					<th>Data Inizio</th>
					<th>Data Fine</th>
					<th>N Partecipanti</th>
				</thead>
				<tbody>
					<tr class=\"select-row\">
						<td>".$event['evento']."</td>
						<td>".$event['dataInizio']."</td>
						<td>".$event['dataFine']."</td>
						<td>".$event['nPartecipanti']."</td>
					</tr>
				</tbody>
			</table>";
	
	echo "<form id=\"deletepartecipazione\" action=\"../private_php/deletepartecipazione.php\" method=\"get\"><fieldset>";
	echo "<legend>Seleziona il tema da assegnare</legend>";
	
	//parte di settema.php non c'entra nulla qui!!!
	
	$query="SELECT nome FROM tema";
	echo "<p class=\"query\">".$query."</p>";
	$risultato=mysql_query($query,$conn) or die( "Ops".mysql_error());
	
	echo "<select name=\"tema\">";
	while($temi=mysql_fetch_array($risultato)){
		echo "<option value=\"".$temi['nome']."\">".$temi['nome']."</option>";
	}
	echo "</select>";
	
	echo "<input type=\"hidden\" name=\"evento\" value=\"".$event['evento']."\"/>
			<input type=\"hidden\" name=\"dataInizio\" value=\"".$event['dataInizio']."\"/>
			<input type=\"hidden\" name=\"dataFine\" value=\"".$event['dataFine']."\"/>
			<input type=\"hidden\" name=\"nPartecipanti\" value=\"".$event['nPartecipanti']."\"/>";
	
	echo "<input class=\"button\" type=\"submit\" name=\"Modifica\" value=\"Modifica\"/></fieldset></form>";
	
	//fine parte sbagliata;
	
	echo "</div>";
}

function print_form_selectIstanza($conn,$action,$path){
	echo "<body onload=\"scroll()\">
	<div id=\"arcontent\">
		<div id=\"path\">Ti trovi in: <a href=\"./areaadmin.php\">Area riservata</a> &gt;&gt; ".$path."</div>";
	
	$query="SELECT *
			 FROM istanzaevento
			 WHERE YEAR(dataInizio)=YEAR(CURDATE())";
	
	echo "<p class=\"query\">".$query."</p>";
	
	$risultato=mysql_query($query,$conn) or die( "Ops".mysql_error());
	
	$row_num=mysql_num_rows($risultato);
        if(!$row_num){
                echo "<h2>Nessun evento di quest'anno trovato</h2>";
                }
        else{
			  		 echo "<fieldset><legend>Seleziona l'evento da modificare</legend>
			<!--
				Prelevo i nomi e le dateInizio degli eventi in istanzaevento che hanno il campo tema='null'(es. Kart Endurance 2015-04-25)
				Infine costruisco il relativo pulsante univoco per ogni riga per selezionare l'e vento interessato.
			-->
				<table>
					<thead>
						<th>Evento</th>
						<th>Data Inizio</th>
						<th>Data Fine</th>
						<th>N Partecipanti</th>
						<th>Tema</th>
						<th>Modifica</th>
					</thead>
					<tbody>";
			  
				 while($row=mysql_fetch_array($risultato)){	
                echo "<tr>";
					 	echo "<td>".$row['evento']."</td>";
        				echo "<td>".$row['dataInizio']."</td>";
					 	echo "<td>".$row['dataFine']."</td>";
					 	echo "<td>".$row['nPartecipanti']."</td>";
					 	echo "<td>".$row['tema']."</td>";
						echo "<td>";
					 	echo "<form id=\"selectistanza\" action=\"./".$action."\" method=\"get\">
								<input type=\"hidden\" name=\"evento\" value=\"".$row['evento']."\"/>
								<input type=\"hidden\" name=\"dataInizio\" value=\"".$row['dataInizio']."\"/>
								<input type=\"hidden\" name=\"dataFine\" value=\"".$row['dataFine']."\"/>
								<input type=\"hidden\" name=\"nPartecipanti\" value=\"".$row['nPartecipanti']."\"/>
								<input type=\"hidden\" name=\"tema\" value=\"".$row['tema']."\"/>
								<input class=\"set_button\" type=\"submit\" name=\"Seleziona\" value=\"Seleziona\"/></form>";
						echo "</td>";
					 echo "</tr>";
				 }	
			echo "</tbody></table></fieldset>";
		  }
	echo "<p id=\"top-page-link\"><a href=\"#arcontent\">Torna su</a></p></div>";
}


/*Form Socio*/

function print_formSocio(){
	echo<<<END
	<body onload="scroll()">
	<div id="arcontent">
	</div>
END;
}

?>
