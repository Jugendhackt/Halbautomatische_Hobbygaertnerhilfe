<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//DE">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1252"/>
	
	
	<title>Suche</title>
</head>
<body lang="de-DE" dir="ltr">
<h2 align="center">Suchfunktion</h2>
<?php
require ($_SERVER['DOCUMENT_ROOT']."/config.php");

$query1 = "SELECT datum3, MIN(`id`) AS `min_val3` FROM wetter GROUP BY id LIMIT 1"; 
 
$result1 = mysql_query($query1) or die(mysql_error());


while($row1 = mysql_fetch_array($result1))
{
  
  echo '<table border=0 align=right>';
	echo '<tr>';
	echo '<tr>';
	echo '<tr>';
	echo '<tr>';
	echo '<tr>';
	echo '<th align="right" width=500 height=50>Wetterwerte sind verf&uuml;gbar ab dem:</th>';
	echo '<th align="left" width=280>' . $row1['datum3'] . '</th>';
	echo '<th align="center" width=20></th>';
		
				
	echo '<tr>';
}
?>
<p><h4> Werte f&uuml;r Temperatur, Luftfeuchtigkeit, Luftdruck und Niederschlagsintensit&auml;t eines Tages</h4></p> 
<form action="suche_wetter.php" method="post">
<input type="date" data-date="" data-date-format="DD MMMM YYYY" name="datum">
<input type="submit" value="Suche starten">
</form>


<br/>
<br/>  

<p><h4> Windgeschwindigkeitswerte eines Tages</h4></p> 
<form action="suche_windgeschwindigkeit.php" method="post">
<input type="date" data-date="" data-date-format="DD MMMM YYYY" name="datum">
<input type="submit" value="Suche starten">
</form>


<br/>
<br/>  
 
<p> <h4> Windrichtungwerte eines Tages</h4></p> 
<form action="suche_windrichtung.php" method="post">
<input type="date" data-date="" data-date-format="DD MMMM YYYY" name="datum">
<input type="submit" value="Suche starten">
</form>


<br/>
<br/>  
 
<p> <h4> Extremwerte eines Tages</h4></p> 
<form action="suche_min_max.php" method="post">
<input type="date" data-date="" data-date-format="DD MMMM YYYY" name="datum">
<input type="submit" value="Suche starten">
</form>
</body>
</html>
