<?php

namespace Stock\Command;

use PHPUnit\Framework\TestCase;

class GetStockTest extends TestCase
{
    private $getStockCommand;
    private $repository;

    public function setUp()
    {
        $this->repository = $this->createMock(
            'Stock\Repository\StockRepository'
        );

        $this->getStockCommand = new GetStock($this->repository);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Product uuid not set
     */
     public function testExecuteWithouItemUuid()
     {
         $this->getStockCommand->execute();
     }

    public function testExecute()
    {
        $itemUuid = 'uuid';
        $response = [];
        
        $this
            ->repository
            ->expects($this->once())
            ->method('getAllStocksByProductUuid')
            ->with($itemUuid)
            ->willReturn($response);

        $this->assertSame(
            $this->getStockCommand->setItemUuid($itemUuid),
            $this->getStockCommand
        );

        $this->getStockCommand->execute();

        $this->assertSame(
            $this->getStockCommand->getResponse(),
            $response
        );
    }
}
