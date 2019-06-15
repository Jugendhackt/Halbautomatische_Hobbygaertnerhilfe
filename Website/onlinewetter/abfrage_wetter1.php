<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//DE">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1252"/>
	<meta http-equiv="refresh" content="30">
	
	<title>Aktuelle Werte</title>
</head>
<body lang="de-DE" dir="ltr">
<?php

require ($_SERVER['DOCUMENT_ROOT']."/config.php");


$mysql_table = "wetter";

$sql = "SELECT datum2, T, h, p0, regen, N, S, O, W FROM ".$mysql_table." ORDER BY datum2 DESC LIMIT 240";
$query = mysql_query($sql);


echo '<table border=1 align=center>';
	echo '<tr>';
		echo '<th align="center">Datum / Uhrzeit</th>';
		echo '<th align="center">Temperatur in °C</th>';
		echo '<th align="center">Luftfeuchtigkeit in %</th>';
		echo '<th align="center">Luftdruck NN in hPa</th>';
		echo '<th align="center">Niederschlag</th>';
		echo '<th align="center">Windrichtung</th>';
		
	echo '<tr>';
while($fetch = mysql_fetch_assoc($query)){
		echo '<tr>';
			echo '<td align="center">' . $fetch['datum2'] . '</td>';
			echo '<td align="center">' . $fetch['T'] . '</td>';
			echo '<td align="center">' . $fetch['h'] . '</td>';
			echo '<td align="center">' . $fetch['p0'] . '</td>';
if ($fetch['regen'] < 1)
{
                        echo '<td align="center">- - -</td>';
}
elseif ($fetch['regen'] > 0 && $fetch['regen'] < 100)
{
                        echo '<td align="center">gering</td>';
}
elseif ($fetch['regen'] > 99 && $fetch['regen'] < 200)
{
                        echo '<td align="center">m&auml;&szlig;ig</td>';
}
elseif ($fetch['regen'] > 199)
{
                        echo '<td align="center">stark</td>';
}


}
echo '</table>';


?>
