<?php
error_reporting(0);
$url=$_GET['url'];
$data = json_decode(curl_post("http://api.rest7.com/v1/sound_waveform.php", "url=".urlencode($url)."&api_key=9eda3676f9283667ed1644d27f86ad5c2dea72ea"));
function curl_post($url, $post)
{
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
$myfile = fopen("out.txt", "w") or die("Unable to open file!");

fwrite($myfile, $url);
fclose($myfile);

 $array = json_decode(json_encode($data), true);
 //print_R ($array);
 $link = $array['file'];
 $success = $array['success'];
 if ($success=='1')
 {$rep  = array(
        'messages' => array(
            0 => array(
                'attachment' => array(
                    'type' => 'image',
                    'payload' => array(
                        'url' => $link
                    )
                )
            )
        ),
    );
  echo json_encode($rep);
}
 else {
 $rep = array(
            'messages' => array(
                0 => array(
                    'text' => 'Sorry:((('
                ), 
            )
        );
}
echo json_encode($rep);
