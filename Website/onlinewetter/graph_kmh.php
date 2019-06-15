<?php
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_line.php');
require_once ('jpgraph/src/jpgraph_error.php');


$x_axis = array();  
$y_axis = array();  
$i      = 0;  
$con    = mysqli_connect("localhost", "onlinewetter", "funduino", "onlinewetter");  
// Check connection  
if (mysqli_connect_errno()) 
{  
    echo "Failed to connect to MySQL: " . mysqli_connect_error();  
}  
$result = mysqli_query($con, "SELECT * FROM wind WHERE MOD(id, 1) = 0 ORDER BY id DESC LIMIT 21");  
while ($row = mysqli_fetch_array($result)) {  
    $x_axis[$i] = $row["datum1"];  
    $y_axis[$i] = $row["kmh"];  
    $i++;  
}  
mysqli_close($con); 

// Grafik generieren und Grafiktyp festlegen
$graph = new Graph(600,800,Auto);    
$graph->SetScale("textlin");

// Die Zwei Linien generieren 
$y_axis = array_reverse($y_axis);
$lineplot = new LinePlot($y_axis);

// Die Linien zu der Grafik hinzufügen
$graph->Add($lineplot);

$graph->SetScale ("textlin", $min, $max);
// Grafik Formatieren
$graph->img->SetMargin(100,0,40,150);
$graph->title->Set("Windgeschwindigkeit der letzten 5 Minuten");
$graph->xgrid->Show();
$graph->xgrid->SetColor('green@0.5');
$graph->xaxis->title->Set("");
$x_axis = array_reverse($x_axis);
$graph->xaxis->SetTickLabels($x_axis);
$graph->xaxis->SetLabelAngle(75);  	
$graph->yaxis->title->Set("Windgeschwindigkeit in km/h");
$graph->yaxis->scale->SetGrace(20); 
$y_axis = array_reverse($y_axis); 
$graph->title->SetFont(FF_FONT1,FS_BOLD);
//$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
//$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->SetTitlemargin(60); 

$lineplot->SetColor("blue");
$lineplot->SetWeight(5);

$graph->yaxis->SetColor("red");
$graph->yaxis->SetWeight(2);
$graph->SetShadow();

// Grafik anzeigen
$graph->Stroke();
?>