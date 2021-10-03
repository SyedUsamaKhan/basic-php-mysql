<?php
  $countt = 0;
  $find = 'khan';
  $names = array('khan','usama','khan', 'rauf','john','alex');
  $arrayLngth = count($names);
    for($i = 0; $i < $arrayLngth; $i++){
        //   echo strpos($names[$i], $find);
        if($names[$i] == $find ){
            $countt++;
        }
    }
    echo $countt;
?>