<?php
/**
 * @maintainer Alex Moon <alex.moon@printed.com>
 */

namespace Duti\Bundle\Core\Entity;

use Duti\Bundle\Core\Logical\StartedEndedTrait;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"task" = "TaskLog", "break" = "BreakLog"})
 * @ORM\HasLifecycleCallbacks
 */
class TimeLog extends Entity
{
    use StartedEndedTrait;
}
