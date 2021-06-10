export class searchBar{
	constructor(field,name,server_name){
		this.field=field;
		this.name = name;
		this.content = []	
		this.checkedContent = [];
		this.server_name = server_name;

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
	
	check(ct){
		var index = this.checkedContent.indexOf(ct);
		
		if(index == -1){
			this.checkedContent.push(ct);}
		else{
			this.checkedContent.splice(index,1);
		}	
	};
	load= async() =>{
		try{
			this.content = JSON.parse(sessionStorage.getItem(this.name));
			if(this.content ===null || typeof this.content ==='undefined')
			{
			var res = [];
			var query = `query{
				fields(field:"`+this.field+`"){
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
				 .then(data => res = data.data.fields);
			this.content = res;
			sessionStorage.setItem(this.name,JSON.stringify(res));
			}
			this.display(this.content);
		}catch(err){
			console.error(err);
		}
	};

	display = (items) =>{
		var count = 0;
		var listeners = [];
		var htmlString = items
		.map((item) =>{
			if(this.checkedContent.indexOf(item.value)==-1){
				count++;
				if(count<10){
					listeners.push(item.value.replaceAll(" ","_"));
					return `<div>
						<input type = checkbox id = "${item.value.replaceAll(" ","_")}" value ="${item}" >
						${item.value}
					</div>
					`
				}
			}
		}).join('');
		
		htmlString = htmlString.concat(this.checkedContent.map((item)=>{
			listeners.push(item.replaceAll(" ","_"));
			return `<div>
						<input type = checkbox id = "${item.replaceAll(" ","_")}" value ="${item}" onchange='${this.name}.check("${item.replaceAll("'","&apos;")}")' checked>
						${item}
					</div>
					`
		}).join(''));
		
	 this.searchContent.innerHTML = htmlString;
	listeners.forEach(item=>{document.getElementById(item).addEventListener("click", (e)=>{this.check(item)})});
	};


	create_Query(){
		if(this.server_name !==`years` && this.server_name !==`months`)
			return this.server_name + `:[` + this.checkedContent.map(element=>{return `"`+element.replaceAll("_"," ")+`"`}).join(",")+`],`;
		else	
			return this.server_name + `:[` + this.checkedContent.join(",")+`],`;
	}	
};


