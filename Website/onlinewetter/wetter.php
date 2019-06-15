<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//DE">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1252"/>				
	<title>Aktuelle Werte</title>
</head>
<body lang="de-DE" dir="ltr">
<A HREF="javascript:history.go(0)">Seite aktualisieren</A>
<?php

require ($_SERVER['DOCUMENT_ROOT']."/config.php");


$mysql_table = "wetter";
$sql = "SELECT datum3, T, h, p0, regen FROM ".$mysql_table." WHERE MOD(id, 1) = 0 ORDER BY datum3 DESC LIMIT 1440";
$query = mysql_query($sql);

$mysql_table2 = "hofwetter";
$sql = "SELECT Hhof FROM ".$mysql_table2." WHERE MOD(id, 1) = 0 ORDER BY datum4 DESC LIMIT 1440";
$query2 = mysql_query($sql);


echo '<table border=1 align=center>';
	echo '<tr>';
		echo '<th width=180 align="center">Zeitstempel</th>';
		echo '<th align="center">Temperatur</th>';
		echo '<th align="center">Luftfeuchtigkeit</th>';
		echo '<th align="center">Luftdruck NN</th>';
		echo '<th align="center">Niederschlag</th>';		
	echo '<tr>';
	echo '<tr>';
		echo '<th align="center">Datum / Uhrzeit</th>';
		echo '<th align="center">&deg;C</th>';
		echo '<th align="center">%</th>';
		echo '<th align="center">hPa</th>';
		echo '<th align="center">Intensität</th>';		
	echo '<tr>';
while($fetch = mysql_fetch_assoc($query))
while($fetch2 = mysql_fetch_assoc($query2))

{
		echo '<tr>';
			echo '<td align="center">' . $fetch['datum3'] . '</td>';
			echo '<td align="center">' . $fetch['T'] . '</td>';
			echo '<td align="center">' . $fetch2['Hhof'] . '</td>';
			echo '<td align="center">' . $fetch['p0'] . '</td>';
			echo '<td align="center">' . $fetch['regen'] . '</td>';

}
echo '</table>';


?>
