<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//DE">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1252"/>
	
	
	<title>Temperatur</title>
</head>
<body lang="de-DE" dir="ltr">
<?php

require ($_SERVER['DOCUMENT_ROOT']."/config.php");


$mysql_table2 = "hofwetter";
$sql = "SELECT Thof FROM ".$mysql_table2." ORDER BY datum4 DESC LIMIT 1";
$query2 = mysql_query($sql);

while($fetch2 = mysql_fetch_assoc($query2)){
echo '<table border=0 align=center>';	
	echo '<tr>';
	echo '<th>Die aktuelle Temperatur in Baumgarten betr&auml;gt</th>';
	echo '<th>' . $fetch2['Thof'] .'</th>';
	echo '<th>&deg;C</th>';
	echo '<tr>';
echo '</table>';
echo "<p></p>\n" ;
echo "<p></p>\n" ;
echo "<p></p>\n" ;
echo "<p></p>\n" ;
echo '<table border=0 align=center>';	
	echo '<tr>';
	echo '<th><img src="graph_t_linie.php" align="center"></th>';
	echo '<tr>';
echo '</table>';	
}

?>
</body>
</html>