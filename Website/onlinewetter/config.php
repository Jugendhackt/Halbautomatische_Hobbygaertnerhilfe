<?php
$mysql_host = "localhost";
$mysql_db = "onlinewetter";
$mysql_user = "onlinewetter";
$mysql_pw = "funduino";
$connection = mysql_connect($mysql_host, $mysql_user, $mysql_pw) or die("Verbindung zur Datenbank fehlgeschlagen.");
mysql_select_db($mysql_db, $connection) or die("Datenbank konnte nicht ausgewaehlt werden.");
?>