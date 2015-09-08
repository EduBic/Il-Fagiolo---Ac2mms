<?php

require("../private_php/print_private_area.php");
require_file();

$conn=connection_db();
session_control();

include('../private_php/deletepartecipazione.php');

$user="Admin";
print_arHeader($user);
print_arMenu($user);

print_form_selectIstanza($conn,"deletepartecipazione-page2.php","Cancella partecipazione","WHERE YEAR(dataInizio)=YEAR(CURDATE())",$info);

print_arfooter();
print_close();

connection_db_close($conn);

?>
