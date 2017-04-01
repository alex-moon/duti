<?php

namespace Duti\Bundle\Core\Manager;

use Duti\Bundle\Core\Entity\Space;
use Duti\Bundle\Core\Factory\SpaceFactory;
use Duti\Bundle\Core\Repository\SpaceRepository;

class SpaceManager extends Manager
{
    /** @var SpaceFactory $factory */
    protected $factory;

    /** @var SpaceRepository $repository */
    protected $repository;

    /**
     * @return Space
     */
    public function getCurrent()
    {
        return $this->repository->getCurrent();
    }
}
