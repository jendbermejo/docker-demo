<?php

namespace Stock\Service;

use PHPUnit\Framework\TestCase;

class StockTest extends TestCase
{
    private $stock;
    private $container;

    public function setUp()
    {
        $this->container = $this->createMock(
            'Psr\Container\ContainerInterface'
        );

        $this->stock = new Stock($this->container);
    }

    public function testGet()
    {
        $itemUuid = '1a76cf0a-6d5f-4410-8808-f3ba3fbc8181';
        $response = [];

        $getStockCommand = $this->createMock(
            'Stock\Command\GetStock'
        );

        $this
            ->container
            ->expects($this->once())
            ->method('get')
            ->with('getStockCommand')
            ->willReturn($getStockCommand);

        $getStockCommand
            ->expects($this->once())
            ->method('setItemUuid')
            ->with($itemUuid)
            ->willReturn($getStockCommand);

        $getStockCommand
            ->expects($this->once())
            ->method('execute')
            ->willReturn($getStockCommand);

        $getStockCommand
            ->expects($this->once())
            ->method('getResponse')
            ->willReturn($response);

        $this->assertSame(
            $this->stock->get($itemUuid),
            $response
        );
    }

    public function testSave()
    {
        $itemUuid = '1a76cf0a-6d5f-4410-8808-f3ba3fbc8181';
        $stockInfo = [ 
            ['quantity'=>2],
        ];

        $saveStockCommand = $this->createMock(
            'Stock\Command\SaveStock'
        );

        $this
            ->container
            ->expects($this->once())
            ->method('get')
            ->with('saveStockCommand')
            ->willReturn($saveStockCommand);

        $saveStockCommand
            ->expects($this->once())
            ->method('setStock')
            ->with([
                    'item_uuid' => $itemUuid, 
                    'quantity' => 2
                ])
            ->willReturn($saveStockCommand);

        $saveStockCommand
            ->expects($this->once())
            ->method('execute');

        $this->assertSame(
            $this->stock->save($itemUuid, $stockInfo),
            null
        );
    }
}
