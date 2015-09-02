<?php

require("../private_php/print_private_area.php");
require_file();

$conn=connection_db();

session_control();

$user="Socio";
print_arHeader($user);
print_arMenu($user);

print_form_selectIstanza($conn,'progevento-page2.php','Programma evento','');

print_arfooter();
print_close();

?>
