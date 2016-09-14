<?php

require "ConverterTest.php";

class Runner
{

	private function convertTimeToSecond($time){
		$SEVEN_HOURS = 25200;
        $NO_RUNING_TIME = 0;

        $convert = new Converter($time);
        $second = $convert->toSecond();

        if ($second == $NO_RUNING_TIME) {
            return -1;
        } else if ($second > $SEVEN_HOURS) {
            return 0;
        } else if ($second > $NO_RUNING_TIME && $second < $SEVEN_HOURS) {
            return $second;
        }

        return 0;
	}
    public function setFinishTime($finishTime)
    {
        $this->finishTime = $finishTime;
    }

    public function setNetTime($netTime)
    {
        $this->netTime = $netTime;
    }


    public function getFinishTimeInSecond()
    {
        return $this->convertTimeToSecond($this->finishTime);
    }

    function getNetTimeInSecond(){
    	return $this->convertTimeToSecond($this->netTime);
    }
}

class MarathonTest extends PHPUnit_Framework_TestCase
{
    public function testRunnerNetTimeIsNotShowup()
    {
        $runner = new Runner();
        $runner->setNetTime("00:00:00");
        $this->assertEquals(-1,$runner->getNetTimeInSecond());
    }

    public function testRunnerFinishTimeInTime()
    {
        $runner = new Runner();
        $runner->setFinishTime("02:01:01");
        $this->assertEquals(7261, $runner->getFinishTimeInSecond());
    }

    public function testRunnerFinishTimeIsNotShowup()
    {
        $runner = new Runner();
        $runner->setFinishTime("00:00:00");
        $this->assertEquals(-1, $runner->getFinishTimeInSecond());

    }
    public function testRunnerFinishTimeIsOverTimeReturnZero()
    {
        $runner = new Runner();
        $runner->setFinishTime("07:00:00");
        $this->assertEquals(0, $runner->getFinishTimeInSecond());
    }
}
