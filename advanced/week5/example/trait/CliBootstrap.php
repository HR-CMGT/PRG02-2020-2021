<?php

/**
 * Class CliBootstrap
 */
class CliBootstrap
{
    use BootstrapSetup;

    public function run(): void
    {
        $this->state = true;
    }
}
