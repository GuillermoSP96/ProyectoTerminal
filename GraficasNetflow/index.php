
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Monitoreo de red</title>
    <script src="JS/plotly-latest.min.js"></script>
    <script src="JS/grafica.js" type="text/javascript"></script>
  <body>
    <a href="javascript:location.reload()">Actualizar página</a>
    <div id="chart"></div>

    <script>
    var json = readTextFile("data.json");
    console.log(json);
    //var dispositivos = <?php #echo  json_encode($dispo,JSON_PRETTY_PRINT); ?>;
      graficar();
    </script>
  </body>
</html>
