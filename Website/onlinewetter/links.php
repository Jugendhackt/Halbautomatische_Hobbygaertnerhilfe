<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1252"/>
	<title>Links</title>
	<style type="text/css">
      h1 {
    text-align: center; font-size:100%; color:#455597;}
    </style>
<script>
'use strict';  
(function () {
  function uhrzeit() {
    var jetzt = new Date(),
        h = jetzt.getHours(),
        m = jetzt.getMinutes(),
        s = jetzt.getSeconds();
    m = fuehrendeNull(m);
    s = fuehrendeNull(s);
    document.getElementById('uhr').innerHTML = h + ':' + m + ':' + s;
    setTimeout(uhrzeit, 500);
  }
 
  function fuehrendeNull(zahl) {
    zahl = (zahl < 10 ? '0' : '' )+ zahl;  
    return zahl;
  }
 
  document.addEventListener('DOMContentLoaded',uhrzeit);
}());
</script>
</head>
<body lang="de-DE" dir="ltr">
<table width="100%" cellpadding="4" cellspacing="0" style="page-break-before: always">
	
		<tr valign="top"
		<tr><h1><?php
$date = date("d.m.Y");
echo $date;
?></h1>
		</tr>
		<tr><h1><p align="center" style="page-break-before: always" id="uhr"></h1></p>
		</tr>
		<tr width=180 height=3 style="border: none; padding: 0cm">
			
		</tr>
		<tr width=180 height=3 style="border: none; padding: 0cm">
			<p align="left" style="page-break-before: always"><a href="links.php" target="links"><a href="abfrage_aktuell1.php" target="main"><img src="images/button_aktuell.png" alt="Aktuelle Werte" /></a></p>
		</tr>
		<tr width=180 height=3 style="border: none; padding: 0cm">
			<p align="left" style="page-break-before: always"><a href="links_tabellen.php" target="links"><img src="images/button_tabellen.png" alt="Tabellen" /></a></b></font></a></p>
		</tr>
		
		<tr width=180 height=3 style="border: none; padding: 0cm">
			<p align="left" style="page-break-before: always"><a href="links_diagramm.php" target="links"><img src="images/button_diagramme.png" alt="Diagramme" /></a></p>
		</tr>
		
		<tr width=180 height=3 style="border: none; padding: 0cm">
			<p align="left" style="page-break-before: always"><a href="min_max.php" target="main"><img src="images/button_extrem.png" alt="Extemwerte" /></a></p>
		</tr>
		<tr width=180 height=3 style="border: none; padding: 0cm">
			<p align="left" style="page-break-before: always"><a href="fotos.php" target="main"><img src="images/button_fotos.png" alt="Fotos" /></a></p>
		</tr>
		<tr width=180 height=3 style="border: none; padding: 0cm">
			<p align="left" style="page-break-before: always"><a href="eingabe.php" target="main"><img src="images/button_suche.png" alt="Suche" /></a></p>
		</tr>
	</tr>

</table>
<p><br/>
<br/>

</p>
</body>
</html>