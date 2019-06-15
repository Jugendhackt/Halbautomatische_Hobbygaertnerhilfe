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
$mysql_table2 = "wetter";
$sql = "SELECT T, h, p0, regen, N, S, O, W FROM ".$mysql_table2." ORDER BY datum2 DESC LIMIT 1";
$query2 = mysql_query($sql);

while($fetch1 = mysql_fetch_assoc($query1))
while($fetch2 = mysql_fetch_assoc($query2)){
echo '<table border=1 align=center>';	
	echo '<tr>';
	echo '<th align="center" width=300 height=25>Temperatur in °C</th>';
	echo '<td align="center" width=200>' . $fetch2['T'] . '</td>';
	echo '<tr>';
	echo '<tr>';
	echo '<th align="center" height=30>Luftfeuchtigkeit in %</th>';
	echo '<td align="center">' . $fetch2['h'] . '</td>';
	echo '<tr>';
	echo '<th align="center" height=30>Luftdruck NN in hPa</th>';
	echo '<td align="center">' . $fetch2['p0'] . '</td>';
	echo '<tr>';
	echo '<tr>';
	echo '<th align="center" height=30>Niederschlag</th>';
if ($fetch2['regen'] < 6)
{
                        echo '<td align="center">- - - </td>';
}
elseif ($fetch2['regen'] > 5 && $fetch2['regen'] < 400)
{
                        echo '<td align="center">gering</td>';
}
elseif ($fetch2['regen'] > 399 && $fetch2['regen'] < 700)
{
                        echo '<td align="center">mäßig</td>';
}
elseif ($fetch2['regen'] > 699)
{
                        echo '<td align="center">stark</td>';
}
	echo '<tr>';
	echo '<tr>';
	echo '<th align="center" height=30>Windrichtung</th>';
if ($fetch2['N'] < 5 && $fetch2['S'] > 4 && $fetch2['O'] < 5 && $fetch2['W'] > 4)
{
                        echo '<td align="center">Nordost</td>';
}
elseif ($fetch2['N'] > 4 && $fetch2['S'] > 4 && $fetch2['O'] < 5 && $fetch2['W'] > 4)
{
                        echo '<td align="center">Ost</td>';
}
elseif ($fetch2['N'] > 4 && $fetch2['S'] < 5 && $fetch2['O'] < 5 && $fetch2['W'] > 4)
{
                        echo '<td align="center">Südost</td>';
}
elseif ($fetch2['N'] > 4 && $fetch2['S'] < 5 && $fetch2['O'] > 4 && $fetch2['W'] > 4)
{
                        echo '<td align="center">Süd</td>';
}
elseif ($fetch2['N'] > 4 && $fetch2['S'] < 5 && $fetch2['O'] > 4 && $fetch2['W'] < 5)
{
                        echo '<td align="center">Südwest</td>';
}
elseif ($fetch2['N'] > 4 && $fetch2['S'] > 4 && $fetch2['O'] > 4 && $fetch2['W'] < 5)
{
                        echo '<td align="center">West</td>';
}
elseif ($fetch2['N'] < 5 && $fetch2['S'] > 4 && $fetch2['O'] > 4 && $fetch2['W'] < 5)
{
                        echo '<td align="center">Nordwest</td>';
}
elseif ($fetch2['N'] < 5 && $fetch2['S'] > 4 && $fetch2['O'] > 4 && $fetch2['W'] > 4)
{
                        echo '<td align="center">Nord</td>';
}

	echo '<tr>';
echo '<tr>';
		echo '<th align="center" height=30>Windgeschwindigkeit in m/s</th>';
		echo '<td align="center">' . $fetch1['ms'] . '</td>';		
	echo '<tr>';
	echo '<tr>';
		echo '<th align="center" height=30>Windgeschwindigkeit in km/h</th>';
		echo '<td align="center">' . $fetch1['kmh'] . '</td>';		
	echo '<tr>';
	echo '<tr>';
		echo '<th align="center" height=30>Windstärke in Bft</th>';
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

$old_timestamp = $fetch1['datum1'];
//if( (time() - $old_timestamp) > 7200 ){
  echo time();
  echo . $fetch['datum1'] .;
  echo 'Eine Stunde ist vorrüber';
}
?>
