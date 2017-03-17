<?php

namespace Duti\Bundle\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Duti\Bundle\Core\Repository\SpaceRepository")
 * @ORM\Table(name="space")
 * @ORM\HasLifecycleCallbacks
 */
class Space extends NameEntity
{
}
