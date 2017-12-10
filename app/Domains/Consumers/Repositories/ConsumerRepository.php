<?php
namespace ApiBase\Domains\Consumers\Repositories;

use ApiBase\Support\Cache\Cache;
use ApiBase\Support\Repository\BaseRepository;
use ApiBase\Domains\Consumers\Consumer;

class ConsumerRepository extends BaseRepository
{
    /**
     * @var Cache
     */
    private $cache;

    protected $entity = Consumer::class;

    public function __construct(Cache $cache)
    {
        $this->cache = $cache;
    }

    public function getById($id)
    {
        if ($this->cache->has($id)) {
            return $this->cache->get($id);
        }

        $consumer = parent::getById($id);

        if (null === $consumer) {
            return $consumer;
        }

        $this->cache->set($id, $consumer);
        return $consumer;
    }
}
