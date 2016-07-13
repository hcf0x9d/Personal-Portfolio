
	<script src="js/jquery-1.8.2.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<!--<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.min.js"></script>
	<script src="js/scripts.js"></script>
	<script>
		var ctx = document.getElementById("myChart").getContext("2d"),
			data = {
			    labels: ["Experience", "Ability", "Formal Education", "Current Learning", "Passion"],
			    datasets: [
			        {
			            label: "Front-End Web",
			            backgroundColor: "rgba(0,253,187,0.2)",
			            borderColor: "rgba(0,253,187,1)",
			            pointBackgroundColor: "rgba(0,253,187,1)",
			            pointBorderColor: "#fff",
			            pointHoverBackgroundColor: "#fff",
			            pointHoverBorderColor: "rgba(0,253,187,1)",
			            data: [80, 90, 10, 100, 80]
			        },
			        {
			            label: "Server Side Web",
			            backgroundColor: "rgba(193, 193, 193,0.2)",
			            borderColor: "rgba(193, 193, 193,1)",
			            pointBackgroundColor: "rgba(193, 193, 193,1)",
			            pointBorderColor: "#fff",
			            pointHoverBackgroundColor: "#fff",
			            pointHoverBorderColor: "rgba(193, 193, 193,1)",
			            data: [50, 70, 0, 90, 70]
			        },
			        {
			            label: "User Experience",
			            backgroundColor: "rgba(253, 236, 0,0.2)",
			            borderColor: "rgba(253, 236, 0,1)",
			            pointBackgroundColor: "rgba(253, 236, 0,1)",
			            pointBorderColor: "#fff",
			            pointHoverBackgroundColor: "#fff",
			            pointHoverBorderColor: "rgba(253, 236, 0,1)",
			            data: [90, 90, 10, 40, 90]
			        }
			    ]
			},
			options = {
		            scale: {
		                reverse: false,
		                ticks: {
			            	display: false
			            },
			            pointLabels: {
			            	fontSize: 8
			            }
		            },
		            legend: {
		            	display: false
		            }
		    },
		    myRadarChart = new Chart(ctx, {
			    type: 'radar',
			    data: data,
			    options: options
			});
			document.getElementById('js-legend').innerHTML = myRadarChart.generateLegend();
	</script>
</body>
</html>