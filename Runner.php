<?php
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