<?php

$atoken = require('aTokenCreate.php');
//echo $atoken;

$payerID = $_POST['field1'];
//echo $payerID;
$urlExec = $_POST['field2'];
//echo $urlExec;
//echo $url;

// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $urlExec);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n\n  \"payer_id\": \"$payerID\"\n\n}");

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: Bearer '. $atoken;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
echo $result;
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

?>