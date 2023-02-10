<?php
$tex = $_GET["text"];
$tex1 = rtrim($tex);
$search = [' '];//tìm khoảng trống trong chuỗi vào 
$replace   = ['%20'];//thay bằng %20 để tạo liền liên kết audio 
$result = str_replace($search, $replace, $tex);
echo '
{
  "messages": [ 
    {
      "attachment": {
        "type": "audio",
        "payload": {
          "url": "https://translate.google.com.vn/translate_tts?ie=UTF-8&q='.$result.'&tl=en&client=tw-ob"
        }
      }
    }
  ]
}';

?>
