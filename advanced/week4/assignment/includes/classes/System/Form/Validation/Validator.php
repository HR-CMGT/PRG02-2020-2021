<?php namespace System\Form\Validation;

/**
 * Interface Validator
 * @package System\Form\Validation
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
