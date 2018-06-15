<?php

namespace Stock\Command;

use Stock\Repository\StockRepositoryInterface;
use Commander\Command\CommandInterface;
use Commander\Command\CommandRespondableInterface;
use Commander\Command\CommandRespondableTrait;

/**
 * Class GetStock
 */
class GetStock implements CommandInterface, CommandRespondableInterface
{
    use CommandRespondableTrait;

    /**
     * @var StockRepositoryInterface
     */
    private $repository;

    /**
     * @var string
     */
    private $itemUuid;

    /**
     * @param StockRepository $repository
     *
     * @return void
     */
    public function __construct(StockRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $itemUuid
     *
     * @return self
     */
    public function setItemUuid(string $itemUuid): self
    {
        $this->itemUuid = $itemUuid;
        return $this;
    }

    /**
     * Get the stock information from the persistance layer
     *
     * @return GetStock
     */
    public function execute(): CommandInterface
    {
        if (!$this->itemUuid) {
            throw new \Exception('Product uuid not set');
        }

        $this
            ->setResponse(
                $this
                    ->repository
                    ->getAllStocksByProductUuid($this->itemUuid)
            );

        return $this;
    }
}
