<?php 
$url =$_GET['url'];
$urll = urlencode($url);
$link = 'https://getvideo.p.mashape.com/?url='.$urll;

require_once 'vendor/mashape/unirest-php/src/Unirest.php';
// This code snippet uses an open-source library. http://unirest.io/php
$response = Unirest\Request::get("$link",
  array(
    "X-Mashape-Key" => "wS1vRh1YnVmshVblXbKn73LMHl33p1bSpwHjsn0Ky5H1xXSXQJ",
    "Accept" => "text/plain"
  )
);

$res = json_encode($response);
$arr = json_decode($res, true);

$namevideo = $arr['body']['title'];
$thumb = $arr['body']['thumbnail'];
$audio = $arr['body']['streams']['0']['url'];
//print_r ($arr);
//echo $thumb;
//echo $audio;

echo $arr['body']['streams']['0']['url'];
