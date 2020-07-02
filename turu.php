<?php

function request($url, $headers, $put = null) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	if($put):
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	endif;
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	if($headers):
    curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	endif;
	curl_setopt($ch, CURLOPT_ENCODING, "GZIP");
	return curl_exec($ch);
}

function regis($email, $nomor, $id) {
$url = "https://m.borongbareng.com/api-gateway/service-marketing/app/bargain/help/$id";
//$data = '[{"operationName":"OTPRequest","variables":{"email":"'.$email.'","otpType":"126","mode":"email","otpDigit":4},"query":"query OTPRequest($otpType: String!, $mode: String, $msisdn: String, $email: String, $otpDigit: Int) {\n  OTPRequest(otpType: $otpType, mode: $mode, msisdn: $msisdn, email: $email, otpDigit: $otpDigit) {\n    success\n    message\n    errorMessage\n    __typename\n  }\n}\n"}]';
$headers = array();
$headers [] = "Host: m.borongbareng.com";
$headers [] = "Connection: close";
$headers [] = "Accept: application/json, text/plain, */*";
$headers [] = "language: Indonesian";
$headers [] = "Authorization: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJBcHAiLCJleHAiOjE1OTM3NjI5NTksImlhdCI6MTU5MzY3NjU1OSwidXNlciI6IntcImlkXCI6MjA4MzYsXCJuaWNrbmFtZVwiOlwiODUqKiozMjAyNFwiLFwidXNlcm5hbWVcIjpcIig2Mik4NTY3MzMyMDI0XCIsXCJhdmF0YXJcIjpcImh0dHBzOi8vYm9yb25nYmFyZW5nLWg1Lm9zcy1hcC1zb3V0aGVhc3QtNS5hbGl5dW5jcy5jb20vZGV2LzIwMjAwNDEzL2MwYmY5Njk0M2NhMTRhZTQ5NmM5MDgwNGE3ZjNmM2FkLmpwZ1wiLFwibGFuZ3VhZ2VcIjpudWxsfSJ9.CG-tLI0m-xuVSw3MGTcy_y0Ukkd1ANaLJIFs2eCFYVA";
$headers [] = "User-Agent: Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Mobile Safari/537.36";
$headers [] = "Sec-Fetch-Site: same-origin";
$headers [] = "Sec-Fetch-Mode: cors";
$headers [] = "Sec-Fetch-Dest: empty";
$headers [] = "Referer: https://m.borongbareng.com/";
$headers [] = "Accept-Encoding: gzip, deflate";
$headers [] = "Accept-Language: en-US,en;q=0.9";
$headers [] = "Cookie: _ga=GA1.2.513239636.1592924479; _gid=GA1.2.728015094.1593092400; _gat_gtag_UA_164611555_2=1";

$getotp = request($url, $headers);
$json = json_decode($getotp, true);
$a = $json['message'];

if ($json['code'] == 0) {
	echo "$nomor --> berhasil slash\n";
} else {
	echo "$nomor --> $a";
	echo "\n";
}

echo "=========================\n";
echo "Borong Barang Slash\n";
echo "Created by @ikballnh\n";
echo "=========================\n";
echo "Masukan ID: ";
$id = trim(fgets(STDIN));
$getno = getno($id);
//echo "$getno";

$data = file_get_contents(token1.txt);
$ex = explode("\n", str_replace("\r", "", $data));
$count = count($ex);
for($i=0;$i<$count;$i++) {
$nomor = 1+ $i;
regis($ex[$i], $nomor, $getno);
}
