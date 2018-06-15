<?php

namespace Stock\Repository;

/**
 * Interface StockRepositoryInterface
 */
interface StockRepositoryInterface
{
    /**
     * Get all the stock informartion from a specific product
     *
     * @param string $productUuid
     *
     * @return array
     */
    public function getAllStocksByProductUuid(string $productUuid): array;

    /**
     * Save the stock information
     *
     * @param array $stock
     *
     * @return void
     */
    public function save(array $stock): void;
}
