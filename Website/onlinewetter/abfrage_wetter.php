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


$mysql_table = "wetter";

$sql = "SELECT datum3, T, h, p0, regen, Nno, Ono, Oso, Sso, Ssw, Wsw, Wnw, Nnw FROM ".$mysql_table." ORDER BY datum3 DESC LIMIT 240";
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
			echo '<td align="center">' . $fetch['datum3'] . '</td>';
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
if ($fetch['Nno'] == 0 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">NNO</td>';
}
elseif ($fetch['Nno'] == 0 && $fetch['Ono'] == 0 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">NO</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 0 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">ONO</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 0 && $fetch['Oso'] == 0 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">O</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 0 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">OSO</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 0 && $fetch['Sso'] == 0 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">SO</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 0 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">SSO</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 0 && $fetch['Ssw'] == 0 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">S</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 0 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">SSW</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 0 && $fetch['Wsw'] == 0 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">SW</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 0 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">WSW</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 0 && $fetch['Wnw'] == 0 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">W</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 0 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">WNW</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 0 && $fetch['Nnw'] == 0)
{
                        echo '<td align="center">NW</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 0)
{
                        echo '<td align="center">NNW</td>';
}
elseif ($fetch['Nno'] == 0 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 0)
{
                        echo '<td align="center">N</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">Fehler</td>';
}
elseif ($fetch['Nno'] == 0 && $fetch['Ono'] == 0 && $fetch['Oso'] == 0 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">ONO</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 0 && $fetch['Oso'] == 0 && $fetch['Sso'] == 0 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">OSO</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 0 && $fetch['Sso'] == 0 && $fetch['Ssw'] == 0 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">SSO</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 0 && $fetch['Ssw'] == 0 && $fetch['Wsw'] == 0 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">SSW</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 0 && $fetch['Wsw'] == 0 && $fetch['Wnw'] == 0 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">WSW</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 0 && $fetch['Wnw'] == 0 && $fetch['Nnw'] == 0)
{
                        echo '<td align="center">WNW</td>';
}
elseif ($fetch['Nno'] == 0 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 0 && $fetch['Nnw'] == 0)
{
                        echo '<td align="center">NNW</td>';
}
elseif ($fetch['Nno'] == 0 && $fetch['Ono'] == 0 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 0)
{
                        echo '<td align="center">NNO</td>';
}
}
echo '</table>';


?>
