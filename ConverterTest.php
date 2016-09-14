<?php
class Converter {
	function __construct($time) {
		$this->time = $time;
	}
	function toSecond(){
		$runningTime = date_parse($this->time);
		return $runningTime["hour"] * 3600 + $runningTime["minute"] * 60 + $runningTime["second"];
	}
}
class ConverterTest extends PHPUnit_Framework_TestCase{

	function testConverterOneMinut(){
		$converter = new Converter("00:01:00");
		$this->assertEquals(60,$converter->toSecond());
	}
	function testConverterFiftynineSecond(){
		$converter = new Converter("00:00:59");
		$this->assertEquals(59,$converter->toSecond());
	}
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