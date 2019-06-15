<?php
$mysql_host = "localhost";
$mysql_db   = "onlinewetter";
$mysql_user = "onlinewetter";
$mysql_pw   = "funduino";
isset($_GET['T']) ? $T=$_GET['T'] : $T='';
isset($_GET['h']) ? $h=$_GET['h'] : $h='';
isset($_GET['p0']) ? $p0=$_GET['p0'] : $p0='';
isset($_GET['regen']) ? $regen=$_GET['regen'] : $regen='';
 
$connection = mysql_connect($mysql_host, $mysql_user, $mysql_pw) or die("Verbindung zur Datenbank fehlgeschlagen.");
mysql_select_db($mysql_db, $connection) or die("Datenbank konnte nicht ausgewaehlt werden.");
$insert_data = "INSERT INTO wetter (T, h, p0, regen) VALUES ($T, $h, $p0, $regen)";
mysql_query($insert_data, $connection) or die("Fehler beim Eintragen der Daten in die Datenbank!");
?>