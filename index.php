<?php

require("./php/basefunction.php");
require("./php/print.php");

$conn=connection_db();

print_head("Home - Ac2mms");
print_header();
print_menu();
print_path("Home");
print_slider();

	
//raccolgo informazioni tramite query
        $query="SELECT evento, dataInizio
FROM istanzaevento
WHERE dataInizio=
(SELECT MIN(dataInizio) AS dataInizio
FROM istanzaevento
WHERE dataInizio>CURDATE())
UNION
SELECT evento, dataInizio
FROM istanzaevento
WHERE dataInizio=
(SELECT MAX(dataInizio) AS dataInizio
FROM istanzaevento
WHERE dataInizio<CURDATE())              
                ;";
                
print_sidecontent(mysql_query($query, $conn));
          
print_maincontent();
print_footer();
print_jquery();
print_close();

?>
