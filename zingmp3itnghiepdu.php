<?php

$tex = $_GET["url"];
$url = "https://zing-mp3.glitch.me/?url=".$tex;

$data = file_get_contents($url);
$convert = json_decode($data);
$array = json_decode(json_encode($convert), true);
$link320 = ($array['source']['audio']['320']['download']);
$link128 =  ($array['source']['audio']['128']['download']);
$tenbaihat = ($array['title']);
$casy = ($array['artist']);
$rep = 'Bài hát '.$tenbaihat.' của ca sỹ '.$casy;


echo "<h3>" .$rep. "</h3>";

echo 'Link 320kbps :'.$link320;

 