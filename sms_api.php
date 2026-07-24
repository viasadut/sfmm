<?php

function callAPI($url, $data, $token = null) {
    $ch = curl_init($url);
    $payload = json_encode($data);

    $headers = [
        'Content-Type: application/json',
        'Accept: application/json',
        'Content-Length: ' . strlen($payload)
    ];

    if ($token) {
        $headers[] = 'Authorization: Bearer ' . $token;
    }

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => $payload,
        CURLOPT_HTTPHEADER     => $headers,
        CURLOPT_CONNECTTIMEOUT => 10,
        CURLOPT_TIMEOUT        => 20,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => 0
    ]);

    $response = curl_exec($ch);

    if ($response === false) {
        throw new Exception("Curl error: " . curl_error($ch));
    }

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode !== 200) {
        throw new Exception("HTTP Error: $httpCode | Response: $response");
    }

    return json_decode($response, true);
}

// ---------- SMS FUNCTION----------
function sendSMS($receiver, $message) {

    $API_BASE_URL = "https://api.mobireach.com.bd/";

    //Get Token
    $tokenResponse = callAPI($API_BASE_URL . "auth/tokens", [
        "username" => "sfmc",
        "password" => "Ada@si@2022"
    ]);

    if (empty($tokenResponse['token'])) {
        return [
            'success' => false,
            'error'   => 'Token not received'
        ];
    }

    //Normalize receiver
    if (!is_array($receiver)) {
        $receiver = [$receiver];
    }

    //Send SMS
    return callAPI(
        $API_BASE_URL . "sms/send",
        [
            "sender"       => "8801810008062",
            "receiver"     => $receiver,
            "content"      => $message,
            "msgType"      => "T",
            "requestType"  => "S",
            "contentType"  => 1
        ],
        $tokenResponse['token']
    );
}
//$phone='01711206048';
//$msg='test steven';
//Send SMS
//sendSMS("01711206048", "Good Morning Noman");
sendSMS("01711206048", "Good Morning Noman");
				



?>