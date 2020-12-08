<?php namespace Form\Validation;

/**
 * Interface Validator
 * @package Form\Validator
 */
interface Validator
{
    /**
     * Validate magic
     */
    public function validate(): void;

    /**
     * @return array
     */
    public function getErrors(): array;
}
