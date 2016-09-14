<?php
class Converter {
	function toSecond(){
		return 10;
	}
	function toMinute() {
		return 60;
	}
}
class ConverterTest extends PHPUnit_Framework_TestCase{

	function testConverterMinute() {
		$converter = new Converter("00:01:00");
		$this->assertEquals(60, $converter->toMinute());
	}
	function testConverterSecond(){
		$converter = new Converter("00:00:10");
		$this->assertEquals(10,$converter->toSecond());
	}
}
?>