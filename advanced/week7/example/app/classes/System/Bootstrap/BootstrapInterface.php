<?php namespace System\Bootstrap;

/**
 * Interface BootstrapInterface
 * @package System\Bootstrap
 */
interface BootstrapInterface
{
    public function setup(): void;

    public function render(): string;
}
