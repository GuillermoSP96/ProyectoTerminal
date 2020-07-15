<?php
  function read_json($json){
  $data = file_get_contents($json);
  $products = json_decode($data, true);
  foreach ($products as $product) {
      echo '<pre>';
      print_r($product);
      echo '</pre>';
  }
}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      read_json('data.json');
    ?>

  </body>
</html>
