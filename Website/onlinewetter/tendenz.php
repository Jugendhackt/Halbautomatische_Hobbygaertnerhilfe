<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//DE">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1252"/>
	<meta http-equiv="refresh" content="15">
	
	<title>Aktuelle Werte</title>
</head>
<body lang="de-DE" dir="ltr">

<h2 align="center">Aktuelle Wetterwerte von Baumgarten</h2>

<?php

require ($_SERVER['DOCUMENT_ROOT']."/config.php");



$mysql_table2 = "wetter";
$sql = "SELECT datum2, h, p0, ".$mysql_table2." ORDER BY datum2 DESC LIMIT 1";
$query2 = mysql_query($sql);


while($fetch2 = mysql_fetch_assoc($query2)){
echo '<table border=1 align=center>';	
	echo '<tr>';
	echo '<th align="center" width=300 height=25>Luftdruck in &deg;C</th>';
	echo '<td align="center" width=200>' . $fetch2[''] . '</td>';
	echo '<tr>';
	echo '<tr>';
	echo '<th align="center" height=30>Luftfeuchtigkeit in %</th>';
	echo '<td align="center">' . $fetch2['id'] . '</td>';
	echo '<tr>';
	echo '<th align="center" height=30>Luftdruck NN in hPa</th>';
	echo '<td align="center">' . $fetch2['p0'] . '</td>';
	echo '<tr>';
	echo '<tr>';
	echo '<th align="center" height=30>Niederschlag</th>';

?>
</body>
</html>