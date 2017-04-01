<?php
/**
 * @maintainer Alex Moon <alex.moon@printed.com>
 */

namespace Duti\Bundle\Core\Manager;

use Duti\Bundle\Core\Entity\Entity;
use Duti\Bundle\Core\Exception\EntityNotFoundException;
use Duti\Bundle\Core\Factory\EntityFactory;
use Duti\Bundle\Core\Repository\EntityRepository;

abstract class Manager
{
    /** @var EntityFactory $factory */
    protected $factory;

    /** @var EntityRepository $repository */
    protected $repository;

    public function __construct(
        EntityFactory $factory,
        EntityRepository $repository
    ) {
        $this->repository = $repository;
        $this->factory = $factory;
    }

    /**
     * @param bool|null $flush
     *
     * @return Entity
     */
    public function create($flush = false)
    {
        $entity = $this->factory->create();
        $this->repository->save($entity, $flush);

        return $entity;
    }

    public function findOrThrow($id)
    {
        // @todo should the manager be entity class-aware? Maybe!
        $entity = $this->repository->find($id);
        if ($entity === null) {
            throw EntityNotFoundException::forClassAndId(static::class, $id);
        }

        return $entity;
    }
}
