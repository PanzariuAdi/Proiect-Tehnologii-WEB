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

function create_XFilters(){
    return `countries:[` + country.checkedContent.map(element=>{return `"` + element+`"`}).join(",") + `],
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
    years:[` + year.checkedContent.join(",") + `],`;
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

function to_svg(){
	var doc = document.getElementById("my_Chart");
	tweakLib();
	myData.options.responsive = false;
	myData.options.animation = false;

	var svgContext = C2S(doc.offsetWidth,doc.offsetHeight);

	var mySv = new Chart(svgContext, myData);
	 
	let link = document.createElement('a');
	link.id = 'download-svg';
	link.setAttribute('href', 'data:image/svg+xml;charset=utf-8,' + encodeURIComponent(svgContext.getSerializedSvg()));
	link.setAttribute('download', 'svgstats.svg');
	document.body.appendChild(link);
	link.click();
	document.body.removeChild(link);
    myData.options.responsive = true;
	myData.options.animation = true;
	
}

function to_WebP(){
	var canvas = document.getElementById("my_Chart");
	canvas.toBlob((blob) => {
    
		// Now we have a `blob` containing webp data
	
		// Use the file rename trick to turn it back into a file
		console.log(blob.type);
		const myImage = new File([blob], 'my-new-name.webp', { type: blob.type });
		const imageURL = URL.createObjectURL(myImage);
		const link = document.createElement('a');
		link.href = imageURL;
		link.download = 'image.webp';
		document.body.appendChild(link);
		link.click();
		document.body.removeChild(link);

	
	  }, 'image/webp');
}

function to_csv(){
	var cont;
    for(var i = 0 ;i<=Labels.length-1;i++){
        cont = cont + Labels[i] + "," + Values[i]+"\n"
    }
    let link = document.createElement('a')
    link.id = 'download-csv'
    link.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(cont));
    link.setAttribute('download', 'yourfiletextgoeshere.csv');
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
function generateColor(){
	return '#'+Math.floor(Math.random()*16777215).toString(16);
	
}	