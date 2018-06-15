<?php

namespace Stock\Command;

use PHPUnit\Framework\TestCase;

class SaveStockTest extends TestCase
{
    private $saveStockCommand;
    private $repository;

    public function setUp()
    {
        $this->repository = $this->createMock(
            'Stock\Repository\StockRepository'
        );

        $this->saveStockCommand = new SaveStock($this->repository);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Stock not set
     */
     public function testExecuteWithouStock()
     {
         $this->saveStockCommand->execute();
     }

    public function testExecute()
    {
        $stock    = ['item'=>'uuid', 'quantity'=>1];
        $response = [];
        
        $this
            ->repository
            ->expects($this->once())
            ->method('save')
            ->with($stock);

        $this->assertSame(
            $this->saveStockCommand->setStock($stock),
            $this->saveStockCommand
        );

        $this->saveStockCommand->execute();
    }
}
