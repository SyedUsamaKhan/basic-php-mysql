<?php

    $number = array(1,2,3,4,5,6,7,8,9,10);
    $lnghtNumber = count($number);
    for($i=0;$i < $lnghtNumber; $i++){
        if($number[$i]%2 != 0 ){
            echo "this is a odd number ". $number[$i]."<br>" ;
        }        
    }

    
?>