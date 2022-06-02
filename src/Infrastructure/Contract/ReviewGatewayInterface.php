<?php

declare(strict_types=1);

namespace App\Infrastructure\Contract;

interface ReviewGatewayInterface
{
    /**
     * Возвращает массив строк со случайными отзывами для заданного артикула.
     *
     * @param string $sku
     * @return string[]
     */
    public function getReviewsBySku(string $sku): array;
}
