<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence;

use App\Domain\Model\Product;
use App\Infrastructure\Contract\ProductDatabaseInterface;

class ProductDatabase implements ProductDatabaseInterface
{

    /** @var Product[] */
    private array $products;

    public function __construct() {
        $this->products[1] = new Product(
            1,
            '000-001',
            'Ноутбук Apple MacBook Pro',
            150_000,
            4
        );
        $this->products[2] = new Product(
            2,
            '000-002',
            'Ноутбук HP Probook',
            82_000,
            12
        );
        $this->products[3] = new Product(
            3,
            '000-003',
            'Ноутбук Lenovo',
            104_200,
            2
        );
        $this->products[4] = new Product(
            4,
            '000-004',
            'Ноутбук Acer Aspire',
            38_000,
            5
        );
    }

    /**
     * @inheritDoc
     */
    public function findById(int $id): ?Product
    {
        if (!array_key_exists($id, $this->products)) {
            return null;
        }
        return $this->products[$id];
    }

    /**
     * @inheritDoc
     */
    public function update(Product $product): void
    {
        // TODO: Implement update() method.
    }

    /**
     * Имитирует задержку (как будто выполняется сложный запрос к БД).
     *
     * @inheritDoc
     */
    public function executeQuery(string $query)
    {
        sleep(5);
        $randomKeys = array_keys($this->products);
        shuffle($randomKeys);
        $list = [];
        foreach ($randomKeys as $key) {
            $list[] = $this->products[$key];
        }
        return $list;
    }

}
