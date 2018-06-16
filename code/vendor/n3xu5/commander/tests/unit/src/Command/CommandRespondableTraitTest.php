<?php

namespace Commander\Command;

use PHPUnit\Framework\TestCase;

class CommandRespondableTraitTest extends TestCase
{
    public function testSetAndGetResponse()
    {
        $param = 1;
        $expectedResponse = 2;

        $this->assertSame(
            (new MockCommand)
            ->setParam($param)
            ->execute()
            ->getResponse(),
            $expectedResponse
        );
    }
}

class MockCommand implements CommandInterface, CommandRespondableInterface{
    use CommandRespondableTrait;

    private $param;

    public function setParam(int $number): CommandInterface
    {
        $this->param = $number;
        return $this;
    }

    public function execute(): CommandInterface
    {
        $this->setResponse(++$this->param);
        return $this;
    }
}
