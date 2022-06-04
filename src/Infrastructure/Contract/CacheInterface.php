<?php

declare(strict_types=1);

namespace App\Infrastructure\Contract;

interface CacheInterface
{
    /**
     * Добавить запись в кэш.
     *
     * @param string $key
     * @param string $value
     * @param  int  $ttl
     * @return bool
     */
    public function set(string $key, mixed $value, int $ttl = 0): bool;

    /**
     * Получить запись из кэша.
     * Если ничего не найдено, возвращается FALSE.
     *
     * @param  string  $key
     * @return mixed
     */
    public function get(string $key): mixed;

    /**
     * Удалить запись из кэша.
     *
     * @param  string  $key
     * @return void
     */
    public function delete(string $key): void;
}
