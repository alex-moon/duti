<?php
/**
 * @maintainer Alex Moon <alex.moon@printed.com>
 */

namespace Duti\Bundle\Core\Factory;

use Duti\Bundle\Core\Entity\Entity;
use Duti\Bundle\Core\Exception\WrongEntityException;

use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class EntityFactory
{
    use ContainerAwareTrait;

    /** @var string $entity */
    protected $entity = Entity::class;

    /**
     * @return Entity
     */
    public function create()
    {
        $entity = $this->getConstructedEntity();
        return $this->prepare($entity);
    }

    /**
     * @param string $entity
     * @return $this
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;
        return $this;
    }

    /**
     * @return Entity
     */
    public function getConstructedEntity()
    {
        return new $this->entity;
    }

    /**
     * @param Entity $entity
     * @return Entity
     * @throws WrongEntityException
     */
    public function prepare(Entity $entity)
    {
        if (! $entity instanceof $this->entity) {
            throw WrongEntityException::forExpected($this->entity);
        }
        return $entity;
    }
}
