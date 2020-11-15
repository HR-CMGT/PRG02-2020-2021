<?php

/**
 * Class Student
 */
class Student
{
    public $name;
    public $number;
    public $classNumber;

    /**
     * Student constructor.
     * @param $name
     * @param $number
     * @param $classNumber
     */
    public function __construct($name, $number, $classNumber)
    {
        $this->name = $name;
        $this->number = $number;
        $this->classNumber = $classNumber;
    }
}
