<?php

declare(strict_types=1);

namespace App\Infrastructure\Cache;

use App\Infrastructure\Contract\CacheInterface;

class MemcachedCache implements CacheInterface
{
    private \Memcached $memcached;

    public function __construct()
    {
        $this->memcached = new \Memcached();
        $this->memcached->addServer(
            $_ENV['MEMCACHED_HOST'],
            (int) $_ENV['MEMCACHED_PORT']
        );
    }

    /**
     * @inheritDoc
     */
    public function set(string $key, mixed $value, int $ttl = 0): bool
    {
        return $this->memcached->set($key, $value, $ttl);
    }

    /**
     * @inheritDoc
     */
    public function get(string $key): mixed
    {
        return $this->memcached->get($key);
    }

    /**
     * @inheritDoc
     */
    public function delete(string $key): void
    {
        $this->memcached->delete($key);
    }
}
