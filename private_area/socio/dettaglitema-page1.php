<?php

require("../private_php/print_private_area.php");
require_file();

$conn=connection_db();

$user="Socio";

print_arHeader($user);
print_arMenu($user);

print_form_dettagliTema($conn);

print_arfooter();
print_close();

?>
