<?php
 
// Codigo robado para webscrapping

header("Content-Type: text/plain");
$ch = curl_init("https://loteriasdominicanas.com/");
curl_setopt($ch, CURLOPT_HEADER, 0);
$response = curl_exec($ch);
 
if (curl_error($ch)) {
    echo curl_error($ch);
} else {
    echo $response;
}
 
curl_close($ch);
?>