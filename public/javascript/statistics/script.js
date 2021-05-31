var myData;
var Labels = [];
var Values = [];
var Colors = [];	
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

function generateColor(){
	return '#'+Math.floor(Math.random()*16777215).toString(16);
	
}	
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
		labels: tempLabels,
		datasets: [{
			label: document.getElementById("YAXISForm").value,
			fill: false,
			backgroundColor: tempColors,
			borderColor: 'black',
			data: tempValues,
		}]
	};
	updateChartType();
}	

function create_YFilters(){
	var yaxisFilters = [];
	if(document.getElementById("AttacksLowerCheck").checked){
		yaxisFilters.push("attackLB:"+document.getElementById("AttacksLowerValue").value)
	}
	if(document.getElementById("AttacksUpperCheck").checked){
		yaxisFilters.push("attackUB:"+document.getElementById("AttacksUpperValue").value);
	}
	if(document.getElementById("CasualitiesLowerCheck").checked){
		yaxisFilters.push("casualitiesLB:"+document.getElementById("CasualitiesLowerValue").value)
	}
	if(document.getElementById("CasualitiesUpperCheck").checked){
		yaxisFilters.push("casualitiesUB:"+document.getElementById("CasualitiesUpperValue").value);
	}
	if(document.getElementById("WoundedLowerCheck").checked){
		yaxisFilters.push("woundedLB:"+document.getElementById("WoundedLowerValue").value)
	}
	if(document.getElementById("WoundedUpperCheck").checked){
		yaxisFilters.push("woundedUB:"+document.getElementById("WoundedUpperValue").value);
	}
	if(document.getElementById("Loss_ValueLowerCheck").checked){
		yaxisFilters.push("lossLB:"+document.getElementById("Loss_ValueLowerValue").value)
	}
	if(document.getElementById("Loss_ValueUpperCheck").checked){
		yaxisFilters.push("lossUB:"+document.getElementById("Loss_ValueUpperValue").value);
	}
	if(document.getElementById("Ransom_AmmountLowerCheck").checked){
		yaxisFilters.push("ransomLB:"+document.getElementById("Ransom_AmmountLowerValue").value)
	}
	if(document.getElementById("Ransom_AmmountUpperCheck").checked){
		yaxisFilters.push("ransomUB:"+document.getElementById("Ransom_AmmountUpperValue").value);
	}
	if(document.getElementById("TerroristsLowerCheck").checked){
		yaxisFilters.push("terroristLB:"+document.getElementById("TerroristsLowerValue").value)
	}
	if(document.getElementById("TerroristsUpperCheck").checked){
		yaxisFilters.push("terroristUB:"+document.getElementById("TerroristsUpperValue").value);
	}

	if(document.getElementById("suicideForm").value === 'Yes')
		yaxisFilters.push("suicide:true");
	else
		if(document.getElementById("suicideForm").value === 'No')
			yaxisFilters.push("suicide:false");

	if(document.getElementById("extendedForm").value === 'Yes')
		yaxisFilters.push("extended:true");
	else
		if(document.getElementById("extendedForm").value === 'No')
			yaxisFilters.push("extended:false");

	if(document.getElementById("ransomForm").value === 'Yes')
		yaxisFilters.push("ransom:true");
	else
		if(document.getElementById("ransomForm").value === 'No')
			yaxisFilters.push("ransom:false");	
	
	if(document.getElementById("successForm").value === 'Yes')
		yaxisFilters.push("success:true");
	else
		if(document.getElementById("successForm").value === 'No')
			yaxisFilters.push("success:false");					

	return yaxisFilters
}

const syncData = async()=>{
	try{

		var doc1 = document.getElementById("XAXISForm");
		var doc2 = document.getElementById("YAXISForm");
		var xaxisVal = doc1.value;
		var yaxisVal = doc2.value;

		var res = [];

		var yaxisFilters = create_YFilters();

		var query = `query{
			statistics(xaxis:"`+xaxisVal+`",yaxis:"`+yaxisVal+`",
			countries:[` + country.checkedContent.map(element=>{return `"` + element+`"`}).join(",") + `],
			regions:[` + region.checkedContent.map(element=>{return `"` + element+`"`}).join(",") + `],
			cities:[` + city.checkedContent.map(element=>{return `"` + element+`"`}).join(",") + `],
			states:[` + state.checkedContent.map(element=>{return `"` + element+`"`}).join(",") + `],
			motives:[` + motive.checkedContent.map(element=>{return `"` + element+`"`}).join(",") + `],
			gangs:[` + gang.checkedContent.map(element=>{return `"` + element+`"`}).join(",") + `],
			attackTypes:[` + attackType.checkedContent.map(element=>{return `"` + element+`"`}).join(",") + `],
			targetNatalities:[` + targetNatality.checkedContent.map(element=>{return `"` + element+`"`}).join(",") + `],
			wepTypes:[` + weaponType.checkedContent.map(element=>{return `"` + element+`"`}).join(",") + `],
			wepSubtypes:[` + weaponSubtype.checkedContent.map(element=>{return `"` + element+`"`}).join(",") + `],
			lossExtents:[` + lossExtent.checkedContent.map(element=>{return `"` + element+`"`}).join(",") + `],
			months:[` + month.checkedContent.join(",") + `],
			years:[` + year.checkedContent.join(",") + `],
			` + yaxisFilters.join(",") +`){
				
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
		this.content = res;

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
syncData();

