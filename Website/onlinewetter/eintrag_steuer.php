<?php
$mysql_host = "localhost";
$mysql_db   = "onlinewetter";
$mysql_user = "onlinewetter";
$mysql_pw   = "funduino";
isset($_GET['Ts']) ? $Ts=$_GET['Ts'] : $Ts='';
isset($_GET['Ps']) ? $Ps=$_GET['Ps'] : $Ps='';

 
$connection = mysql_connect($mysql_host, $mysql_user, $mysql_pw) or die("Verbindung zur Datenbank fehlgeschlagen.");
mysql_select_db($mysql_db, $connection) or die("Datenbank konnte nicht ausgewaehlt werden.");
$insert_data = "INSERT INTO steuerung (Ts, Ps) VALUES ($Ts, $Ps)";
mysql_query($insert_data, $connection) or die("Fehler beim Eintragen der Daten in die Datenbank!");
?>