<?php

declare(strict_types=1);

namespace App\Infrastructure\Gateway;

use App\Infrastructure\Contract\ReviewGatewayInterface;

class ReviewGateway implements ReviewGatewayInterface
{
    private const REVIEWS = [
        "Классный ноутбук!",
        "Мне всё понравилось",
        "Слишком дорого",
        "Не разобрался, как пропатчить KDE под FreeBSD",
        "Отличный подарок детям!",
    ];

    /**
     * Возвращает массив строк со случайными отзывами для заданного артикула.
     * Имитирует сетевую задержку (как будто это внешний API).
     *
     * @param string $sku
     * @return string[]
     */
    public function getReviewsBySku(string $sku): array {
        sleep(3);
        return array_rand(array_flip(self::REVIEWS), 3);
    }
}
