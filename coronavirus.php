<?php
error_reporting(0);
$data = file_get_contents('https://code.junookyo.xyz/api/ncov-moh/index.php?type=vn');
$dta = json_decode($data,TRUE);
//print_r($dta);


$confirmed= $dta['data'][vietnam]['cases'];
$recovered= $dta['data'][vietnam]['recovered'];
$death= $dta['data'][vietnam]['deaths'];

//echo "Số ca nhiễm :".$confirmed."---------";
//echo "Số ca hồi phục :".$recovered;
//echo "Số ca tử vong :".$death;


  $rep  = array(
        'messages' => array(
            0 => array(
              'text' => 'Cập nhật tình hình Covid-19 ở Việt Nam ngày '  . date("d/m/Y")         
		 ),
		  1 => array(
              'text' => '+ Số ca nhiễm: '.$confirmed 
		 ),
		 2 => array(
              'text' => '+ Hồi phục: '.$recovered 
		 ),
		 3 => array(
              'text' => '+ Tử vong: '.$death 
		 ),
        )
    );

echo json_encode($rep);
