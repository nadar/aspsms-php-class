<?php
/**
 * Basic usage to send a single sms
 */

// enable error reporting for texting purpose.
error_reporting(E_ALL);
 
// include the aspsms class
require "../aspsms/Aspsms.php";

use Aspsms\Aspsms;

// define your configuration informations
define("ASPSMS_KEY", "YOUR_ASPSMS_KEY");
define("ASPSMS_PASSWORD", "YOUR_ASPSMS_PASSWORD");
define("ASPSMS_ORIGINATOR", "<SENDING_NAME>");

$aspsms = new Aspsms(ASPSMS_KEY, ASPSMS_PASSWORD, array(
	"Originator" => ASPSMS_ORIGINATOR
));

// you shold verify if you tracking and mobile number are allowed.
$trackingNumber = Aspsms::verifyTrackingNumber("BASIC_TRACKING_" . time());
$mobileNumber = Aspsms::verifyMobileNumber("079 123 45 67");

// send text message
$send = $aspsms->sendTextSms("Hello World!", array(
	$trackingNumber => $mobileNumber
));

if (!$send) {
	echo "Aspsms sending error: " . $aspsms->getSendStatus();
} else {
	echo "Ok. Your SMS has been send to the Aspsms Network. Tracking-Number for delivery informations: " . $trackingNumber;
}

// in our example script we send the message wait for 10 seconds and try to get the delivery informations afterwards.
sleep(10);

$status = $aspsms->deliveryStatus($trackingNumber);

if (!$status['deliveryStatusBool']) {
	echo "<br />Not Delivered. Status Response: " . $status['deliveryStatus']; 
} else {
	echo "<br />The message has been delivered. Tracking-Informations: " . print_r($status, true);
}