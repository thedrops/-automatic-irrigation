<?php   
include("include/header.php");
include("include/nav.php");
require_once 'consulta-grafico-sql.php';

$rega = $stmt->fetch(PDO::FETCH_ASSOC);
$dataPoints1 = array();




?>






<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Dynamic Viscosity Vs Density over Temperature of Water"
	},
	axisX:{
		title: "Temperature [°C]"
	},
	axisY:{
		title: "Dynamic Viscosity [mPa.s]",
		titleFontColor: "#4F81BC",
		lineColor: "#4F81BC",
		labelFontColor: "#4F81BC",
		tickColor: "#4F81BC"
	},
	axisY2:{
		title: "Density [g/cm³]",
		titleFontColor: "#C0504E",
		lineColor: "#C0504E",
		labelFontColor: "#C0504E",
		tickColor: "#C0504E",
		includeZero: false
	},
	legend:{
		cursor: "pointer",
		dockInsidePlotArea: true,
		itemclick: toggleDataSeries
	},
	data: [{
		type: "line",
		name: "Dynamic Viscosity",
		markerSize: 0,
		toolTipContent: "Temperature: {x} °C <br>{name}: {y} mPa.s",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart.render();
}
 
}
</script>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>











<?php include("include/footer.php");?>