function graficar() {
  var arregloX = [];
  var arregloY = [];
  for (var i = 0; i < 10000; i++) {
    arregloX.push(i);
  }
  console.log(arregloX);
  var trace1 = {
    x: arregloX,
    y: [1, 2, 3, 4, 5, 2],
    type: 'lines',
    name: 'red 1',
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
  var data = [trace1];
  Plotly.newPlot('chart', data, {
    title: 'Monitoreo de red'
  });
  return "bien";
}

/* funcion para leer archivos locales
* file : string "ruta del archivo que se desea leer"
*
*/

function readTextFile(file)
{
    var rawFile = new XMLHttpRequest();
    var sal ="";
    rawFile.open("GET", file, false);
    rawFile.onreadystatechange = function()
    {
     if(rawFile.readyState === 4)
     {
      if(rawFile.status === 200 || rawFile.status == 0)
      {
       var allText = rawFile.responseText;
       alert(allText);
       sal = allText;
      }
     }
    }
    rawFile.send(null);
    return sal;
}
