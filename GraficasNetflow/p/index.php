
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $json = 'data.json';
      $data = file_get_contents($json);
      $array = json_decode($data);
      foreach($array as $obj){
              $LAST_SWITCHED= $obj->LAST_SWITCHED;
              $FIRST_SWITCHED= $obj->FIRST_SWITCHED;
              $IN_BYTES= $obj->IN_BYTES;
              $IN_PKTS= $obj->IN_PKTS;
              $INPUT_SNMP= $obj->INPUT_SNMP;
              $OUTPUT_SNMP= $obj->OUTPUT_SNMP;
              $IPV4_SRC_ADDR= $obj->IPV4_SRC_ADDR;
              $IPV4_DST_ADDR= $obj->IPV4_DST_ADDR;
              $PROTOCOL= $obj->PROTOCOL;
              $SRC_TOS= $obj->SRC_TOS;
              $L4_SRC_PORT= $obj->L4_SRC_PORT;
              $L4_DST_PORT= $obj->L4_DST_PORT;
              $FLOW_SAMPLER_ID= $obj->FLOW_SAMPLER_ID;
              $UNKNOWN_FIELD_TYPE= $obj->UNKNOWN_FIELD_TYPE;
              $IPV4_NEXT_HOP= $obj->IPV4_NEXT_HOP;
              $DST_MASK= $obj->DST_MASK;
              $SRC_MASK= $obj->SRC_MASK;
              $TCP_FLAGS= $obj->TCP_FLAGS;
              $DIRECTION= $obj->DIRECTION;
              $DST_AS= $obj->DST_AS;
              $SRC_AS= $obj->SRC_AS;
              echo $IPV4_SRC_ADDR." --> ".$IPV4_DST_ADDR." = ".$IN_BYTES."<br>";
              echo "   ";
      }
    ?>
  </body>
</html>
