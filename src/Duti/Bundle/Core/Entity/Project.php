<?php

namespace Duti\Bundle\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Duti\Bundle\Core\Repository\ProjectRepository")
 * @ORM\Table(name="project")
 * @ORM\HasLifecycleCallbacks()
 */
class Project extends NameEntity
{
    /**
     * @var Space $space
     * @ORM\ManyToOne(targetEntity="Duti\Bundle\Core\Entity\Space")
     * @ORM\JoinColumn(name="space_id", referencedColumnName="id")
     */
    protected $space;

    /**
     * @var string $colour
     * @ORM\Column(name="colour", type="string")
     */
    protected $colour;

    /**
     * @var Task $currentTask
     * @ORM\OneToOne(targetEntity="Task")
     * @ORM\JoinColumn(name="current_task_id", referencedColumnName="id")
     */
    protected $currentTask;

    /**
     * @var Task[] $tasks
     * @ORM\OneToMany(targetEntity="Duti\Bundle\Core\Entity\Task", mappedBy="project")
     * @ORM\OrderBy({"urgency" = "ASC"})
     */
    protected $tasks = [];

    /**
     * @return Space
     */
    public function getSpace()
    {
        return $this->space;
    }

    /**
     * @param Space $space
     */
    public function setSpace($space)
    {
        $this->space = $space;
    }

    /**
     * @return string
     */
    public function getColour()
    {
        return $this->colour;
    }

    /**
     * @param string $colour
     */
    public function setColour($colour)
    {
        $this->colour = $colour;
    }

    /**
     * @return Task[]
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * @param Task[] $tasks
     */
    public function setTasks($tasks)
    {
        $this->tasks = $tasks;
    }

    /**
     * @return Task
     * @throws \Exception
     */
    public function getCurrentTask()
    {
        if (empty($this->tasks)) {
            throw new \Exception(sprintf(
                "Cannot get current task for project %s because it has no tasks",
                $this
            ));
        }
        if (is_null($this->currentTask)) {
            $this->currentTask = $this->tasks[0];
        }
        return $this->currentTask;
    }

    /**
     * @param Task $currentTask
     * @throws \Exception
     */
    public function setCurrentTask($currentTask)
    {
        if (! in_array($currentTask, $this->tasks)) {
            throw new \Exception(sprintf(
                "Task %s not in project %s cannot be current task",
                $currentTask,
                $this
            ));
        }
        $this->currentTask = $currentTask;
    }

    /**
     * @return Task[]
     */
    public function getUnfinishedTasks()
    {
        $result = [];
        foreach ($this->tasks as $task) {
            if (!$task->isFinished()) {
                $result[] = $task;
            }
        }

        return $result;
    }
}
