<?php
/**
 * Just get the delivery status for a tracking number.
 */

// enable error reporting for texting purpose.
error_reporting(E_ALL);
 
// include the aspsms class
require "../aspsms/Aspsms.php";

use Aspsms\Aspsms;

// define your configuration informations
define("ASPSMS_KEY", "YOUR_ASPSMS_KEY");
define("ASPSMS_PASSWORD", "YOUR_ASPSMS_PASSWORD");

$trackingNumber = "TRACKING_NUMBER_TO_FIND";

$aspsms = new Aspsms(ASPSMS_KEY, ASPSMS_PASSWORD);

$status = $aspsms->deliveryStatus($trackingNumber);

var_dump($status);
