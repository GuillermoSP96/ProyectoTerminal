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
  sirve(arregloX, arregloY1, arregloY2);
  prueba();
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
        //alert(allText);
        sal = allText;
      }
    }
  }
  rawFile.send(null);
  return sal;
}

function prueba() {
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
      roworder: 'bottom to top'
    }
  };

  Plotly.newPlot('myDiv', data, layout);
}

function sirve(arregloX, arregloY1, arregloY2) {
  var trace1 = {
    x: arregloX,
    y: arregloY1,
    type: 'lines',
    name: 'Bytes',
    line: {
      width: 5,
      color: 'blue',
      dash: 'solid'
    },
    marker: {
      size: 10,
      color: 'blue'
    }
  };
  var trace2 = {
    x: arregloX,
    y: arregloY2,
    type: 'lines',
    name: 'Packets',
    line: {
      width: 5,
      color: 'red',
      dash: 'solid'
    },
    marker: {
      size: 10,
      color: 'red'
    }
  };
  var data = [trace1, trace2];
  Plotly.newPlot('chart', data, {
    title: 'Monitoreo de red (bytes)'
  });

}
