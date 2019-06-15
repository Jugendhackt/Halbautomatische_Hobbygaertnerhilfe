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

$mysql_table = "richtung";

$sql = "SELECT datum2, Nno, Ono, Oso, Sso, Ssw, Wsw, Wnw, Nnw FROM ".$mysql_table." WHERE datum2 LIKE '$datum%'";
$query = mysql_query($sql);

echo '<table border=1 align=center>';
	echo '<tr>';
		echo '<th width=180 align="center">Zeitstempel</th>';
		echo '<th colspan="8" align="center">Werte der Hallsensoren</th>';
		echo '<th align="center"></th>';
		
	echo '<tr>';
	echo '<tr>';
		echo '<th align="center">Datum / Uhrzeit</th>';
		echo '<th align="center">NNO</th>';
		echo '<th align="center">ONO</th>';
		echo '<th align="center">OSO</th>';
		echo '<th align="center">SSO</th>';
		echo '<th align="center">SSW</th>';
		echo '<th align="center">WSW</th>';
		echo '<th align="center">WNW</th>';
		echo '<th align="center">NNW</th>';
		echo '<th align="center">Windrichtung</th>';
		
	echo '<tr>';
while($fetch = mysql_fetch_assoc($query)){
		echo '<tr>';
			echo '<td align="center">' . $fetch['datum2'] . '</td>';
			echo '<td align="center">' . $fetch['Nno'] . '</td>';
			echo '<td align="center">' . $fetch['Ono'] . '</td>';
			echo '<td align="center">' . $fetch['Oso'] . '</td>';
			echo '<td align="center">' . $fetch['Sso'] . '</td>';
			echo '<td align="center">' . $fetch['Ssw'] . '</td>';
			echo '<td align="center">' . $fetch['Wsw'] . '</td>';
			echo '<td align="center">' . $fetch['Wnw'] . '</td>';
			echo '<td align="center">' . $fetch['Nnw'] . '</td>';

if ($fetch['Nno'] == 0 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">NNO</td>';
}
elseif ($fetch['Nno'] == 0 && $fetch['Ono'] == 0 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">NO</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 0 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">ONO</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 0 && $fetch['Oso'] == 0 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">O</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 0 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">OSO</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 0 && $fetch['Sso'] == 0 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">SO</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 0 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">SSO</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 0 && $fetch['Ssw'] == 0 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">S</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 0 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">SSW</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 0 && $fetch['Wsw'] == 0 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">SW</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 0 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">WSW</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 0 && $fetch['Wnw'] == 0 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">W</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 0 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">WNW</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 0 && $fetch['Nnw'] == 0)
{
                        echo '<td align="center">NW</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 0)
{
                        echo '<td align="center">NNW</td>';
}
elseif ($fetch['Nno'] == 0 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 0)
{
                        echo '<td align="center">N</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">Fehler</td>';
}
elseif ($fetch['Nno'] == 0 && $fetch['Ono'] == 0 && $fetch['Oso'] == 0 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">ONO</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 0 && $fetch['Oso'] == 0 && $fetch['Sso'] == 0 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">OSO</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 0 && $fetch['Sso'] == 0 && $fetch['Ssw'] == 0 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">SSO</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 0 && $fetch['Ssw'] == 0 && $fetch['Wsw'] == 0 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">SSW</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 0 && $fetch['Wsw'] == 0 && $fetch['Wnw'] == 0 && $fetch['Nnw'] == 1)
{
                        echo '<td align="center">WSW</td>';
}
elseif ($fetch['Nno'] == 1 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 0 && $fetch['Wnw'] == 0 && $fetch['Nnw'] == 0)
{
                        echo '<td align="center">WNW</td>';
}
elseif ($fetch['Nno'] == 0 && $fetch['Ono'] == 1 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 0 && $fetch['Nnw'] == 0)
{
                        echo '<td align="center">NNW</td>';
}
elseif ($fetch['Nno'] == 0 && $fetch['Ono'] == 0 && $fetch['Oso'] == 1 && $fetch['Sso'] == 1 && $fetch['Ssw'] == 1 && $fetch['Wsw'] == 1 && $fetch['Wnw'] == 1 && $fetch['Nnw'] == 0)
{
                        echo '<td align="center">NNO</td>';
}

}
echo '</table>';


?>
 
</html>