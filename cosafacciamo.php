<?php

require("./php/basefunction.php");
require("./php/print.php");

$conn=connection_db();

print_head("Cosa facciamo - Ac2mms");
print_header();
print_menu();
print_path("<a href=\"index.php\">Home</a> &gt;&gt; Cosa facciamo");

$query="SELECT * FROM evento";

$risultato=mysql_query($query, $conn);

print_maincontent2("event",$risultato);
          
print_footer();
print_close();

?>
