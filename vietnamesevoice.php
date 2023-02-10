<?php
$tex = $_GET["text"];
$tex1 = rtrim($tex);
$search = [' '];
$replace   = ['%20'];
$result = str_replace($search, $replace, $tex);
echo '
{
  "messages": [ 
    {
      "attachment": {
        "type": "audio",
        "payload": {
          "url": "https://translate.google.com.vn/translate_tts?ie=UTF-8&q='.$result.'&tl=vi&client=tw-ob"
        }
      }
    }
  ]
}';

?>
