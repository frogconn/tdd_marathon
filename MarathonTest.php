<?php

class MarathonTest extends PHPUnit_Framework_TestCase
{
	

    public function testRunnerNetTimeIsNotShowup()
    {
        $runner = new Runner();
        $runner->setNetTime("00:00:00");
        $this->assertEquals(-1, $runner->getNetTimeInSecond());
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
