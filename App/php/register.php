<?php
require "conn.php";
$login = $_POST["login"];
$haslo = $_POST["haslo"];
$email = $_POST["email"];
$imie = $_POST["imie"];
$nazwisko = $_POST["nazwisko"];

$mysql_qry = "SET FOREIGN_KEY_CHECKS=0;";

if ($conn->query($mysql_qry) === TRUE) {
	$mysql_qry = "INSERT INTO konto (login, haslo, email, imie, nazwisko) VALUES('$login ', '$haslo', '$email', '$imie', '$nazwisko');";
	if ($conn->query($mysql_qry) === TRUE) {
		$mysql_qry = "SET FOREIGN_KEY_CHECKS=1;";
		if($conn->query($mysql_qry) === TRUE){
			echo "Udalo sie!";
		}else{
			//echo "Error: " . $mysql_qry . "<br>" . $conn->error;
			echo "Co� si� popsu�o u Nas. Spr�buj si� zalogowa� na nowo utworzone konto, ale mo�e si� okaza� �e nie dzia�a :c";
		}
	}else{
		//echo "Error: " . $mysql_qry . "<br>" . $conn->error;
		echo "Zmien dane, ktos juz takie podal :c";
	}
}else{
	//echo "Error: " . $mysql_qry . "<br>" . $conn->error;
	echo "Co� po Naszej stronie szwankuje. Przepraszamy za utrudnienia. Spr�buj za chwilk�!";
}
$conn->close();
?>