<?php

require "ConverterTest.php";

class Runner
{
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
        $convert = new Converter($this->finishTime);
        if ($convert->toSecond() == 0) {
            return -1;
        } else if ($convert->toSecond() > 25200) {
            return 0;
        }

        return 0;
    }
}

class MarathonTest extends PHPUnit_Framework_TestCase
{

    public function testRunnerIsNotShowup()
    {
        $runner = new Runner();
        $runner->setFinishTime("00:00:00");
        $runner->setNetTime("00:00:00");
        $this->assertEquals(-1, $runner->getFinishTimeInSecond());

    }
    public function testRunnerIsOverTimeReturnZero()
    {
        $runner = new Runner();
        $runner->setFinishTime("07:00:00");
        $runner->setNetTime("07:00:00");
        $this->assertEquals(0, $runner->getFinishTimeInSecond());
    }
}
