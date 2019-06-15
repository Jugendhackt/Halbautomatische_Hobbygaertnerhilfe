<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//DE">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1252"/>				
	<title>Luftfeuchtigkeit</title>
</head>
<body lang="de-DE" dir="ltr">
<A HREF="javascript:history.go(0)">Seite aktualisieren</A>
<?php

require ($_SERVER['DOCUMENT_ROOT']."/config.php");


$mysql_table = "hofwetter";
$sql = "SELECT datum4, Hhof FROM ".$mysql_table." WHERE MOD(id, 1) = 0 ORDER BY datum4 DESC LIMIT 1440";
$query = mysql_query($sql);


echo '<table border=1 align=center>';
	echo '<tr>';
		echo '<th width=180 align="center">Zeitstempel</th>';
		echo '<th width=180 align="center">Luftfeuchtigkeit</th>';		
	echo '<tr>';
	echo '<tr>';
		echo '<th align="center">Datum / Uhrzeit</th>';
		echo '<th align="center">%</th>';		
	echo '<tr>';
while($fetch = mysql_fetch_assoc($query))


{
		echo '<tr>';
			echo '<td align="center">' . $fetch['datum4'] . '</td>';
			echo '<td align="center">' . $fetch['Hhof'] . '</td>';

}
echo '</table>';


?>
