<?php
require_once('vendor/autoload.php');   
$curl = new Curl\Curl();
$chatfuel = new Chatfuel\Chatfuel(TRUE);  
$baihat = isset($_GET['baihat']) ? $_GET['baihat'] : 'Lỗi';  
$url = "http://apichatbothanhan.herokuapp.com/nghenhac.php/?baihat=".urlencode($baihat);
$data = file_get_contents($url);
$convert = json_decode($data);
$array = json_decode(json_encode($convert), true);
$loi1 = ($array['messages']['0']['text']);
if ($loi1 == 'Không tìm được bài này')
{
	$urlfirst = 'http://ac.mp3.zing.vn/complete?type=artist,song,key,code&num=500&query='.urlencode($baihat);
	$datafirst = file_get_contents($urlfirst);
	$convertfirst = json_decode($datafirst);
	$arrayfirst= json_decode(json_encode($convertfirst), true);
	//print_r ($arrayfirst);
	$idsong = ($arrayfirst['data']['0']['song']['0']['id']); //print $idsong;
	$url = 'https://mp3.zing.vn/xhr/media/get-info?type=audio&id='.$idsong;
	$data = file_get_contents($url);
	$convert = json_decode($data);
	$array = json_decode(json_encode($convert), true);
	$link = 	'http://api.mp3.zing.vn/api/streaming/audio/'.$idsong.'/320';
	$tenbaihat = ($arrayfirst['data']['0']['song']['0']['name']);
	$casy = ($arrayfirst['data']['0']['song']['0']['artist']);
	$linkthumbraw = ($arrayfirst['data']['0']['song']['0']['thumb']);
	$linkthumb = 'https://photo-zmp3.zadn.vn/'.$linkthumbraw;
	if ($link !=null){
			$messages[] = array('text' => 'Bài ' . $tenbaihat . ' của ca sĩ ' . $casy . ' phải không nè !');
			$messages[] = array('attachment' => array('type' => 'image','payload' => array('url' => $linkthumb)));
			$messages[] = array('attachment' => array('type' => 'audio','payload' => array('url' => $link)));
			$msg        = array('messages' => $messages);  
			echo json_encode($msg);
	}
	else {
		$messages[] = array('text' => 'Xin lỗi mình không tìm được bài này :(((');
		$msg        = array('messages' => $messages);  
			echo json_encode($msg);
	}
	             
    echo json_encode($msg);
}
else if ($loi1 != 'Không tìm được bài này')
{
	$thumnct = ($array['messages']['1']['attachment']['payload']['url']);
	$linknct = ($array['messages']['2']['attachment']['payload']['url']);
	$messages[] = array('text' => $loi1);
	$messages[] = array('attachment' => array('type' => 'image','payload' => array('url' => $thumnct)));
    $messages[] = array('attachment' => array('type' => 'audio','payload' => array('url' => $linknct)));
    $msg        = array('messages' => $messages);
    echo json_encode($msg);
}

	
?>