<?php
  function json_decode_nice($json, $assoc = TRUE){
    $json = str_replace(array("\n","\r"),"\\n",$json);
    $json = preg_replace('/([{,]+)(\s*)([^"]+?)\s*:/','$1"$3":',$json);
    $json = preg_replace('/(,)\s*}$/','}',$json);
    return json_decode($json,$assoc);
  }
?>
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
