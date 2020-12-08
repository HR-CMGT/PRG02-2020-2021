<?php namespace StudentsList\SchoolClasses;

/**
 * Interface HRCLass
 */
interface HRClass
{
    /**
     * @param \StudentsList\Persons\Student[] $students
     */
    public function addStudents(array $students): void;

    /**
     * @return array
     */
    public function getStudents(): array;
}
