<?php

$tex = $_GET["text"];
$url = "https://zing-mp3.glitch.me/?url=".$tex;

$data = file_get_contents($url);
$convert = json_decode($data);
$array = json_decode(json_encode($convert), true);
$link = ($array['source']['audio']['320']['download']);
$tenbaihat = ($array['title']);
$casy = ($array['artist']);


 $messages[] = array(
                  'text' => "Bài " . $tenbaihat . " của ca sĩ " . $casy . " phải không nè !"
              );
                $messages[] = array(
                  'attachment' => array(
                      'type' => 'audio',
                      'payload' => array(
                          'url' => $link
                      )
                  )
              );
			 			  
              $msg        = array(
                  'messages' => $messages
              );
              
              echo json_encode($msg);
