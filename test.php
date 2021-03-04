<?php
//get a list of addresses that contain the value 2540
//using CURL in PHP
$url = "https://australianaddresses.net.au/d?q=2540";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);

?>
