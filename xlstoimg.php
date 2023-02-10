<?php
$url = "https://s2.aconvert.com/convert/api-win.php?code=86000&targetformat=png&url=$_GET[url]";
//echo $url;
$data = file_get_contents($url);
$data1 = json_decode($data, TRUE);
$data2 = $data1['result'];

$link = trim($data2);
$reply = array(
	"messages" => array(
		0 => array(
			"attachment" => array(
				"type" => "image",
				"payload" => array(
					"url" => $link
				)
			)
		)
	)
);

// Encode mảng thành JSON rồi in kết quả
echo json_encode($reply);
