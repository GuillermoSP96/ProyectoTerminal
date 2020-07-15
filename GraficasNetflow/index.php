<?php
  $json = 'data.json';
  $data = file_get_contents($json);
  $products = json_decode($data, true);
  #foreach ($products as $product) {
  #    echo '<pre>';
  #    print_r($product);
  #    echo '</pre>';
  #}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ejemplo con Plot.Ly</title>
    <script src="JS/plotly-latest.min.js"></script>
  </head>
  <body>
    <div id="chart"></div>
    <script>  
    var trace1 = {
      x: [1, 2, 3, 4, 5],
      y: [1, 2, 3, 4, 5],
      type: 'lines',
      name:'Datos 1',
      line:{ width: 5, color:'red',dash:'solid'},
      marker:{ size: 10, color:'blue'}
    };

    var trace2 = {
      x: [1, 2, 3, 4, 5],
      y: [5, 4, 3, 2, 1],
      type: 'lines',
      name:'Datos 2',
      line:{ width: 5, color:'blue',dash:'solid'},
      marker:{ size: 10, color:'red'}
    };

    var data = [trace1, trace2];
    Plotly.newPlot('chart', data,{title:'Grafica Ejemplo Plot.ly'});
    </script>
  </body>
</html>
