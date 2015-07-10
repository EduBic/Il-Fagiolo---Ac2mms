<?php

require("../private_php/print_private_area.php");
require_file();

$conn=connection_db();

$user="Admin";

print_arHeader($user);
print_arMenu($user);

print_form_selectIstanza($conn,"settema-page2.php","Assegna tema");

print_arfooter();
print_close();


?>
