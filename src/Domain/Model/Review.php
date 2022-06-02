<?php

declare(strict_types=1);

namespace App\Domain\Model;

class Review
{
    /** @var Product */
    private Product $product;

    /** @var string */
    private string $text;

    /**
     * @param Product $product
     * @param string $text
     */
    public function __construct(Product $product, string $text)
    {
        $this->product = $product;
        $this->text = $text;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

}
