<?php
header("Access-Control-Allow-Origin: *");

$base64data = base64_encode(file_get_contents($_GET['imgurl']));
$headerArray = get_headers($_GET['imgurl']);

for($i = 0; $i < count($headerArray) ;$i++){
  if(preg_match("/Content-Type: image/", $headerArray[$i])){
    $imgType = str_replace("Content-Type: ", "", get_headers($_GET['imgurl'])[$i]);
  }
}
echo 'data:'.$imgType.';base64,'.$base64data;

exit();
?>
