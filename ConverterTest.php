<?php
class Converter {
	function __construct($time) {
		$this->time = $time;
	}
	function toSecond(){
		$date = date_parse($this->time);
		return $date["hour"] * 3600 + $date["minute"] * 60 + $date["second"];
	}
}
class ConverterTest extends PHPUnit_Framework_TestCase{

	function testConverterElevenSecond() {
		$converter = new Converter("00:00:11");
		$this->assertEquals(11, $converter->toSecond());
	}
	function testConverterTenSecond(){
		$converter = new Converter("00:00:10");
		$this->assertEquals(10,$converter->toSecond());
	}
}
?>