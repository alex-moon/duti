<?php

namespace Duti\Bundle\Core\Entity;

use Duti\Bundle\Core\Logical\StartedEndedTrait;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Duti\Bundle\Core\Repository\WorkDayRepository")
 * @ORM\Table(name="work_day")
 */
abstract class WorkDay extends Entity
{
    use StartedEndedTrait;
}
