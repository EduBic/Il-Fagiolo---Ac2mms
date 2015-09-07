<?php

require("./php/basefunction.php");
require("./php/print.php");

$conn=connection_db();

print_head("Chi Siamo - Ac2mms","si");
print_header();
print_menu();
print_path("<a href=\"index.php\">Home</a> &gt;&gt; Chi siamo");

print_form();

if(isset($_GET["select"]))
	{
	$numTappa=$_GET["select"];
	$anno=date('Y');
	$query="SELECT A.persona, P.nome, P.cognome, P.dataNascita, P.telefono, P.email, P.parrocchia ";
	$query.="FROM persona P JOIN aderente A ON P.id=A.persona JOIN appartenenza App ON (A.persona=App.aderentePersona && A.anno=App.aderenteAnno)";
	$query.=" WHERE A.ruolo='AR' && App.tappaNumRif=$numTappa && A.anno=$anno";
	echo "<p class=\"query\"> $query </p>";
		
	$ris=mysql_query($query, $conn);
	print_maincontent2("def",$ris);
	} 
          
print_footer();
print_close();

?>
