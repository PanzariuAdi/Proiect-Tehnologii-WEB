
var myData = {
				labels: ["Javascript", "Java", "Python", "PHP", "C++", "TypeScript", "Linux Shell","C","Ruby on Rails"],
				datasets: [{
					label: "Hey, baby!",
					fill: false,
					backgroundColor: ['#ff0000', '#ff4000', '#ff8000', '#ffbf00', '#ffbf00', '#ffff00', '#bfff00', '#80ff00', '#40ff00', '#00ff00'],
					borderColor: 'black',
					data: [85, 60,70, 50, 18, 20, 45, 30, 20],
				}]
			};
			
			// Code to drow Chart
            // Default chart defined with type: 'bar'
			var ctx = document.getElementById('my_Chart').getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'doughnut',    	// Define chart type
				data: myData,    	// Chart data
                options: {
                    legend: {
                        display: false
                    },
                
                },
			});
			
			// Function runs on chart type select update
            
			function updateChartType() {
                // Destroy the previous chart
				myChart.destroy();
                // Draw a new chart on the basic of dropdown
				myChart = new Chart(ctx, {
					type: document.getElementById("graphForm").value,  // Select chart type from dropdown
					data: myData,
                    options: {
                        legend: {
                            display: false
                        },
                    
                    },
				});
             
			};

            
