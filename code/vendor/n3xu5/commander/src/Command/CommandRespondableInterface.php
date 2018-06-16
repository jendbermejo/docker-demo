<?php

namespace Commander\Command;

/**
 * For commands that need to generate a response
 */
interface CommandRespondableInterface
{
    /**
     * Get the generated response
     *
     * @return mixed
     */
    public function getResponse();
}
