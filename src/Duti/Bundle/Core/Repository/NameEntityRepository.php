<?php

namespace Duti\Bundle\Core\Repository;

use Duti\Bundle\Core\Entity\NameEntity;

abstract class NameEntityRepository extends EntityRepository
{
    /**
     * @param string $name
     *
     * @return NameEntity
     */
    public function getOrCreateByName($name)
    {
        $entityClass = $this->getClassName();
        $entity = $this->findOneBy(['name' => $name])
            ?: new $entityClass($name);
        $this->save($entity, true);

        return $entity;
    }
}
