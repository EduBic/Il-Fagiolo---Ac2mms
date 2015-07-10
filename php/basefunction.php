<?php

function connection_db(){ 
  $dbname="acmms";
  $server="localhost";
  $username="root";
  $password="1234";

  $conn=mysql_connect($server,$username,$password)
    or die("Impossibile connettersi!");

  mysql_select_db($dbname,$conn);
  mysql_query("SET NAMES 'UTF8'");

  return $conn;
}

function session_control(){  //controlla se è stato effettuato l'accesso
	session_start();
	if(!isset($_SESSION['username']))
		{
		$_SESSION['redirect']='false';	
		header('location:../../login.php');	
		}
}

function session_control_login(){  //controlla la sessione in ingresso al login, se è stato gia effettuato l'accesso ridireziona alla index.php
	if(isset($_SESSION['username']))
		{header('location:index.php');}
}

function connection_db_close($conn){
	mysql_close($conn);
}

?>
