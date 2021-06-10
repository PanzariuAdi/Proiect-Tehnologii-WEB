import {searchBar} from '../utility/filters.js';
import {to_csv,to_svg,to_WebP,generateColor} from '../utility/utility.js';
import {boundedSearch} from '../utility/boundedSearch.js';
import {booleanSearch} from '../utility/booleanSearch.js';

var searchBars = [new searchBar('country_txt','country','countries'),new searchBar('region_txt','region','regions'),new searchBar('motive','motive','motives'),new searchBar('city','city','cities'),new searchBar('provstate','state','states'),new searchBar('gname','gang','gangs'),new searchBar('attacktype1_txt','attackType','attackTypes'),new searchBar('natlty1_txt','targetNatality','targetNatalities'),new searchBar('weaptype1_txt','weaponType','wepTypes'),new searchBar('weapsubtype1_txt','weaponSubtype','wepSubtypes'),new searchBar('propextent_txt','lossExtent','lossExtents'),new searchBar('iyear','year','years'),new searchBar('imonth','month','months')];

searchBars.forEach(e=>{e.load();});

var boundSearch = [new boundedSearch("attacks","Attacks","attack"),new boundedSearch("casualities","Casualities","casualities"),new boundedSearch("wounded","Wounded","wounded"),new boundedSearch("Loss_Value","Loss_Value","loss"),new boundedSearch("Ransom_Ammount","Ransom_Ammount","ransom"),new boundedSearch("Terrorists","Terrorists","terrorist")];

var boolSearch = [new booleanSearch("suicide"),new booleanSearch("extended"),new booleanSearch("ransom"),new booleanSearch("success")];
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
		var xaxisFilters = searchBars.map(e=>{return e.create_Query()}).join("");
		var yaxisFilters = boundSearch.map(e=>{return e.create_Query()}	).join("");
		var boolFilters = boolSearch.map(e=>{return e.create_Query()}).join("");

		var query = `query{
			statistics(xaxis:"`+xaxisVal+`",yaxis:"`+yaxisVal+`",
			` +xaxisFilters
			  +yaxisFilters
			  +boolFilters
			  +`){
				
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


function exportData(){
	var type = document.getElementById("exportSelect").value;
	if(type === 'CSV'){
		to_csv(Labels,Values);
	}
	if(type === 'SVG'){
		to_svg(myData);
	}
	if(type === 'WebP'){
		to_WebP();
	}
	  
}
syncData();

document.getElementById("settingsBTN").addEventListener("click",(e)=>{
	var doc = document.getElementById("settingsContent");
	if(doc.style.display==='block'){
		doc.style.display='none';
	}
	else
		doc.style.display='block';
});
document.getElementById("export").addEventListener("click",(e)=>{exportData()});
document.getElementById("submit").addEventListener("click",(e)=>{syncData()});
document.getElementById("graphForm").addEventListener("change",(e)=>{updateData()});
document.getElementById("firstOrLastN").addEventListener("change",(e)=>{updateData()});
document.getElementById("nval").addEventListener("input",(e)=>{updateData()});
