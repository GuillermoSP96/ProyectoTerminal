<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Monitoreo de red</title>
    <link rel="stylesheet" href="CSS/estilo.css">
    <script src="JS/plotly-latest.min.js"></script>
    <script src="JS/grafica.js" type="text/javascript"></script>
  <body>
    <button>
      <a href="/">
        Inicio
      </a>
    </button>
    <button>
      <a href="javascript:location.reload()">Actualizar página</a>
    </button>
    <center><h1>Monitoreo de la red</h1></center>
    <div id="myDiv1"></div>
    <div id="myDiv2"></div>
    <script>
    setInterval(function(){
      var json = readTextFile("JSON/data.json");
      var my_json = JSON.parse(json);
      graficar(my_json);
    },15);
    </script>
  </body>
</html>
