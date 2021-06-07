var myData = [];
var content = [];
var Labels = [];
var Values = [];
var Colors = [];	

var ctx = document.getElementById('my_Chart').getContext('2d');
var myChart;
var myChart = new Chart(ctx, {
	type: 'doughnut',
	data: myData,
	options: {
		legend: {
			display: false
		},
	
	},
});

			

function updateChartType() {
	myChart.destroy();
	myChart = new Chart(ctx, myData);
};


function updateData(){
	
	var tempLabels = [];
	var tempValues = [];
	var tempColors = [];
	if(document.getElementById("firstOrLastN").value ==="First values"){
		for(var i  = 0;i<document.getElementById("nval").value;i++){
			tempLabels.push(Labels[i]);
			tempValues.push(Values[i]);
			tempColors.push(Colors[i]);
		}}
	else{
		for(var i  = Labels.length-1;i>Labels.length-1-document.getElementById("nval").value;i--){
			tempLabels.push(Labels[i]);
			tempValues.push(Values[i]);
			tempColors.push(Colors[i]);}
	}
	myData = {
		type: document.getElementById("graphForm").value,
		data: {
		  labels: tempLabels,
		  datasets: [{ 
			  data: tempValues,
			  label: document.getElementById("YAXISForm").value,
			  backgroundColor: tempColors,
			}
		  ]
		},
		options: {
		  title: {
			display: false,
			text: 'World population per region (in millions)'
		  },
		  legend: {
			display: false
		},
		}
	  };

	updateChartType();
}	

const syncData = async()=>{
	try{
		
		var doc1 = document.getElementById("XAXISForm");
		var doc2 = document.getElementById("YAXISForm");
		var xaxisVal = doc1.value;
		var yaxisVal = doc2.value;

		var res = [];
		var xaxisFilters = create_XFilters();
		var yaxisFilters = create_YFilters();

		var query = `query{
			statistics(xaxis:"`+xaxisVal+`",yaxis:"`+yaxisVal+`",
			`+ xaxisFilters+
			  yaxisFilters.join(",") +`){
				
				field
				value
			}
		}`;
		console.log(query);
		await fetch('http://localhost:4000/', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json',
				'Accept': 'application/json',
			},
			body: JSON.stringify({
				query
			})
			})
				.then(r => r.json())
				.then(data => res = data.data.statistics);
		content = res;

		Labels = [];
		Values = [];
		Colors = [];
		
		content.forEach(element => {
			Labels.push(element.field);
			Values.push(element.value);
			Colors.push(generateColor());
		});

		updateData();
	}catch(err){
		console.error(err);
	}
}	


function exportData(){
	var type = document.getElementById("exportSelect").value;
	if(type === 'CSV'){
		to_csv();
	}
	if(type === 'SVG'){
		to_svg();
	}
	if(type === 'WebP'){
		to_WebP();
	}
	  
}
syncData();

