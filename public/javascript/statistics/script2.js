function smth(data){
  var graphData = {
  type: "line",
  data: {
    labels: ['Feb','Mar','Apr','May','Jun','Jul'],
    datasets: [{ 
        data: [86,98,78,82,99,80],
        label: "Effort Ratio",
        borderColor: "#3e95cd",
        fill: '+2',
        lineTension: 0.2
      }
    ]
  },
  options: {
    title: {
      display: false,
      text: 'World population per region (in millions)'
    }
  }
}
var graphData = data;
var context = document.getElementById("radarCanvas").getContext("2d");

var radarChart = new Chart(context, graphData);

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


 // Works fine

// tweak the lib according to sspecht @ https://stackoverflow.com/questions/45563420/exporting-chart-js-charts-to-svg-using-canvas2svg-js
tweakLib();
// deactivate responsiveness and animation
graphData.options.responsive = false;
graphData.options.animation = false;

// canvas2svg 'mock' context
var svgContext = C2S(600,300);


// new chart on 'mock' context fails:
var mgySv = new Chart(svgContext, graphData);
// Failed to create chart: can't acquire context from the given item
console.log(svgContext.getSerializedSvg(true));
}