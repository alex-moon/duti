<?php

namespace Duti\Bundle\Core\Entity;

use Duti\Bundle\Core\Logical\StartedEndedTrait;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"task" = "TaskLog", "break" = "BreakLog"})
 * @ORM\HasLifecycleCallbacks
 */
abstract class TimeLog extends Entity
{
    use StartedEndedTrait;

    /**
     * @var WorkDay $workDay
     * @ORM\ManyToOne(targetEntity="Duti\Bundle\Core\Entity\WorkDay")
     * @ORM\JoinColumn(name="work_day_id", referencedColumnName="id")
     */
    protected $workDay;

    /**
     * @return WorkDay
     */
    public function getWorkDay()
    {
        return $this->workDay;
    }

    /**
     * @param WorkDay $workDay
     */
    public function setWorkDay($workDay)
    {
        $this->workDay = $workDay;
    }
}
