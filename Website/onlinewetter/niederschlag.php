<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//DE">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1252"/>
	<meta http-equiv="refresh" content="120">
	
	<title>Luftdruck</title>
</head>
<body lang="de-DE" dir="ltr">
<?php

require ($_SERVER['DOCUMENT_ROOT']."/config.php");


$mysql_table2 = "wetter";
$sql = "SELECT regen FROM ".$mysql_table2." ORDER BY datum3 DESC LIMIT 1";
$query2 = mysql_query($sql);

while($fetch2 = mysql_fetch_assoc($query2)){
echo '<table border=0 align=center>';	
	echo '<tr>';
	echo '<th>Aktuell f&auml;llt in Baumgarten </th>';
	if ($fetch2['regen'] < 1)
{
                        echo '<th align="center">kein</th>';
}
elseif ($fetch2['regen'] > 0 && $fetch2['regen'] < 180)
{
                        echo '<th align="center">geringer</th>';
}
elseif ($fetch2['regen'] > 179 && $fetch2['regen'] < 400)
{
                        echo '<th align="center">m&auml;&szlig;iger</th>';
}
elseif ($fetch2['regen'] > 399)
{
                        echo '<th align="center">starker</th>';
}
	echo '<th>Niederschlag</th>';
	echo '<tr>';
echo '</table>';
echo "<p></p>\n" ;
echo "<p></p>\n" ;
echo "<p></p>\n" ;
echo "<p></p>\n" ;
echo '<table border=0 align=center>';	
	echo '<tr>';
	echo '<th><img src="graph_regen.php" align="center"></th>';
	echo '<tr>';
echo '</table>';	
}

?>
</body>
</html>