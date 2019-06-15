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

echo "<p></p>\n" ;
echo "<p></p>\n" ;
echo "<p></p>\n" ;
echo "<p></p>\n" ;
echo '<table border=0 align=center>';	
	echo '<tr>';
	echo '<th><img src="graph_p0.php"  align="center"></th>';
	echo '<tr>';
echo '</table>';
echo '</table>';
echo "<p></p>\n" ;
echo "<p></p>\n" ;
echo "<p></p>\n" ;
echo "<p></p>\n" ;
echo '<table border=0 align=center>';	
	echo '<tr>';
	echo '<th><img src="graph_p0_3std.php"  align="center"></th>';
	echo '<tr>';
echo '</table>';	
}

?>
</body>
</html>