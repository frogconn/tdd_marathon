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
        $SEVEN_HOURS = 25200;
        $NO_RUNING_TIME = 0;

        $convert = new Converter($this->finishTime);
        if ($convert->toSecond() == $NO_RUNING_TIME) {
            return -1;
        } else if ($convert->toSecond() > $SEVEN_HOURS) {
            return 0;
        } else if ($convert->toSecond() > $NO_RUNING_TIME && $convert->toSecond() < $SEVEN_HOURS) {
            return $convert->toSecond();
        }

        return 0;
    }
}

class MarathonTest extends PHPUnit_Framework_TestCase
{

    public function testRunnerInTime()
    {
        $runner = new Runner();
        $runner->setFinishTime("02:01:01");
        $runner->setNetTime("02:01:01");
        $this->assertEquals(7261, $runner->getFinishTimeInSecond());
    }

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
