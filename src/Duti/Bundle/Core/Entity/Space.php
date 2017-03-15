<?php

/**
 * @maintainer Alex Moon <alex.moon@printed.com>
 */

namespace Duti\Bundle\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Duti\Bundle\Core\Repository\SpaceRepository")
 * @ORM\Table(name="space")
 */
class Space extends NameEntity
{

}
