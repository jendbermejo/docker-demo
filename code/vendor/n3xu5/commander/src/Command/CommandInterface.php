<?php

namespace Commander\Command;

/**
 * Command Interface
 */
interface CommandInterface
{
    /**
     * Execute
     *
     * @return void
     */
    public function execute(): CommandInterface;
}
