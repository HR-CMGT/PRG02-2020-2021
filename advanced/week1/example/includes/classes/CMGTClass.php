<?php

/**
 * Class CMGTClass
 */
class CMGTClass
{
    public string $name = "Advanced Group";
    public string $slogan = "We rock!";
    private array $students = [];

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
     * @param $value array
     */
    public function addStudent(array $value): void
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
