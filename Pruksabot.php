<?php

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('<channel access token>');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '<channel secret>']);

require_once('./LINEBotTiny.php');
$channelAccessToken = 'UJBYom3pGsI+XFblW/a3GqcL3Kah7U+t5ENQNdMKCIyB/u91jhfIHbfBkIHsRaP9Y3XFLE7M8+hPCeH0hGzI8lMMGuayWABGfUTZ4tDFTPWMQqxKNx/GNYKSF95lBGcq6T2Npz8lni5Hj3xyttHNUwdB04t89/1O/w1cDnyilFU=';
$channelSecret = '2934c7322d4e6b01df2f0c498d86c87f';
$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':
                    $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
                    $response = $bot->replyMessage('<replyToken>', $textMessageBuilder);
                    echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
                    break;
                default:
                    error_log("Unsupporeted message type: " . $message['type']);
                    break;
            }
            break;
        default:
            error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
};
