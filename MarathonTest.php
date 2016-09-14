<?php

require "ConverterTest.php";

class SortOverall
{

    public function addRunners($runners)
    {
        $this->runners = $runners;
    }

    public function getWinner()
    {
        usort($this->runners, array("SortOverall", "sortByFinishTimeInSecond"));
        return $this->runners[0];
    }

    public function getRankingTop3()
    {
        usort($this->runners, array("SortOverall", "sortByFinishTimeInSecond"));
        return array_slice($this->runners,0,3,true);
    }

    function sortByFinishTimeInSecond($a, $b) {
    	if ($a->getFinishTimeInSecond() == $b->getFinishTimeInSecond()) {
    		return 0;
    	}
    	return ($a->getFinishTimeInSecond() < $b->getFinishTimeInSecond()) ? -1 : 1;
    }
}

class Runner
{

    public $name;

    public function __construct($runnerName = null, $finishTime = null)
    {
        $this->finishTime = $finishTime;
        $this->name = $runnerName;
    }
    public function convertTimeToSecond($time)
    {
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

    public function getNetTimeInSecond()
    {
        return $this->convertTimeToSecond($this->netTime);
    }
}

class MarathonTest extends PHPUnit_Framework_TestCase
{

    public function testSortingOverall()
    {
        $runners = [
            new Runner("A", "00:50:00"),
            new Runner("C", "01:01:01"),
            new Runner("D", "00:50:55"),
            new Runner("E", "05:01:01"),
            new Runner("F", "00:50:43"),
            new Runner("G", "01:56:33"),
            new Runner("H", "03:11:11"),
            new Runner("Winner", "00:44:21"),
            new Runner("J", "02:22:11"),
        ];
        $sort = new SortOverall();
        $sort->addRunners($runners);

        $this->assertEquals("Winner", $sort->getWinner()->name);
    }
    public function testSortingOverallRankingTop3()
    {
        $runners = [
            new Runner("Second", "00:50:00"),
            new Runner("C", "01:01:01"),
            new Runner("X", "00:50:55"),
            new Runner("E", "05:01:01"),
            new Runner("Third", "00:50:43"),
            new Runner("G", "01:56:33"),
            new Runner("H", "03:11:11"),
            new Runner("Winner", "00:44:21"),
            new Runner("J", "02:22:11"),
        ];
        $sort = new SortOverall();
        $sort->addRunners($runners);
        $topThree =  $sort->getRankingTop3();
        $this->assertEquals("Winner Second Third", $topThree[0]->name." ".$topThree[1]->name." ".$topThree[2]->name);
    }

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
