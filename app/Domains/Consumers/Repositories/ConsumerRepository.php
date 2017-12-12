<?php
namespace App\Domains\Consumers\Repositories;

use App\Support\Cache\Cache;
use App\Support\Repository\BaseRepository;
use App\Domains\Consumers\Consumer;

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
