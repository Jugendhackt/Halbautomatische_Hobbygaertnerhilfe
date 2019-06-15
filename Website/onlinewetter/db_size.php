<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//DE">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1252"/>
	<meta http-equiv="refresh" content="30">
	
	<title>Wetter-Werte der letzten 2 Stunden</title>
</head>
<body lang="de-DE" dir="ltr">
<?php

require ($_SERVER['DOCUMENT_ROOT']."/config.php");
 
function db_size($onlinewetter) { 

// Anfrage definieren 
$sql = "SHOW TABLE STATUS FROM " . $onlinewetter; 

// Anfragen und bei Misserfolg abbrechen 
if($query = @mysql_query($sql)) { 

// Ergebnis per mysql_fetch_array holen 
while($result = @mysql_fetch_array($query)) { 

// Ergebnis in ein Array einlesen 
$tabledata[] = $result; 

} 

// Variabel initialisieren und Größe auf 0 setzen 
$db_size = 0; 

// Solange die Größe auffüllen, bis alle Tabellen durch sind 
for($i=0; $i<count($tabledata); $i++) { 

$db_size += $tabledata[$i]["Data_length"] + $tabledata[$i]["Index_length"]; 

} 

return $db_size; 

} 
else { 

return "MySQL Query fehlgeschlagen!"; 

} 

} 

?>

