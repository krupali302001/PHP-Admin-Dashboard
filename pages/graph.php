<?php
include('../includes/header.php');
include('../includes/dbcon.php');
?>
<!DOCTYPE HTML>
<html>

<head>

</head>

<body>
	<div id="chartContainer" class="mt-5" style="height: 370px; width: 100%;"></div>	
	<div id="chartContainer1" class="mt-5" style="height: 370px; width: 100%;"></div>
	<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
	<script>
		$('#graph').addClass('active');

		$(document).ready(function() {
			
			$.ajax({
				url: 'graph_get.php',	
				type: 'post',
				dataType: 'json',
				data: {data:'data'},
				success: function(data) {
					var chart = new CanvasJS.Chart("chartContainer", {
						theme: "light1", // "light1", "light2", "dark1", "dark2"
						exportEnabled: true,
						animationEnabled: true,
						title: {
							text: "Desktop Browser Market Share in 2016"
						},
						data: [{
							type: "pie",
							startAngle: 25,
							toolTipContent: "<b>{label}</b>: {y}",
							showInLegend: "true",
							legendText: "{label}",
							indexLabelFontSize: 16,
							indexLabel: "{label} - {y}",
							dataPoints: data
						}]
					});
					chart.render();
				},
				error: function(data) {
					console.log(data);
				}
			});
		});
		$('#graph').addClass('active');

		$(document).ready(function() {
			
			$.ajax({
				url: 'graph_get.php',	
				type: 'post',
				dataType: 'json',
				data: {status:'data'},
				success: function(data) {
					var chart = new CanvasJS.Chart("chartContainer1", {
						theme: "light1", // "light1", "light2", "dark1", "dark2"
						exportEnabled: true,
						animationEnabled: true,
						title: {
							text: "Desktop Browser Market Share in 2016"
						},
						data: [{
							type: "pie",
							startAngle: 25,
							toolTipContent: "<b>{label}</b>: {y}",
							showInLegend: "true",
							legendText: "{label}",
							indexLabelFontSize: 16,
							indexLabel: "{label} - {y}",
							dataPoints: data
						}]
					});
					chart.render();
				},
				error: function(data) {
					console.log(data);
				}
			});
		});
		</script>
	</body>
</html>		