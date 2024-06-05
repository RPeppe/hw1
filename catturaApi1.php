<?php
require_once 'auth.php';

if (!checkAuth()) exit;

header('Content-Type: application/json');

$apikey = 'fca_live_2BHwIrWPLBTTXNMVSHldfqswiQHlRwEIGJu30Dx2';

$url = 'https://api.freecurrencyapi.com/v1/latest?apikey=' . $apikey;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
    exit;
}

curl_close($ch);
echo $response;

?>