<?php

// init aspsms class with originator option
$aspsms = new Aspsms('<YOUR_KEY>', '<YOUR_PASSWORD>', array(
    'Originator' => '<MY_SENDER_NAME>'
));

// set the message and recipients with tracking numbers.
$send = $aspsms->sendTextSms('<YOUR_SMS_MESSAGE>', array(
    '<TRACKING_NR1>' => '<MOBILE_PHONE_NR1>',
    '<TRACKING_NR2>' => '<MOBILE_PHONE_NR2>',
    '<TRACKING_NR3>' => '<MOBILE_PHONE_NR3>'
));

// check for sending errors
if (!$send) {
    echo "Aspsms Error: " . $send->getSendStatus();
}

// script needs to sleep 10 seconds, because the delivery takes some time
sleep(10);

// check status after 10 seconds
$status1 = $aspsms->deliveryStatus('<TRACKING_NR1>');
$status2 = $aspsms->deliveryStatus('<TRACKING_NR2>');
$status3 = $aspsms->deliveryStatus('<TRACKING_NR3>');

var_dump($status1, $status2, $status3);