<?php
class RunnerFactory
{
    static function createRunner($runnerName, $finishTime) {
        $runner = new Runner($runnerName,$finishTime);
        $runner->finishTimeInSecond = RunnerFactory::convertTimeToSecond($finishTime);
        return $runner;
    }

    static function convertTimeToSecond($time)
    {
        $SEVEN_HOURS = 25200;
        $NO_RUNING_TIME = 0;

        $convert = new Converter($time);

        $second = $convert->toSecond();

        if ($second == $NO_RUNING_TIME) {
            return -1;
        } else if ($second >= $SEVEN_HOURS) {
            return 0;
        } else {
            return $second;
        }
    }
}