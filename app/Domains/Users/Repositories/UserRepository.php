<?php
namespace ApiBase\Domains\Users\Repositories;

use ApiBase\Domains\Users\User;
use ApiBase\Support\Repository\BaseRepository;
use AuthExpressive\Interfaces\DatabaseInterface;

class UserRepository extends BaseRepository implements DatabaseInterface
{
    protected $entity = User::class;

    public function retrieveById($identifier): array
    {
        $user = $this->getById($identifier);
        return $user === null ? [] : $user->first()->toArray();
    }

    public function retrieveByCredentials(array $credentials): array
    {
        return $this->retrieveById($credentials['username']);
    }

    public function retrieveList(): array
    {
        return $this->getAll();
    }

    public function persist($attributes): bool
    {
        return $this->save($attributes);
    }
}
