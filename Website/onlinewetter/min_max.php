<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//DE">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1252"/>
	<meta http-equiv="refresh" content="15">
	
	<title>Extremwerte</title>
</head>
<body lang="de-DE" dir="ltr">

<?php
require ($_SERVER['DOCUMENT_ROOT']."/config.php");

$query1 = "SELECT datum3, MIN(`id`) AS `min_val3` FROM wetter GROUP BY id LIMIT 1"; 
 
$result1 = mysql_query($query1) or die(mysql_error());


while($row1 = mysql_fetch_array($result1))
{
  
  echo '<table border=0 align=right>';
	echo '<tr>';
	echo '<th align="right" width=300 height=50>Extremwerte seit</th>';
	echo '<th align="left" width=280>' . $row1['datum3'] . '</th>';
	echo '<th align="center" width=20></th>';
		
				
	echo '<tr>';
}


$query = "SELECT datum1, max(kmh) FROM wind GROUP BY kmh DESC LIMIT 1"; 
	 
$result = mysql_query($query) or die(mysql_error());


while($row = mysql_fetch_array($result))
{
 
  echo '<table border=1 align=right>';
	echo '<tr>';
	echo '<th align="center" width=320 height=50>Maximale Windgeschwindigkeit in km/h</th>';
	echo '<th align="center" width=80>' . $row['max(kmh)'] . '</th>';
	echo '<th align="center" width=200>' . $row['datum1'] . '</th>';
		
				
	echo '<tr>';
}

$query1 = "SELECT datum3, MIN(`T`) AS `min_val` FROM wetter GROUP BY T LIMIT 1"; 
 
$result1 = mysql_query($query1) or die(mysql_error());


while($row1 = mysql_fetch_array($result1))
{
  
  echo '<table border=1 align=right>';
	echo '<tr>';
	echo '<th align="center" width=320 height=50>Tiefsttemperatur in &deg;C</th>';
	echo '<th align="center" width=80>' . $row1['min_val'] . '</th>';
	echo '<th align="center" width=200>' . $row1['datum3'] . '</th>';
		
				
	echo '<tr>';
}


$query2 = "SELECT datum3, max(T) FROM wetter GROUP BY T DESC LIMIT 1"; 
	 
$result2 = mysql_query($query2) or die(mysql_error());


while($row2 = mysql_fetch_array($result2))
{
  
	echo '<table border=1 align=right>';
	echo '<tr>';
	echo '<th align="center" width=320 height=50>H&ouml;chsttemperatur in &deg;C</th>';
	echo '<th align="center" width=80>' . $row2['max(T)'] . '</th>';
	echo '<th align="center" width=200>' . $row2['datum3'] . '</th>';
		
				
	echo '<tr>';
}
$query1 = "SELECT datum3, MIN(`p0`) AS `min_val2` FROM wetter GROUP BY p0 LIMIT 1"; 
 
$result1 = mysql_query($query1) or die(mysql_error());


while($row1 = mysql_fetch_array($result1))
{
  
  echo '<table border=1 align=right>';
	echo '<tr>';
	echo '<th align="center" width=320 height=50>Tiefster Luftdruck NN in hPa</th>';
	echo '<th align="center" width=80>' . $row1['min_val2'] . '</th>';
	echo '<th align="center" width=200>' . $row1['datum3'] . '</th>';
		
				
	echo '<tr>';
}


$query2 = "SELECT datum3, max(p0) FROM wetter GROUP BY p0 DESC LIMIT 1"; 
	 
$result2 = mysql_query($query2) or die(mysql_error());


while($row2 = mysql_fetch_array($result2))
{
  
	echo '<table border=1 align=right>';
	echo '<tr>';
	echo '<th align="center" width=320 height=50>H&ouml;chster Luftdruck NN in hPa</th>';
	echo '<th align="center" width=80>' . $row2['max(p0)'] . '</th>';
	echo '<th align="center" width=200>' . $row2['datum3'] . '</th>';
		
				
	echo '<tr>';
}


$query1 = "SELECT datum3, MIN(`h`) AS `min_val4` FROM wetter GROUP BY h LIMIT 1"; 
 
$result1 = mysql_query($query1) or die(mysql_error());


while($row1 = mysql_fetch_array($result1))
{
  
  echo '<table border=1 align=right>';
	echo '<tr>';
	echo '<th align="center" width=320 height=50>Geringste Luftfeuchtigkeit in %</th>';
	echo '<th align="center" width=80>' . $row1['min_val4'] . '</th>';
	echo '<th align="center" width=200>' . $row1['datum3'] . '</th>';
		
				
	echo '<tr>';
}
?>
</body>
</html>
