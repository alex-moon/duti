<?php
/**
 * @maintainer Alex Moon <alex.moon@printed.com>
 */

namespace Duti\Bundle\Core\Service;

use Doctrine\ORM\EntityManager;

class Service
{
    /**
     * @var EntityManager $entityManager
     */
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    protected function flush()
    {
        $this->entityManager->flush();
    }
}
