<?php


class Runner{
	function setFinishTime($finishTime){
		$this->finishTime=$finishTime;
	}

	function setNetTime($netTime){
		$this->netTime=$netTime;
	}
	
	function getFinishTimeInSecond(){
		return -1;
	}	
}

class MarathonTest extends PHPUnit_Framework_TestCase
{

	function testRunnerIsNotShowup(){
		$runner=new Runner();
		$runner->setFinishTime("00:00:00");
		$runner->setNetTime("00:00:00");
		$this->assertEquals(-1,$runner->getFinishTimeInSecond());

	}
}
