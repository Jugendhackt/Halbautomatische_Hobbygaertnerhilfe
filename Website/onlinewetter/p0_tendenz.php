<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//DE">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1252"/>
	<meta http-equiv="refresh" content="15">
	
	<title>Aktuelle Werte</title>
</head>
<body lang="de-DE" dir="ltr">

<h2 align="center">Aktuelle Wetterwerte von Baumgarten</h2>

<?Php
require "config.php";

$count="SELECT datum2, p0, max( id ) as max_id FROM `wetter` GROUP BY id";

echo "<table>";

foreach ($dbo->query($count) as $row) {
echo "<tr ><td>$row[datum2]</td><td>$row[max_id]</td></tr>td>$row[p0]</td></tr>";
}
echo "</table>";
?>
</body>
</html>