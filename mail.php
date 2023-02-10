<?php
$urlhi = 'https://10minutemail.net/address.api.php';
$connect = file_get_contents($urlhi);
$dc = json_decode($connect);
$mail = $dc->mail_get_mail;
$mailtime = $dc->mail_left_time;
$urlmail = $dc->url;


$keyreduce = $dc->key;
$mailid = $dc->mail_id;
$frommail = $dc->from;
$subjectmail = $dc->subject;
$datetimemail = $dc->datetime;
$datetimeout = $dc->datetime2;


 $rep  = array(
        'messages' => array(
            0 => array(
              'text' => 'Mail :  ' . $mail
            ),
            1 => array(
              'text' => 'Thời gian còn : ' . $mailtime
            ),
            2 => array(
              'text' => 'Link Inbox mail : ' . $urlmail
            ),
			3 => array(
              'text' => 'Key : ' . $keyreduce
            ),
	   )
    );
  echo json_encode($rep);

