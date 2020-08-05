<!DOCTYPE html>
<html>
    <head>
    <?php
        require 'conexion.php';
        $query = "SELECT * FROM dispositivo;";
        $result = $conn->query($query);
        $dispo = array();
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $dispo[] = $row;
          }
        }
        else{
          echo "<p>no hay dispositivos</p>";
        }
        $conn->close();
    ?>
    <?php
        require 'conexion.php';
        $query = "SELECT * FROM condispo;";
        $result = $conn->query($query);
        $enlace = array();
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $enlace[] = $row;
          }
        }
        else{
          echo "<p>no hay enlaces</p>";
        }
        $conn->close();
    ?>
        <link href="CSS/estilo.css" rel="stylesheet" type="text/css"/></link>
        <script src="JS/Dibujar.js" type="text/javascript"></script>
        <script src="JS/vis.js" type="text/javascript"></script>
        <link href="CSS/vis-network.min.css" rel="stylesheet" type="text/css"/></link>
        <link href="CSS/font-awesome.min.css" rel="stylesheet"></link>
    </head>
    <body onload="draw()">
        <button>
  			  <a href="/">
  				  Inicio
  			  </a>
  		  </button>
        <div id="mynetwork">
        </div>
        <div>
        <script type="text/javascript">

            var dispositivos = <?php echo  json_encode($dispo,JSON_PRETTY_PRINT); ?>;
            var enlaces = <?php echo  json_encode($enlace,JSON_PRETTY_PRINT); ?>;
            p(dispositivos,enlaces);
        </script>
        </div>
        <div id="get">
        </div>
    </body>
</html>
