<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Domain\Contract\ReviewRepositoryInterface;
use App\Domain\Model\Product;
use App\Domain\Model\Review;
use App\Infrastructure\Contract\ReviewGatewayInterface;

class ReviewRepository implements ReviewRepositoryInterface
{
    /** @var ReviewGatewayInterface */
    private ReviewGatewayInterface $reviewGateway;

    /**
     * @param ReviewGatewayInterface $reviewApi
     */
    public function __construct(ReviewGatewayInterface $reviewApi)
    {
        $this->reviewGateway = $reviewApi;
    }

    /**
     * @inheritDoc
     */
    public function findReviewsByProduct(Product $product): array
    {
        $api = $this->reviewGateway;
        $reviews = $api->getReviewsBySku(
            $product->getSku()
        );
        $list = [];
        foreach ($reviews as $review) {
            $list[] = new Review($product, $review);
        }
        return $list;
    }
}
