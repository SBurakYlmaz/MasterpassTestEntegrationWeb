<?php

function token($timeZone, $msisdn, $userId, $requestReferenceNumber)
{
    $client_id = "34701736"; //34701736
    $msisdn_validated = "00"; //00
    $validationType = "00"; //00


    $data = array(
        "msisdn" => $msisdn,
        "timeZone" => $timeZone,
        "client_id" => $client_id,
        "validation_type" => $validationType,
        "msisdn_validated" => $msisdn_validated,
        "date_time" => date("Y-m-d H:i:s"),
        "user_id" => $userId,
        "req_ref_no" => $requestReferenceNumber,
    );

    $url = 'http://localhost:8080/register/regUser';
    $ch = curl_init($url);
    $postString = http_build_query($data, '', '&');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $token = $response;
    curl_close($ch);
    return $token;

}

?>