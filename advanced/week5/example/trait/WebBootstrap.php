<?php

/**
 * Class WebBootstrap
 */
class WebBootstrap
{
    use BootstrapSetup;

    public function run(): void
    {
        $this->state = false;
    }
}
