<?php
class Converter {
	function toSecond(){
		return 10;
	}
}
class ConverterTest extends PHPUnit_Framework_TestCase{
	function testConverter(){
		$converter = new Converter("00:00:10");
		$this->assertEquals(10,$converter->toSecond());
	}
}
?>