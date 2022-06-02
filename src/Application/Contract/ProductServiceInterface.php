<?php

declare(strict_types=1);

namespace App\Application\Contract;

use App\Domain\Model\Product;
use App\Domain\Model\Review;

interface ProductServiceInterface
{
    /**
     * Ищет товар по его идентификатору.
     *
     * @param int $id
     * @return Product|null
     */
    public function findProductById(int $id): ?Product;

    /**
     * Выполняет продажу товара.
     *
     * @param Product $product
     * @return mixed
     */
    public function sellProduct(Product $product): void;

    /**
     * Возвращает список популярных товаров.
     *
     * @return Product[]
     */
    public function getPopularProducts(): array;

    /**
     * Возвращает список отзывов для товара.
     *
     * @param Product $product
     * @return Review[]
     */
    public function getProductReviews(Product $product): array;
}
