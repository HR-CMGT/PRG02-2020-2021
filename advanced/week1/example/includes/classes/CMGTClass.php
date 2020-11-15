<?php

/**
 * Class CMGTClass
 */
class CMGTClass
{
    public $name = "Advanced Group";
    public $slogan = "We rock!";
    private $students = [];

    /**
     * @return array
     */
    public function getStudents(): array
    {
        return $this->students;
    }

    /**
     * Retrieve raw array value & pass to Student object
     *
     * @param $value
     */
    public function addStudent($value): void
    {
        $this->students[] = new Student($value['name'], $value['number'], $value['classNumber']);
    }

    /**
     * @return int
     */
    public function getTotalStudents(): int
    {
        return count($this->students);
    }
}
