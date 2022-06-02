<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Domain\Contract\ProductRepositoryInterface;
use App\Domain\Model\Product;
use App\Infrastructure\Contract\ProductDatabaseInterface;

class ProductRepository implements ProductRepositoryInterface
{
    /** @var ProductDatabaseInterface */
    private ProductDatabaseInterface $productDatabase;

    /**
     * @param ProductDatabaseInterface $productDatabase
     */
    public function __construct(ProductDatabaseInterface $productDatabase)
    {
        $this->productDatabase = $productDatabase;
    }

    /**
     * @inheritDoc
     */
    public function findProductById(int $id): ?Product
    {
        $product = $this->productDatabase->findById($id);
        return ($product instanceof Product) ? $product : null;
    }

    /**
     * @inheritDoc
     */
    public function updateProduct(Product $product): void
    {
        $this->productDatabase->update($product);
    }

    /**
     * @inheritDoc
     */
    public function getPopularProducts(): array
    {
        return $this->productDatabase->executeQuery("SELECT * ...");
    }
}
