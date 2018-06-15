<?php

namespace Stock\Service;

use Psr\Container\ContainerInterface;
use Commander\Service\ServiceInterface;
use Commander\Service\ServiceTrait;

class Stock implements ServiceInterface, StockInterface
{
    use ServiceTrait;
    
    /**
     * {@inheritdoc}
     */
    public function get(string $itemUuid): array
    {
        return $this
            ->container
            ->get('getStockCommand')
            ->setItemUuid($itemUuid)
            ->execute()
            ->getResponse();
    }

    /**
     * {@inheritdoc}
     */
    public function save(string $itemUuid, array $stockInfo)
    {
        $saveStockCommand = $this
                ->container
                ->get('saveStockCommand');

        foreach ($stockInfo as $stock) {
            $saveStockCommand
                ->setStock(
                    [
                    'item_uuid' => $itemUuid,
                    'quantity'  => $stock['quantity']
                    ]
                )
                ->execute();
        }
    }
}
