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
     * @var Task[] $tasks
     * @ORM\OneToMany(targetEntity="Duti\Bundle\Core\Entity\Task", mappedBy="project")
     */
    protected $tasks = [];

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
}
