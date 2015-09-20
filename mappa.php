<?php

require("./php/basefunction.php");
require("./php/print.php");

$conn=connection_db();

print_head("Mappa sito - Ac2mms","si");
print_header();
print_menu();
print_path("Mappa sito");

print_map();
          
print_footer();
print_close();

?>
