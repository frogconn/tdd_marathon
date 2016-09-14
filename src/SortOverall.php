<?php
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
