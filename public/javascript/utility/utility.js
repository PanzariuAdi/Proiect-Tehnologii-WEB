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

export function to_svg(myData){
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

export function to_WebP(){
	var canvas = document.getElementById("my_Chart");
	canvas.toBlob((blob) => {
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

export function to_csv(Labels,Values){
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
export function generateColor(){
	return '#'+Math.floor(Math.random()*16777215).toString(16);
	
}	