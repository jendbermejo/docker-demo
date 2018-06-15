<?php

namespace Stock\Command;

use Stock\Repository\StockRepository;
use Commander\Command\CommandInterface;

/**
 * Class GetStock
 */
class SaveStock implements CommandInterface
{
    /**
     * @var StockRepository
     */
    private $repository;

    /**
     * @var array stock information to save
     */
    private $stock;

    /**
     * @param StockRepository $repository
     *
     * @return void
     */
    public function __construct(StockRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param stock $stock
     *
     * @return self
     */
    public function setStock(array $stock): self
    {
        $this->stock = $stock;
        return $this;
    }

    /**
     * Save the stock information using the persistance layer
     *
     * @return self
     */
    public function execute(): CommandInterface
    {
        if (!$this->stock) {
            throw new \Exception('Stock not set');
        }

        $this
            ->repository
            ->save($this->stock);

        return $this;
    }
}
