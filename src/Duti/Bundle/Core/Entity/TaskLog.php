<?php

namespace Duti\Bundle\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Duti\Bundle\Core\Repository\TaskLogRepository")
 * @ORM\Table(name="task_log")
 * @ORM\HasLifecycleCallbacks
 */
class TaskLog extends TimeLog
{
    /**
     * @var Task
     * @ORM\ManyToOne(targetEntity="Duti\Bundle\Core\Entity\Task")
     * @ORM\JoinColumn(name="task_id", referencedColumnName="id")
     */
    protected $task;

    /**
     * @return Task
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @param Task $task
     */
    public function setTask($task)
    {
        $this->task = $task;
    }

    /**
     * @return int - time so far in seconds
     */
    public function getTimeSoFar()
    {
        if ($this->started === null) {
            return 0;
        }
        $end = $this->ended ?: new \DateTime();
        return $end->getTimestamp() - $this->started->getTimestamp();
    }
}
