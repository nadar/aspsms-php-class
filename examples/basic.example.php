<?php
/**
 * Very basic usage example
 * 
 * WHAT WE WANT?
 * Sending 3 messages with 3 different tracking numbers, after sending the
 * messages to the network provider, we check the status of each delivery.
 */

// include library
include "../lib/aspsms.class.php";

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

// If something went wrong while sending, we want to see what happens.
if (!$send) {
    echo "Aspsms Error: " . $aspsms->getSendStatus();
}

// because the delivery takes some time, the script needs to sleep for 10 seconds.
sleep(10);

// check status after 10 seconds
$status1 = $aspsms->deliveryStatus('<TRACKING_NR1>');
$status2 = $aspsms->deliveryStatus('<TRACKING_NR2>');
$status3 = $aspsms->deliveryStatus('<TRACKING_NR3>');

// each $status<NR> returns an associativ array.
var_dump($status1, $status2, $status3);