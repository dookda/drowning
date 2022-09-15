<?php
    $url = "https://f464-202-28-250-87.ngrok.io/api/pushmsg";

    $data = array(
        'userId'=>'U176de9c656286feb470b121c184e1356'
    );
    $ch = curl_init($url);
    $jsonDataEncoded = json_encode($data);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
    $result = curl_exec($ch);

?>