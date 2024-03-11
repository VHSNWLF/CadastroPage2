<?php

session_start();

    $hostname="143.106.241.3";
	$username="cl202247";
	$password="ENVI2224*";
	$dbname="cl202247";

$conn = new mysqli($hostname, $username, $password,$dbname);   // Create a connection

//Verifica a conexão

if ($conn->connect_error){
    die("Conexão Falhou: " . $conn->connect_error);
}
?>