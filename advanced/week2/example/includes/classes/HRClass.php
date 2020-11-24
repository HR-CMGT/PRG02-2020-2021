<?php namespace AdvancedDemo\Demo\SchoolClasses;

/**
 * Interface HRCLass
 */
interface HRClass
{
    /**
     * @param array $studentRawList
     */
    public function addStudent(array $studentRawList): void;

    /**
     * @return array
     */
    public function getStudents(): array;
}
