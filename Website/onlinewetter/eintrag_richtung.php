<?php
$mysql_host = "localhost";
$mysql_db   = "onlinewetter";
$mysql_user = "onlinewetter";
$mysql_pw   = "funduino";

isset($_GET['Nno']) ? $Nno=$_GET['Nno'] : $Nno='';
isset($_GET['Ono']) ? $Ono=$_GET['Ono'] : $Ono='';
isset($_GET['Oso']) ? $Oso=$_GET['Oso'] : $Oso='';
isset($_GET['Sso']) ? $Sso=$_GET['Sso'] : $Sso='';
isset($_GET['Ssw']) ? $Ssw=$_GET['Ssw'] : $Ssw='';
isset($_GET['Wsw']) ? $Wsw=$_GET['Wsw'] : $Wsw='';
isset($_GET['Wnw']) ? $Wnw=$_GET['Wnw'] : $Wnw='';
isset($_GET['Nnw']) ? $Nnw=$_GET['Nnw'] : $Nnw='';
 
$connection = mysql_connect($mysql_host, $mysql_user, $mysql_pw) or die("Verbindung zur Datenbank fehlgeschlagen.");
mysql_select_db($mysql_db, $connection) or die("Datenbank konnte nicht ausgewaehlt werden.");
$insert_data = "INSERT INTO richtung (Nno, Ono, Oso, Sso, Ssw, Wsw, Wnw, Nnw) VALUES ($Nno, $Ono, $Oso, $Sso, $Ssw, $Wsw, $Wnw, $Nnw)";
mysql_query($insert_data, $connection) or die("Fehler beim Eintragen der Daten in die Datenbank!");
?>