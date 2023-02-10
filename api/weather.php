<?php

$tinh = $_GET['tinh'];


function wind_cardinals($deg) {
	$cardinalDirections = array(
		'Bắc' => array(348.75, 360),
		'Bắc' => array(0, 11.25),
		'Bắc Đông Bắc' => array(11.25, 33.75),
		'Đông Bắc' => array(33.75, 56.25),
		'Đông Đông Bắc' => array(56.25, 78.75),
		'Đông' => array(78.75, 101.25),
		'Đông Đông Nam' => array(101.25, 123.75),
		'Đông Nam' => array(123.75, 146.25),
		'Nam Đông Nam' => array(146.25, 168.75),
		'Nam' => array(168.75, 191.25),
		'Nam Tây Nam' => array(191.25, 213.75),
		'Tây Nam' => array(213.75, 236.25),
		'Tây Tây Nam' => array(236.25, 258.75),
		'Tây' => array(258.75, 281.25),
		'Tây Tây Bắc' => array(281.25, 303.75),
		'Tây Bắc' => array(303.75, 326.25),
		'Bắc Tây Bắc' => array(326.25, 348.75)
	);
	foreach ($cardinalDirections as $dir => $angles) {
			if ($deg >= $angles[0] && $deg < $angles[1]) {
				$cardinal = $dir;
			}
		}
		return $cardinal;
}
//echo $tinh . " " . $nation;


$link = "https://community-open-weather-map.p.rapidapi.com/weather?mode=json&lang=vi&q=".urlencode($tinh).'%2CVN';
//echo $link;
require_once 'vendor/mashape/unirest-php/src/Unirest.php';
$response = Unirest\Request::get("$link",
  array(
    "X-RapidAPI-Host" => "community-open-weather-map.p.rapidapi.com",
    "X-RapidAPI-Key" => "wS1vRh1YnVmshVblXbKn73LMHl33p1bSpwHjsn0Ky5H1xXSXQJ"
  )
);
//print_r ($response);
$res = json_encode($response);
$arr = json_decode($res, true);
$body = $arr['body'];
$thongtin = $body['weather']['0']['description'];
$temp_min = $body['main']['temp_min'];
//$temp_max = $body['main']['temp_max'];
$const = '273.15';
$min = ($temp_min - $const);
//$max = ($temp_max - $const);
//echo $min;
//echo $max;
$wind_speed = $body['wind']['speed'];
$wind_deg = $body['wind']['deg'];
$cloud = $body['clouds']['all']; 
$timeget = $body['dt']; 
$timeget1 = date('d/m/Y', $timeget);
$bien = wind_cardinals($wind_deg);
$icon = $body['weather']['0']['icon'];
$tentinh = $body['name']; 
$rep = nl2br("Thời tiết tại $tentinh ngày $timeget1 : $thongtin ");
if ($timeget1=="01/01/1970")
{
	$rep1  = array(
        'messages' => array(
            0 => array(
              'text' => "Xin lỗi mình không biết thời tiết tỉnh này :(("
            ),
		)
    );
}	
else {
	$rep1  = array(
        'messages' => array(
            0 => array(
              'text' => $rep
            ),
			1 => array(
			   'text' => 'Nhiệt độ trung bình là: '. $min .'°C'
			),
			2 => array(
				'text' => 'Tốc độ gió : ' .$wind_speed. 'm/s theo hướng ' .$bien
			),
			3 =>array (
				'text' => 'Độ phủ mây :' .$cloud. '%'
				
			),
        )
    );
}    
  echo json_encode($rep1);




