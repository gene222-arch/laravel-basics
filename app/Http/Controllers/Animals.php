<?php

class Animals 
{
    public function eyes()
    {

    }

    protected function bark()
    {
        $this->process1();
    }

    private function process1()
    {
           // 1000 lines of code
    }
}

class Dog extends Animals
{
    public function test()
    {
        $this->bark();
    }
}

$dog = new Dog;
$dog->bark();