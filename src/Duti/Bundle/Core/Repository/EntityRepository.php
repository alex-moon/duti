<?php

namespace Duti\Bundle\Core\Repository;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

use Doctrine\ORM\EntityRepository as DoctrineEntityRepository;

class EntityRepository extends DoctrineEntityRepository implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function save($entity, $flush = true)
    {
        $this->getEntityManager()->persist($entity);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @param $entity
     * @param bool $flush
     */
    public function delete($entity, $flush = true)
    {
        $this->getEntityManager()->remove($entity);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
