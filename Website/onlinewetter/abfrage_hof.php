<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//DE">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1252"/>
	<meta http-equiv="refresh" content="30">
	
	<title>Hofwetter</title>
</head>
<body lang="de-DE" dir="ltr">
<?php

require ($_SERVER['DOCUMENT_ROOT']."/config.php");


$mysql_table = "hofwetter";

$sql = "SELECT datum4, Thof, Phof, Hhof FROM ".$mysql_table." ORDER BY datum4 DESC LIMIT 240";
$query = mysql_query($sql);


echo '<table border=1 align=center>';
	echo '<tr>';
		echo '<th align="center">Datum / Uhrzeit</th>';
		echo '<th align="center">Temperatur in &deg;C</th>';
		echo '<th align="center">Luftdruck in hPa</th>';
		echo '<th align="center">Luftfeuchte in %</th>';
		
	echo '<tr>';
while($fetch = mysql_fetch_assoc($query)){
		echo '<tr>';
			echo '<td align="center">' . $fetch['datum4'] . '</td>';
			echo '<td align="center">' . $fetch['Thof'] . '</td>';
			echo '<td align="center">' . $fetch['Phof'] . '</td>';
			echo '<td align="center">' . $fetch['Hhof'] . '</td>';

}
echo '</table>';


?>
