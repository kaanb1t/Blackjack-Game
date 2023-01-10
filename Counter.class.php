<?php

class Counter
{
    private $count = 0;
    
    public function add()
    {
        $this->count = $this->count + 1;
    }

        public function getCount()
    {
        return $this->count;
    }
}

?>