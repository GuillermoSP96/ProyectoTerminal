function grafica() {
var trace1 = {
  x: [0, 1, 2],
  y: [10, 11, 12],
  type: 'scatter'
};

var trace2 = {
  x: [2, 3, 4],
  y: [100, 110, 120],
  xaxis: 'x2',
  yaxis: 'y2',
  type: 'scatter'
};

var trace3 = {
  x: [3, 4, 5],
  y: [1000, 1100, 1200],
  xaxis: 'x3',
  yaxis: 'y3',
  type: 'scatter'
};

var data = [trace1, trace2, trace3];

var layout = {
grid: {
    rows: 3,
    columns: 1,
    pattern: 'independent',
    roworder: 'bottom to top'}
};

Plotly.newPlot('myDiv', data, layout);
}
