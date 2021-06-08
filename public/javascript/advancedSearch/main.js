import {searchBar} from '../utility/filters.js';
import {boundedSearch} from '../utility/boundedSearch.js';
import {booleanSearch} from '../utility/booleanSearch.js';

var searchBars = [new searchBar('country_txt','country','countries'),new searchBar('region_txt','region','regions'),new searchBar('motive','motive','motives'),new searchBar('city','city','cities'),new searchBar('provstate','state','states'),new searchBar('gname','gang','gangs'),new searchBar('attacktype1_txt','attackType','attackTypes'),new searchBar('natlty1_txt','targetNatality','targetNatalities'),new searchBar('weaptype1_txt','weaponType','wepTypes'),new searchBar('weapsubtype1_txt','weaponSubtype','wepSubtypes'),new searchBar('propextent_txt','lossExtent','lossExtents'),new searchBar('iyear','year','years'),new searchBar('imonth','month','months')];

var boundSearch = [new boundedSearch("casualities","Casualities","casualities"),new boundedSearch("wounded","Wounded","wounded"),new boundedSearch("Loss_Value","Loss_Value","loss"),new boundedSearch("Ransom_Ammount","Ransom_Ammount","ransom"),new boundedSearch("Terrorists","Terrorists","terrorist")];

var boolSearch = [new booleanSearch("suicide"),new booleanSearch("extended"),new booleanSearch("ransom"),new booleanSearch("success")];

var myData = [];

function display(){
	var data_to_display = "";

	for(var i = 0;i<=11;i++){
		data_to_display = data_to_display +
		 `<div class="searchGrid">
		 	<h3>${myData[i].country}</h3>
		 </div>
		 `
	}
	document.getElementById("searchWrapper").innerHTML = data_to_display;
}

const syncData = async()=>{
	try{
		var res = [];
		var xaxisFilters = searchBars.map(e=>{return e.create_Query()}).join("");
		var yaxisFilters = boundSearch.map(e=>{return e.create_Query()}	).join("");
		var boolFilters = boolSearch.map(e=>{return e.create_Query()}).join("");

		var query = `query{
			search(
			` +xaxisFilters
			  +yaxisFilters
			  +boolFilters
			  +`){
				
				ID
				country
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
				.then(data => myData = data.data.search);

		console.log(myData);
	}catch(err){
		console.error(err);
	}
	display();
}	

syncData();
searchBars.forEach(e=>{e.load();});
document.getElementById("settingsBTN").addEventListener("click",(e)=>{
	var doc = document.getElementById("settingsContent");
	if(doc.style.display==='block'){
		doc.style.display='none';
	}
	else
		doc.style.display='block';
})

document.getElementById("submit").addEventListener("click",(e)=>{syncData()});