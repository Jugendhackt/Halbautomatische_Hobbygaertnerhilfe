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

$mysql_table = "wind";


$sql = "SELECT datum1, ms, kmh  FROM ".$mysql_table." WHERE datum1 LIKE '$datum%'";
$query = mysql_query($sql);

echo '<table border=1 align=center>';
	echo '<tr>';
		echo '<th align="center">     Zeitstempel    </th>';
		echo '<th colspan="2" align="center">Windgeschwindigkeit</th>';
        echo '<th align="center">Windst&auml;rke</th>';
		
	echo '<tr>';
	echo '<tr>';
		echo '<th width=180 align="center">     Datum / Uhrzeit     </th>';
		echo '<th width=100 align="center">m/s</th>';
		echo '<th width=100 align="center">km/h</th>';
        echo '<th width=100 align="center">Bft</th>';
		
	echo '<tr>';
while($fetch = mysql_fetch_assoc($query)){
		echo '<tr>';
			echo '<td align="center">' . $fetch['datum1'] . '</td>';				
			echo '<td align="center">' . $fetch['ms'] . '</td>';
			echo '<td align="center">' . $fetch['kmh'] . '</td>';
if ($fetch['ms'] < 0.3)
{
                        echo '<td align="center">0</td>';
}
elseif ($fetch['ms'] > 0.29 && $fetch['ms'] < 1.60)
{
                        echo '<td align="center">1</td>';
}
elseif ($fetch['ms'] > 1.59 && $fetch['ms'] < 3.40)
{
                        echo '<td align="center">2</td>';
}
elseif ($fetch['ms'] > 3.39 && $fetch['ms'] < 5.50)
{
                        echo '<td align="center">3</td>';
}
elseif ($fetch['ms'] > 5.49 && $fetch['ms'] < 8.00)
{
                        echo '<td align="center">4</td>';
}
elseif ($fetch['ms'] > 7.99 && $fetch['ms'] < 10.80)
{
                        echo '<td align="center">5</td>';
}
elseif ($fetch['ms'] > 10.79 && $fetch['ms'] < 13.90)
{
                        echo '<td align="center">6</td>';
}
elseif ($fetch['ms'] > 13.89 && $fetch['ms'] < 17.20)
{
                        echo '<td align="center">7</td>';
}
elseif ($fetch['ms'] > 17.19 && $fetch['ms'] < 20.80)
{
                        echo '<td align="center">8</td>';
}
elseif ($fetch['ms'] > 20.79 && $fetch['ms'] < 24.50)
{
                        echo '<td align="center">9</td>';
}
elseif ($fetch['ms'] > 24.49 && $fetch['ms'] < 28.50)
{
                        echo '<td align="center">10</td>';
}
elseif ($fetch['ms'] > 28.49 && $fetch['ms'] < 32.70)
{
                        echo '<td align="center">11</td>';
}
elseif ($fetch['ms'] > 32.69)
{
                        echo '<td align="center">12</td>';
}

		echo '</tr>';

}
echo '</table>';

?>
 
</html>