<?php

declare(strict_types=1);

namespace App\Infrastructure\Contract;

use App\Domain\Model\Product;

interface ProductDatabaseInterface
{
    /**
     * Ищет сущность по идентификатору (первичному ключу).
     *
     * @param int $id
     * @return Product|null
     */
    public function findById(int $id): ?Product;

    /**
     * Обновляет сущность в БД.
     *
     * @param  Product  $product
     */
    public function update(Product $product): void;

    /**
     * Выполняет произвольный SQL-запрос.
     *
     * @param string $query
     */
    public function executeQuery(string $query);
}
