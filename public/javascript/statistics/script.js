var myData = [];
var content = [];
var Labels = [];
var Values = [];
var Colors = [];	

var ctx = document.getElementById('my_Chart').getContext('2d');
var myChart;
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
	myChart = new Chart(ctx, myData);
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

	// myData = {
	// 	labels: tempLabels,
	// 	datasets: [{
	// 		label: document.getElementById("YAXISForm").value,
	// 		borderColor: "#3e95cd",
	// 		fill: '+2',
	// 		lineTension: 0.2,
	// 		
	// 		borderColor: 'black',
	// 		data: tempValues,
	// 	}],
	// 	options: {

	// 	  }
	// };
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

function tweakLib(){
	C2S.prototype.getContext = function (contextId) {
	  if (contextId=="2d" || contextId=="2D") {
		  return this;
	  }
	  return null;
	}
  
	C2S.prototype.style = function () {
		return this.__canvas.style
	}
  
	C2S.prototype.getAttribute = function (name) {
		return this[name];
	}
  
	C2S.prototype.addEventListener =  function(type, listener, eventListenerOptions) {  
	  console.log("canvas2svg.addEventListener() not implemented.")
	}
  }

function show_svg(){
	var doc = document.getElementById("my_Chart");
	tweakLib();
	myData.options.responsive = false;
	myData.options.animation = false;

	var svgContext = C2S(doc.offsetWidth,doc.offsetHeight);
	// svgContext.width = doc.offsetWidth;
	// svgContext.height = doc.offsetHeight;
	var mySv = new Chart(svgContext, myData);
	 
	let link = document.createElement('a');
	link.href = 'data:image/svg+xml;utf8,' + encodeURIComponent(svgContext.getSerializedSvg());
	link.download = filename;
	link.text = linkText;
	link.click();
}
function exportData(){
	var type = document.getElementById("exportSelect").value;
	var cont = "";
	if(type === 'CSV'){
		for(var i = 0 ;i<=Labels.length-1;i++){
			cont = cont + Labels[i] + "," + Values[i]+"\n"
		}
		let link = document.createElement('a')
		link.id = 'download-csv'
		link.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(cont));
		link.setAttribute('download', 'yourfiletextgoeshere.csv');
		link.click();
		return
	}
	if(type === 'SVG'){
		show_svg();
	}
	  
}
syncData();

