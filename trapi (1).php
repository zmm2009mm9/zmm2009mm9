<?php

function translate($string, $langFrom, $langTo) {
    $url = 'https://translate.google.ru/translate_a/t';

    $queryData = array(
        'client' => 'x',
        'q' => $string,
        'sl' => "auto",
        'tl' => $langTo
    );



    $options = array(
        'http' => array(
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 YaBrowser/18.6.1.770 Yowser/2.5 Safari/537.36',
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => http_build_query($queryData)
        )
    );

    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    return $response;
}

header('Content-Type: application/json');
error_reporting(0);
$txc = $_GET["text"];
$tildan = $_GET["qr"];
$tilga = $_GET["tr"];

if (!empty($txc) && !empty($tilga)) {
    $result = translate($txc, $tildan, $tilga);
    $decodedResult = json_decode($result, true);
    $translatedText = $decodedResult[0][0] ?? '';
    
    echo $translatedText;
} else {
    echo json_encode([
        "result" => [
            "status" => "false",
            "message" => "Not Method langFrom langTo and text"
        ]
    ], JSON_PRETTY_PRINT);
}

?>