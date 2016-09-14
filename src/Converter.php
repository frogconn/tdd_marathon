<?php
class Converter
{
    public function __construct($time)
    {
        $this->time = $time;
    }
    public function toSecond()
    {
        $runningTime = date_parse($this->time);
        return $runningTime["hour"] * 3600 + $runningTime["minute"] * 60 + $runningTime["second"];
    }
}