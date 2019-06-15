<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//DE">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1252"/>
	
	
	<title>Luftdruck</title>
</head>
<body lang="de-DE" dir="ltr">
<?php

require ($_SERVER['DOCUMENT_ROOT']."/config.php");


$mysql_table2 = "wetter";
$sql = "SELECT p0 FROM ".$mysql_table2." ORDER BY datum3 DESC LIMIT 1";
$query2 = mysql_query($sql);

while($fetch2 = mysql_fetch_assoc($query2)){
echo '<table border=0 align=center>';	
	echo '<tr>';
	echo '<th>Der aktuelle Luftdruck in Baumgarten betr&auml;gt</th>';
	echo '<th>' . $fetch2['p0'] .'</th>';
	echo '<th>hPa</th>';
	echo '<tr>';
echo '</table>';
}

?>
</body>
</html>