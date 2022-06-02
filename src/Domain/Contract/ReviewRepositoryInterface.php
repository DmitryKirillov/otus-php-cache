<?php

declare(strict_types=1);

namespace App\Domain\Contract;

use App\Domain\Model\Product;
use App\Domain\Model\Review;

interface ReviewRepositoryInterface
{
    /**
     * Возвращает список отзывов для товара.
     *
     * @param Product $product
     * @return Review[]
     */
    public function findReviewsByProduct(Product $product): array;
}
