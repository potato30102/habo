<?php 
	$servidor = "localhost";
	$user = "root";
	$senha = "usbw";
	$banco = "db_bancosangue";

	$mysqli = new mysqli($servidor, $user, $senha, $banco);
	if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
	mysqli_set_charset($mysqli,"utf8");
?>