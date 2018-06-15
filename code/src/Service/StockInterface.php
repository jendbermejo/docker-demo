<?php

namespace Stock\Service;

/**
 * Interface Stock
 */
interface StockInterface
{
    /**
     * Get stock for a specific product
     *
     * @param string $productUuid
     *
     * @return array
     */
    public function get(string $productUuid): array;

    /**
     * Save stock information for a specific product
     *
     * @param string $itemUuid
     * @param array $stockInfo
     *
     * @return void
     */
    public function save(string $itemUuid, array $stockInfo);
}
