<?php
class Converter
{
    public function __construct($time)
    {
        $this->time = $time;
    }
    public function toSecond()
    {
        $runningTime = date_parse($this->time);
        return $runningTime["hour"] * 3600 + $runningTime["minute"] * 60 + $runningTime["second"];
    }
}
class ConverterTest extends PHPUnit_Framework_TestCase
{
	
	public function testConverterFiftynineMinute(){
		$convert = new Converter("00:59:00");
		$this->assertEquals(60*59,$convert->toSecond());
	}
    public function testConverterOneHour()
    {
        $converter = new Converter("01:00:00");
        $this->assertEquals(3600, $converter->tosecond());
    }
    public function testConverterOneMinute()
    {
        $converter = new Converter("00:01:00");
        $this->assertEquals(60, $converter->toSecond());
    }
    public function testConverterFiftynineSecond()
    {
        $converter = new Converter("00:00:59");
        $this->assertEquals(59, $converter->toSecond());
    }
    public function testConverterElevenSecond()
    {
        $converter = new Converter("00:00:11");
        $this->assertEquals(11, $converter->toSecond());
    }
    public function testConverterTenSecond()
    {
        $converter = new Converter("00:00:10");
        $this->assertEquals(10, $converter->toSecond());
    }
}
