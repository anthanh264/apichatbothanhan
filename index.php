<?php
  function traketqua($noidung1, $noidung2)
  {
      $kqtrave = array(
          'messages' => array(
              0 => array(
                  'text' => addslashes($noidung1)
              ),
              1 => array(
                  'text' => addslashes($noidung2)
              )
          )
      );
      return json_encode($kqtrave);
  }
  $u = $_GET[u];
  $p = $_GET[p];
  if (empty($u)) { //cài cho hay
      echo traketqua('Hệ thống API ChatBot ThanhAnITChannel', '');
      exit;
  } elseif (empty($p)) { //cài cho hay
      echo traketqua('https://m.me/ThanhAnITChannel', 'https://m.me/ThanhAnITChannel');
      exit;
  }
  include 'iphone.php';
  if (isset($cookie)) {
      echo traketqua('COOKIE: ' . "\n" . $cookie, 'TOKEN: ' . "\n" . $token);
      exit;
  } else {
      echo traketqua($thongbao, 'Vui lòng thử lại!');
  }
  
?>
