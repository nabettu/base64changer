<?php

header('Access-Control-Allow-Origin: *');

$cp = curl_init();
curl_setopt($cp, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($cp, CURLOPT_URL, $_GET['imgurl']);
curl_setopt($cp, CURLOPT_TIMEOUT, 60);
$data = curl_exec($cp);
curl_close($cp);

$base64data = base64_encode($data);
$imgType = substr($_GET['imgurl'], strrpos($_GET['imgurl'],".") + 1);

echo 'data:image/'.$imgType.';base64,'.$base64data;

exit();
