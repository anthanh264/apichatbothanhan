<?php
  $min=$_GET['min'];
  $max=$_GET['max'];
  $res=rand($min,$max);

  $rep  = array(
        'messages' => array(
            0 => array(
              'text' => 'Number : ' . $res 
         
		 ),
        )
    );
  echo json_encode($rep);
?>
  
