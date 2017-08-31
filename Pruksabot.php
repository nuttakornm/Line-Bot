<?php
/**
 * Copyright 2016 LINE Corporation
 *
 * LINE Corporation licenses this file to you under the Apache License,
 * version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at:
 *
 *   https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

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
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'text' => $message['text']
                    ));
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
