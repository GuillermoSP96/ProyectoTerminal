var ip_src = [];
var ip_dst = [];
var pkts = [];
var bytes = [];

function graficar(json) {

  for (var i = 0; i < json['Netflow']['flows'].length; i++) {
    ip_src.push(json['Netflow']['flows'][i]['IPV4_SRC_ADDR']);
    ip_dst.push(json['Netflow']['flows'][i]['IPV4_DST_ADDR']);
    pkts.push(parseInt(json['Netflow']['flows'][i]['IN_BYTES'], 10));
    bytes.push(parseInt(json['Netflow']['flows'][i]['IN_PKTS'], 10));
    console.log(json['Netflow']['flows'][i]['IPV4_SRC_ADDR']);
    console.log(json['Netflow']['flows'][i]['IPV4_DST_ADDR']);
    console.log(json['Netflow']['flows'][i]['IN_BYTES']);
    console.log(json['Netflow']['flows'][i]['IN_PKTS']);
  }
  var arregloX = [];
  var arregloY1 = [];
  var arregloY2 = [];
  //console.log(json['Netflow']['flows'].length);
  for (var i = 1; i < json['Netflow']['flows'].length; i++) {
    arregloX.push(i);
  }
  for (var i = 0; i < bytes.length; i++) {
    arregloY1.push(parseInt(bytes[i], 10));
  }
  for (var i = 0; i < pkts.length; i++) {
    arregloY2.push(parseInt(pkts[i]));
  }

  graficas(arregloX, arregloY1, arregloY2);
  return "bien";
}

/* funcion para leer archivos locales
 * file : string "ruta del archivo que se desea leer"
 *
 */
function readTextFile(file) {
  var rawFile = new XMLHttpRequest();
  var sal = "";
  rawFile.open("GET", file, false);
  rawFile.onreadystatechange = function() {
    if (rawFile.readyState === 4) {
      if (rawFile.status === 200 || rawFile.status == 0) {
        var allText = rawFile.responseText;
        sal = allText;
      }
    }
  }
  rawFile.send(null);
  return sal;
}

function graficas(arregloX, arregloY1, arregloY2) {
  var trace1 = {
    x: arregloX,
    y: arregloY1,
    type: 'scatter',
    name: 'Bytes'
  };

  var trace2 = {
    x: arregloX,
    y: arregloY2,
    xaxis: 'x2',
    yaxis: 'y2',
    type: 'scatter',
    name: 'Packets'
  };

  var data = [trace1, trace2];

  var layout = {
    grid: {
      rows: 2,
      columns: 1,
      pattern: 'independent',
      roworder: 'top to bottom'
    }
  };

  Plotly.newPlot('myDiv', data, layout);
}
