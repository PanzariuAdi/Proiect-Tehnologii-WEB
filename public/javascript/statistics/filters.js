class searchBar{
	constructor(field,name){
		this.field=field;
		this.name = name;
		this.content = []	
		this.checkedContent = [];

		this.URL = 'http://localhost/proiect-mvc/posts/columns?col=';
		this.URL = this.URL.concat(this.field);

		let temp = 'searchContent';
		temp = temp.concat(name)
		this.searchContent = document.getElementById(temp);

		temp = 'search';
		temp = temp.concat(name);
		this.searchBar = document.getElementById(temp)

		this.searchBar.addEventListener('keyup', (e) => {

			const searchString = e.target.value.toLowerCase();
		
			const filteredcontent = this.content.filter((item) => {
				return (
					item.value.toLowerCase().includes(searchString)
				);
			});
			this.display(filteredcontent);
		});
	}

	
	load= async() =>{
		try{
			
			const res = await fetch(this.URL);
			this.content = await res.json();
			this.display(this.content);
		}catch(err){
			console.error(err);
		}
	};

	display = (items) =>{
		var count = 0;
		var htmlString = items
		.map((item) =>{
			if(this.checkedContent.indexOf(item.value)==-1){
				count++;
				if(count<10)
					return `<div>
						<input type = checkbox id = "${item.value.replace(" ","_")}" onchange='${this.name}.check("${item.value.replace(" ","_")}")'>
						${item.value}
					</div>
					`
			}
		}).join('');
		htmlString = htmlString.concat(this.checkedContent.map((item)=>{
			return `<div>
						<input type = checkbox id = "${item.replace(" ","_")}" onchange='${this.name}.check("${item.replace(" ","_")}")' checked>
						${item}
					</div>
					`
		}).join(''));
		
	 this.searchContent.innerHTML = htmlString;
	};

	 check(ct){
		var index = this.checkedContent.indexOf(ct);
		if(index == -1)
			this.checkedContent.push(ct);
		else{
			this.checkedContent.splice(index,1);
		}	
	
	};
};

const country = new searchBar('country_txt','country');
country.load();

const region = new searchBar('region_txt','region');
region.load();

const motive = new searchBar('motive','motive');
motive.load();

const city = new searchBar('city','city');
city.load();

const state = new searchBar('provstate','state');
state.load();

const gang = new searchBar('gname','gang');
gang.load();

const attackType = new searchBar('attacktype1_txt','attackType');
attackType.load();

const targetNatality = new searchBar('natlty1_txt','targetNatality');
targetNatality.load();

const weaponType = new searchBar('weaptype1_txt','weaponType');
weaponType.load();

const weaponSubtype = new searchBar('weapsubtype1_txt','weaponSubtype');
weaponSubtype.load();

const lossExtent = new searchBar('propextent_txt','lossExtent');
lossExtent.load();

const year = new searchBar('iyear','year');
year.load();

const month = new searchBar('imonth','month');
month.load();




