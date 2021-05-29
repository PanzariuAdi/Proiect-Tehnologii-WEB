var myData;
			
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

			function lowerBoundChange(type){
				var checked = document.getElementById(type.concat('LowerCheck')).checked;
				var result;
				if(checked){
					result='block';
				}
				else{
					result='none';
				}

				document.getElementById(type.concat('LowerValueDiv')).style.display=result;
			}
			function upperBoundChange(type){
				var checked = document.getElementById(type.concat('UpperCheck')).checked;
				var result;
				if(checked){
					result='block';
				}
				else{
					result='none';
				}

				document.getElementById(type.concat('UpperValueDiv')).style.display=result;
			}


	function generateColor(){
		return '#'+Math.floor(Math.random()*16777215).toString(16);
		
	}		
	const syncData = async()=>{
		try{

			var doc1 = document.getElementById("XAXISForm");
			var doc2 = document.getElementById("YAXISForm");
			var URL = "http://localhost/proiect-mvc/posts/data?xaxis=";
			URL =URL.concat(doc1.value);	
			URL = URL.concat("&yaxis=");
			URL = URL.concat(doc2.value);
			const res = await fetch(URL);
			var content = await res.json();

			var Labels = [];
			var Values = [];
			var Colors = [];
			content.forEach(element => {
				Labels.push(element.field);
				Values.push(element.value);
				Colors.push(generateColor());
			});

			myData = {
				labels: Labels,
				datasets: [{
					label: "Hey, baby!",
					fill: false,
					backgroundColor: Colors,
					borderColor: 'black',
					data: Values,
				}]
			};
			
			updateChartType();
			
		}catch(err){
			console.error(err);
		}
	}
syncData();