<?php

function require_file(){
	require("../../php/basefunction.php");
	require("../../php/print.php");
}

function format_data($anno,$mese,$giorno){
	return $anno."-".$mese."-".$giorno;
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
		<li><a href="./setassicurazione.php">Assicurazione</a></li>
	<li><a href="./settema.php">Tema</a></li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'>Cancella</a>
      <ul>
	<li><a href="./deleteistanza-page.php">Istanza Evento</a></li>
	<li><a href="./deletepartecipazione-page.php">Partecipanti Evento</a></li>
	<li><a href="./deleteassicurazione.php">Assicurazione</a></li>
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
         <li><a href='./stat-aderenti.php'>Aderenti</a></li>
	 		<li><a href='./stat-eventi.php'>Eventi</a></li>
      </ul>
   </li>
   <li class='active has-sub'><a href='#'>Operazioni</a>
   	<ul>
   		<li><a href="./cercapersona-page1.php">Cerca Persona</a></li>
			<li><a href="./progevento-page1.php">Programma Evento</a></li>
			<li><a href="./infotappa-page1.php">Informazioni Tappa</a></li>
			<li><a href="./dettaglitema-page1.php">Dettagli Tema</a></li>
   	</ul>
   </li>
   <li><a href='./queryavanzate.php'>Query Avanzate</a></li>
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
			<h2>AREA ADMIN</h2>
			<p></p>
	</div>
END;
	}
	elseif($user=="Socio"){
		echo<<<END
	<div id="arcontent">
		<h1>Benvenuto nell'area socio!</h1>
		<p>Tramite il menu qui a fianco avrai a disposizione diversi servizi:</p>
		<dl>
			<dt class="info">Statistiche:</dt>
			<dd class="info">Da cui potrai avere accesso agli ultimi dati aggiornati sulle più importanti 
			e rilevanti andamenti della base di dati.</dd>
			<dt class="info">Operazioni:</dt> 
			<dd class="info">In cui avrai a disposizioni molteplici possibilità di interrogazioni alla base 
			di dati per ricavare subito e in semplicità le informazioni di tuo interesse.</dd>
			<dt class="info">Query Avanzate:</dt> 
			<dd class="info">Sezione con le query costruite solo ai fini didattici del progetto accompagnate 
			da descrizione testuale.<dd>
			</dl>
		<h2>Buon lavoro!</h2>
		
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
				<li><a href="../../php/logout.php">Logout</a></li>
			</ul>
		</div>
	</div>
	</body>
END;
}


						/*  PRINT FORM  */

/*AREA ADMIN*/

/*Aggiungi*/
function print_form_addPersona($info,$successo){
	echo<<<END
	<body onload="scroll()">
	<div id="arcontent">
	        <div id="arpath">Ti trovi in: <a href="./areaadmin.php">Area riservata</a> &gt;&gt; Aggiungi Persona</div>
		<h2>Aggiungi nuova persona</h2>
END;
	
	if($successo)
		echo "<h3><span class='".$successo."'>".$info."</span></h3>";
	
	echo<<<END
		<form id="persona" class="form" action="./addpersona.php" method="get">
		    <!--
	            Form che raccoglie i dati principali per eseguire una insert in 'persona'.
	            La funzione php dovra' occuparsi anche dei controlli sui dati inseriti.
			-->
			<fieldset>
				<legend>Inserisci i dati personali</legend>
				<p><label for="nome">Nome*</label>
				<input class="text" type="text" name="nome"></input></p>
				<p><label for="cognome">Cognome*</label>
				<input class="text" type="text" name="cognome"></input></p>
				<p><label for="sesso">Sesso*</label>
				<select class="select" name="sesso">
					<option>M</option>
					<option>F</option>
				</select></p>
				<p>
					<label>Data di nascita*</label>
					Giorno:
					<input class="data" type="text" name="gg"/>
					Mese:
					<input class="data" type="text" name="mm"/>
					Anno:
					<input class="data" type="text" name="yy"/>
				</p>	
				<p><label for="luogoN">Luogo di nascita*</label>
				<input class="text" type="text" name="luogoN"></input></p>
				
				<p><label for="telefono">Telefono</label>
				<input class="text" type="text" name="telefono"></input></p>
				
				<p><label for="email">Email</label>
				<input class="text" type="text" name="email"></input></p>
				
				<p><label for="parrocchia">Parrocchia</label>
				<input class="text" type="text" name="parrocchia"></input></p>
				
				<p>Nota: i campi contrassegnati da * sono obbligatori<input class="button" type="submit" name="Inserisci" value="Inserisci"/></p>
			</fieldset>
		</form>
		</div>
END;
}

function print_form_addTappa($info,$successo){
	echo<<<END
	<body onload="scroll()">
	<div id="arcontent">
	<div id="arpath">Ti trovi in: <a href="./areaadmin.php">Area riservata</a> &gt;&gt; Aggiungi Annata</div>
                <form id="tappa" action="#" method="get">
			<!--
				Inserisco semplicemente una data maggiore di CURDATE() (!) e dando l'invio una procedura creera' il percorso completo della nuova tapppa
			-->
			<h2>Aggiungi nuova data</h2>
END;
	
	if($successo)
		echo "<h3><span class='".$successo."'>".$info." </span></h3>";
	
	echo"		
			<fieldset>
				<legend>Inserisci la nuova annata</legend>
				<p>
				    <label>Annata*</label>
				    <input class=\"text\" type=\"text\" name=\"annata\" minlength=\"4\" maxlength=\"4\"/>
				</p>
				<p>Nota: i campi contrassegnati da * sono obbligatori
					 <input class=\"button\" type=\"submit\" name=\"Inserisci\" value=\"Inserisci\"/>
				</p>
			</fieldset>
		</form>
	</div>";
}

function print_form_addIstanza($conn,$info,$successo){
	echo<<<END
	<body onload="scroll()">
	<div id="arcontent">
	<div id="arpath">Ti trovi in: <a href="./areaadmin.php">Area riservata</a> &gt;&gt; Aggiungi Istanza Evento</div>
		<h2>Aggiungi una nuova istanza evento</h2>
END;
	
	if($successo)
		echo "<h3><span class='".$successo."'>".$info."</span></h3>";
	
	echo<<<END
		<form id="istanza" class="form" action="#" method="get">
		    <!--
	            Scelto un evento dalla lista, creata raccogliendo il nome nella tabella 'evento', la funzione crea una nuova istanza di quell'evento
	            nell'anno in corso con i dati raccolti.
	            Tra i dati c'e' anche la scelta di tema, anch'essa deriva da una lista creata raccogliendo i nomi dei temi nella tabella 'tema'.
	            La funzione dovra' provvedere a eseguire i controlli nei dati inseriti, soprattutto nella data.
			-->
			<fieldset>
END;
		echo	"<legend>Aggiungi un evento ".DATE('Y')."</legend>";
						
			$query=" SELECT nome FROM evento";
        	echo "<p class=\"query\">".$query."</p>";

        	$risultato=mysql_query($query,$conn) or die( "Ops".mysql_error());

			echo	"<p><label>Evento* </label><select name='evento' class='tema'>";
			while($row=mysql_fetch_array($risultato)){
				echo "<option>".$row['nome']."</option>";
			}
			echo "</select></p>";

echo<<<END
				<p><label>Data inizio* </label>
					Giorno:
					<input class="data" type="text" name="ggi"/>
					Mese:
					<input class="data" type="text" name="mmi"/>
					Anno:
					<input class="data" type="text" name="yyi" value="2015" readonly="readonly"  minlegth="4" maxlength="4"/>
				</p>
				<p><label>Data fine* </label>
					Giorno:
					<input class="data" type="text" name="ggf"/>
					Mese:
					<input class="data" type="text" name="mmf"/>
					Anno:
					<input class="data" type="text" name="yyf" value="2015" minlegth="4" maxlength="4"/>
				</p>
				<p><label>Luogo</label>
				<input class="text" type="text" name="luogo" maxlength="40"/>
				</p>
				<p><label>Programma</label>
				<textarea name="programma" class="text" maxlength="1000"></textarea>
				</p>
END;
	
		$query=" SELECT nome FROM tema";
		echo "<p class=\"query\">".$query."</p>";

        $risultato=mysql_query($query,$conn) or die( "Ops".mysql_error());

			echo	"<p><label>Tema* </label><select name='tema' class='tema'>";
			while($row=mysql_fetch_array($risultato)){
			echo "<option>".$row['nome']."</option>";
			}
			echo "</select></p>";
				
				
		echo	"<p>Nota: i campi contrassegnati da * sono obbligatori
					<input class=\"button\" type=\"submit\" value=\"Inserisci\" name=\"Inserisci\"/></p>
			</fieldset>
		</form>
	</div>";
}

function print_form_addTema($info,$successo){
	echo<<<END
	<body onload="scroll()">
	<div id="arcontent">
	<div id="arpath">Ti trovi in: <a href="./areaadmin.php">Area riservata</a> &gt;&gt; Aggiungi Tema</div>
	<h2>Aggiungi nuovo tema</h2>
END;
	
	if($successo)
		echo "<h3><span class='".$successo."'>".$info."</span></h3>";
	
	echo<<<END
		<form id="tema" class="form" action="./addtema.php" method="get">
		    <!--
	            Semplicemente aggiunge alla tabella 'tema' un nuovo tema.
			-->
			<fieldset>
				<legend>Inserisci nuovo tema</legend>
				<p><label>Nome* </label>
				<input class="text" type="text" name="nome"/>
				</p>
				<p><label>Descrizione </label>
				<textarea name="descrizione" class="text"></textarea>
				</p>
				<p>Nota: i campi contrassegnati da * sono obbligatori
				<input class="button" type="submit" value="Inserisci" name="Inserisci"/></p>
			</fieldset>
		</form>
	</div>
END;
}

function print_form_addEvento($info,$successo){
	echo<<<END
	<body onload="scroll()">
	<div id="arcontent">
	<div id="arpath">Ti trovi in: <a href="./areaadmin.php">Area riservata</a> &gt;&gt; Aggiungi Evento Annuale</div>
	<h2>Aggiungi nuovo evento annuale</h2>
END;
	
	if($successo)
		echo "<h3><span class='".$successo."'>".$info."</span></h3>";
	
	echo<<<END
		<form id="evento" class="form" action="#" method="get">
		    <!--
	            Semplicemente si crea un nuovo evento a cadenza annuale tipico dell'associazione.
			-->
			<fieldset>
				<legend>Aggiungi un evento annuale</legend>
				<p><label>Nome* </label>
				<input class="text" type="text" name="nome" maxlength="60"/></p>
				<p><label>Descrizione </label>
				<textarea class="text" name="descrizione" rows="5" cols="20" maxlength="1000"></textarea></p>
				<p><label>Periodo* </label>
					<select class="tema" id="stagione" name="stagione">
					<option>inverno</option>
					<option>primavera</option>
					<option>estate</option>
					<option>autunno</option>
				</select></p>
				<p>Nota: i campi contrassegnati da * sono obbligatori
				<input class="button" type="submit" value="Inserisci" name="Inserisci"/></p>
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
	<div id="arpath">Ti trovi in: <a href="./areaadmin.php">Area riservata</a> &gt;&gt; Assegna Aderenti dell'Anno</div>
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
			  		echo "<h1>Nuove iscrizioni anno ".date('Y')."</h1>";
					 echo<<<END
				<form id="aderente" action=".././private_php/getaderente.php" method="get">
	        <!--
	            Si raccolgono tutte le persone salvate nel database.
	            Si costruisce cosi' una tabella a video che rende disponibile la funzione di impostare il ruolo della persona e iscriverla in aderente.
	            L'azione e' consideranta nell'anno in corso.
			-->
				<fieldset>
				<legend>Nuove iscrizioni</legend>
				
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
                echo "
                <td>
	                <select class=\"selecttable\" name=\"".$row['id']."\">
	                        <option value=\"AN\">Animato</option>
				            <option value=\"AR\">Animatore</option>
				            <option value=\"GE\">Genitore</option>
			        </select>
		</td>";
		
        echo "	<td>
        				<input type=\"checkbox\" name=\"modifica[]\" value=\"".$row['id']."\">
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
		<div id=\"arpath\">Ti trovi in: <a href=\"./areaadmin.php\">Area riservata</a> &gt;&gt; Assegna partecipanti</div>
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
	
	$query="SELECT id,nome,cognome,dataNascita 
				FROM persona JOIN aderente ON Id=Persona 
				WHERE anno=YEAR(CURDATE()) AND id NOT IN (SELECT PE.id 
																		FROM persona AS PE JOIN aderente AS A ON PE.id=A.persona 
																		JOIN partecipazione AS P ON A.persona=P.persona & A.anno=P.anno 
																		JOIN istanzaevento AS I ON P.dataInizio=I.dataInizio & P.evento=I.evento)";
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
						<th>Nome</th>
						<th>Cognome</th>
						<th>Data Nascita</th>
						<th>Aggiungi Partecipante</th>
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

function print_form_setAppartenenza($conn){
	echo<<<END
	<body onload="scroll()">
	<div id="arcontent">
	<div id="arpath">Ti trovi in: <a href="./areaadmin.php">Area riservata</a> &gt;&gt; Assegna Appartenenza</div>
END;
	
	$query="SELECT p.id, p.nome, p.cognome, p.dataNascita
			FROM persona AS p JOIN aderente AS a ON p.id=a.persona
			WHERE a.ruolo='AR' OR a.ruolo='AN' AND a.anno=YEAR(CURDATE())";
	
	echo "<p class=\"query\">".$query."</p>";
	
	$risultato=mysql_query($query,$conn) or die( "Ops".mysql_error());
	
	$row_num=mysql_num_rows($risultato);
        if(!$row_num){
                echo "<h2>Nessun aderente animatore o animato trovato</h2>";
                }
        else{
			  	echo "<h1>Assegna appartenenza tappe ".date('Y')."</h1>";
			  		 echo "
	<form id=\"appartenenza\" action=\"../private_php/getappartenenza.php\" method=\"get\">
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
	<div id="arpath">Ti trovi in: <a href="./areaadmin.php">Area riservata</a> &gt;&gt; Assegna Tema</div>
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

function print_form_setAssicurazione($conn){
		echo<<<END
	<body onload="scroll()">
	<div id="arcontent">
	<div id="arpath">Ti trovi in: <a href="./areaadmin.php">Area riservata</a> &gt;&gt; Assegna assicurazione</div>
END;

        $query="select p.id,p.nome,p.cognome,p.dataNascita
        				from persona as p 
		  				where p.assicurato='no'
		  				ORDER BY p.cognome ASC";

        echo "<p class=\"query\">".$query."</p>";

        $risultato=mysql_query($query,$conn) or die( "Ops".mysql_error());

        $row_num=mysql_num_rows($risultato);
        if(!$row_num){
                echo "<h2>Nessun persona non aderente trovata</h2>";
                }
        else{
			  	echo "<h1>Assicura aderenti ".date('Y')."</h1>";
					 echo "
				<form id=\"assicura\" action=\".././private_php/getassicurato.php\" method=\"get\">
	        <!--
	            Si raccolgono tutte le persone salvate nel database.
	            Si costruisce cosi' una tabella a video che rende disponibile la funzione di impostare l'assicurazione 
					'si' della persona.
	            L'azione e' consideranta nell'anno in corso.
			-->
				<fieldset>
				<legend>Nuovi assicurati - anno ".date('Y')."</legend>
				
				<table>
					<thead>
						<th>Nome</td>
						<th>Cognome</td>
						<th>Data Nascita</th>
						<th>Assicura</td>
					</thead>
					<tbody>";

        while($row=mysql_fetch_array($risultato)){
                print_table_rows($row);
        		echo "<td>
							<input type=\"checkbox\" name=\"modifica[]\" value=\"".$row['id']."\">
						</td>";
            echo "</tr>"; //chiudo la row iniziata da print_table_rows
        }
                
        echo "</tbody></table>";
        echo "<p class=\"buttons\"><input class=\"button\" type=\"reset\" value=\"Reset\"/>";
        echo "<input class=\"button\" type=\"submit\" name=\"Invio\" value=\"Invio\"/></p></fieldset></form>";
        }
    echo "<p id=\"top-page-link\"><a href=\"#arcontent\">Torna su</a></p></div>";
}


/*Cancella*/
function print_form_deleteIstanza($conn){
	
	echo "<body onload=\"scroll()\"><div id=\"arcontent\">
		<div id=\"arpath\">Ti trovi in: <a href=\"./areaadmin.php\">Area riservata</a> &gt;&gt; rimuovi eventi programmati</div>";
	
	$query="SELECT * FROM istanzaevento WHERE dataInizio>CURDATE()";
	echo "<p class=\"query\">".$query." *# CURDATE() ??? Sicuro?#*</p>";
	
	$risultato=mysql_query($query,$conn) or die( "Ops".mysql_error());
	
	$row_num=mysql_num_rows($risultato);
        if(!$row_num){
                echo "<h2>Nessun evento programmato quest'anno</h2>";
                }
        else{
	
	echo "<h1>Rimuovi eventi programmati</h1>
		<form id=\"deleteistanza\" action=\"../private_php/deleteistanza.php\" method=\"get\">
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
		<div id=\"arpath\">Ti trovi in: <a href=\"./areaadmin.php\">Area riservata</a> &gt;&gt; Cancella partecipazione</div>
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
	
	$query="	SELECT PE.nome, PE.cognome, PE.dataNascita
				FROM persona AS PE JOIN aderente AS A ON PE.id=A.persona
				JOIN partecipazione AS P ON A.persona=P.persona & A.anno=P.anno 
				JOIN istanzaevento AS I ON P.dataInizio=I.dataInizio & P.evento=I.evento";
	
	echo "<p class=\"query\">".$query."</p>";
	$risultato=mysql_query($query,$conn) or die( "Ops".mysql_error());
	
	$row_num=mysql_num_rows($risultato);
   if(!$row_num){
       echo "<h2>Nessun partecipante nell'evento selezionato</h2>";
   }
   else{
		echo "<form id=\"deletepartecipazione\" action=\"../private_php/deletepartecipazione.php\" method=\"get\">";
		echo	"
	        <!--
	            Si raccolgono tutti gli aderenti partecipanti all'istanza selezionata.
	            Si costruisce cosi' una tabella a video che rende disponibile la funzione di eliminare i partecipanti
					all'istanza evento selezionata precedemente. N.B. tutto dovrebbe essere considerato nell'anno in corso.
			-->
				<fieldset>
				<legend>Seleziona i partecipanti da rimuovere</legend>
				
				<table>
					<thead>
						<th>Nome</th>
						<th>Cognome</th>
						<th>Data Nascita</th>
						<th>Rimuovi Partecipante</th>
					</thead>
					<tbody>";

        while($row=mysql_fetch_array($risultato)){
            print_table_rows($row);
		  		echo "<td><input type=\"checkbox\" name=\"elimina[]\" value=\"".$row['id']."\"></td></tr>";
            echo "</tr>"; //chiudo la row iniziata da print_table_row
		  }
                
        echo "</tbody></table>";
		 	echo "<input type=\"hidden\" name=\"evento\" value=\"".$event['evento']."\">";
			echo "<input type=\"hidden\" name=\"dataInizio\" value=\"".$event['dataInizio']."\">";
        echo "<p class=\"buttons\"><input class=\"button\" type=\"reset\" value=\"Reset\"/>";
        echo "<input class=\"button\" type=\"submit\" name=\"Invio\" value=\"Invio\"/></p></fieldset></form>";
        }
    echo "<p id=\"top-page-link\"><a href=\"#arcontent\">Torna su</a></p></div>";	
	echo "</div>";
}

function print_form_deleteAssicurazione(){
	echo "<body onload=\"scroll()\">
		<div id=\"arcontent\">
			<div id=\"arpath\">Ti trovi in: <a href=\"./areaadmin.php\">Area riservata</a> &gt;&gt; Cancella assicurazione</div>";
	echo "<h1>Cancella assicurazione</h1>";
	echo "<form id=\"resetass\ action=\"#\" method=\"get\"><fieldset>
				<legend>Cancella assicurazione</legend>
				<p class=\"instruction\">Imposta l'assicurazione a 'no' a tutte le persone presenti nel database</p>
				<p>(ATTENZIONE: l'azione sarà irreversibile)
				<input class=\"button\" type=\"submit\" name=\"reset\" value=\"reset\"></p>
			</fieldset></form>";
	
	/*
	query="call procedure insurance_flag('no')";
	mysql_query($query,$conn) or die( "Ops".mysql_error());
   */ 
	echo "</div>";
}

function print_form_selectIstanza($conn,$action,$path,$where){
	echo "<body onload=\"scroll()\">
	<div id=\"arcontent\">
		<div id=\"arpath\">Ti trovi in: <a href=\"./areaadmin.php\">Area riservata</a> &gt;&gt; ".$path."</div>";
	
	$query="SELECT *
			 FROM istanzaevento
			 $where";
	
	echo "<p class=\"query\">".$query."</p>";
	
	$risultato=mysql_query($query,$conn) or die( "Ops".mysql_error());
	
	$row_num=mysql_num_rows($risultato);
        if(!$row_num){
                echo "<h2>Nessun evento di quest'anno trovato</h2>";
                }
        else{
			  		echo "<h1>".$path." eventi ".date('Y')."</h1>";
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


/*AREA SOCIO*/

function print_form_selectTappa($conn){
	echo "<body onload=\"scroll()\">
	<div id=\"arcontent\">
		<div id=\"path\">Ti trovi in: <a href=\"./areasocio.php\">Area riservata</a> &gt;&gt; Informazioni Tappa</div>";
	
	$query="SELECT *
			 FROM tappa
			 GROUP BY annata";
	
	echo "<p class=\"query\">".$query."</p>";
	
	$risultato=mysql_query($query,$conn) or die( "Ops".mysql_error());
	
	$row_num=mysql_num_rows($risultato);
        if(!$row_num){
                echo "<h2>Nessun tappa esistenete nella base di dati</h2>";
                }
        else{
			  		 echo "<fieldset><legend>Seleziona la tappa interessata</legend>
			<!--
				costruisco una select di annata delle tappe esitenti
			-->
				<table>
					<thead>
						<th>Tappa</th>
						<th>Numero</th>
						<th>Seleziona</th>
					</thead>
					<tbody>";
			  
				 while($row=mysql_fetch_array($risultato)){	
                echo "<tr>";
					 	echo "<td>".$row['annata']."</td>";
					 	echo "<form id=\"selecttappa\" action=\"./infotappa-page2.php\" method=\"get\">";
					 	echo "<td><select name=\"numero\">
									<option value=\"1\">1</option>
									<option value=\"2\">2</option>
									<option value=\"3\">3</option>
									<option value=\"4\">4</option>
									<option value=\"5\">5</option>
								</select></td>";
						echo "<td>
								<input type=\"hidden\" name=\"annata\" value=\"".$row['annata']."\"/>
								<input class=\"set_button\" type=\"submit\" name=\"Seleziona\" value=\"Seleziona\"/>
								</td>";
					 	echo "</form>";
					 echo "</tr>";
				 }	
			echo "</tbody></table></fieldset>";
		  }
	echo "<p id=\"top-page-link\"><a href=\"#arcontent\">Torna su</a></p></div>";
}

function print_infoTappa($conn,$tappa){
	echo<<<END
	<body onload="scroll()">
	<div id="arcontent">
	<div id="path">Ti trovi in: <a href="./areasocio.php">Area riservata</a> &gt;&gt; Informazioni Tappa</div>
	<!-- 		
		Prelevo tutti i membri con relativi dati personali di una tappa in base all'annata del 1-2-3-4-5
	-->
END;
	
	$annata=$tappa['annata'];
	$numero=$tappa['numero'];
	
	$query="SELECT * FROM tappa WHERE annata='$annata' AND numRiferimento='$numero'";
	echo "<p class=\"query\">".$query."</p>";
	$risultato=mysql_query($query,$conn) or die( "Ops".mysql_error());
	
	if($risultato!=0){
		$tappa=mysql_fetch_array($risultato);
		
	$queryNumAN="SELECT count(*) AS numeroAN
					FROM aderente AS A JOIN appartenenza AS AP ON AP.aderentePersona=A.persona AND AP.aderenteAnno=A.anno
					WHERE A.ruolo='AN' AND 
							AP.tappaNumRif='".$tappa['numRiferimento']."' AND 
							AP.tappaAnnoInizio='".($annata+13+$tappa['numRiferimento'])."' AND 
							AP.tappaAnnoFine='".($annata+14+$tappa['numRiferimento'])."'
							GROUP BY A.persona, AP.tappaNumRif, AP.tappaAnnoInizio, AP.tappaAnnoFine";
		echo "<p class=\"query\">".$queryNumAN."</p>";
	
	$queryNumAR="SELECT count(*) AS numeroAR
					FROM aderente AS A JOIN appartenenza AS AP ON AP.aderentePersona=A.persona AND AP.aderenteAnno=A.anno
					WHERE A.ruolo='AR' AND 
							AP.tappaNumRif='".$tappa['numRiferimento']."' AND 
							AP.tappaAnnoInizio='".($annata+13+$tappa['numRiferimento'])."' AND 
							AP.tappaAnnoFine='".($annata+14+$tappa['numRiferimento'])."'
					GROUP BY A.persona, AP.tappaNumRif, AP.tappaAnnoInizio, AP.tappaAnnoFine";
		echo "<p class=\"query\">".$queryNumAR."</p>";
		
		$risultato2=mysql_query($queryNumAN,$conn) or die("Ops".mysql_error());
		$risultato3=mysql_query($queryNumAR,$conn) or die("Ops".mysql_error());
		$numAN=mysql_fetch_array($risultato2);
		$numAR=mysql_fetch_array($risultato3);
	
	echo "<h1>Tappa selezionata:</h1>";
	echo "<table>
				<thead>
					<th>Tappa</th>
					<th>Numero</th>
					<th>Anno Inizio</th>
					<th>Anno Fine</th>
					<th>N° Animati</th>
					<th>N° Animatori</th>
				</thead>
				<tbody>
					<tr class=\"select-row\">
						<td>".$tappa['annata']."</td>
						<td>".$tappa['numRiferimento']."</td>
						<td>".$tappa['annoInizio']."</td>
						<td>".$tappa['annoFine']."</td>
						<td>".$numAN['numeroAN']."</td>
						<td>".$numAR['numeroAR']."</td>
					</tr>
				</tbody>
			</table>";
		
	//trova i membri della tappa selezionata
	$query1="SELECT P.nome, P.cognome, P.dataNascita, P.parrocchia
				FROM aderente AS A JOIN persona AS P ON A.persona=P.id 
					JOIN appartenenza AS AP ON AP.aderentePersona=A.persona AND AP.aderenteAnno=A.anno
				WHERE A.ruolo='AN' AND 
						AP.tappaNumRif='".$tappa['numRiferimento']."' AND 
						AP.tappaAnnoInizio='".($annata+13+$tappa['numRiferimento'])."' AND 
						AP.tappaAnnoFine='".($annata+14+$tappa['numRiferimento'])."'
						GROUP BY P.Id";
	echo "<p class=\"query\">".$query1."</p>";
		
	$membri=mysql_query($query1,$conn) or die( "Ops".mysql_error());
		
	if(mysql_num_rows($membri)!=0){
		echo "<h1>Animati:</h1>";
		echo "<table>
					<thead>
						<th>Nome</th>
						<th>Cognome</th>
						<th>Data Nascita</th>
						<th>Parrocchia</th>
					</thead>
					<tbody>";
			while($membro=mysql_fetch_array($membri)){
						echo "<tr>
							<td>".$membro['nome']."</td>
							<td>".$membro['cognome']."</td>
							<td>".$membro['dataNascita']."</td>
							<td>".$membro['parrocchia']."</td>
						</tr>";
			}
		echo	"</tbody>
				</table>";
	}
	else echo "<h2>Nessun animato in questa tappa</h2>";
		
	//trova gli animatori della tappa selezionata
	$query2="SELECT P.nome, P.cognome, P.dataNascita, P.parrocchia
				FROM aderente AS A JOIN persona AS P ON A.persona=P.id 
					JOIN appartenenza AS AP ON AP.aderentePersona=A.persona AND AP.aderenteAnno=A.anno
					JOIN tappa AS T ON AP.tappaAnnoInizio=T.annoInizio AND AP.tappaAnnoFine=T.annoFine AND AP.tappaNumRif=T.numRiferimento
				WHERE A.ruolo='AR' AND AP.tappaNumRif='".$tappa['numRiferimento']."' AND T.annata='".$annata."'";
	echo "<p class=\"query\">".$query2."</p>";
		
	$animatori=mysql_query($query2,$conn) or die( "Ops".mysql_error());
		
	if(mysql_num_rows($animatori)!=0){
		echo "<h1>Animatori:</h1>";
		echo "<table>
					<thead>
						<th>Nome</th>
						<th>Cgnome</th>
						<th>Data di Nascita</th>
						<th>Parrocchia</th>
					</thead>
					<tbody>";
				while($animatore=mysql_fetch_array($animatori)){
						echo "<tr>
							<td>".$animatore['nome']."</td>
							<td>".$animatore['cognome']."</td>
							<td>".$animatore['dataNascita']."</td>
							<td>".$animatore['parrocchia']."</td>
						</tr>";
				}
		echo "</tbody>
				</table>";
	}
	else echo "<h2>Nessun animatore assegnato a questa tappa</h2>";
		
	}
	echo "<p id=\"back-page-link\"><a href=\"./infotappa-page1.php\">Indietro</a></p>";
	echo "</div>";
}

function print_form_dettagliTema($conn){
	echo<<<END
	<body onload="scroll()">
	<div id="arcontent">
	<div id="path">Ti trovi in: <a href="./areasocio.php">Area riservata</a> &gt;&gt; Descrizione Tema</div>
END;

	
	echo "<form id=\"dettaglitema\" action=\"./dettaglitema-page2.php\" method=\"get\"><fieldset>";
	echo "<legend>Seleziona il tema desiderato</legend>";
	
	$query="SELECT nome FROM tema";
	echo "<p class=\"query\">".$query."</p>";
	$risultato=mysql_query($query,$conn) or die( "Ops".mysql_error());
	
	echo "<select name=\"nome\">";
	while($temi=mysql_fetch_array($risultato)){
		echo "<option value=\"".$temi['nome']."\">".$temi['nome']."</option>";
	}
	echo "</select>";
	
	echo "<input class=\"button\" type=\"submit\" name=\"Seleziona\" value=\"Seleziona\"/></fieldset></form>";
	
	echo "</div>";
}

function print_destema($conn,$tema){
	echo<<<END
	<body onload="scroll()">
	<div id="arcontent">
	<div id="path">Ti trovi in: <a href="./areasocio.php">Area riservata</a> &gt;&gt; Descrizione Tema</div>
END;

	$nome=$tema['nome'];
	
	$query="SELECT descrizione FROM tema WHERE nome='$nome'";
	echo "<p class=\"query\">".$query."</p>";
	
	$descrizione=mysql_query($query,$conn) or die("Ops".mysql_error());
	
	echo "<h1>Tema selezionato: <span class='risultato'>$nome</span> </h1>";
	echo "<h2>Descrizione:</h2>";
	$desc=mysql_fetch_array($descrizione);
	echo "<p> $desc[0] </p>";
	
	echo "<p id=\"back-page-link\"><a href=\"./dettaglitema-page1.php\">Indietro</a></p>";
	echo "</div>";
}

function print_progevento($conn,$evento){
		echo "<body onload=\"scroll()\">
	<div id=\"arcontent\">
		<div id=\"path\">Ti trovi in: <a href=\"./areaadmin.php\">Area riservata</a> &gt;&gt; Programma Evento</div>";
	
	$nome=$evento['evento'];
	$dataInizio=$evento['dataInizio'];
	
	$query="SELECT *
			 FROM istanzaevento
			 WHERE evento='$nome' AND dataInizio='$dataInizio'";

	echo "<p class=\"query\">".$query."</p>";
	
	$risultato=mysql_query($query,$conn) or die( "Ops".mysql_error());
	
	$row_num=mysql_num_rows($risultato);
	
	if($row_num!=0){
			$event=mysql_fetch_array($risultato);
			echo "<h1>Evento: <span class=\"risultato\">$nome</span></h1>";
			echo "<h2>Programma:</h2>";
			echo "<p>".$event['programma']."</p>";
	}
	else echo "<h1>C'è stato un problema con l'evento selezionato</h1>";
	
	echo "</div>";
}

function print_form_cercaPersona($conn){
	echo<<<END
	<body onload="scroll()">
	<div id="arcontent">
	<div id="path">Ti trovi in: <a href="./areasocio.php">Area riservata</a> &gt;&gt; Cerca Persona</div>
END;

	//Ricerca per nome e/o cognome
	echo "<form id=\"cercapersona\" action=\"./cercapersona-page2.php\" method=\"get\"><fieldset>";
	echo "<legend>Inserisci il nome o il cognome di chi cerchi</legend>";
	
	echo "<input class=\"text\" type=\"text\" name=\"ricerca\"/>";
	echo "<input class=\"button\" type=\"submit\" name=\"Cerca\" value=\"Cerca\"/></fieldset></form>";
	
	echo "</div>";
	
}

function print_cercaPersona($conn,$ricerca){
	echo<<<END
	<body onload="scroll()">
	<div id="arcontent">
	<div id="path">Ti trovi in: <a href="./areasocio.php">Area riservata</a> &gt;&gt; Cerca Persona</div>
END;
	
	$match=$ricerca['ricerca'];
	
	$query="SELECT * FROM persona WHERE nome='$match' OR cognome='$match'";
	echo "<p class=\"query\">".$query."</p>";
	$risultato=mysql_query($query,$conn) or die( "Ops".mysql_error());
	
	echo "<h1>Risultati ricerca</h1>";
	
	$row_num=mysql_num_rows($risultato);
   if(!$row_num){
        echo "<h2>0 risultati trovati per: <span class=\"risultato\">$match</span> </h2>";
   }
   else{
		if($row_num==1)
			echo "<h2>1 risultato trovato per: <span class=\"risultato\">$match</span> </h2>";
		else
			echo "<h2>Ci sono $row_num risultati trovati per: <span class=\"risultato\">$match</span> </h2>";
		
		echo "<fieldset><legend>Seleziona la persona di tuo interesse</legend>
				<table>
					<thead>
						<th>Id</th>
						<th>Nome</th>
						<th>Cognome</th>
						<th>Data di Nascita</th>
						<th>Seleziona</th>
					</thead>
					<tbody>";
		while($persona=mysql_fetch_array($risultato)){
			echo "<tr>
						<form id=\"selectpersona\" action=\"./cercapersona-page3.php\" method=\"get\">
						<td>".$persona['id']."</td>
						<td>".$persona['nome']."</td>
						<td>".$persona['cognome']."</td>
						<td>".$persona['dataNascita']."</td>
						<td>
							<input type=\"hidden\" name=\"id\" value=\"".$persona['id']."\"/>
							<input class=\"set_button\" type=\"submit\" name=\"Seleziona\" value=\"Seleziona\"/>
						</td>
						</form>
					</tr>";
		}
		echo "</tbody></table></fieldset>";
	}

	echo "<p id=\"back-page-link\"><a href=\"./cercapersona-page1.php\">Indietro</a></p>";
	echo "</div>";
}

function print_ruolo($ruolo){
	if($ruolo=="AN")
		echo "Animato";
	elseif($ruolo=="AR")
		echo "Animatore";
	elseif($ruolo=="GE")
		echo "Genitore";
}

function print_infoPersona($conn,$persona){
		echo<<<END
	<body onload="scroll()">
	<div id="arcontent">
	<div id="path">Ti trovi in: <a href="./areasocio.php">Area riservata</a> &gt;&gt; Cerca Persona</div>
END;
	
	$id=$persona['id'];
	
	$query="SELECT * FROM persona WHERE id='$id'";
	echo "<p class=\"query\">".$query."</p>";
	$persona=mysql_query($query,$conn) or die('Ops'.mysql_error());
	$dati=mysql_fetch_array($persona);
	
	echo "<h1>".$dati['nome']." ".$dati['cognome']."</h1>
			<p>ID: <i>".$dati['id']."</i></p>
			<p>Data di Nascita: <i>".$dati['dataNascita']."</i></p>
			<p>Luogo di Nascita: <i>".$dati['luogoNascita']."</i></p>
			<p>Telefono: <i>".$dati['telefono']."</i></p>
			<p>email: <i>".$dati['email']."</i></p>
			<p>Parrocchia: <i>".$dati['parrocchia']."</i></p>
			<p>Assicurato (attualmente): <span class=\"".$dati['assicurato']."\">".$dati['assicurato']."</span></p>";
	
	$query1="SELECT * FROM aderente WHERE persona='$id'";
	echo "<p class=\"query\">".$query1."</p>";
	$aderenze=mysql_query($query1,$conn) or die('Ops'.mysql_error());
	
	echo "<h2>Aderenza negli anni:</h2>";
	
	$row_num=mysql_num_rows($aderenze);
	if($row_num!=0){
		echo "<table>
				<thead>
					<th>Anno</th>
					<th>Ruolo</th>
				</thead>
				<tbody>";
		while($aderenza=mysql_fetch_array($aderenze)){
				echo "<tr>
							<td>".$aderenza['anno']."</td>
							<td>";
							print_ruolo($aderenza['ruolo']);
				echo 		"</td>
						</tr>";
		}
		echo "</tbody></table>";
	}
	else echo "<h2>Nessun aderenza negli anni</h2>";

	echo "<p id=\"back-page-link\"><a href=\"./cercapersona-page1.php\">Indietro</a></p>";
	echo "</div>";
}

function print_ruoli($ruolo){
	if($ruolo=='GE')
		return "Genitore";
	elseif($ruolo=='AR')
		return "Animatore";
	elseif($ruolo=='AN')
		return "Animato";
}

function print_statAderenti($conn){
			echo<<<END
	<body onload="scroll()">
	<div id="arcontent">
	<div id="path">Ti trovi in: <a href="./areasocio.php">Area riservata</a> &gt;&gt; Statistiche aderenti</div>
END;
	
	echo "<p class='info'>Qui hai a disposizione tutte le informazioni più rilevanti per un'analisi sull'andamento degli aderenti all'associazione.</p>";
	
	//Numero aderenti totali annuali
	/*$query="SELECT COUNT(anno) AS nAderenti, anno
					FROM aderente
					GROUP BY anno
					ORDER BY anno DESC";
	echo "<p class=\"query\">".$query."</p>";
	$numAderenti=mysql_query($query,$conn) or die('Ops'.mysql_error());
	
	echo "<h1>Andamento aderenti negli anni</h1>";
	$num_rows=mysql_num_rows($numAderenti);
	if($num_rows!=0){
		
		echo "<table>
					<thead>
						<th>Anno</th>
						<th>Aderenti totali</th>
					</thead>
					<tbody>";
		
		while($numAderentiAnno=mysql_fetch_array($numAderenti)){
			echo "<tr>
						<td>".$numAderentiAnno['anno']."</td>
						<td>".$numAderentiAnno['nAderenti']."</td>
					</tr>";
		}
		
		echo "</tbody></table>";
	}
	else echo "<h2>Nessun aderente trovato</h2>";*/
	
	$query="SELECT COUNT(anno) AS nAderenti, anno
					FROM aderente
					GROUP BY anno
					ORDER BY anno DESC";
	echo "<p class=\"query\">".$query."</p>";
	$numAderenti=mysql_query($query,$conn) or die('Ops'.mysql_error());
	
	echo "<h1>Andamento aderenti negli anni</h1>";
	$num_rows_ade=mysql_num_rows($numAderenti);
	$Alength=0;
	if($num_rows_ade!=0){
		while($numAderentiAnno=mysql_fetch_array($numAderenti)){
			$totAderenti[$Alength]=$numAderentiAnno['nAderenti'];
			$Alength++;
		}	
	}
	
	//Numero aderenti annuali per ruolo
	$query="SELECT count(*) AS numAderenti, ruolo, anno
				FROM aderente
				GROUP BY ruolo, anno
				ORDER BY anno DESC, ruolo DESC";
	echo "<p class=\"query\">".$query."</p>";
	$numAderenti=mysql_query($query,$conn) or die('Ops'.mysql_error());
	
	$num_rows=mysql_num_rows($numAderenti);
	if($num_rows!=0){
		
		$length=0;
			while($row=mysql_fetch_array($numAderenti)){
				$array[$length]=$row;
				$length++;
			}
		
		echo "<table>
					<thead>
						<th>Anno</th>
						<th>Animati</th>
						<th>Animatori</th>
						<th>Genitori</th>
						<th>Numero aderenti totali</th>
					</thead>
					<tbody>";
		
		$y=0;
		$aTot=0;
		while($y<$length){
			
			echo "<tr>
						<td>".$array[$y]['anno']."</td>";
			
			$anno=$array[$y]['anno'];
			$cont=0;
			$animati=false; $animatori=false; $genitori=false;
			while($y<$length && $array[$y]['anno']==$anno){
				if($array[$y]['ruolo']=='AN' && $cont==0){
					echo "<td>".$array[$y]['numAderenti']."</td>";
					$animati=true;
					$y++;
				}
				elseif($array[$y]['ruolo']=='AR' && $cont==1){
					echo "<td>".$array[$y]['numAderenti']."</td>";
					$animatori=true;
					$y++;
				}
				elseif($array[$y]['ruolo']=='GE' && $cont==2){
					echo "<td>".$array[$y]['numAderenti']."</td>";
					$genitori=true;
					$y++;
				}
				else
					echo "<td> 0 </td>";
				$cont++;
			}
			if($cont==2 && $y>=$length)
				echo "<td> 0 </td>";
			echo "<td>".$totAderenti[$aTot]."</td>";
			echo "</tr>";
			$aTot++;
		}
		echo "</tbody></table>";
		
		
		/*echo "<table>
					<thead>
						<th>Anno</th>
						<th>Ruolo</th>
						<th>Numero aderenti</th>
						<!--<th>Numero aderenti tot</th>-->
					</thead>
					<tbody>";
		
		while($numAderentiAnno=mysql_fetch_array($numAderenti)){
			echo "<tr>
						<td>".$numAderentiAnno['anno']."</td>
						<td>".print_ruoli($numAderentiAnno['ruolo'])."</td>
						<td>".$numAderentiAnno['numAderenti']."</td>
					</tr>";
		}
		echo "</tbody></table>";*/
	}
	else echo "<h2>Nessun aderente trovato</h2>";
	
	//Numero componenti tappa negli anni
	$query="SELECT count(*) AS numeroAN, T.annoInizio, T.annoFine, T.numRiferimento
					FROM aderente AS A JOIN persona AS P ON A.persona=P.id 
							JOIN appartenenza AS AP ON AP.aderentePersona=A.persona AND AP.aderenteAnno=A.anno
							JOIN tappa AS T ON T.annoInizio=AP.tappaAnnoInizio AND T.annoFine=AP.tappaAnnoFine AND T.numRiferimento=AP.tappaNumRif
					WHERE A.ruolo='AN'
				GROUP BY T.annoInizio, T.annoFine, T.numRiferimento
				ORDER BY T.annoInizio DESC, T.annoFine DESC";
	echo "<p class=\"query\">".$query."</p>";
	$numMembri=mysql_query($query,$conn) or die('Ops'.mysql_error());
	
	echo "<h1>Andamento N° componenti tappe negli anni</h1>";
	$num_rows=mysql_num_rows($numMembri);
	if($num_rows!=0){
						echo "<table>
							<thead>
								<th>Anno inizio</th>
								<th>Anno fine</th>
								<th># Riferimento</th>
								<th>N° membri</th>
							</thead>
							<tbody>";
		while($numM=mysql_fetch_array($numMembri)){
				//echo "<h2>Anno <span class=\"risultato\">".$numMembriAnno['annoInizio']." - ".$numMembriAnno['annoFine']."</span></h2>";
					echo "		<tr>
										<td>".$numM['annoInizio']."</td>
										<td>".$numM['annoFine']."</td>
										<td>".$numM['numRiferimento']."</td>
										<td>".$numM['numeroAN']."</td>
									</tr>";
		}
				echo "	</tbody>
						</table>";
	}
	else echo "<h2>Nessun aderente trovato</h2>";
	
	echo "<p id=\"top-page-link\"><a href=\"#arcontent\">Torna su</a></p>";
	echo "</div>";
}

function print_statEventi($conn){
	echo<<<END
	<body onload="scroll()">
	<div id="arcontent">
	<div id="path">Ti trovi in: <a href="./areasocio.php">Area riservata</a> &gt;&gt; Statistiche eventi</div>
END;
	
	echo "<p class='info'>Qui hai a disposizione tutte le informazioni più rilevanti per un'analisi sull'andamento della partecipazione agli eventi organizzati dall'associazione.</p>";
	
	//Numero partecipazioni istanze annuali
	$query="SELECT count(A.persona) AS numParte, A.anno
				FROM aderente AS A JOIN partecipazione AS P ON A.persona=P.persona AND A.anno=P.anno
				GROUP BY A.persona,A.anno
				";
	echo "<p class=\"query\">".$query."</p>";
	$numPart=mysql_query($query,$conn) or die('Ops'.mysql_error());
	
	echo "<h1>Andamento partecipazione negli anni</h1>";
	$num_rows=mysql_num_rows($numPart);
	if($num_rows!=0){
		
		echo "<table>
					<thead>
						<th>Anno</th>
						<th>Numero partecipazioni</th>
					</thead>
					<tbody>";
		
		while($numPartAnno=mysql_fetch_array($numPart)){
			echo "<tr>
						<td>".$numPartAnno['anno']."</td>
						<td>".$numPartAnno['numParte']."</td>
					</tr>";
		}
		
		echo "</tbody></table>";
	}
	else echo "<h2>Nessuna partecipazione trovata</h2>";
	
	//Media partecipanti agli eventi
	$query="SELECT I.evento, E.stagione, CEIL(AVG(I.nPartecipanti)) mediaPartecipanti
				FROM evento AS E JOIN istanzaevento AS I ON E.nome=I.evento
				GROUP BY I.evento";
	echo "<p class=\"query\">".$query."</p>";
	$numMembri=mysql_query($query,$conn) or die('Ops'.mysql_error());
	
	echo "<h1>Media partecipanti negli anni</h1>";
	$num_rows=mysql_num_rows($numMembri);
	if($num_rows!=0){
						echo "<table>
							<thead>
								<th>Evento</th>
								<th>Periodo</th>
								<th>Media partecipanti</th>
							</thead>
							<tbody>";
		while($numM=mysql_fetch_array($numMembri)){
				//echo "<h2>Anno <span class=\"risultato\">".$numMembriAnno['annoInizio']." - ".$numMembriAnno['annoFine']."</span></h2>";
					echo "		<tr>
										<td>".$numM['evento']."</td>
										<td>".$numM['stagione']."</td>
										<td>".$numM['mediaPartecipanti']."</td>
									</tr>";
		}
				echo "	</tbody>
						</table>";
	}
	else echo "<h2>Nessun evento trovato</h2>";
	
	//Affluenza agli eventi
	$query="SELECT evento, dataInizio, nPartecipanti/nAderenti*100 AS affluenza
					FROM
					(SELECT evento, nPartecipanti, dataInizio, YEAR(dataInizio) AS data
					FROM istanzaevento ) AS I
								
				JOIN 

					(SELECT COUNT(anno) AS nAderenti, anno
					FROM aderente
					GROUP BY anno) AS A
				
				ON I.data=A.anno
				ORDER BY anno DESC";
	
	echo "<p class=\"query\">".$query."</p>";
	$numPart=mysql_query($query,$conn) or die('Ops'.mysql_error());
	
	echo "<h1>Affluenza eventi</h1>";
	$num_rows=mysql_num_rows($numPart);
	if($num_rows!=0){
						echo "<table>
							<thead>
								<th>Evento</th>
								<th>Data Inizio</th>
								<th>Affluenza</th>
							</thead>
							<tbody>";
		while($numM=mysql_fetch_array($numPart)){
					echo "		<tr>
										<td>".$numM['evento']."</td>
										<td>".$numM['dataInizio']."</td>
										<td>".round($numM['affluenza'],2)." %</td>
									</tr>";
		}
				echo "	</tbody>
						</table>";
	}
	else echo "<h2>Nessun evento trovato</h2>";
	
	echo "<p id=\"top-page-link\"><a href=\"#arcontent\">Torna su</a></p>";
	echo "</div>";
}

function print_queryAvanzate(){
	echo<<<END
	<body onload="scroll()">
	<div id="arcontent">
	<div id="path">Ti trovi in: <a href="./areasocio.php">Area riservata</a> &gt;&gt; Query Avanzate</div>
END;
	
	echo "<dl>
				<dt>Query 1</dt>
				<dd><p>SELECT evento, dataInizio, nPartecipanti/nAderenti*100 AS affluenza</p>
					<p>FROM</p>
					<p>(SELECT evento, nPartecipanti, dataInizio, YEAR(dataInizio) AS data</p>
					<p>FROM istanzaevento ) AS I</p>
								
				<p>JOIN </p>

					<p>(SELECT COUNT(anno) AS nAderenti, anno</p>
					<p>FROM aderente</p>
					<p>GROUP BY anno) AS A</p>
				
				<p>ON I.data=A.anno</p>
				<p>ORDER BY anno DESC</p>
				<p class=\"info\">Questa query...</p></dd>
	
	</dl>";
	
	echo "<p id=\"top-page-link\"><a href=\"#arcontent\">Torna su</a></p>";
	echo "</div>";
}

?>
