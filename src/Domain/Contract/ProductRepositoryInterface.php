<?php

declare(strict_types=1);

namespace App\Domain\Contract;

use App\Domain\Model\Product;

interface ProductRepositoryInterface
{
    /**
     * Ищет товар по его идентификатору.
     *
     * @param int $id
     * @return Product|null
     */
    public function findProductById(int $id): ?Product;

    /**
     * Обновляет данные о товаре в БД.
     *
     * @param Product $product
     */
    public function updateProduct(Product $product): void;

    /**
     * Возвращает список популярных товаров.
     *
     * @return Product[]
     */
    public function getPopularProducts(): array;
}
