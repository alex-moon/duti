<?php

namespace Duti\Bundle\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Duti\Bundle\Core\Repository\BreakLogRepository")
 * @ORM\Table(name="break_log")
 * @ORM\HasLifecycleCallbacks
 */
class BreakLog extends TimeLog
{
    // @todo Day entity?
}
