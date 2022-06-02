<?php

declare(strict_types=1);

namespace App\Infrastructure\Http;

use App\Application\Contract\ProductServiceInterface;

class ProductPageController
{
    /** @var ProductServiceInterface */
    private ProductServiceInterface $productService;

    /**
     * @param  ProductServiceInterface  $productService
     */
    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function __invoke(string $id): void
    {
        $product = $this->productService->findProductById((int) $id);
        $reviews = ($product !== null) ? $this->productService->getProductReviews($product) : [];
        $data = [
            'product' => [
                'id' => $product->getId(),
                'title' => $product->getTitle(),
                'price' => $product->getPrice(),
            ],
            'reviews' => array_map(
                static fn ($review) => $review->getText(),
                $reviews
            ),
        ];
        echo json_encode($data);
    }
}
