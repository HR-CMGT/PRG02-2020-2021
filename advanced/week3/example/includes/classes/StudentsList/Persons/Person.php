<?php namespace StudentsList\Persons;

/**
 * Class Person
 */
class Person
{
    public string $name;
    public string $birthDate;

    /**
     * @return string
     */
    public function shoutName(): string
    {
        return $this->name;
    }
}
