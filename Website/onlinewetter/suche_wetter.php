<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//DE">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1252"/>				
	<title>Suche</title>
</head>
<body lang="de-DE" dir="ltr">

<?php 
$datum = $_POST['datum'];
require ($_SERVER['DOCUMENT_ROOT']."/config.php");

$mysql_table = "wetter";


 
 //$datum = "9";

$sql = "SELECT datum3, T, h, p0, regen FROM ".$mysql_table." WHERE datum3 LIKE '$datum%'";
$query = mysql_query($sql);

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
while($fetch = mysql_fetch_assoc($query)){
		echo '<tr>';
			echo '<td align="center">' . $fetch['datum3'] . '</td>';
			echo '<td align="center">' . $fetch['T'] . '</td>';
			echo '<td align="center">' . $fetch['h'] . '</td>';
			echo '<td align="center">' . $fetch['p0'] . '</td>';
			echo '<td align="center">' . $fetch['regen'] . '</td>';

}
echo '</table>';
?>  
 
</html>