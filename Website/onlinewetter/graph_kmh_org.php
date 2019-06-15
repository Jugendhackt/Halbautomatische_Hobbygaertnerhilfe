<?php // content="text/plain; charset=utf-8"

require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_bar.php');
require_once ('jpgraph/src/jpgraph_error.php');
//require_once 'config.php';


$x_axis = array();  
$y_axis = array();  
$i      = 0;  
$con    = mysqli_connect("localhost", "onlinewetter", "funduino", "onlinewetter");  
// Check connection  
if (mysqli_connect_errno()) {  
    echo "Failed to connect to MySQL: " . mysqli_connect_error();  
}  
$result = mysqli_query($con, "SELECT * FROM wind WHERE MOD(id, 360) = 0 ORDER BY id DESC LIMIT 24");  
while ($row = mysqli_fetch_array($result)) {  
    $x_axis[$i] = $row["datum1"];  
    $y_axis[$i] = $row["kmh"];  
    $i++;  
}  
mysqli_close($con);  
$width  =600;  
$height = 800;  
$graph  = new Graph($width, $height);  
$graph->SetScale('textint'); 
$graph->title->Set('Windgeschwindigkeit der letzten 24 Stunden');  
$graph->xaxis->title->Set('');
$x_axis = array_reverse($x_axis);
$graph->xaxis->SetTickLabels($x_axis);
$graph->xaxis->SetLabelAngle(75);  
$graph->yaxis->title->Set('Windgeschwindigkeit in km/h');
$y_axis = array_reverse($y_axis);  
$barplot = new BarPlot($y_axis);
$graph->Add($barplot);  
$graph->Stroke();  
?>  