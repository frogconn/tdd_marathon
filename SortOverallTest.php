<?php
class SortOverallTest extends PHPUnit_Framework_TestCase{
    public function testSortingOverall()
    {

        $runners = [
           RunnerFactory::createRunner("A", "00:50:00"),
            RunnerFactory::createRunner("C", "01:01:01"),
            RunnerFactory::createRunner("D", "00:50:55"),
            RunnerFactory::createRunner("E", "05:01:01"),
            RunnerFactory::createRunner("F", "00:50:43"),
            RunnerFactory::createRunner("G", "01:56:33"),
            RunnerFactory::createRunner("H", "03:11:11"),
            RunnerFactory::createRunner("Winner", "00:44:21"),
            RunnerFactory::createRunner("J", "02:22:11"),
        ];
        $sort = new SortOverall();
        $sort->addRunners($runners);

        $this->assertEquals("Winner", $sort->getWinner()->name);
    }
    public function testSortingOverallRankingTop3()
    {
        $runners = [
            RunnerFactory::createRunner("Second", "00:50:00"),
            RunnerFactory::createRunner("C", "01:01:01"),
            RunnerFactory::createRunner("X", "00:50:55"),
            RunnerFactory::createRunner("E", "05:01:01"),
            RunnerFactory::createRunner("Third", "00:50:43"),
            RunnerFactory::createRunner("G", "01:56:33"),
            RunnerFactory::createRunner("H", "03:11:11"),
            RunnerFactory::createRunner("Winner", "00:44:21"),
            RunnerFactory::createRunner("J", "02:22:11"),
        ];
        $sort = new SortOverall();
        $sort->addRunners($runners);
        $topThree =  $sort->getRankingTop3();
        $this->assertEquals("Winner Second Third", $topThree[0]->name." ".$topThree[1]->name." ".$topThree[2]->name);
    }
}