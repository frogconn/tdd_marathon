<?php
class SortOverallTest extends PHPUnit_Framework_TestCase{
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
}