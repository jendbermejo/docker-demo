<?php

namespace Stock\Repository;

class StockRepository implements RepositoryInterface, StockRepositoryInterface
{
    /**
     * @var PDO
     */
    private $connection;

    /**
     * @param \PDO $connection
     *
     * @return void
     */
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * {@inheritdoc}
     */
    public function getAllStocksByProductUuid(string $itemUuid): array
    {
        $query = '
            SELECT 
                quantity
            FROM
                stock
            WHERE 
                item_uuid = :item_uuid';

        $sth = $this->connection->prepare($query);
        $sth->execute(['item_uuid' => $itemUuid]);

        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * {@inheritdoc}
     */
    public function save(array $stock): void
    {
        $query = '
            REPLACE INTO stock 
            (item_uuid, quantity) 
            VALUES (:item_uuid, :quantity) ';

        $this->connection->prepare($query)->execute($stock);
    }
}
