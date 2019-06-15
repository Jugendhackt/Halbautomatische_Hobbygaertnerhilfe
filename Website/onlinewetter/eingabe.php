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

<table border=1  align="center">
  <tr>
    <th>Was wird gesucht</th>
    <th>Wann</th>
    <th>Los geht's</th>
  </tr>
  <tr>
    <td width=150 >Alles au&szlig;er Wind</td>
    <td width=150 ><form action="suche_wetter.php" method="post">
<input type="date" data-date="" data-date-format="DD MMMM YYYY" name="datum"></td>
    <td width=150><input type="submit" value="Suche starten">
</form></td>
   </tr>
   <tr>
     <td>Windgeschwindigkeit</td>
     <td><form action="suche_windgeschwindigkeit.php" method="post">
<input type="date" data-date="" data-date-format="DD MMMM YYYY" name="datum"></td>
     <td><input type="submit" value="Suche starten">
</form></td>
   </tr>
   <tr>
     <td>Windrichtung</td>
     <td><form action="suche_windrichtung.php" method="post">
<input type="date" data-date="" data-date-format="DD MMMM YYYY" name="datum"></td>
     <td><input type="submit" value="Suche starten">
</form></td>
   </tr>
   <tr>
     <td>Extremwerte</td>
     <td><form action="suche_min_max.php" method="post">
<input type="date" data-date="" data-date-format="DD MMMM YYYY" name="datum"></td>
     <td><input type="submit" value="Suche starten">
</form></td>
   </tr>
</table>



</body>
</html>
