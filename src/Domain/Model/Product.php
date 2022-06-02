<?php

declare(strict_types=1);

namespace App\Domain\Model;

class Product
{
    /** @var int */
    private int $id;

    /** @var string */
    private string $sku;

    /** @var string */
    private string $title;

    /** @var int */
    private int $price;

    /** @var int */
    private int $stock;

    /**
     * @param int $id
     * @param string $sku
     * @param string $title
     * @param int $price
     * @param int $stock
     */
    public function __construct(int $id, string $sku, string $title, int $price, int $stock)
    {
        $this->id = $id;
        $this->sku = $sku;
        $this->title = $title;
        $this->price = $price;
        $this->stock = $stock;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getStock(): int
    {
        return $this->stock;
    }

    /**
     * @param int $stock
     */
    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

}
