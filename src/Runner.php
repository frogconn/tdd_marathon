<?php

class Runner
{

    public $name;
    public $finishTimeInSecond;

    public function __construct($runnerName = null, $finishTime = null)
    {
        $this->finishTime = $finishTime;
        $this->name = $runnerName;
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
        return $this->finishTimeInSecond;
    }

    public function getNetTimeInSecond()
    {
        return null;
    }
}
