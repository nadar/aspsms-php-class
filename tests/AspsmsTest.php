<?php

require '../vendor/autoload.php';
require '../aspsms/Aspsms.php';

use Aspsms\Aspsms;

class AspsmsTest extends PHPUnit_Framework_TestCase {
	
	public $aspsms = null;
	
	public function setUp () {
		$this->aspsms = new Aspsms(ASPSMS_KEY, ASPSMS_PASSWORD, array("Originator" => ASPSMS_ORIGINATOR));
	}
	
	public function testSendTextSms() {
		
		$sendSms = $this->aspsms->sendTextSms("example", array("number"));
		
		$this->assertEquals(FALSE, $sendSms);
	}
	
	public function testVerifyTrackingNumber () {
		$value = "123456789abcedefghijklmnopqrstuv";
		
		$this->assertEquals($value, $this->aspsms->verifyTrackingNumber($value));
		
		$value = "+123456789!?abcdefg";
		$this->assertEquals("123456789", $this->aspsms->verifyMobileNumber($value));
	}
	
	public function testVerifyMobileNumber () {
		$value = "0123456789";
		$this->assertEquals($value, $this->aspsms->verifyMobileNumber($value));
		
		$value = "+0123456789abcdefgh!?";
		$this->assertEquals("0123456789", $this->aspsms->verifyMobileNumber($value));
	}
	
	public function testDeliveryStatus () {
		$tr = $this->aspsms->deliveryStatus("12345");
		var_dump($tr);
	}
	
}
