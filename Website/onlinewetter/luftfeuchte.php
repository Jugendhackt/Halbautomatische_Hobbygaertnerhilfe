<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//DE">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1252"/>
	
	
	<title>Luftfeuchtigkeit</title>
</head>
<body lang="de-DE" dir="ltr">
<?php

require ($_SERVER['DOCUMENT_ROOT']."/config.php");


$mysql_table = "hofwetter";
$sql = "SELECT Hhof FROM ".$mysql_table." ORDER BY datum4 DESC LIMIT 1";
$query = mysql_query($sql);

while($fetch = mysql_fetch_assoc($query)){
echo '<table border=0 align=center>';	
	echo '<tr>';
	echo '<th>Die aktuelle Luftfeuchtigkeit in Baumgarten betr&auml;gt</th>';
	echo '<th>' . $fetch['Hhof'] .'</th>';
	echo '<th>%</th>';
	echo '<tr>';
echo '</table>';
echo "<p></p>\n" ;
echo "<p></p>\n" ;
echo "<p></p>\n" ;
echo "<p></p>\n" ;
echo '<table border=0 align=center>';	
	echo '<tr>';
	echo '<th><img src="graph_h.php" align="center"></th>';
	echo '<tr>';
echo '</table>';	
}

?>
</body>
</html>