<?php
$mysql_host = "localhost";
$mysql_db   = "onlinewetter";
$mysql_user = "onlinewetter";
$mysql_pw   = "funduino";
isset($_GET['ms']) ? $ms=$_GET['ms'] : $ms='';
isset($_GET['kmh']) ? $kmh=$_GET['kmh'] : $kmh='';
 
$connection = mysql_connect($mysql_host, $mysql_user, $mysql_pw) or die("Verbindung zur Datenbank fehlgeschlagen.");
mysql_select_db($mysql_db, $connection) or die("Datenbank konnte nicht ausgewaehlt werden.");
$insert_data = "INSERT INTO wind (ms, kmh) VALUES ($ms, $kmh)";
mysql_query($insert_data, $connection) or die("Fehler beim Eintragen der Daten in die Datenbank!");
?>