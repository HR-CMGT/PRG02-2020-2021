<?php

/**
 * Class Student
 */
class Student
{
    public string $name;
    public string $number;
    public string $classNumber;

    /**
     * Student constructor.
     * @param $name
     * @param $number
     * @param $classNumber
     */
    public function __construct(string $name, string $number, string $classNumber)
    {
        $this->name = $name;
        $this->number = $number;
        $this->classNumber = $classNumber;
    }
}
