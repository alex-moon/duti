<?php

namespace Duti\Bundle\Core\Repository;

use Duti\Bundle\Core\Entity\Space;

/**
 * @method Space findOneBy(array $criteria, array $orderBy = null)
 */
class SpaceRepository extends NameEntityRepository
{
    /**
     * @return Space
     *
     * @throws \Exception
     */
    public function getCurrent()
    {
        $currents = $this->findBy([
            'isCurrent' => true,
        ]);
        if (count($currents) > 1) {
            throw new \Exception(sprintf(
                'More than one current space found :('
            ));
        }

        return $currents[0];
    }
}
