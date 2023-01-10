<?php

use PHPUnit\Framework\TestCase;

require_once 'Counter.class.php';

class CounterTest extends TestCase
{
    private $counter;

    public function __construct()
    {
        parent::__construct();
        $this->counter = new Counter();
    }

    public function testBasicCounting()
    {
        // Act
        $this->counter->add();
        $result = $this->counter->getCount();

        // Assert
        $this->assertEquals;
    }
}

?>