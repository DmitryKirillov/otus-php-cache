<?php

declare(strict_types=1);

namespace App\Infrastructure\Http;

use App\Application\Contract\ProductServiceInterface;

class ProductListController
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

    public function __invoke()
    {
        $list = $this->productService->getPopularProducts();
        $data = [
            'list' => array_map(
                static fn($item) => [
                    'id' => $item->getId(),
                    'title' => $item->getTitle(),
                ],
                $list
            ),
        ];
        echo json_encode($data);
    }
}
