<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//DE">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1252"/>
	<meta http-equiv="refresh" content="15">
	
	<title>Aktuelle Werte</title>
</head>
<body lang="de-DE" dir="ltr">
<?php

require ($_SERVER['DOCUMENT_ROOT']."/config.php");

$mysql_table1 = "wind";
$sql = "SELECT datum1, ms, kmh  FROM ".$mysql_table1." ORDER BY datum1 DESC LIMIT 1";
$query1 = mysql_query($sql);
$mysql_table2 = "richtung";
$sql = "SELECT Nno, Ono, Oso, Sso, Ssw, Wsw, Wnw, Nnw FROM ".$mysql_table2." ORDER BY datum2 DESC LIMIT 1";
$query2 = mysql_query($sql);
$mysql_table3 = "wetter";
$sql = "SELECT h, p0, regen FROM ".$mysql_table3." ORDER BY datum3 DESC LIMIT 1";
$query3 = mysql_query($sql);
$mysql_table4 = "hofwetter";
$sql = "SELECT Hhof, Thof FROM ".$mysql_table4." ORDER BY datum4 DESC LIMIT 1";
$query4 = mysql_query($sql);

while($fetch1 = mysql_fetch_assoc($query1))
while($fetch2 = mysql_fetch_assoc($query2))
while($fetch3 = mysql_fetch_assoc($query3))
while($fetch4 = mysql_fetch_assoc($query4))

{
echo '<table border=1 align=center width=100%>';	
	echo '<tr>';
	echo '<th align="center" width=500 height=80>Temperatur in &deg;C</th>';
	echo '<td align="center" width=300>' . $fetch4['Thof'] . '</td>';
	echo '<tr>';
	echo '<tr>';
	echo '<th align="center" height=50>Luftfeuchtigkeit in %</th>';
	echo '<td align="center">' . $fetch4['Hhof'] . '</td>';
	echo '<tr>';
	echo '<th align="center" height=50>Luftdruck NN in hPa</th>';
	echo '<td align="center">' . $fetch3['p0'] . '</td>';
	echo '<tr>';
	echo '<tr>';
	echo '<th align="center" height=50>Niederschlag</th>';
if ($fetch3['regen'] < 1)
{
                        echo '<td align="center">- - - </td>';
}
elseif ($fetch3['regen'] > 0 && $fetch3['regen'] < 100)
{
                        echo '<td align="center">gering</td>';
}
elseif ($fetch3['regen'] > 99 && $fetch3['regen'] < 200)
{
                        echo '<td align="center">m&auml;&szlig;ig</td>';
}
elseif ($fetch3['regen'] > 199)
{
                        echo '<td align="center">stark</td>';
}
	echo '<tr>';
	echo '<tr>';
	echo '<th align="center" height=50>Windrichtung</th>';
	
if ($fetch2['Nno'] == 0 && $fetch2['Ono'] == 1 && $fetch2['Oso'] == 1 && $fetch2['Sso'] == 1 && $fetch2['Ssw'] == 1 && $fetch2['Wsw'] == 1 && $fetch2['Wnw'] == 1 && $fetch2['Nnw'] == 1)
{
                        echo '<td align="center">NNO</td>';
}
elseif ($fetch2['Nno'] == 0 && $fetch2['Ono'] == 0 && $fetch2['Oso'] == 1 && $fetch2['Sso'] == 1 && $fetch2['Ssw'] == 1 && $fetch2['Wsw'] == 1 && $fetch2['Wnw'] == 1 && $fetch2['Nnw'] == 1)
{
                        echo '<td align="center">NO</td>';
}
elseif ($fetch2['Nno'] == 1 && $fetch2['Ono'] == 0 && $fetch2['Oso'] == 1 && $fetch2['Sso'] == 1 && $fetch2['Ssw'] == 1 && $fetch2['Wsw'] == 1 && $fetch2['Wnw'] == 1 && $fetch2['Nnw'] == 1)
{
                        echo '<td align="center">ONO</td>';
}
elseif ($fetch2['Nno'] == 1 && $fetch2['Ono'] == 0 && $fetch2['Oso'] == 0 && $fetch2['Sso'] == 1 && $fetch2['Ssw'] == 1 && $fetch2['Wsw'] == 1 && $fetch2['Wnw'] == 1 && $fetch2['Nnw'] == 1)
{
                        echo '<td align="center">O</td>';
}
elseif ($fetch2['Nno'] == 1 && $fetch2['Ono'] == 1 && $fetch2['Oso'] == 0 && $fetch2['Sso'] == 1 && $fetch2['Ssw'] == 1 && $fetch2['Wsw'] == 1 && $fetch2['Wnw'] == 1 && $fetch2['Nnw'] == 1)
{
                        echo '<td align="center">OSO</td>';
}
elseif ($fetch2['Nno'] == 1 && $fetch2['Ono'] == 1 && $fetch2['Oso'] == 0 && $fetch2['Sso'] == 0 && $fetch2['Ssw'] == 1 && $fetch2['Wsw'] == 1 && $fetch2['Wnw'] == 1 && $fetch2['Nnw'] == 1)
{
                        echo '<td align="center">SO</td>';
}
elseif ($fetch2['Nno'] == 1 && $fetch2['Ono'] == 1 && $fetch2['Oso'] == 1 && $fetch2['Sso'] == 0 && $fetch2['Ssw'] == 1 && $fetch2['Wsw'] == 1 && $fetch2['Wnw'] == 1 && $fetch2['Nnw'] == 1)
{
                        echo '<td align="center">SSO</td>';
}
elseif ($fetch2['Nno'] == 1 && $fetch2['Ono'] == 1 && $fetch2['Oso'] == 1 && $fetch2['Sso'] == 0 && $fetch2['Ssw'] == 0 && $fetch2['Wsw'] == 1 && $fetch2['Wnw'] == 1 && $fetch2['Nnw'] == 1)
{
                        echo '<td align="center">S</td>';
}
elseif ($fetch2['Nno'] == 1 && $fetch2['Ono'] == 1 && $fetch2['Oso'] == 1 && $fetch2['Sso'] == 1 && $fetch2['Ssw'] == 0 && $fetch2['Wsw'] == 1 && $fetch2['Wnw'] == 1 && $fetch2['Nnw'] == 1)
{
                        echo '<td align="center">SSW</td>';
}
elseif ($fetch2['Nno'] == 1 && $fetch2['Ono'] == 1 && $fetch2['Oso'] == 1 && $fetch2['Sso'] == 1 && $fetch2['Ssw'] == 0 && $fetch2['Wsw'] == 0 && $fetch2['Wnw'] == 1 && $fetch2['Nnw'] == 1)
{
                        echo '<td align="center">SW</td>';
}
elseif ($fetch2['Nno'] == 1 && $fetch2['Ono'] == 1 && $fetch2['Oso'] == 1 && $fetch2['Sso'] == 1 && $fetch2['Ssw'] == 1 && $fetch2['Wsw'] == 0 && $fetch2['Wnw'] == 1 && $fetch2['Nnw'] == 1)
{
                        echo '<td align="center">WSW</td>';
}
elseif ($fetch2['Nno'] == 1 && $fetch2['Ono'] == 1 && $fetch2['Oso'] == 1 && $fetch2['Sso'] == 1 && $fetch2['Ssw'] == 1 && $fetch2['Wsw'] == 0 && $fetch2['Wnw'] == 0 && $fetch2['Nnw'] == 1)
{
                        echo '<td align="center">W</td>';
}
elseif ($fetch2['Nno'] == 1 && $fetch2['Ono'] == 1 && $fetch2['Oso'] == 1 && $fetch2['Sso'] == 1 && $fetch2['Ssw'] == 1 && $fetch2['Wsw'] == 1 && $fetch2['Wnw'] == 0 && $fetch2['Nnw'] == 1)
{
                        echo '<td align="center">WNW</td>';
}
elseif ($fetch2['Nno'] == 1 && $fetch2['Ono'] == 1 && $fetch2['Oso'] == 1 && $fetch2['Sso'] == 1 && $fetch2['Ssw'] == 1 && $fetch2['Wsw'] == 1 && $fetch2['Wnw'] == 0 && $fetch2['Nnw'] == 0)
{
                        echo '<td align="center">NW</td>';
}
elseif ($fetch2['Nno'] == 1 && $fetch2['Ono'] == 1 && $fetch2['Oso'] == 1 && $fetch2['Sso'] == 1 && $fetch2['Ssw'] == 1 && $fetch2['Wsw'] == 1 && $fetch2['Wnw'] == 1 && $fetch2['Nnw'] == 0)
{
                        echo '<td align="center">NNW</td>';
}
elseif ($fetch2['Nno'] == 0 && $fetch2['Ono'] == 1 && $fetch2['Oso'] == 1 && $fetch2['Sso'] == 1 && $fetch2['Ssw'] == 1 && $fetch2['Wsw'] == 1 && $fetch2['Wnw'] == 1 && $fetch2['Nnw'] == 0)
{
                        echo '<td align="center">N</td>';
}
elseif ($fetch2['Nno'] == 1 && $fetch2['Ono'] == 1 && $fetch2['Oso'] == 1 && $fetch2['Sso'] == 1 && $fetch2['Ssw'] == 1 && $fetch2['Wsw'] == 1 && $fetch2['Wnw'] == 1 && $fetch2['Nnw'] == 1)
{
                        echo '<td align="center">Fehler</td>';
}
elseif ($fetch2['Nno'] == 0 && $fetch2['Ono'] == 0 && $fetch2['Oso'] == 0 && $fetch2['Sso'] == 1 && $fetch2['Ssw'] == 1 && $fetch2['Wsw'] == 1 && $fetch2['Wnw'] == 1 && $fetch2['Nnw'] == 1)
{
                        echo '<td align="center">ONO</td>';
}
elseif ($fetch2['Nno'] == 1 && $fetch2['Ono'] == 0 && $fetch2['Oso'] == 0 && $fetch2['Sso'] == 0 && $fetch2['Ssw'] == 1 && $fetch2['Wsw'] == 1 && $fetch2['Wnw'] == 1 && $fetch2['Nnw'] == 1)
{
                        echo '<td align="center">OSO</td>';
}
elseif ($fetch2['Nno'] == 1 && $fetch2['Ono'] == 1 && $fetch2['Oso'] == 0 && $fetch2['Sso'] == 0 && $fetch2['Ssw'] == 0 && $fetch2['Wsw'] == 1 && $fetch2['Wnw'] == 1 && $fetch2['Nnw'] == 1)
{
                        echo '<td align="center">SSO</td>';
}
elseif ($fetch2['Nno'] == 1 && $fetch2['Ono'] == 1 && $fetch2['Oso'] == 1 && $fetch2['Sso'] == 0 && $fetch2['Ssw'] == 0 && $fetch2['Wsw'] == 0 && $fetch2['Wnw'] == 1 && $fetch2['Nnw'] == 1)
{
                        echo '<td align="center">SSW</td>';
}
elseif ($fetch2['Nno'] == 1 && $fetch2['Ono'] == 1 && $fetch2['Oso'] == 1 && $fetch2['Sso'] == 1 && $fetch2['Ssw'] == 0 && $fetch2['Wsw'] == 0 && $fetch2['Wnw'] == 0 && $fetch2['Nnw'] == 1)
{
                        echo '<td align="center">WSW</td>';
}
elseif ($fetch2['Nno'] == 1 && $fetch2['Ono'] == 1 && $fetch2['Oso'] == 1 && $fetch2['Sso'] == 1 && $fetch2['Ssw'] == 1 && $fetch2['Wsw'] == 0 && $fetch2['Wnw'] == 0 && $fetch2['Nnw'] == 0)
{
                        echo '<td align="center">WNW</td>';
}
elseif ($fetch2['Nno'] == 0 && $fetch2['Ono'] == 1 && $fetch2['Oso'] == 1 && $fetch2['Sso'] == 1 && $fetch2['Ssw'] == 1 && $fetch2['Wsw'] == 1 && $fetch2['Wnw'] == 0 && $fetch2['Nnw'] == 0)
{
                        echo '<td align="center">NNW</td>';
}
elseif ($fetch2['Nno'] == 0 && $fetch2['Ono'] == 0 && $fetch2['Oso'] == 1 && $fetch2['Sso'] == 1 && $fetch2['Ssw'] == 1 && $fetch2['Wsw'] == 1 && $fetch2['Wnw'] == 1 && $fetch2['Nnw'] == 0)
{
                        echo '<td align="center">NNO</td>';
}
	echo '<tr>';
echo '<tr>';
		echo '<th align="center" height=50>Windgeschwindigkeit in m/s</th>';
		echo '<td align="center">' . $fetch1['ms'] . '</td>';		
	echo '<tr>';
	echo '<tr>';
		echo '<th align="center" height=50>Windgeschwindigkeit in km/h</th>';
		echo '<td align="center">' . $fetch1['kmh'] . '</td>';		
	echo '<tr>';
	echo '<tr>';
		echo '<th align="center" height=50>Windst&auml;rke in Bft</th>';
if ($fetch1['ms'] < 0.3)
{
                        echo '<td align="center">0</td>';
}
elseif ($fetch1['ms'] > 0.29 && $fetch1['ms'] < 1.60)
{
                        echo '<td align="center">1</td>';
}
elseif ($fetch1['ms'] > 1.59 && $fetch1['ms'] < 3.40)
{
                        echo '<td align="center">2</td>';
}
elseif ($fetch1['ms'] > 3.39 && $fetch1['ms'] < 5.50)
{
                        echo '<td align="center">3</td>';
}
elseif ($fetch1['ms'] > 5.49 && $fetch1['ms'] < 8.00)
{
                        echo '<td align="center">4</td>';
}
elseif ($fetch1['ms'] > 7.99 && $fetch1['ms'] < 10.80)
{
                        echo '<td align="center">5</td>';
}
elseif ($fetch1['ms'] > 10.79 && $fetch1['ms'] < 13.90)
{
                        echo '<td align="center">6</td>';
}
elseif ($fetch1['ms'] > 13.89 && $fetch1['ms'] < 17.20)
{
                        echo '<td align="center">7</td>';
}
elseif ($fetch1['ms'] > 17.19 && $fetch1['ms'] < 20.80)
{
                        echo '<td align="center">8</td>';
}
elseif ($fetch1['ms'] > 20.79 && $fetch1['ms'] < 24.50)
{
                        echo '<td align="center">9</td>';
}
elseif ($fetch1['ms'] > 24.49 && $fetch1['ms'] < 28.50)
{
                        echo '<td align="center">10</td>';
}
elseif ($fetch1['ms'] > 28.49 && $fetch1['ms'] < 32.70)
{
                        echo '<td align="center">11</td>';
}
elseif ($fetch1['ms'] > 32.69)
{
                        echo '<td align="center">12</td>';
}		
echo '</table>';	
}
?>
