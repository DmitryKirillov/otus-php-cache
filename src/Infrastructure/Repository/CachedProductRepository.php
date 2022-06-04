<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Domain\Contract\ProductRepositoryInterface;
use App\Domain\Model\Product;
use App\Infrastructure\Contract\CacheInterface;

class CachedProductRepository implements ProductRepositoryInterface
{
    private ProductRepositoryInterface $decoratedRepository;

    private CacheInterface $cache;

    private const POPULAR_PRODUCTS = "products:popular";

    /**
     * @param  ProductRepositoryInterface  $productRepository
     * @param  CacheInterface  $cache
     */
    public function __construct(ProductRepositoryInterface $productRepository, CacheInterface $cache)
    {
        $this->decoratedRepository = $productRepository;
        $this->cache = $cache;
    }

    public function findProductById(int $id): ?Product
    {
        return $this->decoratedRepository->findProductById($id);
    }

    public function updateProduct(Product $product): void
    {
        $this->decoratedRepository->updateProduct($product);
        $this->cache->delete(self::POPULAR_PRODUCTS);
    }

    public function getPopularProducts(): array
    {
        $popularProducts = $this->cache->get(self::POPULAR_PRODUCTS);
        if ($popularProducts !== false) {
            return $popularProducts;
        }

        $popularProducts = $this->decoratedRepository->getPopularProducts();
        $this->cache->set(self::POPULAR_PRODUCTS, $popularProducts, 10);

        return $popularProducts;
    }
}
