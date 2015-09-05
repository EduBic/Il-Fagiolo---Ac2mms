<?php

require("../private_php/print_private_area.php");
require_file();

//$conn=connection_db();

session_control();

$user="Socio";
print_arHeader($user);
print_arMenu($user);

print_queryAvanzate();

print_arfooter();
print_close();

?>