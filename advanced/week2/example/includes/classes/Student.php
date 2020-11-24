<?php namespace AdvancedDemo\Demo\Persons;

/**
 * Class Student
 */
class Student extends Person
{
    public string $number;
    public string $classNumber;

    /**
     * Student constructor.
     *
     * @param string $name
     * @param string $number
     * @param string $classNumber
     */
    public function __construct(string $name, string $number, string $classNumber)
    {
        $this->name = $name;
        $this->number = $number;
        $this->classNumber = $classNumber;
    }
}
