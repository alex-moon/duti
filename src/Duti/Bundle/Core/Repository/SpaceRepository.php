<?php
/**
 * @maintainer Alex Moon <alex.moon@printed.com>
 */

namespace Duti\Bundle\Core\Repository;

use Duti\Bundle\Core\Entity\Space;

/**
 * @method Space findOneBy(array $criteria, array $orderBy = null)
 */
class SpaceRepository extends AbstractEntityRepository
{
    /**
     * @param string $name
     *
     * @return Space
     */
    public function getOrCreateByName($name)
    {
        $space = $this->findOneBy(['name' => $name])
            ?: new Space($name);
        $this->save($space, true);

        return $space;
    }
}
