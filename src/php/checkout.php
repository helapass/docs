<?php

$url = "https://sandbox.helapass.com/api/mer_transfer";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = <<<DATA
{
  "merchant_key":"MERCHANT KEY",
  "public_key":"PUBLIC KEY",
  "callback_url":"https://www.mydomain.com/success.html",
  "return_url":"https//www.mydomain.com/return.html",
  "tx_ref":"REF_usergenerated",
  "amount":"10000",
  "email":"mail@example.com",
  "first_name":"Finn",
  "last_name":"Marshal",
  "title":"RPI",
  "description":"Payment For RPI",
  "quantity":"10",
  "currency":"87"
}
DATA;

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);

?>
