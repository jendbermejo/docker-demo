<?php

namespace Commander\Command;

/**
 * Trait that adds the common actions of a command that
 * can generate response
 */
trait CommandRespondableTrait
{
    /**
     * @var mixed
     */
    private $response;

    /**
     * Set response value
     *
     * @return void
     */
    private function setResponse($response)
    {
        $this->response = $response;
    }

    /**
     * Return response value
     *
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }
}
