const load= async() =>{
	try{
		var res = [];
		var query = `query{
			maps{
			  lat
			  longi
			  city
			  country
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
			 .then(data => res = data.data.maps);
	}catch(err){
		console.error(err);
	}

	var texts = [];
	var longs = [];
	var lats = []

	res.forEach(e=>{
		texts.push(e.city+" ,"+ e.country);
		longs.push(e.longi);
		lats.push(e.lat);
	})

var data = [
	{
		type: "scattermapbox",
		text: texts,
		lon: longs,
		lat: lats,
		marker: { color: "fuchsia", size: 4 }
	}
];

var layout = {
	dragmode: "zoom",
	mapbox: {
		style: "white-bg",
		layers: [
			{
				sourcetype: "raster",
				source: ["https://basemap.nationalmap.gov/arcgis/rest/services/USGSImageryOnly/MapServer/tile/{z}/{y}/{x}"],
				below: "traces"
			}
		],
		center: { lat: 38, lon: -90 },
		zoom: 3
	},
	margin: { r: 0, t: 0, b: 0, l: 0 }
};

Plotly.newPlot("myDiv", data, layout);
};
load();