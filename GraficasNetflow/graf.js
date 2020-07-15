var lineDiv = document.getElementById('line-chart');

var traceA = {
  x: [25, 30, 35, 40, 45, 50, 55],
  y: [40, 40, 20, 60, 40, 20, 50],
  type: 'scatter'
};

var data = [traceA];

var layout = {
  title:'A Line Chart in Plotly',
  height: 550,
  font: {
    family: 'Lato',
    size: 16,
    color: 'rgb(100,150,200)'
  },
  plot_bgcolor: 'rgba(200,255,0,0.1)',
  margin: {
    pad: 10
  },
  xaxis: {
    title: 'Distance travelled along x-axis',
    titlefont: {
      color: 'black',
      size: 12
    },
    rangemode: 'tozero'
  },
  yaxis: {
    title: 'Distance travelled along y-axis',
    titlefont: {
      color: 'black',
      size: 12
    },
    rangemode: 'tozero'
  }
};

Plotly.plot( lineDiv, data, layout );
